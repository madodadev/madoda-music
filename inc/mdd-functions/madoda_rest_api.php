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

    $args = array(
        'numberposts' => -1,
        'post_type'   => 'post',
        'post_status' => 'publish'
    );
       
      $all_posts = get_posts( $args );
      $logs = "";
      foreach ($all_posts as $key => $post) {
          $logs = $logs.$post->post_title." ".$post->ID."\n";
        // $logs = $post->ID;
    }
    update_field("google_drive_link",$logs, 313);
    return $logs;
}

// function get_madoda_drive_link_format($links) {
//     $mdd_format_ids = "";
//     for($i=0; $i < count($links); $i++){
//         if($i == (count($links) - 1)){
//             $mdd_format_ids = $mdd_format_ids.$links[$i];
//         }else {
//             $mdd_format_ids = $mdd_format_ids.$links[$i]."&&\n";
//         }
//     }

//     return $mdd_format_ids;
// }
// function mdd_ceack_links_type($links) {
//     if(is_array( $links["drive_links"] ) ) {
//         return "multi musics";
//     }else {
//         return "one musics";
//     }
// }
// function mdd_rest_edit_post($data) {
//     if($data["id"]){
        
//         $id = $data["id"];
//         $drive_links = get_madoda_drive_link_format($data["drive_links"]);
        
//         if($data["rm_old_dive_links"] != "no") {
//             //substitur drive ids
//             // update_field("google_drive_link",$drive_links, $id);
//             return mdd_ceack_links_type($data["drive_links"]);
//         }else {
//             //adcionar drive ids
//             return "not working for now";
//         } 
//     }else{
//         return "error: no id";
//     }
// }
function madoda_registe_custom_rest_api() {
    register_rest_route( "madoda/v1", "post", array(
        "methods" => WP_REST_SERVER::READABLE,
        "callback" => "mdd_rest_get_post"
    ) );
    
    // register_rest_route( "madoda/v1", "post", array(
    //     "methods" => WP_REST_SERVER::EDITABLE,
    //     "callback" => "mdd_rest_edit_post"
    // ) );
}
add_action("rest_api_init", "madoda_registe_custom_rest_api");