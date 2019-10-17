<?php

get_header(); ?>

    <!-- site-content -->
    <div class="site-content clearfix">

        <!-- main-collumn -->
        <div class="main-collumn">

            <?php if (have_posts()):

            while (have_posts()) : the_post();

            get_template_part('content', get_post_format());

            endwhile;
            
            //echo "hello";
            // Individual Pagination
            //previous_posts_link();
            //next_posts_link();
            
            // Wordpress Pagination
            echo paginate_links();

            else:
                echo '<p>No Contents Been Found</p>';

            endif; ?>

        </div> <!-- /main-collumn -->
        
        <!-- Calling Sidebar -->
        <?php get_sidebar(); ?>

    </div>

<?php get_footer();

?>