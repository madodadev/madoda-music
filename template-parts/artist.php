<li>    
    <a href="<?php the_permalink(); ?>">
    <div class="card-cricle">
        <?php if (!mddm_is_amp()):?>
            <img class="lazy" src="<?php mdd_the_placeholderSvg() ?>" data-src="<?php mdd_the_display_imgUrl();?>" data-srcset="<?php mdd_the_display_imgUrl();?> 2x, <?php mdd_the_display_imgUrl();?> 1x" alt="<?php echo "baixar musica de ".get_the_title().'[IMG]'?>">
        <?php endif; ?>
        
        <?php if (mddm_is_amp()):?>
            <img src="<?php mdd_the_display_imgUrl() ?>" alt="<?php echo "baixar musica de ".get_the_title().'[IMG]'?>">
        <?php endif; ?>

        <div class="info">
            <abbr title="<?php the_title()?>">
            <div class="author">
                <?php echo  madoda_words_trim(get_the_title(), 20);?>
            </div>
            </abbr>
        </div>
    </div>
    </a>
</li>