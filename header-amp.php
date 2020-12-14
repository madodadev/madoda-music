<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php mddm_head_post_structure();?>
</head>
<body id="amp-body" <?php body_class(); ?> >
<header>
<?php if(  is_single() AND in_array(get_post_type(), ['post','album','playlist'])  ):?>
<h1><?php echo get_the_title( )?></h1>
<?php if(has_post_thumbnail()):?>
    <img class="post-thumbnail" src="<?php echo get_the_post_thumbnail_url()?>"  width="640" height="360" alt="<?php echo get_the_title()?>">    
<?php endif; ?>

<?php endif; ?>
</header>