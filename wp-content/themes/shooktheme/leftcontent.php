<?php /**/?>	<!-- leftcontent -->
	<div id ="leftcontent" class="firstcol col">
	
		<?php
			if(!is_home()) {
		?>
				<div class="wgreylinebottom">
					<?php
						$numItems = 5;
						shook_query($numItems, $offset=0, $category=4 /* NEWS */);
						outputHeadlineList($numItems, "NEWS", "none");
					?>
				</div>
				
				<div class="wgreylinebottom">
					<?php
						$numItems = 5;
						shook_query($numItems, $offset=0, $category=3 /* FEATURES */);
						outputHeadlineList($numItems, "FEATURES", "none");
					?>
				</div>
		<?php
			} else { // homepage laready has first news item
		?>
				<div class="wgreylinebottom">
					<?php
						$numItems = 5;
						shook_query($numItems, $offset=1, $category=4 /* NEWS */);
						outputHeadlineList($numItems, "NEWS", "none");
					?>
				</div>
		<?php
			}
		?>
	
		<div class="wgreylinebottom">
			<div class="sectiontitle">MIXTAPE</div>
			<?php
				shook_query(1, $offset=0, $cat=5 /*???*/);
				outputSpecialItemBox(false);
			?>
		</div>

               <div class="wgreylinebottom">
			<div class="sectiontitle">COUNTER CULTURE </div>
			<?php
				shook_query(1, $offset=0, $cat=1822 /*???*/);
				outputSpecialItemBox(false);
			?>
		</div>
 

		
		<div class="wgreylinebottom">
			<?php
				$numItems = 5;
				shook_query($numItems, $offset=0, $cat=6);
				outputHeadlineList($numItems, "DESTINATION OUT", "none");
			?>
		</div>
		
		
	</div>
	<!--  /end of leftcontent -->
