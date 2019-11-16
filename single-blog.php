<?php get_header();?>

<?php
    $artist = get_field('blog_artist');
      $releted_blog_post = new WP_Query(array(
        'post_type' => 'blog',
         'posts_per_page' => 6,
         'post__not_in' => array(get_the_ID()),
         'meta_query' => array(
            array(
              'key' => 'blog_artist',
              'compare' => 'LIKE',
              'value' => $artist[0]->ID
            )
         )   
    ));
      
    $new_blog_post = new WP_Query(array(
        'post_type' => 'blog',
        'post__not_in' => array(get_the_ID()),
        'posts_per_page' => 6,
    ));

while(have_posts()){
    the_post();?>
    <section class="main">
        <div class="container">
            <div id="blog-single">    
                <div class="header">
                    <img class="main-blog-img" src="<?php echo get_the_post_thumbnail_url()?>" alt="<?php the_title()?>" name="<?php the_title()?>">
                    <h1 class="blog-title"><?php the_title()?></h1>
                    <div class="blog-date"><?php the_date('d-M-Y')?></div>
                </div>
                <div class="content">
                    <?php the_content()?>
                </div>
            </div>
            
            <div class="related-blog blog-loop-cont">
            <?php if($releted_blog_post->have_posts() && $artist){?>
                <h5 class="blog-category">Posts Relacionados</h5>  
                    <?php 
                        while($releted_blog_post->have_posts()){
                            $releted_blog_post->the_post();
                            get_template_part('template-parts/blog');
                        }
                        wp_reset_postdata();
                    ?>
                <?php
                }?>
            </div>
            
            
            <div class="new-posts">
            <?php if($new_blog_post->have_posts()){?>
                <h5 class="blog-category">Novos Posts</h5>  
                    <?php 
                        while($new_blog_post->have_posts()){
                            $new_blog_post->the_post();?>
                            <article class="article">
                                <h4 class="blog-title"><?php the_title()?></h4>
                                <div class="blog-content">
                                    <?php the_excerpt();?>
                                    <a href="<?php the_permalink(); ?>" class="read-more">ler mais</a>
                                </div>
                            </article>
                        <?php
                        }
                        wp_reset_postdata();
                    ?>
                <?php
                }?>
            </div>
        </div>
    </section>
<?php
//close while
}
?>

<?php get_footer();?>