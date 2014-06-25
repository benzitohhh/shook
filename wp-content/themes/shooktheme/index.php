<?php /**/?><?php get_header(); ?>

<!-- content -->
<div id="content">

	<?php require('leftcontent.php'); ?>

	<!-- maincontent -->
	<div id="maincontent" class="col">
	
		<div class="wgreylinebottom">
			<div class="sectiontitle">LATEST</div>
			<?php
				shook_query(4, $offset=0, $cat=4 /*news*/);
				outputTopItemBox();
			?>
		</div>

<!-- 
		<div class="wgreylinebottom">
		<?php
			shook_query(3, $offset=0, $cat=4 /*news*/);
			outputSpecialItemBlock("NEWS");
		?>
		</div>
 -->
	
		<div class="wgreylinebottom">
		<?php
			shook_query(3, $offset=0, $cat=3 /*features*/);
			outputSpecialItemBlock("FEATURES");
		?>
		</div>


                <div class="wgreylinebottom">
		<?php
			shook_query(3, $offset=0, $cat=7 /*reviews*/);
			outputSpecialItemBlock("REVIEWS");
		?>
		</div>
	
		<div class="wgreylinebottom">
			<div class="sectiontitle">MORE NEWS</div>
			<?php
				$numItems = 16;
				shook_query($numItems, $offset=6/*4*/, $cat=4 /*news*/);
				for ($i = 0; $i<$numItems; $i++) {
					outputNormalItemBoxWithMeta();
					// outputNormalItemBox();
				}
			?>
		</div>
		
	</div>
	<!-- /end of maincontent -->
	
	<!-- rightcontent -->
	<?php get_sidebar();  ?>
	<!-- /end of rightcontent -->

</div>
<!--  end of content -->

<?php get_footer(); ?>

