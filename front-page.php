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
        
        
        <!-- home-columns -->
        <div class="home-columns clearfix">
            
            <!-- one-half -->
            <div class="one-half">
                            
                <?php //<h3>Custom HTML Goes Here</h3>
                
                // First Loop Content For Categories
                $opinionPosts = new WP_Query('cat=1&posts_per_page=2');
                // $opinionPosts = new WP_Query('cat=1&posts_per_page=2&orderby=title&order=ASC');
                
                if ( $opinionPosts->have_posts() ) :
                    
                    while ( $opinionPosts->have_posts() ) : $opinionPosts->the_post(); ?>
                            
                        <!-- Content output -->
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                
                    <?php endwhile;
                else :
                // Fallback Content
                
                endif;
                
                // preventing Wp_Query to disrupt Wordpress natural uyrl based loops.
                wp_reset_postdata(); ?>
            
            </div> <!-- /one-half -->
            
            <!-- second-half -->
            <div class="one-half last">
                
                <?php // Seeccond Loop Content For Categories
                $opinionPosts = new WP_Query('cat=6&posts_per_page=2');
                // $opinionPosts = new WP_Query('cat=1&posts_per_page=2&orderby=title&order=ASC');
                
                if ( $opinionPosts->have_posts() ) :
                    while ( $opinionPosts->have_posts() ) : $opinionPosts->the_post(); ?>
                         
                        <!-- Content output -->
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                
                    <?php endwhile;
                else :
                // Fallback Content
                
                endif;
                
                // preventing Wp_Query to disrupt Wordpress natural uyrl based loops.
                wp_reset_postdata();
                
                ?>
            
            </div> <!-- /one-half -->
        
        </div> <!-- /home-columns -->
        
        <h3>Custom HTML Goes Here</h3>

    </div>

<?php get_footer();

?>