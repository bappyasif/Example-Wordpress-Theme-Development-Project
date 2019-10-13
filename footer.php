    <footer class="site-footer">
        
        <div class="footer-callout clearfix">
            <div class="footer-callout-image">
            </div>
            
            <div class="footer-callout-text">
                <!--<h2>Customize Heading</h2> -->
                <h2><?php echo get_theme_mod('lwp-footer-callout-headline'); ?></h2>
                <p>Dummmy Text Dummmy Text</p>
            </div>
        </div>        
        
        <!-- footer-widgets div tag with a clearfix-->
        <div class="footer-widgets clearfix">
            
            <!-- Footer 1 -->
            <?php if (is_active_sidebar('footer1')): ?>
            
                <div class="footer-widget-area">

                    <?php dynamic_sidebar('footer1'); ?>

                </div>
            
            <?php endif; ?>
            
            <!-- Footer 2 -->
            <?php if (is_active_sidebar('footer2')): ?>
            
                <div class="footer-widget-area">

                    <?php dynamic_sidebar('footer2'); ?>

                </div>
            
            <?php endif; ?>
            
            <!-- Footer 3 -->
            <?php if (is_active_sidebar('footer3')): ?>
            
                <div class="footer-widget-area">

                    <?php dynamic_sidebar('footer3'); ?>

                </div>
            
            <?php endif; ?>
            
            <!-- Footer 4 -->
            <?php if (is_active_sidebar('footer4')): ?>
            
                <div class="footer-widget-area">

                    <?php dynamic_sidebar('footer4'); ?>

                </div>
            
            <?php endif; ?>
            
        </div>
        
        <!-- Site Navigation For Footer -->
        <nav class="site-nav">
                
            <?php
                
            $args = array(
                'theme_location' => 'footer'
                );
            ?>
            
            <?php wp_nav_menu( $args ); ?>
            
            </nav>


        <p> <b><?php bloginfo('name'); ?> -&copy; <?php echo date('Y'); ?> </b> </p>

    </footer>

<!-- Container Div -->
</div>

<?php wp_footer(); ?>

</body>
</html>