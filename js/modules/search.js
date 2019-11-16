import $ from 'jquery';

class Search {
    constructor() {
        // this.searchBtn = document.querySelector('.search-btn');
        this.searchBtn = document.querySelector('.search-btn');
        this.searchInput = document.querySelector('.search-input');
        this.searchOutput = document.querySelector('#search-output');
        this.resultsDiv = document.querySelector('#search-output .search-results');
        this.overlay  = document.querySelector('.main-overlay');
        
        this.searchIcon = this.searchBtn.innerHTML;
        this.closeSearchIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" class="close-search-svg" role="img" viewBox="0 0 448 512"><path fill="#fff" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/></svg>`;
        
        this.isSearchOpen = false;
        this.isSpinnerVisible = false;
        this.previousValue;
        this.events();
    }

    events() {
        this.searchInput.addEventListener('focus', ()=>{this.onInputFocus()});
        this.searchInput.addEventListener("keyup", this.typingLogic.bind(this));
        this.searchBtn.addEventListener('click', ()=>{this.onSearchBtnClick()});
        this.overlay.addEventListener('click', ()=>{this.onClickOverlay()});
    }

    typingLogic() {
        // console.log(this.searchInput.value);
        document.querySelector('#search-musicas .musics-output').innerHTML = '';
        document.querySelector('#search-album .albums-output').innerHTML = '';
        document.querySelector('#search-playlist .playlists-output').innerHTML = '';
        document.querySelector('#search-cantores .artist-output').innerHTML = '';

        if (this.searchInput.value != this.previousValue) {
          clearTimeout(this.typingTimer);
    
          if (this.searchInput.value) {
            if (!this.isSpinnerVisible) {
            //   this.resultsDiv.innerHTML = '<div class="search-spinner-loader"></div>';
              this.isSpinnerVisible = true;
            }
            this.typingTimer = setTimeout(this.getResults.bind(this), 750);
          } else {
            this.isSpinnerVisible = false;
          }
    
        }
    
        this.previousValue = this.searchInput.value;
    }

    getResults() {
        // console.log('results');
        $.getJSON(mddData.root_url + '/wp-json/madoda/v1/search?term=' + this.searchInput.value, (results) => {
            console.log(results);
            if(results['musics']) {
                if(document.querySelector('#search-musicas .musics-output')) {
                    results['musics'].forEach(el => {
                        document.querySelector('#search-musicas .musics-output').innerHTML += `
                            <a href="${el.permalink}">
                            <div class="card-list">
                                <img src="${el.thumbnail_url}" alt="${el.title}">
                                <div class="info">
                                    <h3 class="title">${el.title}</h3>
                                    <h4 class="author">${el.artist}</h4>
                                </div>
                            </div>
                        </a>     
                        ` 
                    });
                }
            }
            
            if(results['albums']) {
                if(document.querySelector('#search-album .albums-output')) {
                    results['albums'].forEach(el => {
                        document.querySelector('#search-album .albums-output').innerHTML += `
                            <a href="${el.permalink}">
                            <div class="card-list-circle">
                                <img src="${el.thumbnail_url}" alt="${el.title}">
                                <div class="info">
                                    <h3 class="title">${el.title}</h3>
                                    <h4 class="author">${el.artist}</h4>
                                </div>
                            </div>
                        </a>     
                        ` 
                    });
                }
            }
            
            if(results['playlists']) {
                if(document.querySelector('#search-playlist .playlists-output')) {
                    results['playlists'].forEach(el => {
                        document.querySelector('#search-playlist .playlists-output').innerHTML += `
                            <a href="${el.permalink}">
                            <div class="card-list">
                                <img src="${el.thumbnail_url}" alt="${el.title}">
                                <div class="info">
                                    <h3 class="title">${el.title}</h3>
                                    <h4 class="author">${el.artist}</h4>
                                </div>
                            </div>
                        </a>     
                        ` 
                    });
                }
            }
           
            if(results['artists']) {
                if(document.querySelector('#search-cantores .artist-output')) {
                    results['artists'].forEach(el => {
                        document.querySelector('#search-cantores .artist-output').innerHTML += `
                            <a href="${el.permalink}">
                            <div class="card-list-circle">
                                <img src="${el.thumbnail_url}" alt="${el.title}">
                                <div class="info">
                                    <h3 class="title">${el.name}</h3>
                                </div>
                            </div>
                        </a>     
                        ` 
                    });
                }
            }
         
        });
    }

    openSearch() {
        this.searchInput.style.width = '100%';
                console.log('lll');
        this.searchBtn.innerHTML = this.closeSearchIcon;
        setTimeout(() => {
            this.searchInput.focus();
            this.searchOutput.style.display = 'block';
        }, 300);
        this.isSearchOpen = true;
    }
    
    closeSearch() {
        this.searchInput.style.width = '0';
        this.searchBtn.innerHTML = this.searchIcon;
        this.searchOutput.style.display = 'none';
    
        this.isSearchOpen = false;
    }

    onInputFocus() {
        this.searchOutput.style.display = 'block';
        this.overlay.style.display = 'block';
    }

    onSearchBtnClick() {
        if (window.matchMedia("(max-width: 991px)").matches) {
            if(!this.isSearchOpen){
                this.openSearch();
                this.overlay.style.display = 'block';
            }else{
                this.closeSearch();
                this.overlay.style.display = 'none';
            }    
        }else{
            if(!this.isSearchOpen) {
                setTimeout(() => {
                    this.searchInput.focus();
                    this.searchOutput.style.display = 'block';
                }, 300);
            }else{
                this.searchOutput.style.display = 'none';
            }
          
        }
    }

    onClickOverlay() {
        // this.searchOutput.style.display = 'none';
       
        
        if (window.matchMedia("(max-width: 991px)").matches) {
            this.closeSearch();
        }else{
            this.searchOutput.style.display = 'none'
            this.overlay.style.display = 'none';   
        }
    }

    addHtml() {
        
    
    }

}

export default Search;