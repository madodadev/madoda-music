import $ from "jquery";
class InfinityScroll {
    constructor() {
        this.wrapper_loop = document.querySelector(".wrapper-loop-infinity");
        this.loader = document.querySelector("#loader-cont");
        this.footerCont = document.querySelector(".nofooter .footer-cont");
        this.myPostType = Array('post', 'playlist', 'album', 'artist', 'blog', 'trending');
        
        if(this.wrapper_loop) {
            this.dataType = this.wrapper_loop.attributes.data_type.value;
            this.dataArtist = this.wrapper_loop.attributes.data_artist.value;
            this.dataPage = 2;
            if(this.myPostType.find((dataType)=>{return (this.dataType == dataType)}) && this.dataPage >=0) {
                this.postType = this.dataType;
                this.paged = 2;
                this.canScroll = true;
                this.lookScroll();

                this.lookScrollEvent1 = setInterval(()=>{this.lookScroll();},500);
                // this.lookScrollEvent2 = setTimeout(()=>{this.lookScroll();},1000);
                // this.lookScrollEvent3 = setTimeout(()=>{this.lookScroll();},2000);
                // this.lookScrollEvent4 = setTimeout(()=>{this.lookScroll();},3000);
                
                this.events();
            
            }
        }  
    }
    events() {
        window.addEventListener("scroll",()=>{this.onScrollToEnd()});
    }
    onScrollToEnd() {
        if ($(window).scrollTop() >= $(document).height() - $(window).height() - 100) {                
            
            if(this.canScroll) {
                // console.log('end');
                this.loader.style.display = "none";
                this.loadPosts();
                this.canScroll = false;
                
            }else{
                // this.loader.style.display = "none";
            }
           
        }
         
    }

    lookScroll() {
        if($(this.wrapper_loop).height() < $(window).height()) {
            if(this.canScroll) {
                // console.log('load more post');
                this.loadPosts();
                this.canScroll = false;
            }
        }else {
            clearInterval(this.lookScrollEvent1);
            clearTimeout();
        }
    }

    loadPosts() {
        if(this.canScroll == true) {
            this.loader.style.display = "block";
        }
        
        $.ajax({
            type: 'GET',
            url: mddData.root_url+"wp-json/madoda/v1/scrollPosts",
            dataType: "html",
            data: {
                "paged": this.paged, 
                "postType": this.postType, 
                "artist":this.dataArtist
            },
            error: (data) =>{
                this.loader.style.display = "none";

            },
            success: (data)=>{
                this.loader.style.display = "none";

                if(data.search('server-no-data-to-be-desplayed')) {
                    this.canScroll = true;
                    
                }else{
                    
                    this.canScroll = false;
                }

                this.lidata = data.replace(/null/gi, "");
                if( data.search('server-no-data-to-be-desplayed') == -1) {
                    
                    this.wrapper_loop.innerHTML = this.wrapper_loop.innerHTML + this.lidata;
                    this.paged = this.paged + 1;
            
                }else {
                    // this.loader.style.display = "none";
                    this.canScroll = false;
                    if(!document.querySelector(".end-infinity-div")){
                        this.footerCont.style.display = "block";
                    }
                    
                }
                
            }
        });
    }

    isScrollTop() {
        let d = document.documentElement;

        let offset = d.scrollTop + window.innerHeight;
        let height = d.offsetHeight;

        if (offset === height) {
            return false;
        }else{
            return true;
        }
    }

}
export default InfinityScroll;
