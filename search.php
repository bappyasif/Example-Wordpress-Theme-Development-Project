<?php

get_header();

if (have_posts()): ?>

    <h2>Search results for : <?php the_search_query(); ?></h2>

    <?php
    while (have_posts()) : the_post();

    get_template_part('content', get_post_format());
    
    endwhile;

    // Wordpress Pagination
    paginate_links();
    
    else:
        echo '<p>No Contents Been Found</p>';
        
    endif;

get_footer();

?>