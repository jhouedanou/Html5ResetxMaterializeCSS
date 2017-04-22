<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?>
	<?php wp_footer(); ?>


<!-- jQuery is called via the WordPress-friendly way via functions.php -->
<script>
	var timer = 0;
    function recheck() {
        var window_top = $(this).scrollTop();
        var window_height = $(this).height();
        var view_port_s = window_top;
        var view_port_e = window_top + window_height;
        
        if ( timer ) {
          clearTimeout( timer );
        }
        
        $('.fly').each(function(){
          var block = $(this);
          var block_top = block.offset().top;
          var block_height = block.height();
          
          if ( block_top < view_port_e ) {
            timer = setTimeout(function(){
              block.addClass('show-block');
            },100);       
          } else {
            timer = setTimeout(function(){
              block.removeClass('show-block');
            },100);          
          }
        });
    }

    $(function(){
      $(window).scroll(function(){
        recheck();
      });
      
      $(window).resize(function(){
         recheck();   
      });
      
      recheck();
    });
</script>
<!-- this is where we put our custom functions -->
<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>

<!-- Asynchronous google analytics; this is the official snippet.
         Replace UA-XXXXXX-XX with your site's ID and domainname.com with your domain, then uncomment to enable.

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-XXXXXX-XX', 'domainname.com');
  ga('send', 'pageview');

</script>
-->

</body>

</html>
