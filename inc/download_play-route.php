<?php

add_action('rest_api_init', 'madodaDownloadRoute');

function madodaDownloadRoute() {
  register_rest_route('madoda/v1', 'manageDownload', array(
    'methods' => 'GET',
    'callback' => 'returnDownloadNum'
  ));

  register_rest_route('madoda/v1', 'manageDownload', array(
    'methods' => 'POST',
    'callback' => 'updateDownload'
  ));
}

function returnDownloadNum($data) {
    $musicID = sanitize_text_field($data['music']);
    if(get_field('downloads_number', $musicID)) {
        $title = get_the_title($musicID);
        $downloads = get_field('downloads_number', $musicID);
        return array(
            'title' =>  $title,  
            'downloads' => $downloads
        );
    }
}

function updateDownload($data) {
    $musicID = sanitize_text_field($data['music']);
    $artistID = sanitize_text_field($data['artist']);
    if(get_post($musicID)){
        $download_number = get_field('downloads_number', $musicID) + 1;
        $download_this_week = get_field('downloads_this_week', $musicID);
        update_field('downloads_number', $download_number, $musicID);  
        updateWeekDownload($musicID);

        //upddate artist downloads
        if(get_post($artistID)) {
          $downloads_artist = get_field('downloads_artist', $artistID) + 1;
          update_field('downloads_artist', $downloads_artist, $artistID);
        }
        
        return get_field('downloads_number', $musicID);
    }
    
}

function updateWeekDownload($musicID) {
  $posts = get_posts(array(
    'numberposts' => -1,
    'post_type' => array('post', 'album', 'playlist')
  ));

  foreach($posts as $Post) {
    $date = date_create(date('d-m-Y'));
    $resetDownloadDate = get_post_meta($Post->ID, 'resetDownloadDate', true );
    if($resetDownloadDate) {
        $resetDate = strtotime($resetDownloadDate);
        $curD = strtotime(date('d-m-Y'));
        if( $resetDate > $curD) {

          if($Post->ID == $musicID){
            $download_this_week = get_field('downloads_this_week', $musicID) + 1;
            update_field('downloads_this_week', $download_this_week, $musicID);
            update_field('last_download_date', date("d-m-Y h:m"), $musicID);

          }

        }else {
          // update the day of download reset
          date_modify($date,"+7 days");
          update_post_meta( $Post->ID, 'resetDownloadDate', date_format($date,"d-m-Y") );
          update_field('downloads_this_week', 0, $Post->ID);
          update_field('downloads_week_reset_date',date_format($date,"d-m-Y"), $Post->ID);

        }

    }else{
        //register the day of download reset
        date_modify($date,"+7 days");
        add_post_meta($Post->ID, "resetDownloadDate", date_format($date,"d-m-Y"));
        update_field('downloads_this_week', 0, $Post->ID);
    }
  }

}