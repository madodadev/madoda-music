<?php
add_action('rest_api_init', 'madodaScrollRoute');

function madodaScrollRoute() {
  register_rest_route('madoda/v1', 'scrollPosts', array(
    'methods' => 'GET',
    'callback' => 'madoda_load_more'
  ));
}

function madoda_load_more($data) {
	
  $postType = sanitize_text_field($data['postType']);
  $paged = sanitize_text_field($data['paged']);
  $artistQuery = sanitize_text_field($data['artist']);
  
  $results = array(
    "posts" => array(),
    "settrings" => array()
  );

  
  if(get_post_type($artistQuery) == "artist") {
      $artist = $artistQuery;
  }else{
      $artist = "";
  }

  if($artist  and $psostType != "trending"){
      $query = new WP_Query( array(
        'post_type' => $postType,
        'post_status' => 'publish',
        'paged' => $paged,
        'meta_query' => array(
          array(
            'key' => 'artist',
            'compare' => 'LIKE',
            'value' => $artist
          )
      )   
    ));
  }else {
    $query = new WP_Query( array(
      'post_type' => $postType,
      'post_status' => 'publish',
      'paged' => $paged,
    ));
  }

  /********************************************************* */
  /********************************************************* */
  if($postType == "trending") {
    if($artist) {
        $querys = new WP_Query(array(
            'post_type' => 'post',
            'meta_key' => 'downloads_this_week',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'paged' => $paged,
            'meta_query' => array(
                array(
                  'key' => 'artist',
                  'compare' => 'LIKE',
                  'value' => $artist
                )
              )   
        ));
    }else {
        $query = new WP_Query(array(
            'post_type' => 'post',
            'meta_key' => 'downloads_this_week',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'paged' => $paged
        ));
    }
}
  
  if( $query->have_posts() ){
      while( $query->have_posts() ): $query->the_post();  
        if(get_post_type() == "post") {
            
            get_template_part('template-parts/music');
        }else {
            get_template_part('template-parts/'.get_post_type());
        }         
      endwhile;
      // array_push($results['settrings'], array(
      //   'paged' => $paged,
      //   'maxPage' => $query->max_num_pages
      // ));
      // return $results;
  }else {
    return "server-no-data-to-be-desplayed";
  }
  
  
  wp_reset_postdata();
  
    
	
}