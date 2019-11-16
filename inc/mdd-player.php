<?php
function mdd_player_files() {
    $playQuery = sanitize_text_field(get_query_var('play'));
    $play = false;
    if($playQuery == 1) {
        $play = true;
    }else{
        $play = false;
    }

    wp_enqueue_script('mdd-player-js', get_theme_file_uri('/js/mdd-player.js'), NULL, '1.0', true);
        
    wp_localize_script('mdd-player-js', 'playerData', array(
        'song_url' => mdd_get_audio_url(),
        'auto_play' => $play
    ));
}?>
<?php
add_action('wp_enqueue_scripts', 'mdd_player_files');
function mdd_player($args) {
    if($args['previous_post_url']){
        $previous_post_url = $args['previous_post_url'];
    }
    
    if($args['next_post_url']){
        $next_post_url = $args['next_post_url'];
    }?>
    
    <div id="player">
        <div class="header">
            <div id="music-btn">
                <a href="<?php echo $previous_post_url."?play=1"?>"><div class="play-icons"><img class="previous" src="<?php echo get_theme_file_uri('/assets/icons/previous.png')?>" alt="previous"></div></a>
                    <div class="play-icons"><img id="play_pause" data-music="<?php the_ID();?>" src="<?php echo get_theme_file_uri('/assets/icons/play.png')?>" alt="play_pause"></div>
                <a href="<?php echo $next_post_url."?play=1"?>"><div class="play-icons"><img class="next" src="<?php echo get_theme_file_uri('/assets/icons/next.png')?>" alt="next"></div></a>
            </div>
           
            <div class="volume-cont">
                <div class="play-icons"><img class="speaker" src="<?php echo get_theme_file_uri('/assets/icons/speaker3.png')?>" alt="speaker"></div>
                <div id="volume">
                    <div class="volume-range"><input type="range"  id="volume-bar" min="0" max="100" value="100" step="1"></div>
                </div>
            </div>
            
        </div>

        <div id="music-progress">
            <div class="containerp">
                    <div id="start-time" class="time">0:00</div>
                    <div class="progress-range"><input type="range"  id="seek-bar" min="0" max="100" value="0" step="1"></div>
                    <div id="end-time" class="time">0:00</div>
            </div>
        </div>

    </div>
<?php
}?>
