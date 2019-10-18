<?php 

function learningWordpress_resources() {
    
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('main_js', get_template_directory_uri() . '/js/main.js', NULL, 1.0, true);
    
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

// Customize Theme Appearance Options
function learningWordpress_customize_register($wp_customize) {
    
    /* Color Setting */
    $wp_customize->add_setting('lwp_link_color', array(
        'default' => '#006ec3',
        'transport' => 'refresh',
    ));
    
    /* Button Setting */
    $wp_customize->add_setting('lwp_btn_color', array(
        'default' => '#006ec3',
        'transport' => 'refresh',
    ));
    
    /* Color Section */
    $wp_customize->add_section('lwp_standard_colors', array(
        'title' => __('Standard Colors', 'LearningWordpress'),
        'priority' => 30,
    ));
    
    /* Color Control */
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_link_color_control', array(
        'label' => __('Link Color', 'learningWordpress'),
        'section' => 'lwp_standard_colors',
        'settings' => 'lwp_link_color',
    ) ) );
    
    
    /* Button Control */
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_btn_color_control', array(
        'label' => __('Button Color', 'learningWordpress'),
        'section' => 'lwp_standard_colors',
        'settings' => 'lwp_btn_color',
    ) ) );
    
}

add_action('customize_register', 'learningWordpress_customize_register');

// Output Customize Appearance CSS 
function learnigWordpress_customize_css() { ?>
    
    <style type="text/css">
        
        a:link,
        a:visited {
            color: <?php echo get_theme_mod('lwp_link_color'); ?>;
        }
        
        
        /* Customizing Titles & Buttons CSS */
        .site-header nav ul li.current-menu-item a:link,
        .site-header nav ul li.current-menu-item a:visited,
        .site-header nav ul li.current-page-ancestor a:link,
        .site-header nav ul li.current-page-ancestor a:visited {
            background-color: <?php echo get_theme_mod('lwp_link_color'); ?>;
        }
        
        div.hd-search #searchsubmit {
            background-color: <?php echo get_theme_mod('lwp_btn_color'); ?>;
        }

    </style>
    
<?php }

add_action('wp_head', 'learnigWordpress_customize_css');

// Add Footer Callout Section To Admin Appearnce Cutomizee Screen
function lwp_footer_callout($wp_customize) {
    
    // Footer Headline Callout Section
    $wp_customize->add_section('lwp-footer-callout-section', array(
        'title' => 'Footer Callout'
    ));
    
    // Footer Display Callout Setting
    $wp_customize->add_setting('lwp-footer-callout-display', array(
        'default' => 'No'
    ));
    
    // Footer Display Callout Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-footer-callout-display-control', array(
        'label' => 'Display This Section ??',
        'section' => 'lwp-footer-callout-section',
        'settings' => 'lwp-footer-callout-display',
        'type' => 'select',
        'choices' => array('No' => 'No', 'Yes' => 'Yes')
    )));
    
    // Footer Headline Callout Setting
    $wp_customize->add_setting('lwp-footer-callout-headline', array(
        'default' => 'Example Headline Text Here'
    ));
    
    // Footer Headline Callout Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-footer-callout-headline-control', array(
        'label' => 'Headline',
        'section' => 'lwp-footer-callout-section',
        'settings' => 'lwp-footer-callout-headline'
    )));
    
    // Footer Paragraph Callout Setting
    $wp_customize->add_setting('lwp-footer-callout-text', array(
        'default' => 'Example Paragraph Text Here'
    ));
    
    // Footer Paragraph Callout Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-footer-callout-text-control', array(
        'label' => 'Text',
        'section' => 'lwp-footer-callout-section',
        'settings' => 'lwp-footer-callout-text',
        'type' => 'textarea'
    )));
    
    // Footer Link Callout Setting
    $wp_customize->add_setting('lwp-footer-callout-link');
    
    // Footer Link Callout Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'lwp-footer-callout-link-control', array(
        'label' => 'Link',
        'section' => 'lwp-footer-callout-section',
        'settings' => 'lwp-footer-callout-link',
        'type' => 'dropdown-pages'
    )));
    
    // Footer Image Callout Setting
    $wp_customize->add_setting('lwp-footer-callout-image');
    
    // Footer Image Callout Control
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'lwp-footer-callout-image-control', array(
        'label' => 'Image',
        'section' => 'lwp-footer-callout-section',
        'settings' => 'lwp-footer-callout-image',
        'width' => 750,
        'height' => 500
    )));
}

add_action('customize_register', 'lwp_footer_callout');