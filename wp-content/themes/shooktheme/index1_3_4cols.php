<?php /**/?><?php get_header(); ?>
<div id="content">

  <div id="topposts">
	  <div id="leftcol">
	    <?php query_posts('posts_per_page=1'); ?>
	    <?php while (have_posts()) : the_post(); ?>
			<div class="feature first-child last-child">
				<?php outputPostHtml("medium"); ?>
			</div>
	    <?php endwhile; ?>
	  </div><!--END TOPLEFTCOL-->
	  <div id="rightcol">
	    <?php query_posts('posts_per_page=3&offset=1'); ?>
	    <?php while (have_posts()) : the_post(); ?>
		    <div class="feature">
				<?php outputPostHtml(); ?>
			</div>
	    <?php endwhile; ?>
	  </div><!--END TOPRIGHTCOL-->
  </div><!--END TOPPOSTS-->
 
  <div id="normal" class="moreposts">
  	<div class="col first-child">
  		<?php query_posts('posts_per_page=3&offset=4'); ?>
	    <?php while (have_posts()) : the_post(); ?>
		    <div class="feature">
				<?php outputPostHtml(); ?>
			</div>
	    <?php endwhile; ?>
  	</div>
  	<div class="col">
   		<?php query_posts('posts_per_page=3&offset=7'); ?>
	    <?php while (have_posts()) : the_post(); ?>
		    <div class="feature">
				<?php outputPostHtml(); ?>
			</div>
	    <?php endwhile; ?>
  	</div>
  	<div class="col">
  		<?php query_posts('posts_per_page=3&offset=10'); ?>
	    <?php while (have_posts()) : the_post(); ?>
		    <div class="feature">
				<?php outputPostHtml(); ?>
			</div>
	    <?php endwhile; ?>
  	</div>
  	<div class="col">
  		<?php query_posts('posts_per_page=3&offset=13'); ?>
	    <?php while (have_posts()) : the_post(); ?>
		    <div class="feature">
				<?php outputPostHtml(); ?>
			</div>
	    <?php endwhile; ?>
  	</div>
  </div>
  
</div><!--END CONTENT-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php
function getImg($imgSize = "medium") {
    $values = get_post_custom_values("_gt_header_image");
    return get_image_tag($values[0], "noImageAvailable", "someTitleHere", "left", $imgSize);
}
 
function outputPostHtml($imgSize = "thumbnail") {
	echo getImg($imgSize);
	echo '<div class="textlabel">';
    echo '<div class="date">'; the_time('M jS, Y'); echo '</div>';
	echo '<h3><a href="'; the_permalink(); echo '">'; the_title(); echo '</a></h3>';
	echo '</div>';
}
?>
