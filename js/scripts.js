$(function(){

	console.log("It's working");
stickynav();
smoothScroll();
prettyForm();
mobileHamburger();
addHoverToPHP();
});





function stickynav(){
var  mn = $(".mainNav");
    mns = "mainNavScrolled";
    hdr = $('div.hero').height();

$(window).scroll(function() {
  if( $(this).scrollTop() > hdr ) {
    mn.addClass(mns);
  } else {
    mn.removeClass(mns);
  }
});

}

function smoothScroll(){
	$('header a').smoothScroll();
	$('nav.mainNav a').smoothScroll();
}

function prettyForm(){
  $('.entry').on('focus', function(){
    $(this).closest('p').children('label').addClass('hello');
  });

  $('label').on('click', function(){
    $(this).addClass('hello');
  });

  $('input[type=submit]').on('click', function(){
    $(this).addClass('submitted');
  });
}

function collapseMenu(){ //called in mobileHamburger()
  $('ul#menu-main-menu a').on('click', function(){
    var activeTF = $('.hamburger').hasClass('active');
    if (activeTF === true) {
      $('.hamburger').removeClass('active');
      $('nav.mainMenu').removeClass('show');
    } else {
      console.log('It is closed');
    }
  });
}

function mobileHamburger(){
  $('.hamburger').on('click', function(){
    $(this).toggleClass('active');
    $('nav.mainMenu').toggleClass('show');
    $('nav.mobileSocial').toggleClass('show');
    $('body').toggleClass('controlScroll');
  });
  //if hamburger class is active 
  collapseMenu();
} //end of mobileHamburger

function addHoverToPHP(){
  $('ul#menu-main-menu a').addClass('hvr-underline-from-left');
}


