<li>    
    <div class="card-box">
        <a href="<?php the_permalink(); ?>"><img class="lazy" src="<?php mdd_the_placeholderSvg() ?>" data-src="<?php mdd_the_display_imgUrl();?>" data-srcset="<?php mdd_the_display_imgUrl();?> 2x, <?php mdd_the_display_imgUrl();?> 1x" alt="<?php echo "baixar musica ".get_the_title().'[IMG]'?>"></a>
        <div class="info">
            <abbr title="<?php echo mdd_get_title();?>">
                <a href="<?php the_permalink(); ?>"> 
                    <div class="title"><?php 
                        echo  madoda_words_trim(mdd_get_title(), 23);?>
                    </div>
                <a>
            </abbr>

            <a href="<?php mdd_the_artist_url()?>">
                <abbr title="<?php mdd_the_artist()?>">
                    <p class="author"><?php echo madoda_words_trim(mdd_get_artist(), 23);?></p>
                </abbr>
            </a>
            
        </div>
    </div>
</li>
