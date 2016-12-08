// Browser detection for when you get desparate. A measure of last resort.
// http://rog.ie/post/9089341529/html5boilerplatejs

// var b = document.documentElement;
// b.setAttribute('data-useragent',  navigator.userAgent);
// b.setAttribute('data-platform', navigator.platform);

// sample CSS: html[data-useragent*='Chrome/13.0'] { ... }


// remap jQuery to $
(function ($) {

	/* trigger when page is ready */
	$(document).ready(function (){

		// your functions go here


	});

}(window.jQuery || window.$));
jQuery(function($){

    $(document).ready(function(){

      // superFish

       $('ul.sf-menu').supersubs({

       minWidth:    16, // minimum width of sub-menus in em units

       maxWidth:    40, // maximum width of sub-menus in em units

       extraWidth:  1 // extra width can ensure lines don't sometimes turn over

     })

    .superfish(); // call supersubs first, then superfish

     });

});
