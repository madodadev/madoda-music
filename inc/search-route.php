<?php

add_action('rest_api_init', 'madodaSeachRoute');

function madodaSeachRoute() {
  register_rest_route('madoda/v1', 'search', array(
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'getPosts'
  ));
}

function getPosts($data) {
    $mainQuery = new WP_Query(array(
        'post_type' => array('post', 'playlist', 'album', 'artist'),
        's' => sanitize_text_field($data['term'])
    ));

    $results = array(
        'musics' => array(),
        'playlists' => array(),
        'albums' => array(),
        'artists' => array()
    );

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();
    
        if (get_post_type() == 'post') {
          array_push($results['musics'], array(
            'title' => mdd_get_title(),
            'permalink' => get_the_permalink(),
            'thumbnail_url' =>  get_the_post_thumbnail_url(get_the_ID(),'singleDesplay'),
            'postType' => get_post_type(),
            'artist' => mdd_get_artist()
          ));
        }
        
        if (get_post_type() == 'playlist') {
          array_push($results['playlists'], array(
            'title' => mdd_get_title(),
            'permalink' => get_the_permalink(),
            'thumbnail_url' =>  get_the_post_thumbnail_url(get_the_ID(),'singleDesplay'),
            'postType' => get_post_type(),
            'artist' => mdd_get_artist()
          ));
        }
        
        if (get_post_type() == 'album') {
          array_push($results['albums'], array(
            'title' => mdd_get_title(),
            'permalink' => get_the_permalink(),
            'thumbnail_url' =>  get_the_post_thumbnail_url(get_the_ID(),'singleDesplay'),
            'postType' => get_post_type(),
            'artist' => mdd_get_artist()
          ));
        }
        
        if (get_post_type() == 'artist') {
          array_push($results['artists'], array(
            'name' => get_the_title(),
            'permalink' => get_the_permalink(),
            'thumbnail_url' =>  get_the_post_thumbnail_url(get_the_ID(),'singleDesplay'),
            'postType' => get_post_type()
          ));
        }

    }

    return $results;

}