<?php
// require get_theme_file_path('/inc/customizer/madoda-info.php');
//customizer 
function madoda_customize_register( $wp_customize ) {
    // mdd_customize_info($wp_customize);
    //////////////////////////////////////////////////////////////////////
    /** MAIN BACKGROUND COLOR */
    $wp_customize->add_setting( 'mdd_main_color', array(
        'default' => '#1c2833',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_section('madoda_color_theme_section', array(
        'title' =>  __('MDDM Color', 'madoda'),
        'priority'  =>  10,
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_control', array(
        'label' => __( 'main bk Color', 'madoda' ),
        'section' => 'madoda_color_theme_section',
        'settings'  =>  'mdd_main_color',
    ) ) );

    //////////////////////////////////////////////////////////////////////
    /** MAIN FORIGROUND COLOR */
    $wp_customize->add_setting( 'mdd_main_fg_color', array(
        'default' => '#FDFEFE',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fg_color_control', array(
        'label' => __( 'main fg Color', 'madodafg' ),
        'section' => 'madoda_color_theme_section',
        'settings'  =>  'mdd_main_fg_color',
    ) ) );

    //////////////////////////////////////////////////////////////////////
    /** DESTAK COLOR */
    $wp_customize->add_setting( 'mdd_destak_color', array(
        'default' => '#ed3b58',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'destak_color_control', array(
        'label' => __( 'destak Color', 'madodadk' ),
        'section' => 'madoda_color_theme_section',
        'settings'  =>  'mdd_destak_color',
    ) ) );

}
add_action( 'customize_register', 'madoda_customize_register' );

function madoda_customize_css()
{
    ?>
        <meta name="theme-color" content="<?php echo get_theme_mod('mdd_main_color', '#1c2833'); ?>" />

         <style type="text/css">         
            :root {
                --main-bg-color: <?php echo get_theme_mod('mdd_main_color', '#1c2833'); ?>;
                --main-fk-color: <?php echo get_theme_mod('mdd_main_fg_color', '#FDFEFE'); ?>; 
                --destak-color: <?php echo get_theme_mod('mdd_destak_color', '#ed3b58'); ?>;
            }
         </style>
    <?php
}
add_action( 'wp_head', 'madoda_customize_css');