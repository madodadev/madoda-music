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
            $artist->post_title . " " . get_the_date("Y", $post_id),
            $artist->post_title . " " . get_the_date("m/Y", $post_id)
        );
        foreach($ar_tags as $tag) {
            wp_set_post_tags( $post_id, $tag, true );
        }
    }
    $date_tags = array(
        get_the_date("Y", $post_id),
        get_the_date("m/Y", $post_id),
        get_the_date("d/m/Y", $post_id)
    );
    
    wp_set_post_tags( $post_id, $date_tags, true );

    $seo_tags = array(
        "baixar musica de"
    );

    wp_set_post_tags( $post_id, $seo_tags, true );

}