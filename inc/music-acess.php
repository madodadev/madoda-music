<?php


function is_music_playable() {
$musicfile = get_field('music_file');
$musiclink = get_field('music_link');
$musicDriveLink = get_field('google_drive_link');

if($musicfile || $musicDriveLink) {
        return TRUE;
    }else{
        return FALSE;
    }  
}
function get_drive_id($drive_link) {
    if(stristr($drive_link, "?id=")) {
        return substr(stristr($drive_link, "?id="), 4);
    }else{
        return $drive_link;
    }
}

function get_drive_link($drive_link_str, $type="download") {
    //replace all white speace and break lines
    $drive_link_str = preg_replace( "/\s*/m", "",$drive_link_str);
    //create array
    $drive_links = explode("&&",$drive_link_str);
    $drive_link_count = count($drive_links) - 1;
    
    if($type = "play") {
        $driveBase = "https://docs.google.com/uc?export=download&id=";
        //slect random copy of music on google drive
        $music_drive_link = $drive_links[rand(0, $drive_link_count)];
        $drive_id = get_drive_id($music_drive_link);
        return $driveBase.$drive_id;
    }else {
        $driveBase = "https://drive.google.com/uc?authuser=0&id=";
        $music_drive_link = $drive_links[rand(0, $drive_link_count)];
        $drive_id = get_drive_id($music_drive_link);
        return $driveBase.$drive_id."&export=download";
    }
}

function mdd_get_play_audio_url() {  
    $musicfile = get_field('music_file');
    $musiclink = get_field('music_link');
    $musicDriveLink = get_field('google_drive_link');  

    if($musicfile) {
            return $musicfile['url'];
        }elseif($musicDriveLink){ 
            return get_drive_link($musicDriveLink, "play");
        }else {
            return $musiclink;
        }  
}

function mdd_get_download_audio_url() {  
    $musicfile = get_field('music_file');
    $musiclink = get_field('music_link');
    $musicDriveLink = get_field('google_drive_link');  

    if($musicfile) {
            return $musicfile['url'];
        }elseif($musicDriveLink){ 
            return get_drive_link($musicDriveLink);
        }else {
            return $musiclink;
        }  
}