<li>
    <a href="<?php the_permalink(); ?>">
        <div class="card-cricle-album">
            <img class="lazy" src="<?php mdd_the_placeholderSvg() ?>" data-src="<?php mdd_the_display_imgUrl();?>" data-srcset="<?php mdd_the_display_imgUrl();?> 2x, <?php mdd_the_display_imgUrl();?> 1x" alt="<?php echo (get_the_title().'[IMG]')?>">
            <div class="info">
                <abbr title="<?php mdd_the_title()?>">
                    <div class="title">
                        <?php echo  madoda_words_trim(mdd_the_title(), 20);?>
                    </div>
                </abbr>
                <p class="author"><?php mdd_the_artist()?></p>
            </div>
        </div>
    </a>
</li>