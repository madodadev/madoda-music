<?php get_header();?>
<?php
$download_post_id = sanitize_text_field(get_query_var('of'));

$download_music = new WP_Query(array(
    "post__in" => array($download_post_id)
))

?>
<?php 
    $topmusics = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 10,
        'meta_key' => 'downloads_this_week',
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
    ));
?>

<?php 
    $newmusics = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 10
    ));
?>

<?php 
    $singer = new WP_Query(array(
        'post_type' => 'artist',
         'posts_per_page' => 10,
         'meta_key' => 'downloads_artist',
         'orderby' => 'meta_value_num',
         'order' => 'DESC'
    ));
?>

<section class="main" id="download-single" style="color:var(--main-fk-color)">
<div class="container">
<?php
    while($download_music->have_posts()):
        $download_music->the_post();?>
            <div class="top-info" >
            <h2 class="title"><?php echo mdd_get_artist()." ". mdd_get_title()?></h2>
            <?php dynamic_sidebar( 'single-top-sidebar' ); ?>
            <audio controls src="<?php echo mdd_get_play_audio_url()?>"></audio>
            <?php if(mdd_get_download_num() > 50): ?>
                <p class="download-count"><span id="download-num"><?php echo mdd_get_download_num()." "?></span> Downloads <img class="download-icon" src="<?php echo get_theme_file_uri('/assets/icons/download.svg')?>" alt="download icon"></p>
            <?php endif;?>
            <p style='font-size:20px'>Se o downlaod não iniciar automaticamente dentro de alguns segundos clica em</p>
            <a id="download-btn" class="download-btn" data_music="<?php the_ID();?>" data_artist="<?php mdd_the_artist_id()?>"  href="<?php echo mdd_get_download_audio_url()?>" traget="_blank">
                <p class="download-btn-text">
                    <strong style="color:var(--destak-color)">Downlaod MP3 </strong> 
                </p>
            </a>
            </dev>
            <?php
    endwhile;
    wp_reset_postdata();
    ?>
    <?php dynamic_sidebar( 'single-top-sidebar' ); ?>
        
    <div class="treding posts-cont">
        <span class="cate_name"><a href="<?php echo site_url("/musics")?>">Musicas Em Alta</a></span>
        <div class="wrapper-card-list">    
            <?php 
                while($topmusics->have_posts()){
                    $topmusics->the_post();
                    get_template_part('template-parts/music', 'list');
                }
                wp_reset_postdata();
            ?>
        </div>
        <div class="see-more-list"><a href="<?php echo site_url("/musics")?>">ver Todas</a></div>
    </div>

    <?php dynamic_sidebar( 'music-info-ads-sidebar' ); ?>

</dev>
</section>
    <script>
    let download_btn = document.querySelector("#download-btn")
    let music_id =  download_btn.attributes.data_music.value;
    let mdd_download = sessionStorage.getItem(music_id);
    setTimeout(() => {
        if( mdd_download != "downloaded") {
            download_btn.click();
        }
    }, 5000);
        
        
    </script>

<?php get_footer();?>