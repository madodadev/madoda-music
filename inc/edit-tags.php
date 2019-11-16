<?php
function editTags($post) {
    $not_edit_tags = get_field('not_edit_tags', $post->ID);

    if($not_edit_tags) {
        // update_field('not_edit_tags', false, 683);
        // update_field('title', "Nao editar", 683);
        // update_field('not_edit_tags', true, $post->ID);

    }else {
        
        if(get_field('music_file', $post->ID)) {

            $musicid =  get_field('music_file', $post->ID)['id'];
            

            if(get_field('tag_artist', $post->ID)) {
                $artist = get_field('tag_artist', $post->ID);
            }else {
                $artist = mdd_get_artists();
            }
            
            if(get_field('tag_title', $post->ID)) {
                $title = get_field('tag_title', $post->ID);
            }else {
                $title = get_field('title', $post->ID);
            }
            
            if(get_field('tag_album', $post->ID)) {
                $album = get_field('tag_album', $post->ID);
            }else {
                $album = get_site_url();
            }

            if(get_field('tag_genre', $post->ID)) {
                $genre = get_field('tag_genre', $post->ID);
            }else {
                $categories = get_the_category($post->ID);
                $genre = $categories[0]->name;
            }
            
            if(get_field('tag_coment', $post->ID)) {
                $coment = get_field('tag_coment', $post->ID);
            }else {
                $coment = get_site_url();
            }

            if(get_field('tag_track_num', $post->ID)) {
                $trackNum = get_field('tag_track_num', $post->ID);
            }else {
                $trackNum = 0;
            }
           
            if(get_field('tag_total_track', $post->ID)) {
                $totalTrackNum = get_field('tag_total_track', $post->ID);
            }else {
                $totalTrackNum = 0;
            }
            
            if(get_field('cover', $post->ID)) {
                $cover = get_attached_file( get_field('cover', $post->ID)['id'] );
            }else {
                $cover = get_attached_file( get_post_thumbnail_id($post->ID) );
            }
            
            $musicpath = get_attached_file( $musicid );

            $cmd_removeAllTags = "eyeD3 --remove-all $musicpath";
            $cmd_setArtistName = "eyeD3 -a '$artist' $musicpath";
            $cmd_setTitle = "eyeD3 -t '$title' $musicpath";
            $cmd_setAlbumName = "eyeD3 -A '$album' $musicpath";
            $cmd_setGenre = "eyeD3 -G '$genre' $musicpath";
            $cmd_setComent = "eyeD3 --add-comment '$coment' $musicpath";
            $cmd_setTrackNum = "eyeD3 -n $trackNum $musicpath";
            $cmd_setTotalTrackNum = "eyeD3 -N $totalTrackNum $musicpath";
            $cmd_setImgCOVER = "eyeD3 --add-image $cover:FRONT_COVER $musicpath";
            $cmd_convert = "eyeD3 --to-v2.3 $musicpath";
            
            
            exec ( $cmd_setTitle );
           
            exec ( $cmd_removeAllTags );
            exec ( $cmd_setArtistName );
            exec ( $cmd_setTitle );
            exec ( $cmd_setAlbumName );
            exec ( $cmd_setGenre );
            exec ( $cmd_setComent );
            exec ( $cmd_setTrackNum );
            exec ( $cmd_setTotalTrackNum );
            exec ( $cmd_setImgCOVER );
            exec ( $cmd_convert );
        }
    }
}