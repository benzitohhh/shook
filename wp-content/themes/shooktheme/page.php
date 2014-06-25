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
			<!-- pagecontainer -->
			<div class="pagecontainer">
			<?php
				while (have_posts()) :
					the_post();
			?>
					<div class="post" id="post-<?php the_ID(); ?>">
						<div class="entry">
							<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
			
							<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			
						</div>
					</div>
			<?php
				endwhile;
			?>
			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
			</div>
			<!-- /end of pagecontainer -->
		</div>
		<!-- /end of maincontent -->
	
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>