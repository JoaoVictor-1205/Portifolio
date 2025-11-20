let btnMenu = document.getElementById('btn_menu')
let menu = document.getElementById('menu-mobile')
let ovelay = document.getElementById('overlay-menu')

btnMenu.addEventListener('click', ()=>{
    menu.classList.add('abrir-menu')
})

menu.addEventListener('click', ()=>{
    menu.classList.remove('abrir-menu')
})

ovelay.addEventListener('click', ()=>{
    menu.classList.remove('abrir-menu')
})