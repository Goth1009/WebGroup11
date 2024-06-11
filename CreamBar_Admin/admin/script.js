const header = document.querySelector('header');

function fixedNavbar() {
  header.classList.toggle('fixed', window.pageYoffset > 0);
}

let menu = document.querySelector('#menu-btn');

menu.addEventListener('click', function (){
  let nav = document.querySelector('.navbar')
  nav.classList.toggle('active');
})

let userBtn = document.querySelector('#user-btn');

userBtn.addEventListener('click', function (){
  let userBox = document.querySelector('.profile-detail')
  userBox.classList.toggle('active');
})

