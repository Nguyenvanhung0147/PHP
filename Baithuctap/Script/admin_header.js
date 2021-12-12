const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);    
// setting navbar
const items = $$('.sidebar-menu-item');

items.forEach((item,index) => {
    item.onclick = function(){
        $('.sidebar-menu-item.active').classList.remove('active');
        this.classList.add('active');
    }
});