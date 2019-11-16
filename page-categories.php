<?php get_header();?>
<?php 
    $categories = get_categories(array(
        'orderby' => 'category_count',
        'parent'  => 0,
        'order' => 'DESC'
    ));
?>
<section class="main">
    <div class="container posts-cont">
    <div class="page-info">
        <p class="page-info-title">Categorias</p>
    </div>
        <div  class="wrapper-loop ">
            <?php
                foreach ($categories as $category) :
                    $beastCate = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 1,
                        'cat'   => $category->cat_ID,
                        'meta_key' => 'downloads_this_week',
                        'orderby' => 'meta_value_num',
                        'order' => 'DESC'
                    ));
                    if($beastCate->have_posts()) {
                        while($beastCate->have_posts()) {
                            $beastCate->the_post();
                            $cateImg = mdd_get_playlistDesplay_imgUrl();
                        }
                        wp_reset_postdata();
                    }else {
                        $cateImg = get_theme_file_uri('/assets/images/thunbnail-404.svg');
                    }
                
                ?>
                    <li>    
                    <div class="card-box-playList">
                        <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
                            <img class="lazy" src="<?php mdd_the_placeholderSvg() ?>" data-src="<?php echo $cateImg;?>" data-srcset="<?php echo $cateImg;?> 2x, <?php echo $cateImg;?> 1x" alt="<?php echo "baixar musica de ".get_the_title().'[IMG]'?>">
                        </a>
                        <div class="info">
                            <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"> 
                                <h3 class="title">   
                                    <?php echo $category->name?>
                                </h3>
                            <a>
                
                            <a>
                                <h4 class="author"><?php echo $category->category_count?></h4>
                            </a>
                            
                        </div>
                    </div>
                </li>
            <?php endforeach;
            ?>
        </div>
    </div>
</section>
    
<?php get_footer();?>
