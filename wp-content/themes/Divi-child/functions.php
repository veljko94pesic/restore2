<?php

add_action( 'wp_enqueue_scripts', 'Divi_parent_theme_enqueue_styles' );

function Divi_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'Divi-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'Divi-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'Divi-style' )
    );

}
