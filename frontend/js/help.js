const menu = document.querySelector('.mobile-menu')
const close = document.querySelector('.mobile-menu-exit')
const nav = document.querySelector('nav')

menu.addEventListener('click',() => {
    nav.classList.add('open-nav')
})

close.addEventListener('click',() => {
    nav.classList.remove('open-nav')
})