<?php
/*
Plugin Name: Wp Pagination
Plugin URI: http://wordpress.org/extend/plugins/wp-pagination/
Version: 1.4
Description: Add jQuery pagination for gallery, comments etc.
Author: Kishore
Author URI: http://blog.kishorechandra.co.in/
Text Domain: jpages
Domain Path: /languages
*/


define( 'JPAGES_PLUGIN_DIR',        plugin_dir_path( __FILE__ ) );
define( 'JPAGES_LANGUAGE_DIR',  'wp-pagination/languages' );
define( 'JPAGES_INCLUDES_DIR',  JPAGES_PLUGIN_DIR . '/includes' );

define( 'JPAGES_PLUGIN_URL',        WP_PLUGIN_URL . '/wp-pagination/' );
define( 'JPAGES_SCRIPTS_URL',   JPAGES_PLUGIN_URL . 'js' );
define( 'JPAGES_STYLES_URL',        JPAGES_PLUGIN_URL . 'css' );



/*
*
*
* Loads the required javascript files (only when not in admin area)
*/
function load_jpages_scripts() {
    if ( is_admin() ) return;

    wp_enqueue_script(
        'jquery-jpages',
        JPAGES_SCRIPTS_URL . '/jPages.js',
        array( 'jquery' )
    );

    wp_enqueue_script(
        'jquery-script',
        JPAGES_SCRIPTS_URL . '/script.js',
        array( 'jquery' )
    );

    // Scr added for commnets
    $pages = get_option('comments_per_page');
    $default_page = get_option('default_comments_page');

    wp_localize_script(
            'jquery-script', 'jPages_comment', array(
            'get_comment_pages_count' => $pages,
            'get_default_comments_page' => $default_page
        )
    );
}

//* Enqueue jpages js file for site
add_action( 'wp_enqueue_scripts', 'load_jpages_scripts' );


/*
*
*
* Loads the required css (only when not in admin area)
*/
function load_jpages_styles() {
    if ( is_admin() ) return;

    wp_enqueue_style(
            'jquery-jpages',
            JPAGES_STYLES_URL . '/jPages.css' );
    wp_enqueue_style(
            'jquery-custom-jpages',
            JPAGES_STYLES_URL . '/custom-style.css' );

 /*   wp_enqueue_style(
            'jquery-css',
            JPAGES_STYLES_URL . '/style.css' );

    wp_enqueue_style(
            'jquery-animate',
            JPAGES_STYLES_URL . '/animate.css' ); */


}

//* Enqueue jpages js file for site
add_action( 'wp_enqueue_scripts', 'load_jpages_styles' );
