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

            else:
                echo '<p>No Contents Been Found</p>';

            endif; ?>

        </div> <!-- /main-collumn -->

        <!-- Sidebar Collumn -->
        <div class="secondary-collumn">

            <p>This is a Sidebar.</p>
            <?php dynamic_sidebar('sidebar1'); ?>

        </div> <!-- /sidebar-collumn -->

    </div>

<?php get_footer();

?>