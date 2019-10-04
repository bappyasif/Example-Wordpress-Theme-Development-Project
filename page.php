<?php

get_header();

if (have_posts()) :

	while (have_posts()) : the_post(); ?>

        <article class="post page">
            
            <?php
            
            if ( has_children() OR $post->post_parent > 0 ) { ?>
            
            <nav class="site-nav children-links clearfix">
                
                <span class="parent-link"><a href="<?php echo get_the_permalink(get_top_ancestor_id()); ?>"><?php echo get_the_title(get_top_ancestor_id());?></a></span>
                
                <ul>
                    <!array Implementation Of Child Pages.>
                    <?php
                    
                    $args = array(
                        //'child_of' => $post->ID, //This would work for parent class.-->
                        //Creating a Funtion For Ancestry. -->
                        'child_of' => get_top_ancestor_id(), 
                        'title_li' => ''
                        );
                    ?>
                    
                    <?php wp_list_pages($args); ?>  <! array To show Only Child Pages >
                </ul>
            
            </nav>            
                    
            <?php } ?>
            
                        
            <h2> <b> Tiltle Should Go Here </b> </h2>
            <h2> <?php the_title(); ?> </h2>
            <?php the_content(); ?>

        </article>

	<?php endwhile;
	
	else:

		echo '<p> <b> No Content Been Found!!! </b> </p>';

	endif;

get_footer();

?>