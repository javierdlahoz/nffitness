<?php
/*
Plugin Name: Image Slideshow
Plugin URI: http://innuevodigital.com
Description: Manage image slideshow in the front page
Version: 1.0
Author: InNuevoDigital
Author URI: http://innuevodigital.com
License: GPLv2
*/

/*  Copyright 2013  InDigital  (email : studio@innuevodigital.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Call function when plugin is activated
register_activation_hook( __FILE__, 'sf_slideshow_install' );

function sf_slideshow_install() {
    global $wp_version;
    
    /*Check the wp version*/
    /*if ( version_compare( $wp_version, '3.5', '<' ) ) {
        wp_die( 'This plugin requires WordPress version 3.5 or higher.' );
    }
    */

    //setup default option values
    /*$hween_options_arr = array(
        'currency_sign' => '$'
    );

    //save our default option values
    update_option( 'halloween_options', $hween_options_arr );*/
	
}

register_deactivation_hook( __FILE__, 'sf_slideshow_disable()' );

function sf_slideshow_disable() {
    //do something
}


// Action hook to initialize the plugin
add_action( 'init', 'sf_slideshow_init' );

//Initialize the function
function sf_slideshow_init() {

    //load_plugin_textdomain( 'sf_slideshow', false, plugin_basename( dirname( __FILE__ ) .'/localization' ) );

	//register the slideshow post type
	$labels = array(
		'name' => __( 'Slides', 'sf-slideshow-plugin' ),
		'singular_name' => __( 'Slide', 'sf-slideshow-plugin' ),
		'add_new' => __( 'Add New', 'sf-slideshow-plugin' ),
		'add_new_item' => __( 'Add New Slide', 'sf-slideshow-plugin' ),
		'edit_item' => __( 'Edit Slide', 'sf-slideshow-plugin' ),
		'new_item' => __( 'New Slide', 'sf-slideshow-plugin' ),
		'all_items' => __( 'All Slides', 'sf-slideshow-plugin' ),
		'view_item' => __( 'View Slide', 'sf-slideshow-plugin' ),
		'search_items' => __( 'Search Slides', 'sf-slideshow-plugin' ),
		'not_found' =>  __( 'No slides found', 'sf-slideshow-plugin' ),
		'not_found_in_trash' => __( 'No slides found in Trash', 'sf-slideshow-plugin' ),
		'menu_name' => __( 'Slideshow', 'halloween-plugin' )
	  );
	
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'thumbnail' )
	  ); 
	  
	  register_post_type( 'sf-slideshow', $args );

}



//Action hook to register the Products meta box
add_action( 'add_meta_boxes', 'sf_slideshow_store_register_meta_box' );

function sf_slideshow_store_register_meta_box() {
	
    // create our custom meta box 
	add_meta_box( 'sf-slideshow-meta', __( 'Slide Information','sf-slideshow-plugin' ), 'sf_slideshow_meta_box', 
                  'sf-slideshow', 'normal', 'default' );
	
}

//build product meta box
function sf_slideshow_meta_box( $post ) {

    // retrieve our custom meta box values
    $subtitle = get_post_meta( $post->ID, '_slide_subtitle', true );
    $link     = get_post_meta( $post->ID, '_slide_link', true );
    

	//nonce field for security
	wp_nonce_field( 'meta-box-save', 'sf-slideshow-plugin' );
	
    // display meta box form
    echo '<table>';
    echo '<tr>';
    echo '<td>' .__('Subtitle', 'sf-slideshow-plugin').':</td><td><input type="text" name="slide_subtitle" value="'.esc_attr( $subtitle ).'" size="50"></td>';
    echo '</tr><tr>';
    echo '<td>' .__('Link', 'sf-slideshow-plugin').':</td><td><input type="text" name="slide_link" value="'.esc_attr( $link ).'" size="50"></td>';
    echo '</tr>';
    echo '</table>';
}

// Action hook to save the meta box data when the post is saved
add_action( 'save_post','sf_slideshow_store_save_meta_box' );

//save meta box data
function sf_slideshow_store_save_meta_box( $post_id ) {

	//verify the post type is for Halloween Products and metadata has been posted
	if ( get_post_type( $post_id ) == 'sf-slideshow' && isset( $_POST['slide_subtitle'] ) ) {
		
		//if autosave skip saving data
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return;

		//check nonce for security
		check_admin_referer( 'meta-box-save', 'sf-slideshow-plugin' );

		// save the meta box data as post metadata
		update_post_meta( $post_id, '_slide_subtitle', sanitize_text_field( $_POST['slide_subtitle'] ) );
		update_post_meta( $post_id, '_slide_link'    , sanitize_text_field( $_POST['slide_link'] ) );

	}
	
}



// Action hook to create the products shortcode
add_shortcode( 'slideshow', 'slideshow_shortcode' );

//create shortcode
function slideshow_shortcode( $atts, $content = null ) {
	$hs_show = "";
    $args = array(
		'posts_per_page' => '-1',
		'post_type' => 'sf-slideshow');

    $active = "active";
    $slides = new WP_Query( $args );
	// The Loop
	while ( $slides->have_posts() ) : $slides->the_post();
		$id = get_the_ID();
		$title = get_the_title();
		$subtitle = get_post_meta( $id , '_slide_subtitle', true); 
		$link = get_post_meta( $id , '_slide_link', true); 
		//$image = get_the_post_thumbnail();
		$image = wp_get_attachment_url( get_post_thumbnail_id($id));
	?>
            <div class="item <?php echo $active; ?> ">
                <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" class="item-to-show">
            </div>
	<?php
		$active = "";
	endwhile;
	// Reset Post Data
	wp_reset_postdata();

	//return the shortcode value to display
    return $hs_show;
}