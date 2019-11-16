<?php get_header();?>
<?php
    $artistQuery = sanitize_text_field(get_query_var('of'));
    if(get_post_type($artistQuery) == "artist") {
        $artist = $artistQuery;
    }else{
        $artist = "";
    }
    if($artist) {
        $musics = new WP_Query(array(
            'post_type' => 'post',
            'paged' => 1,
            'meta_query' => array(
                array(
                  'key' => 'artist',
                  'compare' => 'LIKE',
                  'value' => $artist
                )
             )   
        ));
    }else {
        $musics = new WP_Query(array(
            'post_type' => 'post',
            'paged' => 1,
        ));
    }
    
?>
<section class="main">
    <div class="container posts-cont">
        <div class="page-info">
            <p class="page-info-title">Musicas</p>
        </div>
        <div  data_type="post" data_artist="<?php echo $artist?>" class="wrapper-loop wrapper-loop-infinity">
            <?php
                while($musics->have_posts()){
                    $musics->the_post();
                    if(get_post_type() == "post") {
                        get_template_part('template-parts/music');
                    }else {
                        get_template_part('template-parts/'.get_post_type());
                    }                
                }
            ?>
        </div>
    </div>
    <div id="loader-cont"><div class="loader"></div></div>
</section>
<div class="nofooter">
    <?php get_footer();?>
</div>
