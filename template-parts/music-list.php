<li>
    <div class="card-list">
        <a href="<?php the_permalink(); ?>">
        <?php if (!mddm_is_amp()):?>
            <img class="lazy" src="<?php mdd_the_placeholderSvg() ?>" data-src="<?php mdd_the_display_imgUrl();?>" data-srcset="<?php mdd_the_display_imgUrl();?> 2x, <?php mdd_the_display_imgUrl();?> 1x" alt="<?php echo get_the_title().'[IMG]'?>">
        <?php endif; ?>
        <?php if (mddm_is_amp()):?>
            <img src="<?php mdd_the_display_imgUrl() ?>" alt="<?php echo get_the_title().'[IMG]'?>">
        <?php endif; ?>
        
        </a>
        <div class="info">
            <a href="<?php the_permalink(); ?>">
                <abbr title="<?php mdd_the_title();?>">
                    <div class="title">
                        <?php echo  madoda_words_trim(mdd_the_title(), 20);?>
                    </div>
                </abbr>
            </a>

            <a href="<?php mdd_the_artist_url()?>">
                <abbr title="<?php mdd_the_artists()?>">
                    <p class="author"><?php echo madoda_words_trim(mdd_the_artist(), 20);?></p>
                </abbr>
            </a>
        </div>
    </div>
</li>