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

function mdd_get_play_audio_url() {  
$musicfile = get_field('music_file');
$musiclink = get_field('music_link');
$musicDriveLink = get_field('google_drive_link');  

if($musicfile) {
        return $musicfile['url'];
    }elseif($musicDriveLink){ 
        $driveBase = "https://docs.google.com/uc?export=download&id=";
        if(stristr($musicDriveLink, "?id=")) {
            $GDriveID = substr(stristr($musicDriveLink, "?id="), 4);
            return $driveBase.$GDriveID;
        }else {
            return $driveBase.$musicDriveLink;
        }
    }else {
        return $musiclink;
    }  
}