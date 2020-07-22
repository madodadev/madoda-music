<?php

function mddm_head_post_structure() {
    if(  is_single() AND in_array(get_post_type(), ['post','album','playlist'])  ){?>
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "MusicGroup",
                "headline": "<?php echo get_the_title()?>",
                "image": [
                "<?php mdd_the_single_back_imgUrl();?>"
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