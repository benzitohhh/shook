<?php /**/?><?php get_header(); ?>
<?php
	// HACK: TODO: fix me
	$this_wp_query = $wp_query; // save current wp_query for use later
?>
<div id="content">

		<!-- leftcontent -->
		<div id ="leftcontent" class="firstcol col">
		
			<?php if($cat!=4) { ?>
			<div class="wgreylinebottom">
				<?php
					$numItems = 5;
					shook_query($numItems, $offset=0, $category=4 /* NEWS */);
					outputHeadlineList($numItems, "NEWS", "none");
				?>
			</div>
			<?php } ?>
			
			<?php if($cat!=3) { ?>
			<div class="wgreylinebottom">
				<?php
					$numItems = 5;
					shook_query($numItems, $offset=0, $category=3 /* FEATURES */);
					outputHeadlineList($numItems, "FEATURES", "none");
				?>
			</div>
			<?php } ?>
		
			<?php if($cat!=5) { ?>
			<div class="wgreylinebottom">
				<div class="sectiontitle">MIXTAPE</div>
				<?php
					shook_query(1, $offset=0, $category=5 /*LISTEN*/);
					outputSpecialItemBox(false);
				?>
			</div>
			<?php } ?>
			
			<?php if($cat!=6) { ?>
			<div class="wgreylinebottom">
				<?php
					$numItems = 5;
					shook_query($numItems, $offset=0, $category=6 /*LIVE*/);
					outputHeadlineList($numItems, "DESTINATION OUT", "none");
				?>
			</div>
			<?php } ?>
			
			<?php if($cat!=7) { ?>
			<div class="wgreylinebottom">
				<?php
					$numItems = 5;
					shook_query($numItems, $offset=0, $category=7 /*REVIEWS*/);
					outputHeadlineList($numItems, "REVIEWS", "none", $showTinyPic=true);
				?>
			</div>
			<?php } ?>
		</div>
		<!-- /end of leftcontent -->
	
	
	<!-- maincontent -->
	<?php
		// HACK: TODO: fix me
		$wp_query = $this_wp_query;
		$post = $posts[0];
	?>
	<div id="maincontent" class="col">
		
		<div class="wgreylinebottom">
			<?php
			// loop through and output		
			while (have_posts()) {
				outputNormalItemBoxWithMeta(); // normal items with metadata
			}
			?>
		</div>
		
		<?php //output_paging_navigation(); TODO: delete these functions ?>
		
		<div class="pagination"> 
		<?php
			// error_log("max_num_pages = " . $wp_query->max_num_pages);
			get_pagination();
		?>
		</div> 

	</div>
	
	<?php get_sidebar(); ?>
	
</div>


<?php get_footer(); ?>