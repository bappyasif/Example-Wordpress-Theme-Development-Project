<?php

get_header();

if (have_posts()):

    ?>

    <h2><?php
        
        
     if ( is_category() ) {

        echo 'This Is Category Archive : ';
        single_cat_title();
    
    } elseif ( is_tag() ){
        
        echo 'This Is Tag Archive : ';
        single_tag_ttle();

    } elseif( is_author() ) {
        
        echo 'This Is Author Archive : ';
        the_post();
        echo 'Author Archives : ' .get_the_author();
        rewind_posts();
    
    } elseif ( is_day() ) {
        
        echo 'This Is Day Archive : ';
        echo 'Daily Archives : ' .get_the_date();         
    } elseif( is_month() ) {
        
        echo 'This Is Monthe Archive : ';
        echo 'Monthly Archives : ' .get_the_date('F Y');
         
    } elseif ( is_year() ) {
        
        echo 'This Is Year Archive : ';
        echo 'Yearly Archives : ' .get_the_date(' Y ');
         
    } else {

        echo 'Archives : ';
    }

    ?></h2>

    <?php
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

    <?php the_excerpt(); ?>


    </article>
    
    <?php endwhile;
    
    else:
    
        echo '<p> No Contents Been Found </p>';
        
    endif;

get_footer();

?>