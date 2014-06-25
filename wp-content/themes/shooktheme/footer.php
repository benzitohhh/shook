<?php /**/?></div><!-- /end of container -->
<?php
	// PROBLEM: outercontainer height=268 is causing footer to appear in the middle of the page in vista...
	// TEMPORARY HACK: remove outercontainer element on vista
	// TODO: find a better solution! (i.e. need a vista machine!)
 	if(!userAgentIe()) {
?>
</div><!-- /end of outercontainer -->
<?php
	}
?>
<div id="footer">
 
  
  
  &#169; <?php echo date('Y'); ?> <strong><?php bloginfo('name'); ?></strong> | 

10 Fairlawns, London N11 2DH | <strong>Tel:</strong> +44 208 292 4533
  <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->




	 <?php wp_footer(); ?>

</div>


<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-5408761-1");
pageTracker._trackPageview();
</script>
</body>
</html>

