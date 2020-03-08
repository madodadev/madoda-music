<?php
// require get_theme_file_path('/inc/music-acess.php');

function mdd_set_drive_id() {
$drive_ids=array('File Name:02.-Nelson-Freitas-Xtomperod-feat.-Elji-Beatzkilla.mp3|| ID:1ZeNvp0sZkv1Ji7wCyGawZa2POeT-HdEi|||','File Name:Duas-Caras-Gueime.mp3|| ID:1Xz5QGC_g8FV5CGhQMFnAOYwsdoNIJ74j|||');
    
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
//add more drive ids to excite musics
function mddAddMoreDriveIDS() {
    $ids_drive_log_path = get_theme_file_path('/assets/drive/driveIdsLog.json');
    $ids_data = file_get_contents($ids_drive_log_path);
    $drive_ids = json_decode($ids_data, true);
    $args = array(
        'numberposts' => -1
    );
    $allposts = get_posts( $args );
    for($i=0; $i < count($allposts); $i++) {
        $musicDriveLink = get_field('google_drive_link', $allposts[$i]->ID);
        if($musicDriveLink) {
            $music_drive_id = get_drive_id($musicDriveLink);
            if($drive_ids[$music_drive_id]) {
                $new_drive_ids = $drive_ids[$music_drive_id];
                $new_format_ids = $musicDriveLink."&&\n";
                for($j=0; $j < count($new_drive_ids); $j++) {
                    if($j == (count($new_drive_ids) - 1)){
                        // echo "<h1>Last</h1>".$new_drive_ids[$j];
                        $new_format_ids = $new_format_ids.$new_drive_ids[$j];
                    }else {
                        // echo $new_drive_ids[$j]."&&\n";
                        $new_format_ids = $new_format_ids.$new_drive_ids[$j]."&&\n";
                    }
                }
                update_field('google_drive_link', $new_format_ids, $allposts[$i]->ID);
            }
        }
    }
}