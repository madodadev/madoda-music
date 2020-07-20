<?php

function mddm_the_amp_head() {
    if(  is_single() AND in_array(get_post_type(), ['post','album','playlist'])  ){?>
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "MusicGroup",
                "headline": "<?php echo get_the_title()?>",
                "image": [
                "<?php echo get_the_post_thumbnail_url()?>"
                ]            
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