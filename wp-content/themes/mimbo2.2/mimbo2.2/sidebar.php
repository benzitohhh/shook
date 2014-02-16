<?php /**/?>	<div id="sidebar">
<div style="margin-top:15px;">
<!--/* OpenX Javascript Tag v2.6.4 */-->

<!--/*
  * The backup image section of this tag has been generated for use on a
  * non-SSL page. If this tag is to be placed on an SSL page, change the
  *   'http://www.shook.fm/ads/www/delivery/...'
  * to
  *   'https://www.shook.fm/ads/www/delivery/...'
  *
  * This noscript section of this tag only shows image banners. There
  * is no width or height in these banners, so if you want these tags to
  * allocate space for the ad before it shows, you will need to add this
  * information to the <img> tag.
  *
  * If you do not want to deal with the intricities of the noscript
  * section, delete the tag (from <noscript>... to </noscript>). On
  * average, the noscript tag is called from less than 1% of internet
  * users.
  */-->

<script type='text/javascript'><!--//<![CDATA[
   var m3_u = (location.protocol=='https:'?'https://www.shook.fm/ads/www/delivery/ajs.php':'http://www.shook.fm/ads/www/delivery/ajs.php');
   var m3_r = Math.floor(Math.random()*99999999999);
   if (!document.MAX_used) document.MAX_used = ',';
   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
   document.write ("?zoneid=1");
   document.write ('&amp;cb=' + m3_r);
   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
   document.write ("&amp;loc=" + escape(window.location));
   if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
   if (document.context) document.write ("&context=" + escape(document.context));
   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
   document.write ("'><\/scr"+"ipt>");
//]]>--></script><noscript><a href='http://www.shook.fm/ads/www/delivery/ck.php?n=ac34a44f&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://www.shook.fm/ads/www/delivery/avw.php?zoneid=1&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=ac34a44f' border='0' alt='' /></a></noscript></div>


		<ul id="sidelist">
		
	<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
		<?php endif; ?>
		
<?php if ( is_home() ) { ?>
<?php
// this is where 10 headlines from the current category get printed	  
if ( is_single() ) :
global $post;
$categories = get_the_category();
foreach ($categories as $category) :
?>
<li><h2>More from this category</h2>
<ul class="bullets">
<?php
$posts = get_posts('numberposts=10&category='. $category->term_id);
foreach($posts as $post) :
?>
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

<?php endforeach; ?>

<li><strong><a href="<?php echo get_category_link($category->term_id);?>" title="View all posts filed under <?php echo $category->name; ?>">Archive for '<?php echo $category->name; ?>' &raquo;</a></strong></li>
</ul>
</li>
<?php endforeach; endif ; ?>




<li><?php 
	// this is where the name of the News (or whatever) category gets printed	  
	//wp_list_categories('include=4&title_li=&style=none'); 
	wp_list_bookmarks('title_before=<h3>&title_after=</h3>&category=88&category_before=<ul class="bullets">&category_after=</ul>'); ?>

 	</li>

<?php } ?>

	
	<li><h3>Browse Archives</h3>
	<form id="archiveform" action="">
<select name="archive_chrono" onchange="window.location = 
(document.forms.archiveform.archive_chrono[document.forms.archiveform.archive_chrono.selectedIndex].value);">
	<?php get_archives('monthly','','option'); ?>
	</select>
	</form>
	</li>
	
	
<li><h3>Browse Categories</h3>
<ul class="subnav">
<?php wp_list_categories('title_li='); ?>
</ul>
</li>


<li><h3>Join the SHOOK list</h3>
<?php
            $content = apply_filters('the_content', '<!--phplist form-->');
            echo $content;?> 
</li>

<li><h3>Contributors</h3>

<ul class="bullets">
<?php wp_list_authors
('exclude_admin=0&show_fullname=1&hide_empty=1&feed_image=' .
get_bloginfo('template_url') . '/images/rss.gif&feed=XML'); ?> 
 </ul>
</li>





</ul><!--END SIDELIST--> 
</div><!--END SIDEBAR-->
