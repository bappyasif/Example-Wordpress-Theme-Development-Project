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
    while (have_posts()) : the_post();
    
    get_template_part('content', get_post_format());
    
    endwhile;
    
    else:
    
        echo '<p> No Contents Been Found </p>';
        
    endif;

get_footer();

?>