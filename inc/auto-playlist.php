<?php
function autoArtistPlaylist($post) {
    if(get_post_type($post->ID) == "artist") {
        $title = get_the_title($post->ID)." 2019";
        update_field('title', "autopost", 998);
        // wp_insert_post(array(
        //     'post_type' =>  'playlist',
        //     'post_status'   => 'publish',
        //     'post_title'    =>  $title
        // ));
    }
}