class Ads {
    constructor() {
        this.slideIndex = 1;
        this.slides = document.querySelectorAll('.ads-container>div');
        this.prev = document.querySelector('.ads-container .ads-prev');
        this.next = document.querySelector('.ads-container .ads-next');
        if(document.querySelector('.ads-container>div')) {
            this.events();
            this.showSlides(this.slideIndex);
            this.autoSlides();
            if(this.slides.length <= 1){
                this.prev.style.display = "none";
                this.next.style.display = "none";
            }
        }
    

    }

    events() {
        this.prev.addEventListener('click', ()=>{this.plusSlides(-1)});
        this.next.addEventListener('click', ()=>{this.plusSlides(1)});
    }

    plusSlides(num) {
        this.showSlides(this.slideIndex += num);
        clearInterval(this.autoShow);
        this.autoSlides();
    }

    showSlides(num) {
        if (num > this.slides.length) {this.slideIndex = 1} 
        if (num < 1) {this.slideIndex = this.slides.length}

        this.slides.forEach(el =>{
            el.style.display = "none";
        });

        this.slides[this.slideIndex-1].style.display = "block"; 
    }

    autoSlides() {
        this.autoShow = setInterval(()=>{
            this.slideIndex++;
            if (this.slideIndex > this.slides.length) {this.slideIndex = 1} 
            this.showSlides(this.slideIndex);
        },5000)
    }
}

export default Ads;