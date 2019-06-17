/*** BUTTON-TO-TOP ***/
$(window).scroll(function() {
    if ($(this).scrollTop() >= 400) {
        $('#return-to-top').fadeIn(200); 
    } else {
        $('#return-to-top').fadeOut(200);
    }
});
$('#return-to-top').click(function() { 
    $('body,html').animate({
        scrollTop : 0 
    }, 500);
});

/*** RESPONSIVE NAVBAR ***/
const navSlide = () => {
    const bars = document.querySelector('.bars');
    const nav = document.querySelector('.navlinks');
    /*const navLinks = document.querySelectorAll('.navlinks li');*/
    
    bars.addEventListener('click', () => {
        //toggle nav
        nav.classList.toggle('nav-active');
    
        //animate links
        /* navLinks.forEach((link, index) => {
            if(link.style.animation) {
                link.style.animation = '';
            }else {
                link.style.animation = 'navLinkFade 0.5s ease forwards ${index / 7 + 1}s';
            }         
        });*/
        
        //toggle bars
        bars.classList.toggle('toggle');
    });
}

navSlide();

/*** PRELOADER ***/