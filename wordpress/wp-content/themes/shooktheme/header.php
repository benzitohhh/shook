<?php /**/?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> 
&raquo; <?php 
foreach((get_the_category()) as $cat) { 
echo $cat->cat_name . ' '; 
} ?> <?php } ?> 

<?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/nav.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/print.css" type="text/css" media="print" />

<?php
 	if(userAgentIe()) { // special CSS for IE
?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/ie.css" type="text/css" media="screen" />
<?php
	}
?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>

<script type="text/javascript" 
  src="http://www.shook.fm/content/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" 
  src="http://www.shook.fm/content/jquery.embedquicktime.js"></script>
<script type="text/javascript">
  jQuery.noConflict();
  jQuery(document).ready(function() {
    jQuery.embedquicktime({
      jquery: 'http://www.shook.fm/content/jquery-1.2.3.pack.js', 
      plugin: 'http://www.shook.fm/content/jquery.embedquicktime.js'
    });
  });
</script>

</head>

<body<?php if ( is_home() ) { ?> id="home"<?php } ?>>

<?php
	// PROBLEM: outercontainer height=268 is causing footer to appear in the middle of the page in vista...
	// TEMPORARY HACK: remove outercontainer element on vista
	// TODO: find a better solution! (i.e. need a vista machine!)
 	if(!userAgentIe()) {
?>
<div id="outercontainer">
<?php
	}
?>

<div id="container">

	<!-- start of header -->
	<div id="header">
		<a id="headerpic" href="<?php echo get_option('home'); ?>/">
			<span class="hide"/>
		</a>
		
		<div id="topright">
			<script type='text/javascript'><!--//<![CDATA[
			   var m3_u = (location.protocol=='https:'?'https://www.shook.fm/ads/www/delivery/ajs.php':'http://www.shook.fm/ads/www/delivery/ajs.php');
			   var m3_r = Math.floor(Math.random()*99999999999);
			   if (!document.MAX_used) document.MAX_used = ',';
			   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
			   document.write ("?zoneid=8");
			   document.write ('&amp;cb=' + m3_r);
			   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
			   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
			   document.write ("&amp;loc=" + escape(window.location));
			   if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
			   if (document.context) document.write ("&context=" + escape(document.context));
			   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
			   document.write ("'><\/scr"+"ipt>");
			//]]>--></script>		
		</div>
		
		<!--  
		<a id="topright" href="<?php echo get_option('home'); ?>/">
			<span class="hide"/>
		</a>
		-->
		
	</div>
	<!-- end of header -->
	
	<!-- navibar -->
	<div id="navibar">
		<div id="navibarlabels">
			<a href="<?php echo get_option('home'); ?>/" id="home"><span/></a>
			<a href="<?php echo get_option('home'); ?>/what-it-is/" title="About" id="about"><span/></a>
			<a href="<?php echo get_option('home'); ?>/category/news/" title="News" id="news"><span/></a>
			<a href="<?php echo get_option('home'); ?>/category/features" title="Features" id="features"><span/></a>
			<a href="<?php echo get_option('home'); ?>/category/listen" title="Listen" id="listen"><span/></a>
			<a href="<?php echo get_option('home'); ?>/category/reviews" title="Reviews" id="reviews"><span/></a>
			<a href="<?php echo get_option('home'); ?>/category/destination-out" title="Clubs, shows and events in your area" id="events"><span/></a>
			<a href="<?php echo get_option('home'); ?>/shop" title="Shop" id="shop"><span/></a>
		</div>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	</div>
	<!-- end of navibar -->
	
	
	

	