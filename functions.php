<?php
function mddm_is_amp() {
  return function_exists( "is_amp_endpoint" ) && is_amp_endpoint();
}

require get_theme_file_path('/inc/madoda-functions.php');
require get_theme_file_path('/inc/music-acess.php');
require get_theme_file_path('/inc/inc-acf.php');
require get_theme_file_path('/inc/customizer.php');
require get_theme_file_path('/inc/mdd-player.php');
require get_theme_file_path('/inc/download_play-route.php');
require get_theme_file_path('/inc/search-route.php');
require get_theme_file_path('/inc/infinity-scroll.php');
require get_theme_file_path('/inc/edit-tags.php');
require get_theme_file_path('/inc/auto-playlist.php');
require get_theme_file_path('/inc/mdd-functions/add-drive-id.php');
require get_theme_file_path('/inc/mdd-functions/madoda_rest_api.php');
require get_theme_file_path('/inc/mdd-functions/on_post_save.php');
require get_theme_file_path('/inc/amp.php');

function madoda_files() {
    wp_enqueue_script('main-madoda-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
    wp_enqueue_script('mdd-lazyloading-js', get_theme_file_uri('/js/lazyloading.js'), NULL, '1.0', true);
    wp_enqueue_style('madoda_main_style', get_stylesheet_uri());

    wp_localize_script('main-madoda-js', 'mddData', array(
        'icons_uri' => get_theme_file_uri('assets/icons'),
        "root_url"  => site_url('/')
    ));

}
add_action('wp_enqueue_scripts', 'madoda_files');


function madoda_custom_menu() {
    register_nav_menu('category-menu',__( 'Category Menu' ));
    register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
  add_action( 'init', 'madoda_custom_menu' );

function madoda_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support( 'amp' );
    add_theme_support('widgets');
    add_image_size('desplay', 124, 124, true);
    add_image_size('playlistDesplay', 150, 124, true);
    add_image_size('singleDesplay', 250, 250, true);
    add_image_size('singleBackground', 10, 10, true);
  }
  
  add_action('after_setup_theme', 'madoda_features');

function madodaQueryVars($vars) {
    $vars[] = 'of';
    $vars[] = 'play';
    return $vars;
}
 add_filter('query_vars', 'madodaQueryVars');

//widgets
function madoda_widgets_init() {
    register_sidebar( array(
        'name' => __( 'main sidebar', 'main-sidebar' ),
        'id' => 'main-sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts and same pages', 'madoda-music' ),
        'before_widget' => '<div id="%1$s" class="widget main-sidebar %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title main-sidebar-widget-title">',
        'after_title'   => '</div>',
    ) );

    register_sidebar( array(
        'name' => __( 'Left Menu sidebar', 'left-menu-sidebar' ),
        'id' => 'left-menu-sidebar',
        'description' => __( 'Widgets in this area will be shown in left menu after all items', 'madoda-music' ),
        'before_widget' => '<div id="%1$s" class="widget left-menu-sidebar %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title left-menu-sidebar-widget-title">',
        'after_title'   => '</div>',
    ) );
    
    register_sidebar( array(
        'name' => __( 'single top', 'single-top' ),
        'id' => 'single-top-sidebar',
        'description' => __( 'Widgets in this area will be shown on all single posts', 'madoda-music' ),
        'before_widget' => '<div id="%1$s" class="widget single-sidebar-top single-sidebar %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title single-top-widget-title">',
        'after_title'   => '</div>',
    ) );

    register_sidebar( array(
        'name' => __( 'Music Info Ads', 'music-info-ads' ),
        'id' => 'music-info-ads-sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts with music info', 'madoda-music' ),
        'before_widget' => '<div id="%1$s" class="widget content-ads-widget music-info-ads single-sidebar %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title music-info-ads-widget-title">',
        'after_title'   => '</div>',
    ) );

    register_sidebar( array(
        'name' => __( 'Artist Content Ads', 'artist-content-ads' ),
        'id' => 'artist-content-ads-sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts with Artist Content', 'madoda-music' ),
        'before_widget' => '<div id="%1$s" class="widget content-ads-widget artist-content-ads single-sidebar %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title artist-content-ads-widget-title">',
        'after_title'   => '</div>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer', 'footer' ),
        'id' => 'footer-sidebar',
        'description' => __( 'Widgets in this area will be shown on footer after nav', 'madoda-music' ),
        'before_widget' => '<div id="%1$s" class="widget footer-sidebar %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title footer-sidebar-widget-title">',
        'after_title'   => '</div>',
    ) );

    register_sidebar( array(
      'name' => __( 'AMP Body', 'amp-body' ),
      'id' => 'amp-body-sidebar',
      'description' => __( 'Widgets in this area will be shown on all posts with Artist Content', 'madoda-music' ),
      'before_widget' => '<div id="%1$s" class="widget content-ads-widget amp-body single-sidebar %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="widget-title amp-body-widget-title">',
      'after_title'   => '</div>',
  ) );

    register_sidebar( array(
      'name' => __( 'AMP Footer', 'amp-footer' ),
      'id' => 'amp-footer-sidebar',
      'description' => __( 'Widgets in this area will be shown on amp-footer after nav', 'madoda-music' ),
      'before_widget' => '<div id="%1$s" class="widget amp-footer-sidebar %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="widget-title amp-footer-sidebar-widget-title">',
      'after_title'   => '</div>',
  ) );
}
 add_action( 'widgets_init', 'madoda_widgets_init' );

function madoda_adjust_queries($query) {
    $artistQuery = sanitize_text_field(get_query_var('of'));
    if(get_post_type($artistQuery) == "artist") {
        $artist = $artistQuery;
    }else{
        $artist = "";
    }

    if($artist) {
        if (!is_admin() AND is_post_type_archive(['album','playlist']) AND is_main_query()) {
            $query->set('meta_query', array(
                array(
                'key' => 'artist',
                'compare' => 'LIKE',
                'value' => $artist
                )
            ));
        }        
        
        if (!is_admin() AND is_post_type_archive('blog') AND is_main_query()) {
            $query->set('meta_query', array(
                array(
                'key' => 'blog_artist',
                'compare' => 'LIKE',
                'value' => $artist
                )
            ));
        }        
    }
}
  add_action('pre_get_posts', 'madoda_adjust_queries');


add_action(  'acf/save_post',  'on_post_publish' );

function on_post_publish( $id ) {
  // editTags($post);
  // autoArtistPlaylist($post);
  // do_action( 'acf/save_post', $id );
  mdd_update_category_and_tags($id);
  mdd_add_post_thumbnail($id);
  // add_tags_to_old_posts();
}

////////////////////////////////////////////////////////////////////////////
/** REGISTER POST TYPES */
function madoda_post_types() {
  // music Post type
  register_post_type('blog', array(
    'show_in_rest' => true,
    "has_archive" => true,
    'supports' => array('title', 'editor', 'excerpt','comments','tags', 'thumbnail'),
    'public' => true,
    'has_archive' => true,
    'labels' => array(
      'name' => 'blogs',
      'add_new_item' => 'Add New blog',
      'edit_item' => 'Edit blog',
      'all_items' => 'All blogs',
      'singular_name' => 'blog'
    ),
    'taxonomies' => array('category', 'post_tag'),
    'menu_icon' => 'dashicons-filter'
  ));

  // album Post type
  register_post_type('album', array(
    'show_in_rest' => true,
    "has_archive" => true,
    'supports' => array('title', 'editor', 'excerpt','comments','tags', 'thumbnail'),
    'public' => true,
    'labels' => array(
      'name' => 'albums',
      'add_new_item' => 'Add New album',
      'edit_item' => 'Edit album',
      'all_items' => 'All albums',
      'singular_name' => 'album'
    ),
    'taxonomies' => array('category', 'post_tag'),
    'menu_icon' => 'dashicons-album'
  ));

  // playlist Post type
  register_post_type('playlist', array(
    'show_in_rest' => true,
    "has_archive" => true,
    'supports' => array('title', 'editor', 'excerpt','comments','tag', 'thumbnail'),
    'public' => true,
    'labels' => array(
      'name' => 'playlists',
      'add_new_item' => 'Add New playlist',
      'edit_item' => 'Edit playlist',
      'all_items' => 'All playlists',
      'singular_name' => 'playlist'
    ),
    'taxonomies' => array('category', 'post_tag'),
    'menu_icon' => 'dashicons-playlist-audio'
  ));

  // Artist Post type
  register_post_type('artist', array(
    'show_in_rest' => true,
    "has_archive" => true,
    'supports' => array('title', 'editor', 'excerpt','comments','title-tag', 'thumbnail'),
    'public' => true,
    'labels' => array(
      'name' => 'artists',
      'add_new_item' => 'Add New artist',
      'edit_item' => 'Edit artist',
      'all_items' => 'All artists',
      'singular_name' => 'artist'
    ),
    'taxonomies' => array('category', 'post_tag'),
    'menu_icon' => 'dashicons-admin-users'
  ));
}

add_action('init', 'madoda_post_types');

// function disable_yoast_schema_data($data){
// 	$data = array();
// 	return $data;
// }
// add_filter('wpseo_json_ld_output', 'disable_yoast_schema_data', 10, 1);

require get_theme_file_path('/inc/clean_wp.php');
