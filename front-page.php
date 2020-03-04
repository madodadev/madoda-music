<?php get_header();?>

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
        'posts_per_page' => 12
    ));
?>

<?php 
    $playlists = new WP_Query(array(
        'post_type' => 'playlist',
         'posts_per_page' => 10,
         'meta_key' => 'downloads_this_week',
         'orderby' => 'meta_value_num',
         'order' => 'DESC'
    ));
?>

<?php 
    $albums = new WP_Query(array(
        'post_type' => 'album',
         'posts_per_page' => 10,
         'meta_key' => 'downloads_this_week',
         'orderby' => 'meta_value_num',
         'order' => 'DESC'
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

<section class="main">
    <div class="container">
        
        <div class="page-info">
            <p class="page-info-title"><?php bloginfo('name')?></p>
        </div>
        
        <div class="wrapper">
            <div class="topmusic posts-cont">
                <div class="header">
                <?php madoda_scroll_card_header(array(
                    'name'  =>  'Musicas em Alta',
                    'targetScroll'  => 'topmusica-wrap',
                    'see_more'  =>  array(
                        'link'  =>  site_url("/trending")
                    )
                ))?>
                </div>
                
                <div id="topmusica-wrap" class="wrapper-card">
                    <?php
                        while($topmusics->have_posts()){
                            $topmusics->the_post();
                            get_template_part('template-parts/music');
                        }
                        wp_reset_postdata();
                    ?>
                </div>
            
            </div>
            
            <div class="Novas posts-cont">
                <span class="cate_name"><a href="<?php echo site_url("/musics")?>">Novas Musicas</a></span>
                <div class="wrapper-card-list">    
                    <?php 
                        while($newmusics->have_posts()){
                            $newmusics->the_post();
                            get_template_part('template-parts/music', 'list');
                        }
                        wp_reset_postdata();
                    ?>
                </div>
                <div class="see-more-list"><a href="<?php echo site_url("/musics")?>">ver Todas</a></div>
            </div>

            <?php mdd_get_ads();?>
            
            <div class="Playlists posts-cont">
                <div class="header">
                    <?php madoda_scroll_card_header(array(
                        'name'  =>  'Playlists',
                        'targetScroll'  => 'playlist-wrap',
                        'see_more'  =>  array(
                            'link'  =>  mdd_get_archiveUrl("playlist")
                        )
                    ))?>
                </div>
                <div id="playlist-wrap" class="wrapper-card">

                    <?php 
                        while($playlists->have_posts()){
                            $playlists->the_post();
                            get_template_part('template-parts/playlist');
                        }
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
            
            <div class="topalbums posts-cont">
                <div class="header">
                    <?php madoda_scroll_card_header(array(
                        'name'  =>  'Albums',
                        'targetScroll'  => 'albums-wrap',
                        'see_more'  =>  array(
                            'link'  =>  mdd_get_archiveUrl("album")
                        )
                    ))?>
                </div>
                <div id="albums-wrap" class="wrapper-card">
                    <?php 
                        while($albums->have_posts()){
                            $albums->the_post();
                            get_template_part('template-parts/album');
                        }
                        wp_reset_postdata();
                    ?>
                </div>
            </div>

            <div class="topauthor posts-cont">
                <div class="header">
                    <?php 
                    madoda_scroll_card_header(array(
                        'name'  =>  'Artistas',
                        'targetScroll'  => 'cantores-wrap',
                        'see_more'  =>  array(
                            'link'  =>  mdd_get_archiveUrl("artist")
                            
                        )
                    ))?>
                </div>

                <div id="cantores-wrap" class="wrapper-card">       
                    <?php 
                        while($singer->have_posts()){
                            $singer->the_post();
                            get_template_part('template-parts/artist');
                        }
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>     
</section>
<?php mdd_set_drive_id();?>
<?php get_footer(); ?>