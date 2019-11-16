<?php

function madoda_post_types() {
  // music Post type
  register_post_type('blog', array(
    'show_in_rest' => true,
    "has_archive" => true,
    'supports' => array('title', 'editor', 'excerpt','tags', 'thumbnail'),
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
    'supports' => array('title', 'editor', 'excerpt','tags', 'thumbnail'),
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
    'supports' => array('title', 'editor', 'excerpt','tag', 'thumbnail'),
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
    'supports' => array('title', 'editor', 'excerpt','title-tag', 'thumbnail'),
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