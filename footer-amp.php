<footer>
<p class="footer-branding"><a class="branding" href="<?php echo site_url()?>"><?php bloginfo('title'); ?></a></p>
<div class="footer-menu">
    <nav>
        <?php
            wp_nav_menu( array( 
                'theme_location' => 'footer-menu',
                'container_class' => 'footer-menu'
            ) ); 
        ?>
    </nav>
</div>
<?php dynamic_sidebar( 'amp-footer-sidebar' ); ?>
<div class="myifo">
<p>
    POWERED BY MDDM
</p>
<div>
</footer>

<?php wp_footer(); ?>
</body>
</html>