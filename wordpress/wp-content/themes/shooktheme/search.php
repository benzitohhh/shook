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

		<div class="wgreylinebottom">
			<div class="sectiontitle">Search Results for "<?php the_search_query(); ?>" (<?php echo getNumSearchResults(); ?> matches )</div>
		</div>
		
		<div class="pagination">
		<?php
			get_pagination();
		?>
		</div> 
		
		<div class="wgreylinebottom">
			<?php
			// loop through and output
			if (have_posts()) {
				while (have_posts()) {
					outputNormalItemBoxWithMeta(); // normal items with metadata
				}
			} else {
				echo '<h2 class="center">No posts found. Try a different search?</h2>';
			}
			?>
		</div>
		
		<?php //output_paging_navigation(); ?>
		
		<div class="pagination"> 
		<?php
			get_pagination();
		?>
		</div> 
	</div>
	
	<?php get_sidebar(); ?>
	
</div>

<?php get_footer(); ?>