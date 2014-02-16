<?php /**/?><?php

$TITLE_LENGTH = 45;
$EXCERPT_LENGTH = 70;

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

/**
 * force cropping of medium image (by default wordpress just checks width/length does not exceed max)
 */    
if(false == get_option("medium_crop"))
    add_option("medium_crop", "1");
else
    update_option("medium_crop", "1");
    
/**
 * force cropping of large image (by default wordpress just checks width/length does not exceed max)
 */    
if(false == get_option("large_crop"))
    add_option("large_crop", "1");
else
    update_option("large_crop", "1");

function only_alphanumeric($text) {
	return $text;
	// return ereg_replace("[^A-Za-z0-9 .?:*!-=\"'урс()/ё$%()\r\n];", "", $text);
}

function userAgentIe()
{
    if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        return true;
    else
        return false;
}

function getTitle() {
	global $TITLE_LENGTH;
	return substr(only_alphanumeric(get_the_title()), 0, $TITLE_LENGTH+5 /*nasty hack*/); // TODO: split by whole words
																		   // TODO: count escaped chars (i.e. "&#39;") as single char
}

function getShortTitle() {
	global $SHORT_TITLE_BASENAME;
	global $SHORT_TITLE_LENGTH;
	$values = get_post_custom_values($SHORT_TITLE_BASENAME); 
	$shorttitle = $values[0];
	if (!$shorttitle) {
		$shorttitle = get_the_title();
	}
	return substr(only_alphanumeric($shorttitle), 0, $SHORT_TITLE_LENGTH);	
}

function getExcerpt() {
	global $EXCERPT_LENGTH;
	$excerpt = get_the_excerpt();
	if ($excerpt) {
		return substr(only_alphanumeric($excerpt), 0, $EXCERPT_LENGTH);
	} else {
		return substr(only_alphanumeric(get_the_title()), 0, $EXCERPT_LENGTH);
	}
}

/**
 * returns <img> element of header image associated with current post
 *
 * @param String $imgSize (i.e. "thumbnail", "medium", "large")
 * @return String <img> tag
 */
function getHeaderImg($imgSize = "medium") {
    $values = get_post_custom_values("_gt_header_image");
    return get_image_tag($values[0], "", "", "left", $imgSize);
}

/**
 * outputs blog entry boxes html
 * i.e. as list of <div class="blogentrybox"> elements
 * i.e. rows are demarcated by <div style="clear:left;">
 * @param int $maxPosts
 * @param int $postsPerRow
 * @param String $imgSize i.e. "thumbnail", "medium"
 */
function outputItemBoxes($maxPosts=10, $postsPerRow=2, $imgSize = "thumbnail", $showImage=true) {
	$iPost = 0;
	while (have_posts() && $iPost<$maxPosts) :
		if ($iPost % $postsPerRow == 0) {
			echo '<div style="clear:left;"></div>';
		}
		the_post();
		$iPost++;
	endwhile;
}

function outputItemBox($cssClass, $showExcerpt=true, $showImage=true, $imgSize="medium", $shortTitle=false, $extraListItems=0, $extraListTitle="", $extraListWidth="narrow", $showMeta=false) {
	the_post();
	echo '<div class="itembox">';
		echo '<div class="' . $cssClass . '">';
			// meta
			if ($showMeta) {
				echo '<div class="meta">';
					// category
					// echo the_category();
					
					// author, date
					echo '<p class="postdate">'; /* the_author_posts_link('namefl');*/ echo " "; the_time('F j Y'); echo '</p>';
				echo '</div>';
				echo '<div style="clear:both;"></div>';
			}		
		
			// image
			if ($showImage) {
				$img = getHeaderImg($imgSize);
				if (!strpos($img,'src=""')) {
					echo '<a href="'; the_permalink(); echo '" title="'; the_title(); echo '">';
					echo $img;
					echo '</a>';
				}
			}
			
			// title
			echo '<h3 class="itemboxtitle">';
				echo '<a href="'; the_permalink(); echo '">';
				if ($shortTitle) {
					echo getShortTitle();
				} else {
					echo getTitle();
				}
				echo '</a>';
			echo '</h3>';
			
			// excerpt
			if ($showExcerpt) {
				echo '<p>';
					echo getExcerpt();
				echo '</p>';
			}
			
			// extra list
			if ($extraListItems > 0) {
				echo '<div class="headlinelist">';
				outputHeadlineList($extraListItems, $extraListTitle, $extraListWidth);
				echo '</div>';
			}
			
		echo '</div>';
	echo '</div>';
}



/*
 * ======= top-level functions ===============================================================
 */

function outputTopItemBox() {
	outputItemBox($cssClass="topitembox", $showExcerpt=true, $showImage=true, $imgSize="large");
}

function outputTopItemBoxWithList($extraListItems=3, $extraListTitle="", $extraListWidth="narrow") {
	outputItemBox($cssClass="topitembox", $showExcerpt=true, $showImage=true, $imgSize="large", $shortTitle=false, $extraListItems, $extraListTitle, $extraListWidth);
}

function outputNormalItemBox() {
	outputItemBox($cssClass="normalitembox", $showExcerpt=true, $showImage=true, $imgSize="thumbnail");
}

function outputNormalItemBoxWithMeta() {
	outputItemBox($cssClass="normalitembox", $showExcerpt=true, $showImage=true, $imgSize="thumbnail", $shortTitle=false, $extraListItems=0, $extraListTitle="", $extraListWidth="narrow", $showMeta=true);
}

function outputNormalShortItemBox() {
	outputItemBox($cssClass="normalshortitembox", $showExcerpt=false, $showImage=true, $imgSize="thumbnail");
}

function outputSpecialItemBox($showExcerpt=true) {
	outputItemBox($cssClass="specialitembox", $showExcerpt, $showImage=true, $imgSize="medium", $shortTitle=false);
}

function outputHeadlineItem($shortTitle=false, $showTinyPic=false) {
	echo '<div class="headlineitem">';
		// pic
		if ($showTinyPic) {
			$img = getHeaderImg("thumbnail");
			if (!strpos($img,'src=""')) {
				echo '<a href="'; the_permalink(); echo '" title="'; the_title(); echo '">';
				echo $img;
				echo '</a>';
			}
		}
		// title
		echo '<h3 class="headlineitemtitle">';
			echo '<a href="'; the_permalink(); echo '">';
			if ($shortTitle) {
				echo getShortTitle();
			} else {
				echo getTitle();
			}
			echo '</a>';
		echo '</h3>';
	echo '</div>';
}

/**
 * @param unknown_type $numPosts
 * @param unknown_type $title
 * @param unknown_type $size "narrow", "medium", "wide", "none"
 */
function outputHeadlineList($numPosts, $title, $size="none", $showTinyPic=false) {
	if (!have_posts()) {
		return;
	}
	$short = false;
	if ($size == "none") {
		$cssclass="headlinelistflexible";
	} else if ($size == "medium") {
		$cssclass="headlinelistmedium";
	} else if ($size == "wide") {
		$cssclass="headlinelistwide";
	} else {
		$cssclass="headlinelistnarrow";
		$short = true;
	}
	echo '<div class="' . $cssclass . '">';
		if ($title) {
			echo '<div class="headlinelisttitle">' . $title . '</div>';
		}
		for ($i=0; ($i<$numPosts && have_posts()); $i++){
			the_post();
			outputHeadlineItem($short, $showTinyPic);
			echo '<div style="clear:both; height:5px;">&nbsp;</div>';
		}
	echo '</div>';
}

function outputSpecialItemBlock($title, $numPosts=3) {
	echo '<div class="itemblock">';
		echo '<div class="sectiontitle">' . $title . '</div>';
			for ($i = 0; $i<$numPosts; $i++) {
				outputSpecialItemBox();
			}
	echo '</div>';
}

/**
 * outputs an unordered list of the most recent comments.
 *
 * @param numeric $src_count The number of comments to return. Default: 7
 * @param numeric $src_length The comment excerpt length. Default: 60
 */
function output_recent_comments($src_count=7, $src_length=90) {
	global $wpdb;
	
	$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, 
			SUBSTRING(comment_content,1,$src_length) AS com_excerpt 
		FROM $wpdb->comments 
		LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) 
		WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' 
		ORDER BY comment_date_gmt DESC 
		LIMIT $src_count";
	$comments = $wpdb->get_results($sql);

	foreach ($comments as $comment) {
		echo '<div class="comment">';
		echo 	'<div class="top"/></div>';
		echo 	'<div class="content">';
		echo		strip_tags($comment->com_excerpt) . "...";
		echo		'<div class="meta">';
		echo			'<strong>' . $comment->comment_author . '</strong> on ';
		echo			'<a href="' . get_permalink($comment->ID) . '#comment-' . $comment->comment_ID  . '" title="on ' . $comment->post_title . '">' . $comment->post_title . '</a>';
		echo 		'</div>';
		echo	'</div>';
		echo 	'<div class="bottom"/></div>';
		echo '</div>';
	}
}

/**
 * outputs an unordered list of the most recent tweets.
 *
 * @param numeric $src_count The number of comments to return. Default: 7
 * @param numeric $src_length The comment excerpt length. Default: 120. TODO: implement
 */
function output_recent_tweets($src_count=7, $src_length=120) {
	$url = "http://twitter.com/statuses/user_timeline/34251698.xml";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	if (curl_getinfo($ch, CURLINFO_HTTP_CODE) != 200) {
		error_log("problem fetching data from $url, http response " . curl_getinfo($ch, CURLINFO_HTTP_CODE));
	}
	$tweets=array();
	$doc = simplexml_load_string($response);
	$i = 0;
	foreach ($doc->{'status'} as $tweet) {
		if ($i>=$src_count) {
			break;
		}
		$i++;
		$tweets[] = $tweet;
	}
	foreach ($tweets as $tweet) {
?>	
		<div class="comment" id="comment-<?php comment_ID() ?>">
			<div class="top2"></div>
			<div class="content2">
				<?php echo substr($tweet->created_at, 0, 16) ?>
				<div class="meta"><a href="http://www.twitter.com/shookmag"><?php echo $tweet->text ?></a></div>
			</div>
			<div class="bottom2"></div>
		</div>
<?php		
	}
}

function shook_query($numPosts, $offset=0, $cat=0) {
	$myQuery = 'posts_per_page=' . $numPosts . '&offset=' . $offset;
	if ($cat) {
		$myQuery .= '&cat=' . $cat;
	}
	query_posts($myQuery);
}

/**
* A pagination function
* @param integer $range: The range of the slider, works best with even numbers
* Used WP functions:
* get_pagenum_link($i) - creates the link, e.g. http://site.com/page/4
* previous_posts_link(' г '); - returns the Previous page link
* next_posts_link(' х '); - returns the Next page link
*/
function get_pagination($range = 4){
  // $paged - number of the current page
  global $paged, $wp_query;
  // How much pages do we have?
  if ( !$max_page ) {
    $max_page = $wp_query->max_num_pages;
  }
  // We need the pagination only if there are more than 1 page
  if($max_page > 1){
    if(!$paged){
      $paged = 1;
    }
    // On the first page, don't put the First page link
    if($paged != 1){
      echo "<a href=" . get_pagenum_link(1) . "> First </a>";
    }
    // To the previous page
    previous_posts_link('<<');
    // We need the sliding effect only if there are more pages than is the sliding range
    if($max_page > $range){
      // When closer to the beginning
      if($paged < $range){
        for($i = 1; $i <= ($range + 1); $i++){
          echo "<a href='" . get_pagenum_link($i) ."'";
          if($i==$paged) echo "class='current'";
          echo ">$i</a>";
        }
      }
      // When closer to the end
      elseif($paged >= ($max_page - ceil(($range/2)))){
        for($i = $max_page - $range; $i <= $max_page; $i++){
          echo "<a href='" . get_pagenum_link($i) ."'";
          if($i==$paged) echo "class='current'";
          echo ">$i</a>";
        }
      }
      // Somewhere in the middle
      elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
        for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
          echo "<a href='" . get_pagenum_link($i) ."'";
          if($i==$paged) echo "class='current'";
          echo ">$i</a>";
        }
      }
    }
    // Less pages than the range, no sliding effect needed
    else{
      for($i = 1; $i <= $max_page; $i++){
        echo "<a href='" . get_pagenum_link($i) ."'";
        if($i==$paged) echo "class='current'";
        echo ">$i</a>";
      }
    }
    // Next page
    next_posts_link('>>');
    // On the last page, don't put the Last page link
    if($paged != $max_page){
      echo " <a href=" . get_pagenum_link($max_page) . "> Last </a>";
    }
  }
}

function getNumSearchResults() {
	error_log("s=" . get_search_query());
	$mySearch =& new WP_Query("s=".get_search_query() . "&showposts=-1");
	return $mySearch->post_count;
}
?>