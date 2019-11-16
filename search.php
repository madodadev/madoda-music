<?php get_header();?>
<section class="main">
    <div class="container posts-cont">
        <div class="search-container"></div>
            <?php
                while(have_posts()){
                    if(get_post_type() == 'blog') {
                        echo "<div class='wrapper-loop-blog'>";
                    }else {
                        echo "<div class='wrapper-loop'>";
                    }
                    the_post();
                    if(get_post_type() == "post") {
                        get_template_part('template-parts/music');
                    }else {
                        get_template_part('template-parts/'.get_post_type());
                    }
                    
                    echo "</div>";
                }
            ?>
        </div>
        <?php echo paginate_links(array(
            'prev_next' => false
        )); ?>
    </div>
</section>
<?php get_footer();?>