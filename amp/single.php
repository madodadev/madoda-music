<?php get_header("amp" ); ?>
<?php the_content( );?>

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
    
</div>


<?php 
if(is_music_playable()):?>
<amp-audio
    width="auto"
    height="50"
    controls
    src="<?php echo mdd_get_play_audio_url()?>"
    artwork="<?php echo get_theme_file_uri('/assets/images/mddm512.png')?>"
    title="<?php echo mdd_get_title() ?>"
    artist="<?php echo mdd_get_artist()?>"
    album="Madoda Music"
    >
    <div fallback>
        <p>Não foi possivel apresentar o leitor de audio.</p>
    </div>
</amp-audio>
<?php endif;?>

<h2 id="download-btn"><a href="<?php echo site_url("/mddm-download")."?of=".get_the_ID()?>">Download MP3</a></h2>
<?php dynamic_sidebar( 'amp-body-sidebar' ); ?>

<?php
$yt_video_id = mdd_get_youtube_video_id();
if($yt_video_id):?>    
    <amp-youtube
    data-videoid="<?php echo $yt_video_id?>"
    layout="responsive"
    width="480"
    height="270"
    ></amp-youtube>
<?php endif; ?>
    
<?php 
    if(mdd_get_lyrics()){?>
        <div id="lyrics">
            <p>lyrics</p>
            <?php echo mdd_get_lyrics();?>
        </div>
    <?php
    }
?>



<div class="tags">
    <?php the_tags( )?>
</div>

<?php get_footer( "amp")?>