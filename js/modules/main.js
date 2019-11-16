class main {
    constructor() {
        const searchBtn = document.querySelector('.search-btn');
const searchInput = document.querySelector('.search-input');
const searchOutput = document.querySelector('#search-output');
const searchIcon = document.querySelector('#search-icon');

const lefitMenuBtn = document.querySelector('.lefit-menu-btn');
const lefitMenuIcon = document.querySelector('#lefit-menu-icon');
const lefitMenu = document.querySelector('.lefit-menu');

const postContainer = document.querySelector('.post-container');
const wrapperClass = document.querySelector('.wrapper');

const blockBodyOpenMenu  = document.querySelector('.block-body-open-menu ');
let isSearchOpen = false;    

searchBtn.addEventListener('click', ()=> {
    if (window.matchMedia("(max-width: 991px)").matches) {
        if(!isSearchOpen){
            openSearch();
            blockBodyOpenMenu.style.display = 'block';
        }else{
            clossSearch();
            blockBodyOpenMenu.style.display = 'none';
        }    
    }else{
        setTimeout(() => {
            searchInput.focus();
            searchOutput.style.display = 'block';
        }, 300);
    }
});

searchInput.addEventListener('focus', ()=>{
    searchOutput.style.display = 'block';
    blockBodyOpenMenu.style.display = 'block';
    
});

/**OPEN LEFT MENU */
let isLeftMenuOpen = false;
blockBodyOpenMenu.addEventListener('click', ()=>{
    if (window.matchMedia("(max-width: 991px)").matches) {
        clossLeftMenu();
        clossSearch();
        blockBodyOpenMenu.style.display = 'none';
    }else {
        searchOutput.style.display = 'none';
        blockBodyOpenMenu.style.display = 'none';
    }

});

lefitMenuBtn.addEventListener('click', ()=> {
    if (window.matchMedia("(max-width: 991px)").matches) {
        if(!isLeftMenuOpen){
            openLeftMenu();

            blockBodyOpenMenu.style.display = 'block';
        }else{
            clossLeftMenu();

            blockBodyOpenMenu.style.display = 'none';
        }    
    }else{
        //a logica funciona aou contrarios porque o menu no desktop vai inciar aberto 
        if(isLeftMenuOpen){
            document.querySelector('section.main').style.paddingLeft = '200px';
            openLeftMenu(20);

            isLeftMenuOpen = false;
        }else{
            document.querySelector('section.main').style.paddingLeft = '0px';
            clossLeftMenu();

            isLeftMenuOpen = true;
        }
        
    } 
});


/** scroll-btn */

const scroll_left_btn = document.querySelectorAll('.scroll-left');
const scroll_right_btn = document.querySelectorAll('.scroll-right');
const scrollNumber = 250;


scroll_left_btn.forEach(item => {
    item.addEventListener('click', ()=>{
        let target = item.attributes['target'].value
        let wrapper = document.querySelector(`div#${target}`);

        wrapper.scrollLeft += -scrollNumber;
    });
});

scroll_right_btn.forEach(item => {
    let lastcroll = {num: 0}
    item.addEventListener('click', ()=>{
        let target = item.attributes['target'].value;
        let wrapper = document.querySelector(`div#${target}`);

        if(lastcroll.num == wrapper.scrollLeft)
            wrapper.scrollLeft = 0;
    
        lastcroll.num = wrapper.scrollLeft; 
        wrapper.scrollLeft += scrollNumber;
    });
});
}
  

 
 
openSearch() {
    searchInput.style.width = '100%';
    searchIcon.className = 'fas fa-arrow-right';

    setTimeout(() => {
        searchInput.focus();
        searchOutput.style.display = 'block';
    }, 300);
    isSearchOpen = true;
}

clossSearch() {
    searchInput.style.width = '0';
    searchIcon.className = 'fas fa-search';
    searchOutput.style.display = 'none';

    isSearchOpen = false;
}



openLeftMenu(val) {
    if(val) thewith = val; 
    else thewith = '80'; 
    lefitMenu.style.width = `${thewith}%`;
    isLeftMenuOpen = true;
}

clossLeftMenu() {
    lefitMenu.style.width = '0%';    
    isLeftMenuOpen = false;
}

}

export default main;