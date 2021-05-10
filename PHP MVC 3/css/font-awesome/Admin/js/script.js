////////////////////Show Hide Password//////////////////////////////
$('.toggle-password').click(function() {

  var input = $($(this).attr('toggle'));
  if (input.attr('type') == "password") {
    input.attr('type', 'text');
  } else {
    input.attr('type', 'password');
  }
});

	
	function sticky_header() {
		var a = document.getElementById("sticky");
    var header_height = $('#text-overlay').innerHeight()/ 2;
    var scrollTop = jQuery(window).scrollTop();;
    if (scrollTop > header_height) {
		a.classList.add('stick');
		$('nav').removeClass('main-nav');
		$('nav').addClass('sticky-header');
		$('.logo-wrapper img').attr("src", "images/Login/logo.png");

    } else {
		a.classList.remove('stick');
        $('nav').removeClass('sticky-header');
		$('nav').addClass('main-nav');
	$('.logo-wrapper img').attr("src", "images/Login/top-logo.png");
    }
}

$(function () {
   sticky_header();
});

$(window).scroll(function () {
  sticky_header();  
});
$(window).resize(function () {
  sticky_header();
});
	
	
