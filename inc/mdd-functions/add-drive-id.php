<?php
function mdd_set_drive_id() {
$drive_ids=array("File Name:12.-Black-Coffee-Drive-Edit.mp3|| ID:googleDriveID10|||", "lhjhjhjh");
    
    $args = array(
        'numberposts' => -1
    );
    $allposts = get_posts( $args );
    $drive_link = get_field('google_drive_link');
    for($i=0; $i < count($allposts); $i++) {
        $music_id = get_field('music_file', $allposts[$i]->ID)['id'];
        if($music_id) {
            $musicpath = get_attached_file( $music_id );
            $server_name = strtolower(basename($musicpath));
            for($j=0; $j < count($drive_ids); $j++){
                $name_start_index = strpos($drive_ids[$j], 'e:') + 2;
                $name_end_index = strpos($drive_ids[$j], '||') - $name_start_index;
                $drive_name = strtolower(substr($drive_ids[$j], $name_start_index, $name_end_index));
                
                $id_start_index = strpos($drive_ids[$j], 'ID:') + 3;
                $id_end_index = strpos($drive_ids[$j], '|||') - $id_start_index;
                $drive_id = substr($drive_ids[$j], $id_start_index, $id_end_index);
                $name_comp = strcmp ($server_name, $drive_name);
                if($name_comp == 0) {
                    if(!$drive_link) {
                        update_field('google_drive_link', $drive_id, $allposts[$i]->ID);
                        update_field('music_file', '', $allposts[$i]->ID);
                    }
                }
            }
        }
        
    }

}