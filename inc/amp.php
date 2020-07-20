<?php

function mddm_the_amp_head() {
    if(  is_single() AND in_array(get_post_type(), ['post','album','playlist'])  ){?>
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "MusicGroup",
                "headline": "<?php echo get_the_title()?>",
                "datePublished":"<?php echo get_the_date()?>",
                "name": "<?php echo mdd_get_artist()?> - <?php mdd_the_title()?>",
                "genre":"<?php echo get_the_category()[0]->name;?>",
                "byArtist":"<?php echo mdd_get_artist()?>",
                "url":"<?php the_permalink(); ?>",
                "image": [
                "<?php mdd_the_single_front_imgUrl()?>"
                ],
                "keywords":"Baixar musica de <?php echo mdd_get_artist()?> <?php mdd_the_title()?>, download musics, mp3 download"
            }
        </script>
        <?php
    }else {?>
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "MusicGroup",
                "headline": "<?php echo get_the_title()?>"
           }
        </script>
    <?php
    }   
}