<?php get_header();?>
<section class="main">
    <div class="container posts-cont">
        <div class="wrapper-loop">
            <?php
                while(have_posts()){
                    the_post();
                    if(get_post_type() == "post") {
                        get_template_part('template-parts/music');
                    }else {
                        get_template_part('template-parts/'.get_post_type());
                    }                
                }
            ?>
        </div>
        <?php echo paginate_links(array(
            'prev_next' => false
        )); ?>
    </div>
</section>
<?php get_footer();?>