    <footer class = "site-footer">
        
        <! Site Navigation For Footer >
            <nav class = "site-nav">
                
                <?php
                
                $args = array(
                    'theme_location' => 'footer'
                );
                
                ?>
                
                <?php wp_nav_menu( $args ); ?>            
            </nav>

        <p> <b><?php bloginfo('name'); ?> -&copy; <?php echo date('Y'); ?> </b> </p>

    </footer>

<! Container Div >
</div>

<?php wp_footer(); ?>

</body>
</html>