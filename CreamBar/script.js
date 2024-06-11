const header = document.querySelector('header');
function fixedNavbar(){
    header.classList.toggle('scroll', window.pageYOffset > 0)
}
fixedNavbar();
window.addEventListener('scroll', fixedNavbar);

let menu = document.querySelector('#menu-btn');
let userBtn = document.querySelector('#user-btn');

menu.addEventListener('click', function(){
    let nav = document.querySelector('.navbar');
    nav.classList.toggle('active');
})
userBtn.addEventListener('click', function(){
    let userBox = document.querySelector('.user-box');
    userBox.classList.toggle('active');
})
/*----home page slider----*/
"use strict"
const leftArrow = document.querySelector('.left-arrow .bxs-left-arrow'),
    rightArrow = document.querySelector('.right-arrow .bxs-right-arrow'),
    slider = document.querySelector('.slider');
/*----scroll to right----*/   
function scrollRight(){
    if(slider.scrollWidth - slider.clientWidth === slider.scrollLeft) {
        slider.scrollTo({
            left: 0,
            behavior: "smooth"
        });
    }else{
        slider.scrollBy({
            left: window.innerWidth,
            behavior: "smooth"
        })
    }
}
/*----scroll to left----*/  
function scrollLeft(){
    slider.scrollBy({
        left: -window.innerWidth,
            behavior: "smooth"
    })
}
let timerId = setInterval(scrollRight, 7000);

/*----reset timer to scroll right----*/
function resetTimer(){
    clearInterval(timerId);
    timerId = setInterval(scrollRight, 7000);
}
/*----scroll event----*/
slider.addEventListener('click', function(ev){
    if(ev.target === leftArrow){
        scrollLeft();
        resetTimer();
    }
})

slider.addEventListener('click', function(ev){
    if(ev.target === rightArrow){
        scrollRight();
        resetTimer();
    }
})
/*----testimonial slider----*/
let slides = document.querySelectorAll('.testimonial-item');
let index = 0;

function showSlide(idx) {
    slides.forEach((slide, i) => {
        slide.classList.remove('active');
        if (i === idx) {
            slide.classList.add('active');
        }
    });
}

function nextSlide() {
    index = (index + 1) % slides.length;
    showSlide(index);
}

function prevSlide() {
    index = (index - 1 + slides.length) % slides.length;
    showSlide(index);
}

// Initialize the first slide
showSlide(index);

document.querySelector('.left-arrow').addEventListener('click', function() {
    prevSlide();
});

document.querySelector('.right-arrow').addEventListener('click', function() {
    nextSlide();
});

