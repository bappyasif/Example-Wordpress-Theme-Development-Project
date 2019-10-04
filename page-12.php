<?php

get_header();

if (have_posts()) :

	while (have_posts()) : the_post(); ?>

        <article class="post page">
            <! -- Collumn Container-->
            <div class="collumn-continer clearfix">
                
                <!-- Title Collumn -->
                <div class="title-collumn">
                    
                    <h2> <?php the_title(); ?> </h2>
                    
                </div> <!-- Title Collumn Tag Closing -->
                
                <!-- Text Collumn -->
                <div class="text-collumn">
                    
                    <?php the_content(); ?>
                
                </div> <!-- Text Collumn Tag Closing -->
            
            </div> <! -- Collumn Container Tag Closing -->
            
                
                

        </article>

	<?php endwhile;
	
	else:

		echo '<p> <b> No Content Been Found!!! </b> </p>';

	endif;

get_footer();

?>