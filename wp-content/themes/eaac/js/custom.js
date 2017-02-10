jQuery(document).ready(function () {

	jQuery("#brand_sldr").owlCarousel({

		autoPlay: 5000, //Set AutoPlay to 3 seconds
		autoplayHoverPause: true,
		navigation: false,
		items: 5,
		itemsDesktop: [1199, 5],
		itemsDesktopSmall: [979, 3],
		itemsTablet: [768, 3],
		itemsMobile: [479, 1]
	});
});
///////////////////////////////////////////////////////////////////////////////////////

jQuery(function (jQuery) {

	//Preloader
	var preloader = jQuery('.preloader');
	jQuery(window).load(function () {
		preloader.remove();
	});
});


var winwidth = jQuery(window).width();
if ( winwidth => 1200){
 
        var stickyNavTop = jQuery('body').offset().top;
       
        var stickyNav = function () {
            var scrollTop = jQuery(window).scrollTop(); 
            if (scrollTop > 10) {
                jQuery('header').addClass('sticky');
            } else {
                jQuery('header').removeClass('sticky');
            }

        };

        stickyNav();
       
        jQuery(window).scroll(function () {
            stickyNav();
        });
    };
	
var wow = new WOW({
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: true, // trigger animations on mobile devices (default is true)
            live: true, // act on asynchronously loaded content (default is true)
            callback: function (box) {
                // the callback is fired every time an animation is started
                // the argument that is passed in is the DOM node being animated
            },
            scrollContainer: null // optional scroll container selector, otherwise use window
        });
        wow.init();

 
        document.documentElement.addEventListener('touchstart', function (event) {
            if (event.touches.length > 1) {
                event.preventDefault();
            }
        }, false);
