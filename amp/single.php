<?php get_header("amp" ); ?>

<?php if(mdd_is_post_have_musicInfo()): ?>
        <div class="info info-pt">
            <ul>
                <li>Author: <?php mdd_the_artists();?></li>
                <li>Titulo: <?php mdd_the_title();?></li>
                <li class="categoria">Categoria: <?php the_category()?></li>
                
                <?php if(mdd_get_music_list_num()):?>
                    <li>numero de musicas: <?php mdd_the_music_list_num();?></li>
                <?php endif;?>

                <?php if(mdd_get_year()):?>
                    <li>Ano: <?php echo mdd_get_year()?></li>
                <?php endif;?>
                <?php mdd_the_music_metadeta();?>
            </ul>
            
            <?php mdd_get_musicInfo_ads()?>
        </div>
<?php endif?>
<h2><a href="<?php echo site_url("/mddm-download")."?of=".get_the_ID()?>">Download MP3</a></h2>
<?php dynamic_sidebar( 'amp-body-sidebar' ); ?>
<?php
        mdd_the_youtube_video();
    ?>
    <?php 
        if(mdd_get_lyrics()){?>
            <div id="lyrics">
                <h2 class="title_lyrics content-title">LETRA</h2>
                <?php echo mdd_get_lyrics();?>

                <?php mdd_get_musicInfo_ads();?>
            </div>
        <?php
        }
    ?>


<?php dynamic_sidebar( 'amp-footer-sidebar' ); ?>
<?php wp_footer(); ?>

<?php
