$(function(){

	console.log("It's working");
stickynav();
smoothScroll();
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
