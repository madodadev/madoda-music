<?php
/**============================================================
 * |>>>>>>>>>>>>>>>>>> [return shot title] >>>>>>>>>>>>>>>>>>>|
 * ============================================================
 */
function madoda_words_trim($title, $length) {
    
    if(strlen($title) < $length){
        return $title;
    } else{
        
        return substr($title, 0, $length)."...";
    }   
}

function mdd_get_the_excerpt() {
    if(get_the_excerpt()){
        return the_excerpt();
    }else{
        return substr(get_the_content(), 0, 20);
    }
}

/**============================================================
 * |>>>>>>>>>>>>>>>>>> [return shot title] >>>>>>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_get_query_artistID() {
    $artistQuery = sanitize_text_field(get_query_var('of'));
    if(get_post_type($artistQuery) == "artist") {
        return $artistQuery;
    }
}

/**============================================================
 * |>>>>>>>>>>>>>>>>>>> [return title] >>>>>>>>>>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_get_title() {
    if(get_field('title')) {
        return get_field('title');
    }else {
        return get_the_title();
    }
}

function mdd_the_title() {
    if(get_field('title')) {
        echo get_field('title');
    }else {
        the_title();
    }
}
/**============================================================
 * |>>>>>>>>>>>>>>>> [return Main Artist Name] >>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_the_artist() {
    echo get_field('artist')[0]->post_title;
}

function mdd_get_artist() {
    return get_field('artist')[0]->post_title;
}

/**============================================================
 * |>>>>>>>>>>>>>>>>>>> [return sec Artists Names] >>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_get_sec_artists() {
    $artists = get_field('artist');
    $artists_num = (count($artists));
    
    if($artists_num >= 2){
        $sec_artists = "";
        for ($i=1; $i < $artists_num; $i++) { 
            if($i == ($artists_num -1) ){
                $sec_artists = $sec_artists.$artists[$i]->post_title;
            }else{
                $sec_artists .= $artists[$i]->post_title.", ";
            }
        } 
        return "(feat. ".$sec_artists.")";
    }
}

/**============================================================
 * |>>>>>>>>>>>>>>>>>>> [Echo All Artists Names] >>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_the_artists() {
    $artists = get_field('artist');
    $artists_num = (count($artists));
    
    if($artists_num >= 2){
        $sec_artists = "";
        for ($i=1; $i < $artists_num; $i++) { 
            if($i == ($artists_num -1) ){
                $sec_artists = $sec_artists.$artists[$i]->post_title;
            }else{
                $sec_artists .= $artists[$i]->post_title.", ";
            }
        } 
        echo $artists[0]->post_title."(feat. ".$sec_artists.")";
    }else{
        echo $artists[0]->post_title;
    }
}

/**============================================================
 * |>>>>>>>>>>>>>>>>>>> [return All Artists Names] >>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_get_artists($post_id = NULL) {
    $artists = $post_id ? get_field('artist', $post_id) : get_field('artist');
    $artists_num = (count($artists));
    
    if($artists_num >= 2){
        $sec_artists = "";
        for ($i=1; $i < $artists_num; $i++) { 
            if($i == ($artists_num -1) ){
                $sec_artists = $sec_artists.$artists[$i]->post_title;
            }else{
                $sec_artists .= $artists[$i]->post_title.", ";
            }
        } 
        return $artists[0]->post_title."(feat. ".$sec_artists.")";
    }else{
        return $artists[0]->post_title;
    }
}


/**============================================================
 * |>>>>>>>>>>>>>>>>>>> [return Artist ID] >>>>>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_the_artist_id() {
    echo get_field('artist')[0]->ID;
}
function mdd_get_artist_id($post_id=NULL) {
    if($post_id) return get_field('artist', $post_id)[0]->ID;
    return get_field('artist')[0]->ID;
}

/**============================================================
 * |>>>>>>>>>>>>>>>>>>> [return Artist URL] >>>>>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_the_artist_url() {
    echo get_field('artist')[0]->guid;
}
function mdd_get_artist_url() {
    return get_field('artist')[0]->guid;
}

/**============================================================
 * |>>>>>>>>>>>>>>> [display loop music img] >>>>>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_is_post_have_musicInfo() {
    if(get_field('artist') || get_field('title') || get_field('music_file')) {
        return true;
    }else {
        return false;
    }
}

/**============================================================
 * |>>>>>>>>>>>>>>> [display loop music img] >>>>>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_is_post_haveInfo() {
    if(get_field('artist') || get_field('title') || get_field('music_file') || get_field('youtube_video_url') ||  get_field('lyrics')) {
        return true;
    }else {
        return false;
    }
}

 /**============================================================
 * |>>>>>>>>>>>>>>> [display loop music img] >>>>>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_the_display_imgUrl() {
    if(get_the_post_thumbnail_url(get_the_ID(),'desplay')) {
        echo get_the_post_thumbnail_url(get_the_ID(),'desplay');
    }else {
        if(get_the_post_thumbnail_url(mdd_get_artist_id(),'desplay')) {
            echo get_the_post_thumbnail_url(mdd_get_artist_id(),'desplay');
        }else {
            echo get_theme_file_uri('/assets/images/thunbnail-404.svg');
        }
    }
    
}

/**============================================================
 * |>>>>>>>>>>>>>>> [playlistDesplay loop music img] >>>>>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_the_playlistDesplay_imgUrl() {
    if(get_the_post_thumbnail_url(get_the_ID(),'playlistDesplay')) {
        echo get_the_post_thumbnail_url(get_the_ID(),'playlistDesplay');
    }else {
        if(get_the_post_thumbnail_url(mdd_get_artist_id(),'playlistDesplay')) {
            echo get_the_post_thumbnail_url(mdd_get_artist_id(),'playlistDesplay');
        }else {
            echo get_theme_file_uri('/assets/images/thunbnail-404.svg');
        }
    }
    
}

/**============================================================
 * |>>>>>>>>>>>>>>> [return playlistDesplay loop music img] >>>>>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_get_playlistDesplay_imgUrl() {
    if(get_the_post_thumbnail_url(get_the_ID(),'playlistDesplay')) {
        return get_the_post_thumbnail_url(get_the_ID(),'playlistDesplay');
    }else {
        if(get_the_post_thumbnail_url(mdd_get_artist_id(),'playlistDesplay')) {
            return get_the_post_thumbnail_url(mdd_get_artist_id(),'playlistDesplay');
        }else {
            return get_theme_file_uri('/assets/images/thunbnail-404.svg');
        }
    }
    
}

/**============================================================
 * |>>>>>>>>>>>>>>> [single front music img] >>>>>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_the_single_front_imgUrl() {
    if(get_the_post_thumbnail_url(get_the_ID(),'singleDesplay')) {
        echo get_the_post_thumbnail_url(get_the_ID(),'singleDesplay');
    }else {
        if(get_the_post_thumbnail_url(mdd_get_artist_id(),'singleDesplay')) {
            echo get_the_post_thumbnail_url(mdd_get_artist_id(),'singleDesplay');
        }else {
            echo get_theme_file_uri('/assets/images/thunbnail-404.svg');
        }
    }
    
}

/**============================================================
 * |>>>>>>>>>>>>>>>>>> [front background music img] >>>>>>>>>>>|
 * ============================================================
 */
function mdd_the_single_back_imgUrl() {
    if(get_the_post_thumbnail_url(get_the_ID(),'singleBackground')) {
        echo get_the_post_thumbnail_url(get_the_ID(),'singleBackground');
    }else {
        if(get_the_post_thumbnail_url(mdd_get_artist_id(),'singleBackground')) {
            echo get_the_post_thumbnail_url(mdd_get_artist_id(),'singleBackground');
        }else {
            echo get_theme_file_uri('/assets/images/thunbnail-404.svg');
        }
    }
    
}

/**============================================================
 * |>>>>>>>>>>>>>>>>>> [front background music img] >>>>>>>>>>>|
 * ============================================================
 */
function mdd_the_placeholderSvg() {
    echo get_theme_file_uri('/assets/images/placeholder-image.svg');
}

 /**============================================================
 * |>>>>>>>>>>>>>>>>>>> [return music Year] >>>>>>>>>>>>>>>>>>|
 * ============================================================
 */

 function mdd_get_year(){
    $year = get_field('year'); 
    if($year){
        if($year == 1){
            return 0;  
        }else{
            return $year;
        }
    }else{
        return Date('Y');
    }
 }

 /**============================================================
 * |>>>>>>>>>>>>>>>>>>> [return music Download Name] >>>>>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_the_download_name() {
    echo (get_field('artist')[0]->post_title." ".get_field('title')." (".get_bloginfo('name').")");
}
function mdd_get_download_name() {
    return (get_field('artist')[0]->post_title." - ".get_field('title')." (".get_bloginfo('name').")");
}


/**============================================================
 * |>>>>>>>>>>>>>>>>>>> [return Music URL] >>>>>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_the_audio_url() {
    $musicfile = get_field('music_file');
    $musiclink = get_field('music_link');
    
    if($musicfile['url']) {
        echo $musicfile['url'];
    }else{
        echo $musiclink;
    }  
}

function mdd_get_audio_url() {
    $musicfile = get_field('music_file');
    $musiclink = get_field('music_link');
    
    if($musicfile) {
        return $musicfile['url'];
    }else{
        return $musiclink;
    }  
}

function mdd_is_download_external_link() {
    $musicfile = get_field('music_file');
    $musiclink = get_field('music_link');
    $musicDriveLink = get_field('google_drive_link');  

    if($musicfile || $musicDriveLink) {
        return false;
    }else{
        return true;
    }
}

function mdd_get_next_post_url() {
 
    $next_post = get_next_post();
    if (!empty( $next_post )):
            return  esc_url( get_permalink( $next_post->ID ) );
    endif;
}

function mdd_get_previous_post_url() {
    $next_post = get_previous_post();
    if (!empty( $next_post )):
        if(get_field( "music_file", $next_post->ID )){
            return  esc_url( get_permalink( $next_post->ID ) );
        } 
    endif;
}

/**============================================================
 * |>>>>>>>>> [return music_list Number >>>>>>>>>>>>>>>>>>>>>>|
 * ============================================================
 */

 function mdd_get_download_num() { 
    return get_field("downloads_number");
 }

 /**============================================================
 * |>>>>>>>>> [return music_list Number >>>>>>>>>>>>>>>>>>>>>>|
 * ============================================================
 */

function mdd_the_music_list_num() {
    if(get_field("music_list")) {
        echo count(get_field("music_list"));
    }
}
function mdd_get_music_list_num() {
    if(get_field("music_list") > 1) {
        return count(get_field("music_list"));
    }else{
        return false;
    }
}

 /**============================================================
 * |>>>>>>>>> [return music metadata info li >>>>>>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_the_music_size() {
    if( get_field('music_file') ) {
        $musicid = get_field('music_file')['ID'];
        $filesize = size_format( filesize( get_attached_file( $musicid ) ), 2 );
        if($filesize):?>
        <span class="music-size">Size: <?php echo $filesize;?></span> 
     <?php endif?>
    <?php
    }
}
 /**============================================================
 * |>>>>>>>>> [return music metadata info li >>>>>>>>>>>>>>>>>>>|
 * ============================================================
 */
function mdd_the_music_metadeta() {
    if( get_field('music_file') ) {
        $musicid = get_field('music_file')['ID'];

        $filesize = size_format( filesize( get_attached_file( $musicid ) ), 2 );
        $fileformat = wp_get_attachment_metadata( $musicid )['fileformat'];
        $channels = wp_get_attachment_metadata( $musicid )['channels'];
        $channelmode = wp_get_attachment_metadata( $musicid )['channelmode'];
        $sample_rate = wp_get_attachment_metadata( $musicid )['sample_rate'];

        if($filesize):?>
           <li>Size: <?php echo $filesize;?></li> 
        <?php endif?>

        <?php if($fileformat):?>
           <li>format: <?php echo $fileformat;?></li> 
        <?php endif?>
        
        <?php if($channels):?>
           <li>channels: <?php echo $channels;?></li> 
        <?php endif?>
        
        <?php if($channelmode):?>
           <li>channel mode: <?php echo $channelmode;?></li> 
        <?php endif?>
        
        <?php if($sample_rate):?>
           <li>sample rate: <?php echo $sample_rate;?></li> 
        <?php endif?>
    <?php
    }
}

 /**============================================================
 * |>>>>>>>>> [return music_list (album/playlist)] >>>>>>>>>>>>|
 * ============================================================
 */

function mdd_the_music_list() {
    $music_list = get_field("music_list");
    $music_list_by_cate = get_field("music_list_by_category");
    $music_list_by_tags = get_field("music_list_by_tags");
    if($music_list){?>
        <div class="music-list">
            <p><strong><?php mdd_the_title()?> music list</strong></p>
            <ul>
                <?php  
                for($i=0; $i < count($music_list); $i++):
                    $musicID =  $music_list[$i]->ID;
                    $music_author = get_field("artist", $musicID)[0]->post_name;
                    $music_title = get_field("title", $musicID);
                    $music_link = get_permalink($musicID);
                    $music_url = get_field("music_file", $musicID)['url'];
                    ?>    
                    <li>
                        <div class="list-info">
                            <span class="music-number"><?php echo $i+1?></span>
                            <a href="<?php echo $music_link?>" class="artist-and-title" target="_blank"><?php echo("$music_author - $music_title")?></a> 
                        </div>
                        <div class="list-btn">
                            <a href="<?php echo mdd_get_download_audio_url()?>" class="download-icon" data-music="<?php echo $musicID;?>" target="_blank" download>
                                <svg class="list-btn-icon icon-download"   version="1.1" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve" class=""><g><g>
                                    <path d="M0,390.345c0,55.219,41.338,101.035,95.639,109.882H305.11L194.727,376.046h55.998V250.864h111.023v125.182h55.524   L306.891,500.227h209.471C570.662,491.38,612,445.563,612,390.345c0-48.515-31.936-89.797-76.527-105.097   c-1.614-96.084-82.343-173.474-181.653-173.474c-71.632,0-133.583,40.253-163.181,98.754c-13.993-15.021-34.244-24.48-56.75-24.48   c-42.255,0-76.5,33.271-76.5,74.275c0,10.71,2.337,20.891,6.51,30.099C26.038,308.615,0,346.531,0,390.345z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#444444"/>
                                </svg>
                            </a>
                            <a href="<?php echo $music_link."?play=1"?>" class="play-icon" data-music="<?php echo $musicID;?>" target="_blank">
                                <svg class="list-btn-icon icon-play"   version="1.1" x="0px" y="0px" viewBox="0 0 232.153 232.153" style="enable-background:new 0 0 232.153 232.153;" xml:space="preserve">
                                    <g>
                                        <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M203.791,99.628L49.307,2.294c-4.567-2.719-10.238-2.266-14.521-2.266   c-17.132,0-17.056,13.227-17.056,16.578v198.94c0,2.833-0.075,16.579,17.056,16.579c4.283,0,9.955,0.451,14.521-2.267   l154.483-97.333c12.68-7.545,10.489-16.449,10.489-16.449S216.471,107.172,203.791,99.628z"/>
                                    </g>
                                </svg>
                            </a> 
                        </div>
                </li>
                <?php endfor;?>
            </ul>
        </div>
    <?php
    }elseif($music_list_by_cate || $music_list_by_tags) {
        if(count($music_list_by_cate) >= 2) {
            for ($i=0; $i < count($music_list_by_cate); $i++) { 
                $newCate = $newCate.$music_list_by_cate[$i].",";
            }
            $cate = "'".$newCate."'";

        }else{
            $cate = $music_list_by_cate[0];
        }
       
        //tags
        if(count($music_list_by_tags) >= 2) {
            for ($i=0; $i < count($music_list_by_tags); $i++) { 
                $newtag = $newtag.$music_list_by_tags[$i]->slug.",";
            }
            $tags = "'".$newtag."'";

        }else{
            $tags = $music_list_by_tags[0]->slug;
        }
        
        if($music_list_by_cate && !$music_list_by_tags) {
            $musiclist = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'cat' => $cate
            ));
        }
        
        if(!$music_list_by_cate && $music_list_by_tags) {
            //just tags
            $musiclist = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'tag' => $tags
            ));
        }
        
        if($music_list_by_cate && $music_list_by_tags) {
            $musiclist = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'cat' => $cate
            ));
         
            $tagsmusiclist = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'tag' => $tags
            ));

            $addTagList = true;
        }

        $cont = 1;
        echo "<h3>".mdd_get_title()." Music List</h3>";
        while($musiclist->have_posts()):
            $musiclist->the_post();
            
            $music_author = get_field("artist")[0]->post_name;
            $music_title = get_field("title");
            $music_link = get_permalink();
            $music_url = get_field("music_file")['url'];?>
            <div class="music-list">
                <ul>
                    <li>
                        <div class="list-info">
                            <span class="music-number"><?php echo $cont?></span>
                            <a href="<?php echo $music_link?>" class="artist-and-title" target="_blank"><?php echo("$music_author - $music_title")?></a> 
                        </div>
                        <div class="list-btn">
                            <a href="<?php echo mdd_get_download_audio_url()?>" class="download-icon" data-music="<?php echo $musicID;?>" target="_blank" download>
                                <svg class="list-btn-icon icon-download"   version="1.1" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve" class=""><g><g>
                                    <path d="M0,390.345c0,55.219,41.338,101.035,95.639,109.882H305.11L194.727,376.046h55.998V250.864h111.023v125.182h55.524   L306.891,500.227h209.471C570.662,491.38,612,445.563,612,390.345c0-48.515-31.936-89.797-76.527-105.097   c-1.614-96.084-82.343-173.474-181.653-173.474c-71.632,0-133.583,40.253-163.181,98.754c-13.993-15.021-34.244-24.48-56.75-24.48   c-42.255,0-76.5,33.271-76.5,74.275c0,10.71,2.337,20.891,6.51,30.099C26.038,308.615,0,346.531,0,390.345z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#444444"/>
                                </svg>
                            </a> 
                            <a href="<?php echo $music_link."?play=1"?>" class="play-icon" data-music="<?php echo $musicID;?>" target="_blank">
                                <svg class="list-btn-icon icon-play"   version="1.1" x="0px" y="0px" viewBox="0 0 232.153 232.153" style="enable-background:new 0 0 232.153 232.153;" xml:space="preserve">
                                    <g>
                                        <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M203.791,99.628L49.307,2.294c-4.567-2.719-10.238-2.266-14.521-2.266   c-17.132,0-17.056,13.227-17.056,16.578v198.94c0,2.833-0.075,16.579,17.056,16.579c4.283,0,9.955,0.451,14.521-2.267   l154.483-97.333c12.68-7.545,10.489-16.449,10.489-16.449S216.471,107.172,203.791,99.628z"/>
                                    </g>
                                </svg>
                            </a> 
                        </div>
                    </li>
                </ul>
            </div>
        <?php
            $cont++;
        endwhile;
        wp_reset_postdata();
       
       //if the playlist have the category and tag (this will display the musics of the tag)
       if($addTagList) {
            while($tagsmusiclist->have_posts()):
                $tagsmusiclist->the_post();
                
                $music_author = get_field("artist")[0]->post_name;
                $music_title = get_field("title");
                $music_link = get_permalink();
                $music_url = get_field("music_file")['url'];
                ?>
                <div class="music-list">
                    <ul>
                        <li>
                            <div class="list-info">
                                <span class="music-number"><?php echo $cont?></span>
                                <a href="<?php echo $music_link?>" class="artist-and-title" target="_blank"><?php echo("$music_author - $music_title")?></a> 
                            </div>
                            <div class="list-btn">
                                <a href="<?php echo mdd_get_download_audio_url()?>" class="download-icon" data-music="<?php echo $musicID;?>" target="_blank" download>
                                    <svg class="list-btn-icon icon-download"   version="1.1" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve" class=""><g><g>
                                        <path d="M0,390.345c0,55.219,41.338,101.035,95.639,109.882H305.11L194.727,376.046h55.998V250.864h111.023v125.182h55.524   L306.891,500.227h209.471C570.662,491.38,612,445.563,612,390.345c0-48.515-31.936-89.797-76.527-105.097   c-1.614-96.084-82.343-173.474-181.653-173.474c-71.632,0-133.583,40.253-163.181,98.754c-13.993-15.021-34.244-24.48-56.75-24.48   c-42.255,0-76.5,33.271-76.5,74.275c0,10.71,2.337,20.891,6.51,30.099C26.038,308.615,0,346.531,0,390.345z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#444444"/>
                                    </svg>
                                </a> 

                                <a href="<?php echo $music_link."?play=1"?>" class="play-icon" data-music="<?php echo $musicID;?>" target="_blank">
                                    <svg class="list-btn-icon icon-play"   version="1.1" x="0px" y="0px" viewBox="0 0 232.153 232.153" style="enable-background:new 0 0 232.153 232.153;" xml:space="preserve">
                                        <g>
                                            <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M203.791,99.628L49.307,2.294c-4.567-2.719-10.238-2.266-14.521-2.266   c-17.132,0-17.056,13.227-17.056,16.578v198.94c0,2.833-0.075,16.579,17.056,16.579c4.283,0,9.955,0.451,14.521-2.267   l154.483-97.333c12.68-7.545,10.489-16.449,10.489-16.449S216.471,107.172,203.791,99.628z"/>
                                        </g>
                                    </svg>
                                </a> 
                            </div>
                        </li>
                    </ul>
                </div>
            <?php
                $cont++;
            endwhile;
            wp_reset_postdata();
       }

    }
}


 /**============================================================
 * |>>>>>>>>>>>>> [music list content >>>>>>>>>>>>|
 * ============================================================
 */
function mdd_the_music_list_content() {

}
 /**============================================================
 * |>>>>>>>>>>>>> [return archive url >>>>>>>>>>>>|
 * ============================================================
 */

function mdd_get_archiveUrl($post_type) {
    return get_post_type_archive_link("$post_type");
}
 /**============================================================
 * |>>>>>>>>>>>>> [return youtube video (iframe)] >>>>>>>>>>>>|
 * ============================================================
 */
function mdd_the_youtube_video(){
    if(get_field('youtube_video_url')){    
        $video_url = get_field('youtube_video_url');
        $video_id = substr(stristr($video_url, 'v='), 2);?>
    <div class="youtube-video-cont">
          <!-- video wrapper -->
          <p class="content-title"><?php echo( mdd_get_title()." ".mdd_get_artist() )?> youtube video</p>
        <div class="youtube" data-embed="<?php echo $video_id?>"> 
            <!-- the "play" button -->
            <div class="play-button"></div> 
            <img class="lazy" src="<?php mdd_the_single_front_imgUrl()?>" data-src="<?php mdd_the_single_front_imgUrl();?>" data-srcset="<?php mdd_the_single_front_imgUrl();?> 2x, <?php mdd_the_single_front_imgUrl();?> 1x" alt="youtube image">
        </div>        
    </div>
<?php
    }
}
/**============================================================
 * |>>>>>>>>>>>>> [return lyric >>>>>>>>>>>>|
 * ============================================================
 */
function mdd_get_lyrics() {
    if(get_field('lyrics')){    
        return get_field('lyrics');
    }
}

/**==================================================================
 * |>>>>>>>>>> [return author biografia and social media link>>>>>>>>|
 * ==================================================================
 */
function mdd_the_artist_content() {
    $artists = get_field('artist');


    for($i=0; $i< count($artists); $i++){

        $artist_img = get_the_post_thumbnail_url($artists[$i]->ID, 'desplay');
        $artist_url = get_permalink($artists[$i]->ID);
        $artist_name = get_field('artist')[$i]->post_title;
        $biografia = get_field('biografia', $artists[$i]->ID);

        $author_musics = new WP_Query(array(
            'post_type' => 'post',
             'posts_per_page' => 6,
             'meta_query' => array(
                array(
                  'key' => 'artist',
                  'compare' => 'LIKE',
                  'value' => $artists[$i]->ID
                )
             )   
        ));

        $blog_post = new WP_Query(array(
            'post_type' => 'blog',
             'posts_per_page' => 3,
             'meta_query' => array(
                array(
                  'key' => 'blog_artist',
                  'compare' => 'LIKE',
                  'value' => $artists[$i]->ID
                )
             )   
        ));

        $facebook = get_field('facebook', $artists[$i]->ID);
        $twitter = get_field('twitter', $artists[$i]->ID);
        $youtube = get_field('youtube', $artists[$i]->ID);
        $instagram = get_field('instagram', $artists[$i]->ID);
        $spotify = get_field('spotify', $artists[$i]->ID);
        $soundcloud = get_field('soundcloud', $artists[$i]->ID);
        $website = get_field('website', $artists[$i]->ID);
        $socialMedia = ($facebook.$twitter.$youtube.$instagram.$spotify.$soundcloud.$website);
    
        $facebookIcon = get_theme_file_uri('/assets/icons/socialMedia/facebook.svg');
        $twitterIcon = get_theme_file_uri('/assets/icons/socialMedia/twitter.svg');
        $youtubeIcon = get_theme_file_uri('/assets/icons/socialMedia/youtube.svg');
        $instagramIcon = get_theme_file_uri('/assets/icons/socialMedia/instagram.svg');
        $spotifyIcon = get_theme_file_uri('/assets/icons/socialMedia/spotify.svg');
        $soundcloudIcon = get_theme_file_uri('/assets/icons/socialMedia/soundcloud.svg');
        
        if($biografia || $socialMedia || $author_musics->have_posts() || $blog_post->have_posts()){
        ?>
            <div class="content">
            <div class="author-content">
                <?php if($artist_img){
                ?>
                    <div class="author-info">
                        <img class="authorImg" src="<?php echo $artist_img?>" alt="<?php echo $artist_name."[IMG]"?>">
                        <a href="<?php echo $artist_url?>">
                            <div><?php echo $artist_name;?></div>
                        </a>
                    </div>
                <?php
                }?>

                <?php if($biografia){
                ?>
                    <div class="biografia">
                        <h2 class="content-title">biografia de <?php echo $artist_name?></h2>
                        
                        <p><?php echo $biografia;?></p>
                    </div>
                <?php
                }?>
                <?php 
                    //artist content sidebar
                    mdd_get_artistContent_ads();
                ?>
                <?php if($socialMedia){
                ?>
                    <div class="social-media">
                        <p class="social-media-title content-title">redes socias de <?php echo $artist_name;?></p>
                        <div class="wrapper">
                            <?php if($facebook){?>
                                <abbr title="facebook">
                                    <a target="_blank" href="<?php echo $facebook?>">
                                        <svg class="social-media-icon icon-facebook"   version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 96.124 96.123" style="enable-background:new 0 0 96.124 96.123;" xml:space="preserve"><g><g>
                                            <path d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803   c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654   c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246   c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z" class="active-path"/>
                                            </g></g> 
                                        </svg>
                                    </a>
                                </abbr>
                            <?php    
                            }
                            ?>
                            <?php if($instagram){?>
                                <abbr title="instagram">
                                    <a class="social-media-icons instagram" target="_blank" href="<?php echo $instagram?>">
                                        <svg class="social-media-icon icon-instagram"  id="instagram_Layer_1" viewBox="0 0 551.034 551.034" x="0px" y="0px" xml:space="preserve" version="1.1">
                                            <g>
                                                <path  d="M 386.878 0 H 164.156 C 73.64 0 0 73.64 0 164.156 v 222.722 c 0 90.516 73.64 164.156 164.156 164.156 h 222.722 c 90.516 0 164.156 -73.64 164.156 -164.156 V 164.156 C 551.033 73.64 477.393 0 386.878 0 Z M 495.6 386.878 c 0 60.045 -48.677 108.722 -108.722 108.722 H 164.156 c -60.045 0 -108.722 -48.677 -108.722 -108.722 V 164.156 c 0 -60.046 48.677 -108.722 108.722 -108.722 h 222.722 c 60.045 0 108.722 48.676 108.722 108.722 L 495.6 386.878 L 495.6 386.878 Z" />
                                                <path  d="M 275.517 133 C 196.933 133 133 196.933 133 275.516 s 63.933 142.517 142.517 142.517 S 418.034 354.1 418.034 275.516 S 354.101 133 275.517 133 Z M 275.517 362.6 c -48.095 0 -87.083 -38.988 -87.083 -87.083 s 38.989 -87.083 87.083 -87.083 c 48.095 0 87.083 38.988 87.083 87.083 C 362.6 323.611 323.611 362.6 275.517 362.6 Z" />
                                                <circle cx="418.31" cy="134.07" r="34.15" />
                                            </g>
                                        </svg>
                                    </a>
                                </abbr>
                            <?php    
                            }
                            ?>
                            <?php if($youtube){?>
                                <abbr title="youtube">
                                    <a class="social-media-icons youtube" target="_blank" href="<?php echo $youtube?>">
                                        <svg  class="social-media-icon icon-youtube" viewBox="0 -77 512.002 512" width="512px" height="512px">
                                            <g>
                                                <path class="active-path" d="m 501.453 56.0938 c -5.90234 -21.9336 -23.1953 -39.2227 -45.125 -45.1289 c -40.0664 -10.9648 -200.332 -10.9648 -200.332 -10.9648 s -160.262 0 -200.328 10.5469 c -21.5078 5.90234 -39.2227 23.6172 -45.125 45.5469 c -10.543 40.0625 -10.543 123.148 -10.543 123.148 s 0 83.5039 10.543 123.148 c 5.90625 21.9297 23.1953 39.2227 45.1289 45.1289 c 40.4844 10.9648 200.328 10.9648 200.328 10.9648 s 160.262 0 200.328 -10.5469 c 21.9336 -5.90234 39.2227 -23.1953 45.1289 -45.125 c 10.543 -40.0664 10.543 -123.148 10.543 -123.148 s 0.421875 -83.5078 -10.5469 -123.57 Z m 0 0" data-old_color="#f00" data-original="#F00" /><path class="" style="fill: rgba(255,255,255,.3);" fill="rgba(255,255,255,.3)" d="m 204.969 256 l 133.27 -76.7578 l -133.27 -76.7578 Z m 0 0"/>
                                            </g> 
                                        </svg>
                                    </a>
                                </abbr>
                            <?php    
                            }
                            ?>
                            <?php if($spotify){?>
                                <abbr title="spotify">
                                    <a class="social-media-icons spotify" target="_blank" href="<?php echo $spotify?>">
                                        <svg class="social-media-icon icon-spotify"  viewBox="0 0 512 512">
                                            <g>
                                                <path class="active-path" d="m 437.02 74.9805 c -48.3516 -48.3516 -112.641 -74.9805 -181.02 -74.9805 s -132.668 26.6289 -181.02 74.9805 c -48.3516 48.3516 -74.9805 112.637 -74.9805 181.02 c 0 68.3789 26.6289 132.668 74.9805 181.02 c 48.3516 48.3516 112.641 74.9805 181.02 74.9805 s 132.668 -26.6289 181.02 -74.9805 c 48.3516 -48.3516 74.9805 -112.641 74.9805 -181.02 c 0 -68.3828 -26.6289 -132.668 -74.9805 -181.02 Z m -62.7305 286.508 c -2.50781 5.54297 -7.96484 8.82422 -13.6797 8.82422 c -2.06641 0 -4.16406 -0.425781 -6.16797 -1.33594 c -45.9414 -20.7656 -95.0117 -31.293 -145.852 -31.293 c -27.0664 0 -54.0313 3.05859 -80.1484 9.09375 c -8.07031 1.86719 -16.1289 -3.16797 -17.9922 -11.2422 c -1.86328 -8.07031 3.16797 -16.125 11.2383 -17.9883 c 28.3281 -6.54297 57.5664 -9.86328 86.9023 -9.86328 c 55.1289 0 108.355 11.4258 158.207 33.957 c 7.55078 3.41406 10.9023 12.3008 7.49219 19.8477 Z m 31.6641 -71.7969 c -2.50391 5.55469 -7.96875 8.84375 -13.6875 8.84375 c -2.0625 0 -4.15234 -0.425781 -6.14844 -1.32422 c -55.9414 -25.1836 -115.672 -37.9492 -177.527 -37.9492 c -31.6523 0 -63.2305 3.42969 -93.8516 10.1992 c -8.08984 1.78906 -16.0977 -3.32031 -17.8828 -11.4102 c -1.78906 -8.08984 3.32031 -16.0977 11.4102 -17.8867 c 32.7422 -7.23437 66.4961 -10.9023 100.324 -10.9023 c 66.1289 0 130.004 13.6563 189.84 40.5938 c 7.55469 3.40234 10.9219 12.2813 7.52344 19.8359 Z m 30.6602 -69.5469 c -2.49609 5.5625 -7.96484 8.85938 -13.6914 8.85938 c -2.05469 0 -4.14063 -0.421875 -6.13672 -1.31641 c -65.6211 -29.457 -135.664 -44.3945 -208.191 -44.3945 c -36.0742 0 -72.0859 3.79297 -107.043 11.2695 c -8.10156 1.74219 -16.0742 -3.42578 -17.8086 -11.5273 c -1.73047 -8.10156 3.42969 -16.0742 11.5313 -17.8086 c 37.0156 -7.91797 75.1406 -11.9336 113.32 -11.9336 c 76.7891 0 150.969 15.8203 220.477 47.0234 c 7.55859 3.39453 10.9375 12.2695 7.54297 19.8281 Z m 0 0"/>
                                            </g> 
                                        </svg>
                                    </a>
                                </abbr>
                            <?php    
                            }
                            ?>
                            <?php if($soundcloud){?>
                                <abbr title="soundcloud">
                                    <a class="social-media-icons soundcloud" target="_blank" href="<?php echo $soundcloud?>">
                
                                        <svg class="social-media-icon icon-soundcloud"  aria-hidden="true" focusable="false"  role="img" viewBox="0 0 640 512"><path fill="currentColor" d="M111.4 256.3l5.8 65-5.8 68.3c-.3 2.5-2.2 4.4-4.4 4.4s-4.2-1.9-4.2-4.4l-5.6-68.3 5.6-65c0-2.2 1.9-4.2 4.2-4.2 2.2 0 4.1 2 4.4 4.2zm21.4-45.6c-2.8 0-4.7 2.2-5 5l-5 105.6 5 68.3c.3 2.8 2.2 5 5 5 2.5 0 4.7-2.2 4.7-5l5.8-68.3-5.8-105.6c0-2.8-2.2-5-4.7-5zm25.5-24.1c-3.1 0-5.3 2.2-5.6 5.3l-4.4 130 4.4 67.8c.3 3.1 2.5 5.3 5.6 5.3 2.8 0 5.3-2.2 5.3-5.3l5.3-67.8-5.3-130c0-3.1-2.5-5.3-5.3-5.3zM7.2 283.2c-1.4 0-2.2 1.1-2.5 2.5L0 321.3l4.7 35c.3 1.4 1.1 2.5 2.5 2.5s2.2-1.1 2.5-2.5l5.6-35-5.6-35.6c-.3-1.4-1.1-2.5-2.5-2.5zm23.6-21.9c-1.4 0-2.5 1.1-2.5 2.5l-6.4 57.5 6.4 56.1c0 1.7 1.1 2.8 2.5 2.8s2.5-1.1 2.8-2.5l7.2-56.4-7.2-57.5c-.3-1.4-1.4-2.5-2.8-2.5zm25.3-11.4c-1.7 0-3.1 1.4-3.3 3.3L47 321.3l5.8 65.8c.3 1.7 1.7 3.1 3.3 3.1 1.7 0 3.1-1.4 3.1-3.1l6.9-65.8-6.9-68.1c0-1.9-1.4-3.3-3.1-3.3zm25.3-2.2c-1.9 0-3.6 1.4-3.6 3.6l-5.8 70 5.8 67.8c0 2.2 1.7 3.6 3.6 3.6s3.6-1.4 3.9-3.6l6.4-67.8-6.4-70c-.3-2.2-2-3.6-3.9-3.6zm241.4-110.9c-1.1-.8-2.8-1.4-4.2-1.4-2.2 0-4.2.8-5.6 1.9-1.9 1.7-3.1 4.2-3.3 6.7v.8l-3.3 176.7 1.7 32.5 1.7 31.7c.3 4.7 4.2 8.6 8.9 8.6s8.6-3.9 8.6-8.6l3.9-64.2-3.9-177.5c-.4-3-2-5.8-4.5-7.2zm-26.7 15.3c-1.4-.8-2.8-1.4-4.4-1.4s-3.1.6-4.4 1.4c-2.2 1.4-3.6 3.9-3.6 6.7l-.3 1.7-2.8 160.8s0 .3 3.1 65.6v.3c0 1.7.6 3.3 1.7 4.7 1.7 1.9 3.9 3.1 6.4 3.1 2.2 0 4.2-1.1 5.6-2.5 1.7-1.4 2.5-3.3 2.5-5.6l.3-6.7 3.1-58.6-3.3-162.8c-.3-2.8-1.7-5.3-3.9-6.7zm-111.4 22.5c-3.1 0-5.8 2.8-5.8 6.1l-4.4 140.6 4.4 67.2c.3 3.3 2.8 5.8 5.8 5.8 3.3 0 5.8-2.5 6.1-5.8l5-67.2-5-140.6c-.2-3.3-2.7-6.1-6.1-6.1zm376.7 62.8c-10.8 0-21.1 2.2-30.6 6.1-6.4-70.8-65.8-126.4-138.3-126.4-17.8 0-35 3.3-50.3 9.4-6.1 2.2-7.8 4.4-7.8 9.2v249.7c0 5 3.9 8.6 8.6 9.2h218.3c43.3 0 78.6-35 78.6-78.3.1-43.6-35.2-78.9-78.5-78.9zm-296.7-60.3c-4.2 0-7.5 3.3-7.8 7.8l-3.3 136.7 3.3 65.6c.3 4.2 3.6 7.5 7.8 7.5 4.2 0 7.5-3.3 7.5-7.5l3.9-65.6-3.9-136.7c-.3-4.5-3.3-7.8-7.5-7.8zm-53.6-7.8c-3.3 0-6.4 3.1-6.4 6.7l-3.9 145.3 3.9 66.9c.3 3.6 3.1 6.4 6.4 6.4 3.6 0 6.4-2.8 6.7-6.4l4.4-66.9-4.4-145.3c-.3-3.6-3.1-6.7-6.7-6.7zm26.7 3.4c-3.9 0-6.9 3.1-6.9 6.9L227 321.3l3.9 66.4c.3 3.9 3.1 6.9 6.9 6.9s6.9-3.1 6.9-6.9l4.2-66.4-4.2-141.7c0-3.9-3-6.9-6.9-6.9z"/></svg>
                                    </a>
                                </abbr>

                            <?php    
                            }
                            ?>
                            <?php if($website){?>
                                <abbr title="website">
                                    <a class="social-media-icons website" target="_blank" href="<?php echo $website?>">
                                        <svg class="social-media-icon icon-website"   version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 15 15" style="enable-background:new 0 0 15 15;" xml:space="preserve">
                                            <g>
                                                <path d="M14.982,7C14.736,3.256,11.744,0.263,8,0.017V0H7.5H7v0.017C3.256,0.263,0.263,3.256,0.017,7H0v0.5   V8h0.017C0.263,11.744,3.256,14.736,7,14.982V15h0.5H8v-0.018c3.744-0.246,6.736-3.238,6.982-6.982H15V7.5V7H14.982z M4.695,1.635   C4.212,2.277,3.811,3.082,3.519,4H2.021C2.673,2.983,3.599,2.16,4.695,1.635z M1.498,5h1.758C3.122,5.632,3.037,6.303,3.01,7H1.019   C1.072,6.296,1.238,5.623,1.498,5z M1.019,8H3.01c0.027,0.697,0.112,1.368,0.246,2H1.498C1.238,9.377,1.072,8.704,1.019,8z    M2.021,11h1.497c0.292,0.918,0.693,1.723,1.177,2.365C3.599,12.84,2.673,12.018,2.021,11z M7,13.936   C5.972,13.661,5.087,12.557,4.55,11H7V13.936z M7,10H4.269C4.128,9.377,4.039,8.704,4.01,8H7V10z M7,7H4.01   c0.029-0.704,0.118-1.377,0.259-2H7V7z M7,4H4.55C5.087,2.443,5.972,1.339,7,1.065V4z M12.979,4h-1.496   c-0.293-0.918-0.693-1.723-1.178-2.365C11.4,2.16,12.327,2.983,12.979,4z M8,1.065C9.027,1.339,9.913,2.443,10.45,4H8V1.065z M8,5   h2.73c0.142,0.623,0.229,1.296,0.26,2H8V5z M8,8h2.99c-0.029,0.704-0.118,1.377-0.26,2H8V8z M8,13.936V11h2.45   C9.913,12.557,9.027,13.661,8,13.936z M10.305,13.365c0.483-0.643,0.885-1.447,1.178-2.365h1.496   C12.327,12.018,11.4,12.84,10.305,13.365z M13.502,10h-1.758c0.134-0.632,0.219-1.303,0.246-2h1.99   C13.928,8.704,13.762,9.377,13.502,10z M11.99,7c-0.027-0.697-0.112-1.368-0.246-2h1.758c0.26,0.623,0.426,1.296,0.479,2H11.99z"/>
                                            </g>
                                        </svg>
                                    </a>
                                </abbr>
                            <?php    
                            }
                            ?>
                            <?php if($twitter){?>
                                <abbr title="twitter">
                                    <a class="social-media-icons twitter" target="_blank" href="<?php echo $twitter?>">
                                        <svg class="social-media-icon icon-twitter"   version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve"><g><g>
                                            <g>
                                                <path d="M612,116.258c-22.525,9.981-46.694,16.75-72.088,19.772c25.929-15.527,45.777-40.155,55.184-69.411    c-24.322,14.379-51.169,24.82-79.775,30.48c-22.907-24.437-55.49-39.658-91.63-39.658c-69.334,0-125.551,56.217-125.551,125.513    c0,9.828,1.109,19.427,3.251,28.606C197.065,206.32,104.556,156.337,42.641,80.386c-10.823,18.51-16.98,40.078-16.98,63.101    c0,43.559,22.181,81.993,55.835,104.479c-20.575-0.688-39.926-6.348-56.867-15.756v1.568c0,60.806,43.291,111.554,100.693,123.104    c-10.517,2.83-21.607,4.398-33.08,4.398c-8.107,0-15.947-0.803-23.634-2.333c15.985,49.907,62.336,86.199,117.253,87.194    c-42.947,33.654-97.099,53.655-155.916,53.655c-10.134,0-20.116-0.612-29.944-1.721c55.567,35.681,121.536,56.485,192.438,56.485    c230.948,0,357.188-191.291,357.188-357.188l-0.421-16.253C573.872,163.526,595.211,141.422,612,116.258z" data-original="#010002" class="active-path" data-old_color="#010002" fill="#808080"/>
                                            </g>
                                        </svg>
                                    </a>
                                </abbr>
                            <?php    
                            }
                            ?>
                        </div>
                    </div>
                <?php
                }?>
                <?php if($author_musics->have_posts()){?>
                    <div class="posts-cont">
                    <div class="content-title">baixar musicas de <?php echo $artist_name?></div>
                        <div class="wrapper-card-list">    
                            <?php 
                                while($author_musics->have_posts()){
                                    $author_musics->the_post();
                                    get_template_part('template-parts/music', 'list');
                                }
                                wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <div class="see-more-list"><a href="<?php echo site_url("/musics")."?of=".$artists[$i]->ID?> ">ver Todas</a></div>
                <?php
                }?>
                
                <div class="new-posts">
            <?php if($blog_post->have_posts()){?>
                <p class="blog-category">Posts</p>  
                    <?php 
                        while($blog_post->have_posts()){
                            $blog_post->the_post();?>
                            <article class="article">
                                <div class="blog-title"><?php the_title()?></div>
                                <div class="blog-content">
                                    <?php the_excerpt();?>
                                    <a href="<?php the_permalink(); ?>" class="read-more">ler mais</a>
                                </div>
                            </article>
                        <?php
                        }
                        wp_reset_postdata();
                    ?>
                <?php
                }?>
            </div>
            </div>
            </div>
        <?php 
        }

    }
}
/////////////////////////////////////////////////////////////////
function madoda_scroll_card_header($args = null) {
    if(!$args['name']){
        $name = 'Unkwon';
    }else{
        $name = $args['name'];
    }

    $targetScroll = $args['targetScroll'];

    if(!$args['see_more']['label']){
        $more_label = 'ver mais';
    }else{
        $more_label = $args['see_more']['label'];
    }
    
    if(!$args['see_more']['link']){
        $more_link = site_url('/');
    }else{
        $more_link = $args['see_more']['link'];
    }?>
    
    <span class="cate_name"><a href="<?php echo $more_link ?>"><?php echo $name?></a></span>
    <div class="scroll-btn">
        <span class="see-more"><a href="<?php echo $more_link ?>"><?php echo $more_label ?></a></span>
        <span target="<?php echo $targetScroll?>" class="scroll scroll-left"> &#10094; </span>
        <span target="<?php echo $targetScroll?>" class="scroll scroll-right"> &#10095; </span>
    </div>
<?php
}?>
<?php
function mdd_new_musics($num = NULL) {
    if($num){
        $num = $num;
    }else{
        $num = 6;
    }
    $newmusics = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => $num
    ));?>

    <div class="Novas posts-cont">
        <span class="cate_name"><a href="<?php echo site_url("/musics")?>">Novas Musicas</a></span>
        <div class="wrapper-card-list">    
            <?php 
                while($newmusics->have_posts()){
                    $newmusics->the_post();
                    get_template_part('template-parts/music', 'list');
                }
                wp_reset_postdata();?>
        </div>
        <div class="see-more-list"><a href="<?php echo site_url("/musics")?>">ver Todas</a></div>
    </div>
<?php
}?>
<?php
function mdd_top_musics() { 
    $topmusics = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 10,
        'meta_key' => 'downloads_this_week',
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
    ));
?>
<div class="topmusic posts-cont">
        <div class="header">
        <?php madoda_scroll_card_header(array(
            'name'  =>  'Musicas em Alta',
            'targetScroll'  => 'topmusica-wrap',
            'see_more'  =>  array(
                'link'  =>  site_url("/trending")
            )
        ))?>
    </div>
                
    <div id="topmusica-wrap" class="wrapper-card">
        <?php
            while($topmusics->have_posts()){
                $topmusics->the_post();
                get_template_part('template-parts/music');
            }
            wp_reset_postdata();
            wp_reset_query();?>
    </div>
            
</div>
<?php
}?>
<?php
/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[AUTHOR FUNCTIONS]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/
function mdd_the_author_socialMedia() {
    $facebook = get_field('facebook');
    $twitter = get_field('twitter');
    $youtube = get_field('youtube');
    $instagram = get_field('instagram');
    $spotify = get_field('spotify');
    $soundcloud = get_field('soundcloud');
    $website = get_field('website');
    $socialMedia = ($facebook.$twitter.$youtube.$instagram.$spotify.$soundcloud.$website);
    
    if($socialMedia){?>
    <div class="social-media">
        <p class="social-media-title content-title">redes socias de <?php echo get_the_title();?></p>
        <div class="wrapper">
            <?php if($facebook){?>
                <abbr title="facebook">
                    <a target="_blank" href="<?php echo $facebook?>">
                        <svg class="social-media-icon icon-facebook"   version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 96.124 96.123" style="enable-background:new 0 0 96.124 96.123;" xml:space="preserve"><g><g>
                            <path d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803   c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654   c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246   c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z" class="active-path"/>
                            </g></g> 
                        </svg>
                    </a>
                </abbr>
            <?php    
            }?>       
            <?php if($instagram){?>
                <abbr title="instagram">
                    <a class="social-media-icons instagram" target="_blank" href="<?php echo $instagram?>">
                        <svg class="social-media-icon icon-instagram" aria-hidden="true" focusable="false" role="img" viewBox="0 0 448 512"><path  d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                    </a>
                </abbr>
            <?php    
            }?>
            <?php if($youtube){?>
                <abbr title="youtube">
                    <a class="social-media-icons youtube" target="_blank" href="<?php echo $youtube?>">
                        <svg  class="social-media-icon icon-youtube" viewBox="0 -77 512.002 512" width="512px" height="512px">
                            <g>
                                <path class="active-path" d="m 501.453 56.0938 c -5.90234 -21.9336 -23.1953 -39.2227 -45.125 -45.1289 c -40.0664 -10.9648 -200.332 -10.9648 -200.332 -10.9648 s -160.262 0 -200.328 10.5469 c -21.5078 5.90234 -39.2227 23.6172 -45.125 45.5469 c -10.543 40.0625 -10.543 123.148 -10.543 123.148 s 0 83.5039 10.543 123.148 c 5.90625 21.9297 23.1953 39.2227 45.1289 45.1289 c 40.4844 10.9648 200.328 10.9648 200.328 10.9648 s 160.262 0 200.328 -10.5469 c 21.9336 -5.90234 39.2227 -23.1953 45.1289 -45.125 c 10.543 -40.0664 10.543 -123.148 10.543 -123.148 s 0.421875 -83.5078 -10.5469 -123.57 Z m 0 0" data-old_color="#f00" data-original="#F00" /><path class="" style="fill: rgba(255,255,255,.3);" fill="rgba(255,255,255,.3)" d="m 204.969 256 l 133.27 -76.7578 l -133.27 -76.7578 Z m 0 0"/>
                            </g> 
                        </svg>
                    </a>
                </abbr>
            <?php    
            } ?>
            <?php if($spotify){?>
                <abbr title="spotify">
                    <a class="social-media-icons spotify" target="_blank" href="<?php echo $spotify?>">
                        <svg class="social-media-icon icon-spotify"  viewBox="0 0 512 512">
                            <g>
                                <path class="active-path" d="m 437.02 74.9805 c -48.3516 -48.3516 -112.641 -74.9805 -181.02 -74.9805 s -132.668 26.6289 -181.02 74.9805 c -48.3516 48.3516 -74.9805 112.637 -74.9805 181.02 c 0 68.3789 26.6289 132.668 74.9805 181.02 c 48.3516 48.3516 112.641 74.9805 181.02 74.9805 s 132.668 -26.6289 181.02 -74.9805 c 48.3516 -48.3516 74.9805 -112.641 74.9805 -181.02 c 0 -68.3828 -26.6289 -132.668 -74.9805 -181.02 Z m -62.7305 286.508 c -2.50781 5.54297 -7.96484 8.82422 -13.6797 8.82422 c -2.06641 0 -4.16406 -0.425781 -6.16797 -1.33594 c -45.9414 -20.7656 -95.0117 -31.293 -145.852 -31.293 c -27.0664 0 -54.0313 3.05859 -80.1484 9.09375 c -8.07031 1.86719 -16.1289 -3.16797 -17.9922 -11.2422 c -1.86328 -8.07031 3.16797 -16.125 11.2383 -17.9883 c 28.3281 -6.54297 57.5664 -9.86328 86.9023 -9.86328 c 55.1289 0 108.355 11.4258 158.207 33.957 c 7.55078 3.41406 10.9023 12.3008 7.49219 19.8477 Z m 31.6641 -71.7969 c -2.50391 5.55469 -7.96875 8.84375 -13.6875 8.84375 c -2.0625 0 -4.15234 -0.425781 -6.14844 -1.32422 c -55.9414 -25.1836 -115.672 -37.9492 -177.527 -37.9492 c -31.6523 0 -63.2305 3.42969 -93.8516 10.1992 c -8.08984 1.78906 -16.0977 -3.32031 -17.8828 -11.4102 c -1.78906 -8.08984 3.32031 -16.0977 11.4102 -17.8867 c 32.7422 -7.23437 66.4961 -10.9023 100.324 -10.9023 c 66.1289 0 130.004 13.6563 189.84 40.5938 c 7.55469 3.40234 10.9219 12.2813 7.52344 19.8359 Z m 30.6602 -69.5469 c -2.49609 5.5625 -7.96484 8.85938 -13.6914 8.85938 c -2.05469 0 -4.14063 -0.421875 -6.13672 -1.31641 c -65.6211 -29.457 -135.664 -44.3945 -208.191 -44.3945 c -36.0742 0 -72.0859 3.79297 -107.043 11.2695 c -8.10156 1.74219 -16.0742 -3.42578 -17.8086 -11.5273 c -1.73047 -8.10156 3.42969 -16.0742 11.5313 -17.8086 c 37.0156 -7.91797 75.1406 -11.9336 113.32 -11.9336 c 76.7891 0 150.969 15.8203 220.477 47.0234 c 7.55859 3.39453 10.9375 12.2695 7.54297 19.8281 Z m 0 0"/>
                            </g> 
                        </svg>
                    </a>
                </abbr>
            <?php    
            }?>
            <?php if($soundcloud){?>
                <abbr title="soundcloud">
                    <a class="social-media-icons soundcloud" target="_blank" href="<?php echo $soundcloud?>">
                        <svg class="social-media-icon icon-soundcloud"   version="1.1" id="soundcloud_Layer_1" x="0px" y="0px" viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;" xml:space="preserve"><g><g id="XMLID_526_">
                            <path id="XMLID_527_" d="M14.492,208.896c0.619,0,1.143-0.509,1.232-1.226l3.365-26.671l-3.355-27.278   c-0.1-0.717-0.623-1.23-1.242-1.23c-0.635,0-1.176,0.524-1.26,1.23l-2.941,27.278l2.941,26.662   C13.316,208.377,13.857,208.896,14.492,208.896z"  class="active-path"/>
                            <path id="XMLID_530_" d="M3.397,198.752c0.608,0,1.101-0.473,1.19-1.18l2.608-16.574l-2.608-16.884   c-0.09-0.685-0.582-1.18-1.19-1.18c-0.635,0-1.127,0.495-1.217,1.19L0,180.999l2.18,16.569   C2.27,198.269,2.762,198.752,3.397,198.752z"  class="active-path"/>
                            <path id="XMLID_531_" d="M27.762,148.644c-0.08-0.867-0.715-1.5-1.503-1.5c-0.782,0-1.418,0.633-1.491,1.5l-2.811,32.355   l2.811,31.174c0.073,0.862,0.709,1.487,1.491,1.487c0.788,0,1.423-0.625,1.503-1.487l3.18-31.174L27.762,148.644z"  class="active-path"/>
                            <path id="XMLID_532_" d="M38.152,214.916c0.922,0,1.668-0.759,1.758-1.751l3.005-32.156l-3.005-33.258   c-0.09-0.999-0.836-1.749-1.758-1.749c-0.935,0-1.692,0.751-1.756,1.754l-2.656,33.253l2.656,32.156   C36.46,214.158,37.217,214.916,38.152,214.916z"  class="active-path"/>
                            <path id="XMLID_533_" d="M50.127,215.438c1.074,0,1.936-0.86,2.025-2.011l-0.01,0.008l2.83-32.426l-2.83-30.857   c-0.08-1.132-0.941-2.005-2.016-2.005c-1.09,0-1.947,0.873-2.012,2.014l-2.502,30.849l2.502,32.418   C48.18,214.578,49.037,215.438,50.127,215.438z"  class="active-path"/>
                            <path id="XMLID_534_" d="M67.132,181.017l-2.655-50.172c-0.074-1.272-1.065-2.286-2.281-2.286c-1.207,0-2.195,1.013-2.269,2.286   l-2.35,50.172l2.35,32.418c0.074,1.278,1.063,2.278,2.269,2.278c1.217,0,2.207-1,2.281-2.278v0.009L67.132,181.017z"  class="active-path"/>
                            <path id="XMLID_535_" d="M74.386,215.766c1.339,0,2.45-1.111,2.513-2.529v0.021l2.482-32.233l-2.482-61.656   c-0.063-1.418-1.174-2.529-2.513-2.529c-1.37,0-2.471,1.111-2.545,2.529l-2.185,61.656l2.195,32.222   C71.915,214.655,73.016,215.766,74.386,215.766z"  class="active-path"/>
                            <path id="XMLID_536_" d="M86.645,111.435c-1.508,0-2.725,1.238-2.787,2.799l-2.033,66.801l2.033,31.884   c0.063,1.553,1.279,2.783,2.787,2.783c1.504,0,2.73-1.22,2.783-2.788v0.016l2.307-31.895l-2.307-66.801   C89.375,112.663,88.148,111.435,86.645,111.435z"  class="active-path"/>
                            <path id="XMLID_782_" d="M99.01,215.766c1.656,0,2.975-1.336,3.037-3.056v0.019l2.133-31.693l-2.133-69.045   c-0.063-1.714-1.381-3.056-3.037-3.056c-1.666,0-3.005,1.342-3.031,3.056l-1.916,69.045l1.916,31.693   C96.005,214.43,97.344,215.766,99.01,215.766z"  class="active-path"/>
                            <path id="XMLID_783_" d="M111.477,215.734c1.787,0,3.237-1.463,3.291-3.318v0.029l1.963-31.404l-1.963-67.289   c-0.054-1.854-1.504-3.311-3.291-3.311c-1.8,0-3.25,1.456-3.303,3.311l-1.725,67.289l1.736,31.389   C108.227,214.271,109.677,215.734,111.477,215.734z"  class="active-path"/>
                            <path id="XMLID_784_" d="M129.359,181.041l-1.777-64.836c-0.043-2-1.609-3.571-3.551-3.571c-1.947,0-3.514,1.571-3.555,3.584   l-1.594,64.823l1.594,31.198c0.041,1.984,1.607,3.556,3.555,3.556c1.941,0,3.508-1.572,3.551-3.585v0.029L129.359,181.041z"  class="active-path"/>
                            <path id="XMLID_785_" d="M136.682,215.853c2.064,0,3.773-1.717,3.805-3.828v0.017l1.613-30.984l-1.613-77.153   c-0.031-2.119-1.74-3.833-3.805-3.833c-2.063,0-3.767,1.722-3.809,3.844l-1.434,77.111l1.434,31.016   C132.915,214.136,134.619,215.853,136.682,215.853z"  class="active-path"/>
                            <path id="XMLID_786_" d="M149.291,92.814c-2.229,0-4.037,1.849-4.074,4.103l-1.667,84.151l1.677,30.526   c0.027,2.225,1.836,4.068,4.064,4.068c2.195,0,4.037-1.844,4.047-4.105v0.037l1.82-30.526l-1.82-84.151   C153.328,94.655,151.486,92.814,149.291,92.814z"  class="active-path"/>
                            <path id="XMLID_787_" d="M160.82,215.882c0.09,0.008,101.623,0.056,102.275,0.056c20.385,0,36.904-16.722,36.904-37.357   c0-20.624-16.52-37.349-36.904-37.349c-5.059,0-9.879,1.034-14.275,2.907c-2.922-33.671-30.815-60.077-64.842-60.077   c-8.318,0-16.429,1.662-23.593,4.469c-2.788,1.09-3.534,2.214-3.556,4.392v118.539C156.861,213.752,158.607,215.655,160.82,215.882   z"  class="active-path"/>
                            </g></g> 
                        </svg>
                    </a>
                </abbr>
            <?php    
            }?>
            <?php if($website){?>
                <abbr title="website">
                    <a class="social-media-icons website" target="_blank" href="<?php echo $website?>">
                        <svg class="social-media-icon icon-website"   version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 15 15" style="enable-background:new 0 0 15 15;" xml:space="preserve">
                            <g>
                                <path d="M14.982,7C14.736,3.256,11.744,0.263,8,0.017V0H7.5H7v0.017C3.256,0.263,0.263,3.256,0.017,7H0v0.5   V8h0.017C0.263,11.744,3.256,14.736,7,14.982V15h0.5H8v-0.018c3.744-0.246,6.736-3.238,6.982-6.982H15V7.5V7H14.982z M4.695,1.635   C4.212,2.277,3.811,3.082,3.519,4H2.021C2.673,2.983,3.599,2.16,4.695,1.635z M1.498,5h1.758C3.122,5.632,3.037,6.303,3.01,7H1.019   C1.072,6.296,1.238,5.623,1.498,5z M1.019,8H3.01c0.027,0.697,0.112,1.368,0.246,2H1.498C1.238,9.377,1.072,8.704,1.019,8z    M2.021,11h1.497c0.292,0.918,0.693,1.723,1.177,2.365C3.599,12.84,2.673,12.018,2.021,11z M7,13.936   C5.972,13.661,5.087,12.557,4.55,11H7V13.936z M7,10H4.269C4.128,9.377,4.039,8.704,4.01,8H7V10z M7,7H4.01   c0.029-0.704,0.118-1.377,0.259-2H7V7z M7,4H4.55C5.087,2.443,5.972,1.339,7,1.065V4z M12.979,4h-1.496   c-0.293-0.918-0.693-1.723-1.178-2.365C11.4,2.16,12.327,2.983,12.979,4z M8,1.065C9.027,1.339,9.913,2.443,10.45,4H8V1.065z M8,5   h2.73c0.142,0.623,0.229,1.296,0.26,2H8V5z M8,8h2.99c-0.029,0.704-0.118,1.377-0.26,2H8V8z M8,13.936V11h2.45   C9.913,12.557,9.027,13.661,8,13.936z M10.305,13.365c0.483-0.643,0.885-1.447,1.178-2.365h1.496   C12.327,12.018,11.4,12.84,10.305,13.365z M13.502,10h-1.758c0.134-0.632,0.219-1.303,0.246-2h1.99   C13.928,8.704,13.762,9.377,13.502,10z M11.99,7c-0.027-0.697-0.112-1.368-0.246-2h1.758c0.26,0.623,0.426,1.296,0.479,2H11.99z"/>
                            </g>
                        </svg>
                    </a>
                </abbr>
            <?php    
            }?>
            <?php if($twitter){?>
                <abbr title="twitter">
                    <a class="social-media-icons twitter" target="_blank" href="<?php echo $twitter?>">
                        <svg class="social-media-icon icon-twitter"   version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve"><g><g>
                            <g>
                                <path d="M612,116.258c-22.525,9.981-46.694,16.75-72.088,19.772c25.929-15.527,45.777-40.155,55.184-69.411    c-24.322,14.379-51.169,24.82-79.775,30.48c-22.907-24.437-55.49-39.658-91.63-39.658c-69.334,0-125.551,56.217-125.551,125.513    c0,9.828,1.109,19.427,3.251,28.606C197.065,206.32,104.556,156.337,42.641,80.386c-10.823,18.51-16.98,40.078-16.98,63.101    c0,43.559,22.181,81.993,55.835,104.479c-20.575-0.688-39.926-6.348-56.867-15.756v1.568c0,60.806,43.291,111.554,100.693,123.104    c-10.517,2.83-21.607,4.398-33.08,4.398c-8.107,0-15.947-0.803-23.634-2.333c15.985,49.907,62.336,86.199,117.253,87.194    c-42.947,33.654-97.099,53.655-155.916,53.655c-10.134,0-20.116-0.612-29.944-1.721c55.567,35.681,121.536,56.485,192.438,56.485    c230.948,0,357.188-191.291,357.188-357.188l-0.421-16.253C573.872,163.526,595.211,141.422,612,116.258z" data-original="#010002" class="active-path" data-old_color="#010002" fill="#808080"/>
                            </g>
                        </svg>
                    </a>
                </abbr>
            <?php    
            }?>
        </div>
    </div>
    <?php
    }
}

/**********return new musics ********/
function mdd_get_artist_newSongs() {
    
    $author_musics = new WP_Query(array(
        'post_type' => 'post',
         'posts_per_page' => 10,
         'meta_query' => array(
            array(
              'key' => 'artist',
              'compare' => 'LIKE',
              'value' => get_the_ID()
            )
         )   
    ));
    
    if($author_musics->have_posts()){?>
        <div class="posts-cont">
        <p class="content-title"><strong>musicas de <?php the_title()?></strong></p>
            <div class="wrapper-card-list">    
                <?php 
                    while($author_musics->have_posts()){
                        $author_musics->the_post();
                        get_template_part('template-parts/music', 'list');
                    }
                    wp_reset_postdata();
                ?>
            </div>
        </div>
        <div class="see-more-list"><a href="<?php echo site_url("/musics")."?of=".get_the_ID()?>">ver Todas</a></div>
    <?php
    }
}


function mdd_get_artist_playlist() {
    
    $playlists = new WP_Query(array(
        'post_type' => 'playlist',
         'posts_per_page' => 10,
         'meta_query' => array(
            array(
              'key' => 'artist',
              'compare' => 'LIKE',
              'value' => get_the_ID()
            )
         )   
    ));

    if($playlists->have_posts()){
            $cardName = "playlists de ".get_the_title();
        ?>
        <div class="topmusic posts-cont">
                <div class="header">
                <?php madoda_scroll_card_header(array(
                    'name'  =>  $cardName,
                    'targetScroll'  => 'playlist-wrap',
                    'see_more'  =>  array(
                    'link'  =>  mdd_get_archiveUrl("playlist")."?of=".get_the_ID()
                    )
                ))?>
            </div>
                        
            <div id="playlist-wrap" class="wrapper-card">
                <?php
                    while($playlists->have_posts()){
                        $playlists->the_post();
                        get_template_part('template-parts/playlist');
                    }
                    wp_reset_postdata();
                    wp_reset_query();
                ?>
            </div>  
        </div>
    <?php
    }//close if
}//close function

function mdd_get_artist_albums() {
    
    $albums = new WP_Query(array(
        'post_type' => 'album',
         'posts_per_page' => 10,
         'meta_query' => array(
            array(
              'key' => 'artist',
              'compare' => 'LIKE',
              'value' => get_the_ID()
            )
         )   
    ));

    if($albums->have_posts()){
            $cardName = "albums de ".get_the_title();
        ?>
        <div class="topmusic posts-cont">
                <div class="header">
                <?php madoda_scroll_card_header(array(
                    'name'  =>  $cardName,
                    'targetScroll'  => 'albums-wrap',
                    'see_more'  =>  array(
                        'link'  =>   mdd_get_archiveUrl("album")."?of=".get_the_ID()
                    )
                ))?>
            </div>
                        
            <div id="albums-wrap" class="wrapper-card">
                <?php
                    while($albums->have_posts()){
                        $albums->the_post();
                        get_template_part('template-parts/album');
                    }
                    wp_reset_postdata();
                    wp_reset_query();
                ?>
            </div>
                    
        </div>
    <?php
    }//close if
}//close function

function mdd_get_top_artist() {
    
    $artists = new WP_Query(array(
        'post_type' => 'artist',
         'posts_per_page' => 10,
         'meta_key' => 'downloads_artist',
         'orderby' => 'meta_value_num',
         'order' => 'DESC'
    ));

    if($artists->have_posts()){?>
        <div class="topmusic posts-cont">
                <div class="header">
                <?php madoda_scroll_card_header(array(
                    'name'  =>  'Top Artistas',
                    'targetScroll'  => 'cantores-wrap',
                    'see_more'  =>  array(
                        'link'  =>  mdd_get_archiveUrl("artist")
                    )
                ))?>
            </div>
                        
            <div id="cantores-wrap" class="wrapper-card">
                <?php
                    while($artists->have_posts()){
                        $artists->the_post();
                        get_template_part('template-parts/artist');
                    }
                    wp_reset_postdata();
                    wp_reset_query();
                ?>
            </div>
                    
        </div>
    <?php
    }//close if
}//close function

function mdd_get_artist_blog() {
    $releted_blog_post = new WP_Query(array(
      'post_type' => 'blog',
       'posts_per_page' => 12,
       'meta_query' => array(
          array(
            'key' => 'blog_artist',
            'compare' => 'LIKE',
            'value' => get_the_ID()
          )
       )   
  ));?>

  <div class="related-blog blog-loop-cont">
            <?php if($releted_blog_post->have_posts()){?>
                <h5 class="blog-category">Blogs Relacionados</h5>  
                    <?php 
                        while($releted_blog_post->have_posts()){
                            $releted_blog_post->the_post();
                            get_template_part('template-parts/blog');
                        }
                        wp_reset_postdata();
                    ?>
                <?php
                }?>
            </div>
<?php
}
//////////////////////////////////////////////////////////////////////
////////////////////[[[[[[[[[[[[ADS]]]]]]]////////////////////////////
/////////////////////////////////////////////////////////////////////
function mdd_get_ads() {
    if ( is_active_sidebar( 'main-sidebar' ) ):?>
    <div class="ads-container">
        <?php dynamic_sidebar( 'main-sidebar' ); ?>

        <a class="ads-prev" >&#10094;</a>
        <a class="ads-next" >&#10095;</a>
    </div>
<?php
    endif;
 }

function mdd_get_footer_widget() {
    if(is_active_sidebar( 'footer-sidebar' )): ?>
        <div class="footer-widget">
            <?php dynamic_sidebar( 'footer-sidebar' ); ?>
        </div>
    <?php endif;
}

function mdd_get_left_menu_widget() {
    if(is_active_sidebar( 'left-menu-sidebar' )): ?>
        <div class="left-menu-widget-cont">
            <?php dynamic_sidebar( 'left-menu-sidebar' ); ?>
        </div>
    <?php endif;
}

function mdd_get_musicInfo_ads() {
    if(is_active_sidebar( 'music-info-ads-sidebar' )): ?>
        <?php dynamic_sidebar( 'music-info-ads-sidebar' ); ?>
    <?php endif;
}

function mdd_get_artistContent_ads() {
    if(is_active_sidebar( 'artist-content-ads-sidebar' )): ?>
        <?php dynamic_sidebar( 'artist-content-ads-sidebar' ); ?>
    <?php endif;
}