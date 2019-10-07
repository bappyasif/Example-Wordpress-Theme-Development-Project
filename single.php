<?php

get_header();

if (have_posts()):
    
    while (have_posts()) : the_post(); ?>
    
    <article class="post">
        
        <h1>Hello World, It's Me Again!!</h1>
        <h2> Title Sholuld Go Here </h2>

        <h2> <a href ="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h2>
        
        <p class="post-info"><?php the_time('F jS, Y g:i a'); ?> | by <a href=
            "<?php get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted In
            
            <?php
        
        $categories = get_the_category(); 
        $separator = " , ";
        $output = '';
        
        if($categories) {
            
            foreach ($categories as $category) {
                
                $output .= '<a href="'. get_category_link($category->term_id) .'">'. $category->cat_name .'</a>' .$separator;
                
            }
        }
        
        echo trim( $output, $separator );
        
        ?>

    </p>
        
    <?php the_post_thumbnail('banner-image'); ?>
        
        get_template_part('content, get_post_format());

    ///*<!--<?php the_content(); ?> -->*/
        


    </article>
    
    <?php endwhile;
    
    else:
    
        echo '<p> No Contents Been Found </p>';
        
    endif;

get_footer();

?>