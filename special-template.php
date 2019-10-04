<?php

/*
Template Name: Special-Template
*/

/*
Special Template For Footer Menus Containing Same Page Layout
*/

get_header();

if (have_posts()) :

	while (have_posts()) : the_post(); ?>

        <article class="post page">
            
            <h2> <b> Tiltle Should Go Here </b> </h2>
            
            <h2> <?php the_title(); ?> </h2>
            
            <! -- info box -->
            <div class="info-box">
                <h4>Disclaimer Title</h4>
                <p>Some Text Some Text Some Text Some Text
                Some Text Some Text Some Text Some Text Some Text Some Text
                Some Text Some Text Some Text Some Text Some Text Some Text
                Some Text Some Text Some Text Some Text</p>
            </div> <! -- info box closing tag -->
            
            <?php the_content(); ?>

        </article>

	<?php endwhile;
	
	else:

		echo '<p> <b> No Content Been Found!!! </b> </p>';

	endif;

get_footer();

?>