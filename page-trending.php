<?php get_header();?>

<?php
    $artistQuery = sanitize_text_field(get_query_var('of'));
    if(get_post_type($artistQuery) == "artist") {
        $artist = $artistQuery;
    }else{
        $artist = "";
    }

    if($artist) {
        $topmusics = new WP_Query(array(
            'post_type' => 'post',
            'meta_key' => 'downloads_this_week',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'meta_query' => array(
                array(
                  'key' => 'artist',
                  'compare' => 'LIKE',
                  'value' => $artist
                )
             )   
        ));
    }else {
        $topmusics = new WP_Query(array(
            'post_type' => 'post',
            'meta_key' => 'downloads_this_week',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        ));
    }
    
?>

<section class="main">
    <div class="container posts-cont">
    <div class="page-info">
        <p class="page-info-title">Em Alta</p>
    </div>
    <div  data_type="trending" data_artist="<?php echo $artist?>" class="wrapper-loop wrapper-loop-infinity">
            <?php
                while($topmusics->have_posts()){
                    $topmusics->the_post();
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
