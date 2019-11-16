import $ from "../jquery"

class Download {
    constructor() {
        this.download_num = document.querySelector('#download-num');
        this.primary_download_btn = document.querySelector('#download-btn');
        this.download_btn = document.querySelectorAll('.download-btn');
        
        if(this.primary_download_btn){
        this.musicID = this.primary_download_btn.attributes.data_music.value;
        this.artistID = this.primary_download_btn.attributes.data_artist.value;

        
            this.events();
            // this.downloadsRealTime();
        }


    }

    events() {
        this.download_btn.forEach(item=>{item.addEventListener("click",()=>{this.downloadCount()})})
    }

    downloadCount() {
        if(this.checkDownloadCache()){
            $.ajax({
                type: 'POST',
                url: mddData.root_url+"/wp-json/madoda/v1/manageDownload",
                data: {"music": this.musicID, "artist": this.artistID},
                success: (data)=>{
                    this.download_num.innerHTML = data;
                }
            });
            // console.log('baixar + 1');
            sessionStorage.setItem(this.musicID, "downloaded");
        }else{
            // console.log('baixar + 0');
        }
       
    }

    checkDownloadCache() {
        this.mdd_download = sessionStorage.getItem(this.musicID);
        if(this.mdd_download == "downloaded") {
            return false;
        }else{
            return true;
        }
    }

    // downloadsRealTime() {
    //     setInterval(()=>{
    //         $.ajax({
    //             type: 'GET',
    //             url: "http://localhost/wordpress/wp-json/madoda/v1/manageDownload",
    //             data: {"music": this.musicID},
    //             success: (data)=>{
    //                 if(data) {
    //                     this.clientDownload_num = parseInt(this.download_num.innerHTML);
    //                     this.serverDownload_num = parseInt(data['downloads']);
    //                     if(this.clientDownload_num != this.serverDownload_num){
    //                         this.download_num.innerHTML = this.serverDownload_num;
    //                     }
    //                 }
    //             }
    //         });
    //     }, 3000);
    // }

}

export default Download;