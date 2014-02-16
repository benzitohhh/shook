<?php /**/?><?php get_header(); ?>
<?php
	// HACK: TODO: fix me
	$this_wp_query = $wp_query; // save current wp_query for use later
?>

<div id="content">
	
	<?php require('leftcontent.php'); ?>
	
	<!-- maincontent -->
	<?php
		// HACK: TODO: fix me
		$wp_query = $this_wp_query;
		$post = $posts[0];
	?>
	<div id="maincontent" class="col">
		<?php is_tag(); ?>
		<?php
			if (have_posts()) :
				the_post(); // HACK to get archive attributes
		?>
				<div class="wgreylinebottom">
					<div class="sectiontitle">
					 	  <?php /* If this is a category archive */ if (is_category()) { ?>
							Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category
					 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
							<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
					 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
							<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
					 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
							<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
					 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
							<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
						  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
							Author Archive: <?php the_author_posts_link('namefl'); ?>
					 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
							<h2 class="pagetitle">Blog Archives</h2>
					 	  <?php } ?>
					 	  (<?php echo getNumSearchResults(); ?> results )
			 	  	</div>
			 	  	
				</div>
				
				<div class="pagination">
				<?php
					get_pagination();
				?>
				</div> 
				
				<?php
					// HACK: TODO: fix me
					$post = $posts[0];
				?>
				<div class="wgreylinebottom">
					<?php
						while (have_posts()) {
							outputNormalItemBoxWithMeta(); // normal items with metadata
						}
					 ?>
				</div>
		<?php else : ?>
			<div class="wgreylinebottom">
				<h2 class="center">Not Found</h2>
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</div>
		<?php endif; ?>
			
		<div class="pagination">
		<?php
			get_pagination();
		?>
		</div> 
	</div>

	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
