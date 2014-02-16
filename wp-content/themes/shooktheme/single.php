<?php /**/?><?php get_header(); ?>

	<?php
		// HACK: TODO: fix me
		$thispost = $wp_query->post; // save current post to display later
		//error_log("wp_query:\n" . print_r($wp_query, true));
	?>

	<div id="content">

		<?php require('leftcontent.php'); ?>
	
		<!-- maincontent -->
		<div id="maincontent" class="col">
			<!-- pagecontainer -->
			<div class="pagecontainer">
				<?php
					if ($thispost) :
						// HACK
						$wp_query->posts[($wp_query->current_post)+1] = $thispost; // insert post into wp_query
						$withcomments = true; // allow for comments
						the_post();
				?>
						<div class="post" id="post-<?php the_ID(); ?>">
						
							<div class="metadata">
								<h3 class="posttitle"><a><?php the_title(); ?></a></h3>
								<p class="postdate"><?php the_author_posts_link('namefl'); echo(' '); the_time('M jS, Y') ?></p>
							</div>
							
							<div class="entry">
								<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				
								<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
							</div>
								
							<?php if ( function_exists('the_tags') ) {
								the_tags('<div id="tags"><strong>Tagged as:</strong> ', ', ', '</div>'); }
							?>
				
						</div>
					  
					<div style="clear:both;"></div>
					<?php comments_template(); ?>
		
				<?php else: ?>
		
					<p>Sorry, no posts matched your criteria.</p>
		
				<?php endif; ?>
			</div><!-- /end of pagecontainer -->
		</div><!-- /end of maincontent -->
		
		
		<?php get_sidebar(); ?>
		
	</div>

<?php get_footer(); ?>
