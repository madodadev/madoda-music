<?php

function mddm_the_amp_head() {
    if(  is_single() AND in_array(get_post_type(), ['post','album','playlist'])  ){?>
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "MusicObject",
                "datePublished":"<?php echo get_the_date()?>",
                "name": "<?php echo mdd_get_artist()?> - <?php mdd_the_title()?>",
                "genre":"<?php echo get_the_category()[0]->name;?>",
                "byArtist":"<?php echo mdd_get_artist()?>",
                "contentURL":"<?php the_permalink(); ?>",
                "image": [
                "<?php echo get_the_post_thumbnail_url()?>"
                ]            }
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