<?php

// adding the CSS and JS files

function bofesto_setup(){
    wp_enqueue_style('google-font', '//fonts.googleapis.com/css2?family=Edu+SA+Beginner:wght@400;500;600;700&display=swap');
    wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), 'all');
    wp_enqueue_script("main", get_theme_file_uri('/js/main.js'), NULL, microtime(), true);
}

add_action('wp_enqueue_scripts', 'bofesto_setup');



// Adding theme Support

function bofesto_init() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5',
        array('comment-list', 'comment-form', 'search-form')
    );
}

add_action('after_setup_theme', 'bofesto_init');

function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
        'extra-menu' => __( 'Extra Menu' )
       )
     );
   }
add_action( 'init', 'register_my_menus' );

//projects post type