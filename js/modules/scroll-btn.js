class ScrollBtn {
    constructor() {
        this.scroll_left_btn = document.querySelectorAll('.scroll-left');
        this.scroll_right_btn = document.querySelectorAll('.scroll-right');
        this.scrollNumber = 250;
        this.lastcroll = {num: 0};
        
        if(this.scroll_left_btn[0]) {
            this.events();
        }
    }

    events() {
        this.scroll_left_btn.forEach(item => {
            item.addEventListener('click', ()=>{this.scrollToLeft(item)})
        });
        
        this.scroll_right_btn.forEach(item => {
            item.addEventListener('click', ()=>{this.scrollToRight(item)})
        });
        // this.scroll_left_btn.forEach(item => {item.addEventListener('click',()=>{this.scrollToLeft()})})
        // this.scroll_right_btn.forEach(item => {item.addEventListener('click',()=>{this.scrollToRight()})})
    }

    scrollToLeft(item) {
        let target = item.attributes['target'].value
        let wrapper = document.querySelector(`div#${target}`);

        wrapper.scrollLeft += -this.scrollNumber;
    }
    
    scrollToRight(item) {
        let target = item.attributes['target'].value;
        let wrapper = document.querySelector(`div#${target}`);

        if(this.lastcroll.num == wrapper.scrollLeft)
            wrapper.scrollLeft = 0;
    
        this.lastcroll.num = wrapper.scrollLeft; 
        wrapper.scrollLeft += this.scrollNumber;
    }

}

export default ScrollBtn;