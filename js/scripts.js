$(function(){

	console.log("It's working");
stickynav();
smoothScroll();
prettyForm();
mobileHamburger();
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

function mobileHamburger(){
  $('.hamburger').on('click', function(){
    $(this).toggleClass('active');
    $('nav.mainMenu').toggleClass('show');
  });
}
