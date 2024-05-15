var header = document.getElementById('header');
var navigationHeader = document.getElementById('navegationHeader');
var content = document.getElementById('content');
var showSidebar = false;

function toggleSidebar(){
    showSidebar = !showSidebar;
    /*console.log(showSidebar);*/

    if(showSidebar){
        navigationHeader.style.marginLeft = '-10vw';
        navigationHeader.style.animationName = 'showSidebar';
        content.style.filter = 'blur(2px)';
    }
    else{
        navigationHeader.style.marginLeft = '-100vw';
        navigationHeader.style.animationName = '';
        content.style.filter = '';
    }
}

function closeSidebar(){

    if(showSidebar){
        toggleSidebar();
    }
}

window.addEventListener('resize', function(event){/*Pegar o tamanho da tela*/
    if(window.innerWidth > 768 && showSidebar){
        toggleSidebar();
    }
});