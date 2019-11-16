class Menu {
    constructor() {
        this.lefitMenuBtn = document.querySelector('.lefit-menu-btn');
        this.lefitMenuIcon = document.querySelector('#lefit-menu-icon');
        this.lefitMenu = document.querySelector('.lefit-menu');

        this.postContainer = document.querySelector('.post-container');
        this.wrapperClass = document.querySelector('.wrapper');
        this.wrapperLoop = document.querySelector('.wrapper-loop');
        this.isLeftMenuOpen = false;

        this.overlay  = document.querySelector('.main-overlay');

        this.events();
    }

    events() {
        this.lefitMenuBtn.addEventListener('click', ()=>{this.open_closeLeftMenu()});
        this.overlay.addEventListener('click', ()=>{this.onClickOverlay()});
    }

    open_closeLeftMenu() {
        //function for mobail
        this.openLeftMenu = ()=> {
            this.isLeftMenuOpen = true;
            this.lefitMenu.style.width = "80%";
        }

        this.clossLeftMenu = ()=> {
            this.lefitMenu.style.width = '0%';    
            this.isLeftMenuOpen = false;
        }

        //function for desktop
        this.openDeskLeftMenu = ()=>{
            this.isLeftMenuOpen = false;
            this.lefitMenu.style.width = "20%"; 

        }
        
        this.clossDeskLeftMenu = ()=> {
            this.lefitMenu.style.width = '0%';    
            this.isLeftMenuOpen = true;
        }

        if (window.matchMedia("(max-width: 991px)").matches){
            //for mobail and tablet
            if(!this.isLeftMenuOpen){
                this.openLeftMenu();
                this.overlay.style.display = 'block';
            }else{
                this.clossLeftMenu();
                this.overlay.style.display = 'none';
            }
        }else{
            //for desktop
            //a logica funciona aou contrarios porque o menu no desktop vai inciar aberto 
            if(this.isLeftMenuOpen){
                document.querySelector('section.main').style.paddingLeft = '200px';
                this.openDeskLeftMenu();
            }else{
                document.querySelector('section.main').style.paddingLeft = '0px';
                this.clossDeskLeftMenu();
            }
        }

    }

    onClickOverlay() {
        if (window.matchMedia("(max-width: 991px)").matches) {
            this.lefitMenu.style.width = '0%';    
            this.isLeftMenuOpen = false;
            this.overlay.style.display = 'none'; 
        }else{
            this.overlay.style.display = 'none';   
        }
    }
}

export default Menu;