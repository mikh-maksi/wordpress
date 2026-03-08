<?php
/*
Plugin Name: Latest Category Posts Shortcode
Description: Виводить останні записи обраної категорії через шорткод. Використовуйте [latest_cat_posts category="slug-or-id" count="5"].
Version: 1.0
Author: ChatGPT (Mikhail)
License: GPL2
Text Domain: latest-cat-posts
*/

if (!defined('ABSPATH')) exit;

class LCP_Shortcode_Plugin {

    public function __construct() {
        add_shortcode('latest_cat_posts', array($this, 'render_shortcode'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
    }

    public function enqueue_assets() {
        // Простий стиль — можна перевизначити в темі
        wp_register_style('lcp-style', false);
        wp_enqueue_style('lcp-style');
        $css = "
        .lcp-list{list-style:none;padding:0;margin:0;}
        .lcp-item{display:flex;gap:12px;padding:10px 0;border-bottom:1px solid #eee}
        .lcp-thumb{flex:0 0 80px;max-width:80px}
        .lcp-thumb img{width:100%;height:auto;display:block}
        .lcp-content{flex:1}
        .lcp-title{font-weight:600;margin:0 0 6px}
        .lcp-excerpt{color:#555;margin:6px 0 0}
        ";
        wp_add_inline_style('lcp-style', $css);
    }

    private function build_cache_key($atts) {
        return 'lcp_' . md5(serialize($atts) . get_locale());
    }

    public function render_shortcode($atts) {
        $defaults = array(
            'category' => '',      // id або slug
            'count' => 5,
            'show_excerpt' => 1,
            'show_thumb' => 1,
            'excerpt_length' => 20, // words
            'orderby' => 'date',
            'order' => 'DESC',
            'cache_minutes' => 10,
        );

        $atts = shortcode_atts($defaults, $atts, 'latest_cat_posts');

        // Безпечні значення
        $count = absint($atts['count']);
        if ($count <= 0) $count = 5;
        $show_excerpt = ($atts['show_excerpt'] == '1' || $atts['show_excerpt'] === 1) ? 1 : 0;
        $show_thumb = ($atts['show_thumb'] == '1' || $atts['show_thumb'] === 1) ? 1 : 0;
        $excerpt_length = absint($atts['excerpt_length']);
        if ($excerpt_length <= 0) $excerpt_length = 20;
        $orderby = sanitize_text_field($atts['orderby']);
        $order = (strtoupper($atts['order']) === 'ASC') ? 'ASC' : 'DESC';
        $cache_minutes = absint($atts['cache_minutes']);
        if ($cache_minutes <= 0) $cache_minutes = 0;

        // WP_Query args
        $query_args = array(
            'posts_per_page' => $count,
            'orderby' => $orderby,
            'order' => $order,
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
        );

        $cat = trim($atts['category']);
        if ($cat === '') {
            return '<!-- latest_cat_posts: category not specified -->';
        }

        if (is_numeric($cat)) {
            $query_args['cat'] = intval($cat);
        } else {
            $query_args['category_name'] = sanitize_text_field($cat); // slug
        }

        // Simple transient cache
        $cache_key = $this->build_cache_key($query_args);
        if ($cache_minutes) {
            $cached = get_transient($cache_key);
            if ($cached !== false) {
                return $cached;
            }
        }

        $q = new WP_Query($query_args);
        if (!$q->have_posts()) {
            $out = '<p class="lcp-no-posts">Немає постів у цій категорії.</p>';
            if ($cache_minutes) set_transient($cache_key, $out, $cache_minutes * 60);
            wp_reset_postdata();
            return $out;
        }

        ob_start();
        echo '<ul class="lcp-list" aria-live="polite">';
        while ($q->have_posts()) : $q->the_post();
            $post_id = get_the_ID();
            $title = get_the_title();
            $permalink = get_permalink();
            echo '<li class="lcp-item">';
            if ($show_thumb && has_post_thumbnail($post_id)) {
                echo '<div class="lcp-thumb"><a href="' . esc_url($permalink) . '">';
                echo get_the_post_thumbnail($post_id, 'thumbnail', array('alt' => the_title_attribute(array('echo' => 0))));
                echo '</a></div>';
            }
            echo '<div class="lcp-content">';
            echo '<h3 class="lcp-title"><a href="' . esc_url($permalink) . '">' . esc_html($title) . '</a></h3>';
            echo '<div class="lcp-meta"><small>' . esc_html(get_the_date()) . '</small></div>';
            if ($show_excerpt) {
                $excerpt = get_the_excerpt();
                if (!$excerpt) {
                    $excerpt = wp_trim_words(strip_shortcodes(get_the_content('')), $excerpt_length, '...');
                } else {
                    $excerpt = wp_trim_words(strip_shortcodes($excerpt), $excerpt_length, '...');
                }
                echo '<div class="lcp-excerpt">' . wp_kses_post($excerpt) . '</div>';
            }
            echo '</div>'; // .lcp-content
            echo '</li>';
        endwhile;
        echo '</ul>';

        $out = ob_get_clean();
        if ($cache_minutes) set_transient($cache_key, $out, $cache_minutes * 60);
        wp_reset_postdata();

        return $out;
    }
}

new LCP_Shortcode_Plugin();
