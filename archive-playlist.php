<?php get_header();
  $artistQuery = sanitize_text_field(get_query_var('of'));
  if(get_post_type($artistQuery) == "artist") {
      $artist = $artistQuery;
  }else{
      $artist = "";
  }
?>
<section class="main">
    <div class="container posts-cont">
    <div class="page-info">
        <p class="page-info-title">Playlists</p >
    </div>
    <?php if(get_post_type())?>
        <div  data_type="<?php echo get_post_type();?>" data_artist="<?php echo $artist?>" class="wrapper-loop  wrapper-loop-infinity">
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
    </div>
    <div id="loader-cont"><div class="loader"></div></div>
</section>
<div class="nofooter">
    <?php get_footer();?>
</div>