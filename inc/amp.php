<?php

function mddm_head_post_structure() {
    function get_images_url() {
        if(get_the_post_thumbnail_url()) {
            $images = [
                get_the_post_thumbnail_url()
            ];

            if( get_the_post_thumbnail_url(get_the_ID(), "desplay") ) array_push($images, get_the_post_thumbnail_url(get_the_ID(), "desplay"));
            if( get_the_post_thumbnail_url(get_the_ID(), "playlistDesplay") ) array_push($images, get_the_post_thumbnail_url(get_the_ID(), "playlistDesplay"));
            if( get_the_post_thumbnail_url(get_the_ID(), "singleDesplay") ) array_push($images, get_the_post_thumbnail_url(get_the_ID(), "singleDesplay"));
            if( get_the_post_thumbnail_url(get_the_ID(), "singleBackground") ) array_push($images, get_the_post_thumbnail_url(get_the_ID(), "singleBackground"));
            return $images;
        }

        return false;
    }


    if(  is_single() AND in_array(get_post_type(), ['post','album','playlist'])  ){?>
     <?php   
        $schema = array(
            "@context" => "http://schema.org",
            "@type" => "MusicGroup",
            "track" => array([
                "@type" => "MusicRecording",
                "audio" => get_the_permalink(),
                "url" => get_the_permalink()
            ])
        );

        if ( get_comments_number() ) {
            $schema["track"][0]["interactionStatistic"] = array(
                "@type" => "InteractionCounter",
                "interactionType" => get_the_permalink(),
                "userInteractionCount" => get_comments_number()
            );
        }

        if( get_the_category()[0] ) {
            $genre = get_the_category()[0]->name;
            $schema["genre"] = $genre;
        }

        if( mdd_get_artist() AND mdd_get_title() ) {
            $schema["track"][0]["name"] = mdd_get_artist()." - ".mdd_get_title();
            $schema["name"] = mdd_get_artist()." - ".mdd_get_title();
        
        }else {
            $schema["name"] = get_the_title();
        }

        if( get_images_url() ) {
            $schema["image"] = get_images_url();
        }

        if( get_field('youtube_video_url') ) {
            $video_id = substr(stristr(get_field('youtube_video_url'), 'v='), 2);
            $video_schema = array(
                "@type" => "VideoObject",
                "url" => get_the_permalink(),
                "contentUrl" => get_field('youtube_video_url'),
                "embedUrl" => get_the_permalink(),
                "uploadDate" => get_the_date("c"),
                "thumbnailUrl" => [
                    "https://img.youtube.com/vi/$video_id/0.jpg",
                    "https://img.youtube.com/vi/$video_id/1.jpg",
                    "https://img.youtube.com/vi/$video_id/2.jpg",
                    "https://img.youtube.com/vi/$video_id/3.jpg"
                ]
            );

            if( mdd_get_artist() AND mdd_get_title() ){
                $video_schema["name"] = mdd_get_artist()." - ".mdd_get_title();
                $video_schema["description"] = "video de " .mdd_get_artist()." com o titlo ".mdd_get_title();
            }

            // if( get_images_url() ) {
            //     $video_schema["thumbnailUrl"] = get_images_url();
            // }

            $schema["subjectOf"] = $video_schema;
        }
            
    ?>    
        <script type="application/ld+json">
            <?php echo json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES); ?>
        </script>
    <?php
    }else {
        
        $schema = array(
            "@context" => "http://schema.org",
            "@type" => "NewsArticle",
            "headline" => get_the_title(),
            "mainEntityOfPage" => array(
                "@type" => "WebPage",
                "@id" => get_the_permalink()
            ),
            "datePublished" => get_the_date("c"),
            "dateModified" => get_the_modified_date( "c" ),
            "author" => array(
                "@type" => "Person",
                "name" => get_the_author() ? get_the_author() : get_bloginfo( "name" )
            ),
            "publisher" => array(
                "@type" => "Organization",
                "name" => get_bloginfo( "name" ),
                "logo" => array(
                    "@type" => "ImageObject",
                    "url" =>  get_theme_file_uri("/assets/images/mddm512.png")
                )
            )
        );

        if(!get_the_permalink()) {
            global $wp;
            $schema["mainEntityOfPage"]["@id"] = home_url( $wp->request );
        }
        
        if( get_images_url() ) {
            $schema["image"] = get_images_url();
        }
        
    ?>
        <script type="application/ld+json">
            <?php echo json_encode($schema); ?>
        </script>
    <?php
    }   
}