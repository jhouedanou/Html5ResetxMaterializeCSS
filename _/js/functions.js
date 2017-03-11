// Browser detection for when you get desparate. A measure of last resort.
// http://rog.ie/post/9089341529/html5boilerplatejs

// var b = document.documentElement;
// b.setAttribute('data-useragent',  navigator.userAgent);
// b.setAttribute('data-platform', navigator.platform);

// sample CSS: html[data-useragent*='Chrome/13.0'] { ... }


// remap jQuery to $
(function($) {
    $(window).load(function() {
        $('.autoplay').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
        $('.pueblo').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
        $('.carousel-control.right').trigger('click');
    });
    $(document).ready(function() {
        $('.insidedomaine a').click(function(event) {
            /* Act on the event */
            $('.domino').fadeOut();
            $('.avirex').css('top', 0);
        });
        $('.marquee').marquee({
            //speed in milliseconds of the marquee
            duration: 25000,
            //gap in pixels between the tickers
            gap: 0,
            //time in milliseconds before the marquee will start animating
            delayBeforeStart: 0,
            //'left' or 'right'
            direction: 'left',
            //true or false - should the marquee be duplicated to show an effect of continues flow
            duplicated:  false
        });
        $('#responsiveTabsDemo').responsiveTabs();
        $('#rss-2 > ul').cycle({
            slides: 'li'
        });
        $('#rss-3 > ul').cycle({
            slides: 'li'
        });
        $('.grid').isotope({
            itemSelector: '.grid-item'
        });

    });

}(window.jQuery || window.$));
jQuery(function($) {

    $(document).ready(function() {
        // $('#responsiveTabsDemo').responsiveTabs({
        //     startCollapsed: 'accordion'
        // });
        $('.grid').isotope({
            itemSelector: '.grid-item',
            masonry: {
                // columnWidth: 100
            }
        });
        // superFish

        $('ul.sf-menu').supersubs({

            minWidth: 16, // minimum width of sub-menus in em units

            maxWidth: 40, // maximum width of sub-menus in em units

            extraWidth: 1 // extra width can ensure lines don't sometimes turn over

        })

        .superfish(); // call supersubs first, then superfish

    });

});
