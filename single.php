<?php get_header();?>
<?php

while(have_posts()){
    the_post();?>
    <section class="main" id="single">
        <div class="container">
            <div class="top-info" >
                <div class="bg-img"><img class="lazy" name="<?php echo mdd_get_artist()." - ".mdd_get_title()?>" src="<?php mdd_the_placeholderSvg()?>" data-src="<?php mdd_the_single_back_imgUrl();?>" data-srcset="<?php mdd_the_single_back_imgUrl();?> 2x, <?php mdd_the_single_back_imgUrl();?> 1x" alt="<?php echo mdd_get_artist()." - ".mdd_get_title()?>"></div>
                <div class="top-single-wrapper">
                <img name="<?php the_title()?>" id="post-thumbnail" src="<?php mdd_the_single_front_imgUrl()?>" alt="<?php the_title()?>">
                
                <div class="single-info">
                        <div class="author"><?php echo mdd_get_artist()?></div>
                        <div class="title"><?php mdd_the_title()?></div>
                    <?php if(mdd_get_download_num() > 50): ?>
                        <span class="download-count"><span id="download-num"><?php echo mdd_get_download_num()." "?></span> Downloads <img class="download-icon" src="<?php echo get_theme_file_uri('/assets/icons/download.svg')?>" alt="download icon"></span>
                    <?php endif;?>
                    <?php
                        if( !mddm_is_amp() ){
                            if(is_music_playable()){
                                mdd_the_music_size();
                                echo "<p><strong class='listen-txt'> ouvir musica </strong></p>";
                                mdd_player(array(
                                    "previous_post_url"  => mdd_get_previous_post_url(),
                                    "next_post_url"  => mdd_get_next_post_url()
                                ));
                            }
                        }else{?>
                            <amp-audio
                                width="auto"
                                height="50"
                                controls
                                src="https://docs.google.com/uc?export=download&id=1m7RPHNgE7XlGNEnGN9MrNl_wKgti_vtf"
                                artwork="<?php mdd_the_single_front_imgUrl() ?>"
                                title="<?php echo mdd_get_title() ?>"
                                artist="<?php echo mdd_get_artist()?>"
                                album="Madoda Music"
                                >
                                <div fallback>
                                    <p>Não foi possivel apresentar o leitor de audio.</p>
                                </div>
                            </amp-audio>
                        <?php
                        }
                    ?>

                    <?php if(mdd_get_download_audio_url()): ?>
                        <?php if(mdd_is_download_external_link()):?>
                            <a id="download-btn" class="download-btn" data_music="<?php the_ID();?>" data_artist="<?php mdd_the_artist_id()?>"  href="<?php echo mdd_get_download_audio_url()?>"  target="_blank">
                                <p class="download-btn-text">
                                    <strong>Baixar Musica MP3
                                        <img class="download-icon" src="<?php echo get_theme_file_uri('/assets/icons/download.svg')?>" alt="download icon">
                                    </strong>
                                </p>
                            </a>
                        <?php endif?>

                        <?php if(!mdd_is_download_external_link()):?>
                            <a id="download-btn" class="download-btn" data_music="<?php the_ID();?>" data_artist="<?php mdd_the_artist_id()?>"  href="<?php echo mdd_get_download_audio_url()?>" download="<?php echo mdd_get_download_name()?>">
                                <p class="download-btn-text">
                                    <strong>Baixar Musica MP3
                                        <img class="download-icon" src="<?php echo get_theme_file_uri('/assets/icons/download.svg')?>" alt="download icon">
                                    </strong>
                                </p>
                            </a>
                        <?php endif;?>
                    <?php endif;if(!mdd_get_download_audio_url() && mdd_is_post_have_musicInfo()):?>
                        <div class="download-btn no-download">
                            <p class="download-btn-text">
                                <strong>Baixar Musica MP3 [Da que a pouco]</strong>
                            </p>
                        </div>
                    <?php endif;?>
                    <?php dynamic_sidebar( 'single-top-sidebar' ); ?>

                </div>
            </div>
        </div>
        <?php mdd_top_musics();?>

<?php if(mdd_is_post_haveInfo()): ?>
<div class="content">
    <!-- <h1 class="wp-title"><?php //the_title();?></h1> -->
    <p>
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

            <?php if(mdd_get_download_audio_url()): ?>
                <?php if(mdd_is_download_external_link()):?>
                    <strong class="btn-baixar btn-baixar-pt">
                        <a class="download-btn" data-music="<?php the_ID();?>" href="<?php echo mdd_get_download_audio_url()?>" target="_blank">
                            <?php echo mdd_get_artist()." - ".mdd_get_title()." "?>Download mp3
                        </a> 
                    </strong>
                <?php endif?>

                <?php if(!mdd_is_download_external_link()):?>
                    <strong class="btn-baixar btn-baixar-pt">
                        <a class="download-btn" data-music="<?php the_ID();?>" href="<?php echo mdd_get_download_audio_url()?>" download="<?php echo mdd_get_download_name()?>">
                            <?php echo mdd_get_artist()." - ".mdd_get_title()." "?>Download mp3
                        </a> 
                    </strong>
                    
                <?php endif;?>
            <?php endif;?>
                   

        </div>
        <?php endif; ?>
    </p> 

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
</div>
<?php endif; ?>

<?php mdd_get_ads();?>

<?php 
    if(get_field('artist')):
        mdd_the_artist_content();
    endif;
?>

<?php if(get_the_content()):?>
    <div class="wp-content">
        <?php the_content(); ?>
    </div>
<?php endif; ?>

    <div class="tags">
        <?php the_tags();?>
    </div>
    <?php mdd_new_musics(6);?>

    <div class="wp-comments">
        <?php comments_template( ); ?>
    </div>
    </section>
<?php
//close while
}
?>

<?php get_footer();?>