
window.addEventListener('load', ()=>{
setTimeout(()=>{
    if(playerData.song_url){
        let play_pause = document.querySelector('#play_pause');
        let volume_bar = document.querySelector('#volume-bar');
        let speaker = document.querySelector('.speaker');
        let seek_bar = document.querySelector('input#seek-bar');
        let progress_range = document.querySelector('.progress-range');
    
        let start_time = document.getElementById("start-time");
        let end_time = document.getElementById("end-time");
        let ismousedown = false;
        let song = new Audio();
        function constrator() {
            if(play_pause) {
                song.src = playerData.song_url;
                events();
                if(playerData.auto_play) {
                    song.play();
                }
            }
        }
    
        constrator();
    
        function events() {
            play_pause.addEventListener('click', play);
            volume_bar.addEventListener('mousemove', setVolume);
            speaker.addEventListener('click', muteVolume);
    
            seek_bar.addEventListener('mousedown', (event)=>{ismousedown = true;setMusicTime(event)});
            seek_bar.addEventListener('mouseup', ()=>{ismousedown = false});
            seek_bar.addEventListener('mousemove', (event)=>{setMusicTime(event)});
    
            song.addEventListener('timeupdate', songTimeUpdate);
    
        }
    
        function play() {
            if(song.paused) {
                song.play();
                play_pause.src = mddData.icons_uri + "/pause.png";
                // console.log(song);
            }else{
                song.pause();
                play_pause.src = mddData.icons_uri + "/play.png";
            }
            
        }
        function setVolume() {
            song.volume = volume_bar.value / 100;
            document.querySelector('.header input[type=range]').style.backgroundImage = `linear-gradient(to right, rgba(255, 255, 255,1) ${volume_bar.value}%, rgb(180, 180, 180) 10%, rgb(180, 180, 180))`;
            if(song.volume == 0) {
                speaker.src = mddData.icons_uri + "/speaker0.png";
            }
            
            if(song.volume >= 0.1 & song.volume < 0.3) {
                speaker.src = mddData.icons_uri + "/speaker1.png";
            }
            
            if(song.volume > 0.3 & song.volume < 0.6) {
                speaker.src = mddData.icons_uri + "/speaker2.png";
            }
            
            if(song.volume > 0.6) {
                speaker.src = mddData.icons_uri + "/speaker3.png";
            }
        }
    
        function muteVolume() {
            if(song.muted) {
                song.muted = false;
    
                if(song.volume == 0) {
                    speaker.src = mddData.icons_uri + "/speaker0.png";
                }
                
                if(song.volume >= 0.1 & song.volume < 0.3) {
                    speaker.src = mddData.icons_uri + "/speaker1.png";
                }
                
                if(song.volume > 0.3 & song.volume < 0.6) {
                    speaker.src = mddData.icons_uri + "/speaker2.png";
                }
                
                if(song.volume > 0.6) {
                    speaker.src = mddData.icons_uri + "/speaker3.png";
                }
            }else{
                song.muted = true;
                speaker.src = mddData.icons_uri + "/speakerm.png";
            }
        }
    
        function setMusicTime(event){
            if(ismousedown) {
                let clickPosition = event.clientX - event.target.offsetLeft;
    
                song.currentTime = (clickPosition / event.target.offsetWidth) * song.duration;
            }
    
        }
    
        function songTimeUpdate() {
            
            var nt = song.currentTime * (100 / song.duration);
            seek_bar.value = nt;
            function puttyTime(time) {
                if(time < 10) return "0"+ time.toString();
                else return time.toString();
            }
            let currentM = puttyTime(Math.floor((song.currentTime / 60))); 
            let totalM = puttyTime(Math.floor((song.duration / 60)));
        
            let currentS = puttyTime(Math.floor((song.currentTime % 60)));
            let totalS = puttyTime(Math.floor((song.duration % 60)));
    
            start_time.innerHTML = currentM+":"+currentS;
            end_time.innerHTML = totalM+":"+totalS;
            document.querySelector('.progress-range input[type=range]').style.backgroundImage = `linear-gradient(to right, rgba(255, 255, 255,1) ${nt}%, rgb(180, 180, 180) 10%, rgb(180, 180, 180))`;
    
        }
    }
},500);
//end windows event
});

