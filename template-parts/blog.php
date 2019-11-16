<article class="article">
    <header class="header">
        <img class="blog-img lazy" src="<?php mdd_the_placeholderSvg() ?>" data-src="<?php echo get_the_post_thumbnail_url();?>" data-srcset="<?php echo get_the_post_thumbnail_url();?> 2x, <?php echo get_the_post_thumbnail_url();?> 1x" alt="<?php the_title()?>">
    </header>
    
    <div class="blog-content">
    <a href="<?php the_permalink(); ?>"><h6 class="blog-title"><?php the_title()?></h6></a>

        <?php 
            echo mdd_get_the_excerpt();
        ?>
        <a class="blog-see-more" href="<?php the_permalink(); ?>">Ler Mais</a>
    </div>
    
</article>