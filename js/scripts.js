$(function(){

	console.log("It's working");
    stickynav();
    smoothScroll(1000);
    prettyForm();
    mobileHamburger();
    addHoverToPHP();
    focusStatesOnScroll();
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

// function smoothScroll(){
// 	$('header a').smoothScroll();
// 	$('nav.mainNav a').smoothScroll();
// }

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

function smoothScroll(duration){

  $('ul#menu-main-menu a[href^="#"]').on('click', function(event) {
    var target = $( $(this).attr('href') );
    
    console.log(target);
    //smoothscroll!!! the shortest version I have ever seen, why did I ever download it!!! ridonc.
          event.preventDefault();
          $('html, body').animate({
              scrollTop: target.offset().top
          }, duration);
    });
}

function focusStatesOnScroll(){
    var aChildren = $("ul#menu-main-menu li").children(); // find the a children of the list items
    console.log(aChildren);
    var aArray = []; // create the empty aArray
    for (var i=0; i < aChildren.length; i++) {    
        var aChild = aChildren[i];
        var ahref = $(aChild).attr('href');
        aArray.push(ahref);

    } // this for loop fills the aArray with attribute href values
    // aArray.splice(3,1);
    console.log(aArray);
    $(window).scroll(function(){
        var windowPos = $(window).scrollTop(); // get the offset of the window from the top of page
        var windowHeight = $(window).height(); // get the height of the window
        var docHeight = $(document).height();
        // console.log(windowPos, windowHeight, docHeight)
        for (var i=0; i < aArray.length; i++) {
            var theID = aArray[i];
            console.log(theID);
            var divPos = $(theID).offset().top; // get the offset of the div from the top of page
            divPos -= 250;
            var divHeight = $(theID).height(); // get the height of the div in question
            console.log(divPos, divHeight);
            if (windowPos >= divPos && windowPos < (divPos + divHeight)) {
                $("a[href='" + theID + "']").addClass("nav-active");
            } else {
                $("a[href='" + theID + "']").removeClass("nav-active");
            }
        }

        if(windowPos + windowHeight == docHeight) {
            if (!$("nav li:last-child a").hasClass("nav-active")) {
                var navActiveCurrent = $(".nav-active").attr("href");
                $("a[href='" + navActiveCurrent + "']").removeClass("nav-active");
                $("nav li:last-child a").addClass("nav-active");
            }
        }
    });
}
