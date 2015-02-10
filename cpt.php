<?php
 
/**
 * Custom Post Type
 *
 * @package   Spiffy Plugin
 * @author    Tiffany Israel <tiffany@smorecreative.com>
 * @license   GPL-2.0+
 * @link      http://wwww.smorecreative.com
 * @copyright 2014 S'more Creative
 */
 
 
// Register Custom Post Type
add_action('init', 'spiffy_cpt_microchurches');
 
function spiffy_cpt_microchurches() {
 
    $labels = array(
        'name' => _x('Microchurch', 'post type general name'),
        'singular_name' => _x('Microchurch', 'post type singular name'),
        'add_new' => _x('Add New', 'Microchurch'),
        'add_new_item' => __('Add New Microchurch'),
        'edit_item' => __('Edit Microchurch'),
        'new_item' => __('New Microchurch'),
        'view_item' => __('View Microchurch'),
        'search_items' => __('Search Microchurches'),
        'not_found' =>  __('No Microchurches found'),
        'not_found_in_trash' => __('No Microchurches in Trash'),
        'parent_item_colon' => ''
        );
 
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'map_meta_cap' => true,
        // 'menu_icon' => ''.get_template_directory_uri().'/assets/wp/microchurch-gray.png',
        'rewrite' => array('slug'=>'microchurches','with_front'=>false), //this is used for rewriting the permalinks, with front=false prevents additional permalink names
        'capability_type' => 'post',
        'hierarchical' => false,
        'has_archive' => true, // this was taking over the actuall microchurch page and I didn't want to have duplicates, so no archive
        'menu_position' => null,
        'supports' => array( 'title', 'editor','revisions'), //'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        ); 
 
    register_post_type( 'microchurch' , $args );
}
 
 
// Add icons for Custom Post Type
// http://shibashake.com/wordpress-theme/modify-custom-post-type-icons
add_action('admin_head', 'spiffy_cpt_microchurches_icons');
function spiffy_cpt_microchurches_icons() {
    global $post_type;
    ?>
    <style>
    <?php 
    $cpt = 'microchurch'; // Put Custom Post Type Name here, and it will be filled in everywhere else
    ?>
 
 
    #adminmenu #menu-posts-<?php echo $cpt ?> div.wp-menu-image:before{content:'\f102';') no-repeat center center;}
    #adminmenu #menu-posts-<?php echo $cpt ?>:hover div.wp-menu-image,#adminmenu #menu-posts-<?php echo $cpt ?>.wp-has-current-submenu div.wp-menu-image:before{content:'\f102';') no-repeat center center;} 
    </style>
    <?php
}
 
 
?>