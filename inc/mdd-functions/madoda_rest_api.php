<?php
function mdd_rest_get_post($data) {
    // if($data['id']) {
    //     $id = $data["id"];
    //     $perma_link = get_permalink( $id );
    //     $img_src = get_attached_file( get_post_thumbnail_id( $id ) );
    //     $title = get_field("title", $id);
    //     $artist = get_field("artist", $id);
    //     $drive_link = get_field('google_drive_link', $id);
    //     $music_file =  get_field('music_file', $id);
    //     $musiclink = get_field('music_link', $id);

    //     return array(
    //         "id"=>$id,
    //         "permalink" => $perma_link, 
    //         "img" => $img_src,
    //         "title"=>$title, 
    //         "artist"=>$artist, 
    //         "drive_links"=>$drive_link, 
    //         "music_file"=>$music_file, 
    //         "music_link"=>$musiclink
    //     );
    // }else {
    //     return "error: no id";
    // }
}

function get_madoda_drive_link_format($links) {
    $mdd_format_ids = "";
    for($i=0; $i < count($links); $i++){
        if($i == (count($links) - 1)){
            $mdd_format_ids = $mdd_format_ids.$links[$i];
        }else {
            $mdd_format_ids = $mdd_format_ids.$links[$i]."&&\n";
        }
    }

    return $mdd_format_ids;
}

function update_drive_links($posts_data, $rm_old=true){
    $cont = 0;
    foreach ($posts_data as $key => $post_data) {
       $wp_id = $post_data["id"];
       $drive_links = get_madoda_drive_link_format($post_data["drive_links"]);
       if($rm_old) {
           if(get_post( $wp_id)) {
               update_field("google_drive_link",$drive_links, $wp_id);
               $cont = "wp_id";
           }
       }else {
           //append to old ids
       }
    }

    return $cont;
}

function mdd_rest_edit_post($data) {
    if(true){
        $post_data = $data["data"]['posts'];
        $settings = $data["data"]["settings"];
        if($settings["type"] == "gdrive"){
            return update_drive_links($post_data);
        }
    }
}

function madoda_registe_custom_rest_api() {
    // register_rest_route( "madoda/v1", "post", array(
    //     "methods" => WP_REST_SERVER::READABLE,
    //     "callback" => "mdd_rest_get_post"
    // ) );
    
    register_rest_route( "madoda/v1", "edit/posts", array(
        "methods" => WP_REST_SERVER::EDITABLE,
        "callback" => "mdd_rest_edit_post"
    ) );
}
// add_action("rest_api_init", "madoda_registe_custom_rest_api");