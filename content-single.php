	<article class="post">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<p class="post-info"><?php the_time('F j, Y g:i a'); ?> | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted in

			<?php

			$categories = get_the_category();
			$separator = ", ";
			$output = '';

			if ($categories) {

				foreach ($categories as $category) {

					$output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>'  . $separator;

				}

				echo trim($output, $separator);

			}

			?>

			</p>

		<?php the_post_thumbnail('banner-image'); ?>

		<?php the_content(); ?>
        
        <div class="about-author clearfix">
            
            <div class="about-author-image">
                <?php echo get_avatar(get_the-author_meta('ID'), 512)?>
                <p><?php echo get_the_author_meta('nickname')?></p>
            </div>
            
            <?php $otherAuthorPosts = new WP_Query(array(
                
                'author' => get_the_author_meta('ID'),
                'posts-perpage' => 3,
                'posts__not_in' => array(get_the_ID())
            
            )); ?>
            
            <div class="about-author-text">
                
                <h3>About Author</h3>
                <?php echo wpautop(get_the_author_meta('description')) ?>
                
                <?php if ($otherAuthorPosts->have_posts()) {?>
                <div class="other-posts-by">
                    <h4>Other Posts By <?php echo get_the_author_meta('nickname')?></h4>
                    <ul>
                        <?php while ( $otherAuthorPosts->have_posts() ) {
                            $otherAuthorPosts -> the_pots(); ?>
                            <li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
                        <?php }?>
                    </ul>
                </div>
                
                <?php } wp_reset_postdata() ?>
                
                <?php if (count_user_posts(get_the_author_meta('ID')) > 3 ) {?>
                <a class="btn-a" href="<?php echo get_author_posts_url(get_the_author_meta('ID'))?>">View All Posts By <?php echo get_the_author_meta('nickname')?></a>
                
                <?php } ?>
                    
            </div>
        </div>
        
	</article> 