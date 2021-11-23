document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.tab')) {
        let buttonTab = document.querySelector('.tab__button');
        let tab = document.querySelector('.tab');
    
        function toggleTab() {
            buttonTab.classList.toggle('tab__button_active');
            let tabs = document.querySelectorAll('.tab__item');
            tabs.forEach(function(item){
                item.classList.toggle('tab__item_active')
    
            })
            let content = document.querySelectorAll('.tab-content__item');
            content.forEach(function(item){
                item.classList.toggle('tab-content__item_active')
            })
        }
    
        tab.addEventListener('click', function(event){
            let target = event.target;
            
            if (target.tagName == "H2"){
                if(!target.parentElement.classList.contains('tab__item_active')){
                    toggleTab();
                }
            }
        })
        buttonTab.addEventListener('click', function(){
            toggleTab();
        })
    }
})