<?php
function mdd_update_category_and_tags($post_id) {
    $in_post_type = array("post", "album");
    if ( !in_array(get_post_type( $post_id ), $in_post_type) ){
        return;
    }
    $artists = get_field('artist', $post_id);
    foreach ($artists as $artist) {
        $ar_tags = array(
            $artist->post_title,
            $artist->post_title . " " . date("Y"),
            $artist->post_title . " ". date("m/Y")
        );
        foreach($ar_tags as $tag) {
            wp_set_post_tags( $post_id, $tag, true );
        }
    }
    $date_tags = array(
        date("Y"),
        date("m/Y"),
        date("d/m/Y")
    );

    wp_set_post_tags( $post_id, $date_tags, true );

    $seo_tags = array(
        "baixar musica de"
    );

    wp_set_post_tags( $post_id, $seo_tags, true );

}