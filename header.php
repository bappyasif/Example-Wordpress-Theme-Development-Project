<!DOCTYPE html>

<html>
    
    <head <?php language_attributes(); ?>>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name = "viewport" content = "width = device-width">
        <title> <?php bloginfo ('name'); ?> </title>
        <?php wp_head(); ?> <! This would give wordpress theme to put in whatever plugin we want to modify after our modifications.>
    </head>
    
<body <?php body_class(); ?>>
    
    <div class = "container">
    
        <!-- site-header -->
        <header class = "site-header">
            
            <!-- Search Header -->
            <div class="hd-search">
                
                <?php get_search_form(); ?>
            
            </div> <!-- /hd-search -->
            
            <h1> <a href = "<?php echo home_url(); ?>"> <?php bloginfo('name'); ?></a></h1>
            <h5> <?php bloginfo('description'); ?>
            
            <! Conditional Logic For Page Templates >
            <?php if (is_page('portfolio-page')) { ?>  <! Using Slug >
                <! if (is_page('12'))  // Using ID >
                -- Thank you for viewing this Blog.
            
            <?php } ?> </h5>
            
            <! Site Navigation For Header >
            <nav class = "site-nav">
                
                <?php
                
                $args = array(
                    'theme_location' => 'primary'
                );
                
                ?>
                
                <?php wp_nav_menu( $args ); ?>            
            </nav>
        </header>