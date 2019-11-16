<?php get_header();
    $topmusics = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 10,
        'meta_key' => 'downloads_this_week',
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
    ));

    $singer = new WP_Query(array(
        'post_type' => 'artist',
         'posts_per_page' => 10,
         'meta_key' => 'downloads_artist',
         'orderby' => 'meta_value_num',
         'order' => 'DESC'
    ));
?>
<section class="main page-single">
    <div class="container page-cont">
        <div class="page-single-cont">
            <div class="page-header">
                <p class="page-info-title"><?php the_title()?></p>
            </div>

            <div class="page-content">
                <?php the_content() ?>
            </div>
        </div>

        <?php mdd_get_ads();?>

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
                ?>
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
                    ?>
                </div>
            </div>
            
    </div>
</div>
</section>

<?php get_footer();?>
