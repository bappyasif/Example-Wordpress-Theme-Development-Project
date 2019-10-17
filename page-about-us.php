<?php

get_header(); ?>

    <!-- site-content -->
    <div class="site-content clearfix">

        <!-- main-collumn 
        <div class="main-collumn">

            <?php if (have_posts()):

            while (have_posts()) : the_post();

            get_template_part('content', 'page');

            endwhile;

            else:
                echo '<p>No Contents Been Found</p>';

            endif; ?>

        <!--</div>  /main-collumn -->
        
        <!-- Calling Sidebar -->
        
        <h4> Blog Posts About Us </h4>
        <?php 
            // Paged used for most Pages where as Page is used for static Front Page
            $ourCurrentPage = get_query_var('paged');
        
            $aboutPosts = new WP_Query(array(
                'category_name' => 'about-us',
                'posts_per_page' => 3,
                'paged' => $ourCurrentPage
            ));
        
            if ($aboutPosts->have_posts()) :
        
                while($aboutPosts->have_posts()) :
                
                    $aboutPosts->the_post();
                
        
                    ?> <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li> 
        
                    <?php
                endwhile;
                
                //previous_posts_link();
                //next_posts_link('Next Page', $aboutPosts->max_num_pages);
                echo paginate_links(array(
                    'total' => $aboutPosts->max_num_pages
                ));
            
            endif;
        
        ?>

    </div>

<?php get_footer();

?>