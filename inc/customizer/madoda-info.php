<?php
function mdd_customize_info($wp_customize) {
    $wp_customize->add_section('madoda_info_section', array(
        'title' =>  __('MDDM info', 'madoda'),
        'priority'  =>  10,
    ));

    //  =============================
    //  = settings                  =
    //  =============================

    //facebook
    $wp_customize->add_setting('mdd_facebook_link', array(
        'default'        => 'https://facebook.com',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));

    //twitter
    $wp_customize->add_setting('mdd_twitter_link', array(
        'default'        => 'https://twitter.com',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    )); 
    
    //youtube
    $wp_customize->add_setting('mdd_youtube_link', array(
        'default'        => 'https://youtube.com',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    )); 
  
    //whatsapp
    $wp_customize->add_setting('mdd_whatsapp_link', array(
        'default'        => 'https://whatsapp.com',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    )); 

    //instagram
    $wp_customize->add_setting('mdd_instagram_link', array(
        'default'        => 'https://instagram.com',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    )); 

    //soundCloud
    $wp_customize->add_setting('mdd_soundCloud_link', array(
        'default'        => 'soundcloud.com',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    )); 

    //spotify
    $wp_customize->add_setting('mdd_spotify_link', array(
        'default'        => 'https://spotify.com',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    )); 

    //number
    $wp_customize->add_setting('mdd_number_link', array(
        'default'        => '843646177',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    )); 

    //sec number
    $wp_customize->add_setting('mdd_sec_number_link', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    )); 
    
    //  =============================
    //  = controls                  =
    //  =============================
    
    //facebook
    $wp_customize->add_control('madoda_fb_control', array(
        'label'      => __('Facebook link', 'madoda'),
        'section'    => 'madoda_info_section',
        'settings'   => 'mdd_facebook_link',
    ));

    //twitter
    $wp_customize->add_control('madoda_twitter_control', array(
        'label'      => __('twitter link', 'madoda'),
        'section'    => 'madoda_info_section',
        'settings'   => 'mdd_twitter_link',
    ));

    //youtube
    $wp_customize->add_control('madoda_youtube_control', array(
        'label'      => __('youtube link', 'madoda'),
        'section'    => 'madoda_info_section',
        'settings'   => 'mdd_youtube_link',
    ));

    //instagram
    $wp_customize->add_control('madoda_instagram_control', array(
        'label'      => __('instagram link', 'madoda'),
        'section'    => 'madoda_info_section',
        'settings'   => 'mdd_instagram_link',
    ));

    //whatsapp
    $wp_customize->add_control('madoda_whatsapp_control', array(
        'label'      => __('whatsapp link', 'madoda'),
        'section'    => 'madoda_info_section',
        'settings'   => 'mdd_whatsapp_link',
    ));

    //soundCloud
    $wp_customize->add_control('madoda_soundCloud_control', array(
        'label'      => __('soundCloud link', 'madoda'),
        'section'    => 'madoda_info_section',
        'settings'   => 'mdd_soundCloud_link',
    ));

    //spotify
    $wp_customize->add_control('madoda_spotify_control', array(
        'label'      => __('spotify link', 'madoda'),
        'section'    => 'madoda_info_section',
        'settings'   => 'mdd_spotify_link',
    ));
    
    //phone number
    $wp_customize->add_control('madoda_number_control', array(
        'label'      => __('phone number', 'madoda'),
        'section'    => 'madoda_info_section',
        'settings'   => 'mdd_number_link',
    ));
  
    //sec phone number
    $wp_customize->add_control('madoda_sec_number_control', array(
        'label'      => __('sec phone number', 'madoda'),
        'section'    => 'madoda_info_section',
        'settings'   => 'mdd_sec_number_link',
    ));
}