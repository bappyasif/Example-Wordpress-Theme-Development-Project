<?php

get_header(); ?>

    <!-- site-content -->
    <div class="site-content clearfix">
        
        <h3>Custom HTML Goes Here</h3>

        <?php if (have_posts()):
        
            while (have_posts()) : the_post();

            the_content();
            /*get_template_part('content', get_post_format());*/

            endwhile;

            else:
                echo '<p>No Contents Been Found</p>';

            endif; ?>
        
        <h3>Custom HTML Goes Here</h3>

    </div>

<?php get_footer();

?>