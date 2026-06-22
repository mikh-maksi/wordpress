<?php

function simple_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');

    register_nav_menus([
        'primary' => __('Головне меню', 'simple-theme')
    ]);
}
add_action('after_setup_theme', 'simple_theme_setup');

function simple_theme_scripts() {
    wp_enqueue_style(
        'simple-theme-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'simple_theme_scripts');