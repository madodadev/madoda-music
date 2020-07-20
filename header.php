<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php mddm_the_amp_head();?>
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body <?php body_class(); ?> >
<header>

    <div class="top-nav">
        <div class="container">
            <div class="wrapper">
                <span class="lefit-menu-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="menu-svg" width="23px" height="23px" role="img" viewBox="0 0 448 512"><path fill="#fff" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"/></svg>
                </span>
                <?php if( get_post_type() == "blog" ) {
                    echo "<div class='wp-title'>".get_bloginfo('name')."</div>";
                }else{?>
                <h1 class="wp-title"><?php
                    if( is_archive() ) {
                        echo get_the_archive_title();
                    }elseif(is_front_page()){

                        echo trim(bloginfo('name'), " \t\n\r");
                    }else{
                        the_title();
                    }
                    
                ?></h1>
                <?php
                }?>
                <span class="search">
                <span class="search-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="search-svg" width="23px" height="23px" version="1.1" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">
                        <g>
                            <path d="M508.874,478.708L360.142,329.976c28.21-34.827,45.191-79.103,45.191-127.309c0-111.75-90.917-202.667-202.667-202.667    S0,90.917,0,202.667s90.917,202.667,202.667,202.667c48.206,0,92.482-16.982,127.309-45.191l148.732,148.732    c4.167,4.165,10.919,4.165,15.086,0l15.081-15.082C513.04,489.627,513.04,482.873,508.874,478.708z M202.667,362.667    c-88.229,0-160-71.771-160-160s71.771-160,160-160s160,71.771,160,160S290.896,362.667,202.667,362.667z"/>
                        </g>
                    </svg>
                </span>
                    <input  class="search-input" type="search" placeholder="search music, Albums...">
                </span>
            </div>
        </div>
    </div>

    <div class="lefit-menu"> 
        <nav class="lefit-nav">
            <ul>
                <li class="current"><a href="<?php echo site_url("/")?>" >HOME</a></li>
                <li><a href="<?php echo site_url("/musics")?>">Musicas</a></li>
                <li><a href="<?php echo site_url("/trending")?>">Em Alta</a></li>
                <li><a href="<?php echo mdd_get_archiveUrl("album")?>">Albums</a></li>
                <li><a href="<?php echo mdd_get_archiveUrl("artist")?>">Artistas</a></li>
                <li><a href="<?php echo mdd_get_archiveUrl("playlist")?>">Playlist</a></li>
                <li><a href="<?php echo mdd_get_archiveUrl("blog")?>">Blog</a></li>
            </ul>

            <ul class="categorias">
                <a href="<?php echo site_url("/categories")?>">
                    <div class="lefit-menu-title">categorias</div>
                </a>
                <?php
                    wp_nav_menu( array( 
                        'theme_location' => 'category-menu',
                        'container_class' => 'category-menu'
                    ) ); 
                ?>
                <li><a href="<?php echo site_url("/categories")?>">Ver Mais</a></li>
            </ul>

            <?php mdd_get_left_menu_widget()?>
        </nav>
            
    </div>
</header>