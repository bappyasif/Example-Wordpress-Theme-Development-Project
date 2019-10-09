<?php 

function learningWordpress_resources() {
    
    wp_enqueue_style('style', get_stylesheet_uri());
    
}

add_action ('wp_enqueue_scripts', 'learningWordpress_resources');


// Get Top Most Incestor
function get_top_ancestor_id() {
    
    global $post;
    
    if ($post->post_parent) {
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }
    
    return $post->ID;
    
}

// Does Page Have Children ?

function has_children() {
    
    global $post;
    
    $pages = get_pages('child_of=' . $post->ID);
    
    return count($pages);
    
}

// customize excertp word count length
function custom_excerpt_length_count() {
    
    return 50;
}

add_filter('excerpt_length', 'custom_excerpt_length_count');

// Theme Setup
//add_theme_support('post_thumbnails'); // This will work but will limit its credebilty potentials.
function learningWordpress_setup() {
    
    // Navigation Menus
    register_nav_menus(array(
        'primary' => __ ( 'Primary Menu' ),
        'footer'  => __ ( 'Footer Menu' ),
    ));
    
    // Add featured Image support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 180, 120, true);
    add_image_size('banner-image', 920, 210, array('left', 'center'));
    
    // Add post format support
    add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}

add_action('after_setup_theme', 'learningWordpress_setup');

// Add Our Widget Locations
function ourWidgetsInit() {
    
    // Widget Sidebar
    register_sidebar( array(
        
        'name' => 'Sidebar',
        'id' => 'sidebar1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div',
        'before_title' => '<h4 class="my-special-class">',
        'after_title' => '</h4>'
        
    ));
    
    // Widget Fooetr Area 1
    register_sidebar( array(
        
        'name' => 'Footer Area 1',
        'id' => 'footer1'
        
    ));
    
    // Widget Fooetr Area 2
    register_sidebar( array(
        
        'name' => 'Footer Area 2',
        'id' => 'footer2'
        
    ));
    
    // Widget Fooetr Area 3
    register_sidebar( array(
        
        'name' => 'Footer Area 3',
        'id' => 'footer3'
        
    ));
    
    // Widget Fooetr Area 4
    register_sidebar( array(
        
        'name' => 'Footer Area 4',
        'id' => 'footer4'
        
    ));
    
}

add_action('widgets_init', 'ourWidgetsInit');