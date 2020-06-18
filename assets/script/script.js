var tab_anc = 'inscription'; 
change_tab(tab_anc);
function change_tab(name){
    document.getElementById(`tab-${tab_anc}`).className = 'tab';
    document.getElementById(`tab-${name}`).className = 'tab';
    document.getElementById(`tab-content-${tab_anc}`).style.display = 'none';
    document.getElementById(`tab-content-${name}`).style.display = 'block';
    tab_anc = name;
}
/* const content = document.querySelector('#categories');
const sideBarBody = document.querySelector('#burger-sidebar-body');
const button = document.querySelector('#burger-button');
const activatedClass = 'burger-activated';
sideBarBody.innerHTML = categories.innerHTML;
let burger = document.querySelector('.burger');

button.addEventListener('click', function(e){
    e.preventDefault();
    /* console.log(burger.parentNode); */
 /*    this.parentNode.classList.add(activatedClass);
}) */ 