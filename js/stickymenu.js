( function( $ ) {
	$(document).ready(function() {
		  $(window).scroll(function () {
			 
			var h = $('#navbar').height()+60;
			
			if ($(window).scrollTop() > h) {
			  $('#navbar').addClass('navbar-fixed-top');
			}

			if ($(window).scrollTop() < h) {
			  $('#navbar').removeClass('navbar-fixed-top');
			}
		  });
		});
} )( jQuery );