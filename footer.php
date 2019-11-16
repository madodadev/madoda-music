<footer>
    <div class="footer-cont">
        <div class="container">
        <div class="wrapper">
            <p class="footer-branding"><a class="branding" href="<?php echo site_url()?>"><?php bloginfo('title'); ?></a></p>
            <div class="social-media">
            </div>
            <div class="footer-menu">
                <nav>
                    <ul>
                        <?php
                            wp_nav_menu( array( 
                                'theme_location' => 'footer-menu',
                                'container_class' => 'footer-menu'
                            ) ); 
                        ?>
                    </ul>
                </nav>
            </div>
            <?php mdd_get_footer_widget() ?>
            <div class="myifo">
                <div>
                    POWERED BY <a  target="_blank" rel="nofollow" href="http://madodamusic.com">MadodaMusic</a>
                </div>
            </div>

        </div>
        </div>
    </div>
    
    <div class="main-overlay"></div>
    
    <div id="search-output">
        <div class="container search-results">
            <div id="search-musicas">
            <h3 class="type-title">Musicas</h3>
            <span class="all"><a href="<?php echo site_url("/musics")?>">Ver Todas</a></span>
                <div class="wrapper-card musics-output">

                </div>
            </div>
        
            <div id="search-album">
                <h3 class="type-title">Albums</h3>
                <span class="all"><a href="<?php echo mdd_get_archiveUrl("album")?>">Ver Todos</a></span>
                <div class="wrapper-card albums-output">
                    
                    
                </div>
            </div>
    
            <div id="search-playlist">
                <h3 class="type-title">playlists</h3>
                <span class="all"><a href="<?php echo mdd_get_archiveUrl("playlist")?>">Ver Todas</a></span>
                <div class="wrapper-card playlists-output">
                    
                </div>
            </div>

            <div id="search-cantores">
                <h3 class="type-title">Artistas</h3>
                <span class="all"><a href="<?php echo mdd_get_archiveUrl("artist")?>">Ver Todos</a></span>
                <div class="wrapper-card artist-output">
                    
                </div>
            </div>

        </div>     
      
    </div>
</footer>
    <?php wp_footer(); ?>
</body>
</html>