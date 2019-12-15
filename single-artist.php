<?php get_header();?>
<?php

while(have_posts()){
    the_post();?>
    <section class="main" id="single">
        <div class="container">
            <div class="top-info" >
                <div class="bg-img"><img name="background-image" src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'desplay')?>" alt="<?php echo mdd_get_artist()." - ".mdd_get_title()?>"></div>
                <div class="top-single-wrapper">
                <img name="<?php the_title()?>" id="post-thumbnail" src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'singleDesplay')?>" alt="<?php the_title()?>">
                
                <div class="single-info">
                    <div class="content">
                        <p>
                            <div class="info info-pt">
                                <ul>
                                    <li>Artista: <strong><?php the_title();?></strong></li>
                                    <li class="categoria">Categoria: <strong><?php the_category()?></strong></li>  
                                    <li class="categoria">Downloads: <strong><?php echo get_field("downloads_artist");?></strong></li>
                                </ul>  
                                <?php mdd_the_author_socialMedia()?>
                            </div>
                        </p> 
                    </div> 
                    <?php dynamic_sidebar( 'single-top-sidebar' ); ?>
                </div>
            </div>
        </div>
        <?php 
           mdd_get_top_artist();
        ?>
        
        <?php if(get_field("biografia")){
        ?>
            <div class="content">
                <div class="author-content">
                    <div class="biografia">
                        <h2 class="content-title">Biografia de <?php the_title()?></h2>
                        <p><?php echo get_field("biografia")?></p>
                    </div>
                </div>
            </div>
        <?php
        }?>
        <?php mdd_get_artist_newSongs();?>
        <?php mdd_get_ads();?>
        <?php mdd_get_artist_playlist();?>
        <?php mdd_get_artist_albums();?>
        <?php mdd_get_artist_blog(); ?>
        
        <?php if(get_the_content()):?>
            <div class="wp-content">
                <?php the_content(); ?>
            </div>
        <?php endif; ?>

        <div class="wp-comments">
            <?php comments_template(); ?>
        </div>

    </section>
<?php
//close while
}
?>

<?php get_footer();?>