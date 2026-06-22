<?php

function my_simple_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'my_simple_theme_setup');

function my_simple_theme_scripts() {
    wp_enqueue_style(
        'my-simple-theme-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'my_simple_theme_scripts');