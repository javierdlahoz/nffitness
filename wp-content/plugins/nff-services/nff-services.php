<?php
/**
 * Plugin Name: Number Four Fitness Services Manager
 * Description: 
 * Version: 1.0
 * Author: Javier De la Hoz
 * License: GPL2
 */

add_action( 'init', 'nff_services_init' );

function nff_services_init(){
    $args = array(
        'labels' => array(
            'name' => __( 'Services' ),
            'singular_name' => __( 'Service' ),
            'add_new_item' => __('Add New Service'),
            'add_new' => __('Add A Service'),
            'edit_item' => __('Edit Service'),
            'view_item' => __('View Service')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
    );
    register_post_type( "service", $args );
}