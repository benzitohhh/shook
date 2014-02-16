<?php /**/?><?php
/*
Plugin Name: Validate Fields
Plugin URI: http://www.benimmanuel.com/
Description: This plugin ensures presence/length of various fields in wp-admin
Author: Ben Immanuel
Version: 0.0.0
Author URI: http://www.benimmanuel.com/
*/

function bi_validate_fields() {
	$TITLE_LENGTH = 45;
	$EXCERPT_LENGTH = 70;
?>

	<script type='text/javascript'>
	
		function is_valid(formfield, numchars) {
			if (null == formfield) {
				return false;
			}
			if ("undefined" == typeof(formfield)) {
				return false;
			}
			if (formfield.value==null || formfield.value=="") {
				return false;
			}
			return true;
		}
		
		function get_validation_msg(formfield, description, numchars) {
			if (!is_valid(formfield, numchars)) {
				return "Please fill in '" + description + "' (" + numchars + " chars max)\n";
			} else {
				return "";
			}
		}
	
		function validate_fields(thisform) {
			// HACK: currently accesses fields by "name" attribute (as unable to get JQuery to work...)
			// TODO: use JQuery to access form fields by "id" attribute
			var msg = "";
			msg += get_validation_msg(thisform.post_title, "title", <?php echo $TITLE_LENGTH ?>);
			msg += get_validation_msg(thisform.excerpt, "excerpt", <?php echo $EXCERPT_LENGTH ?>);
			
			if (msg.length > 0) {
				alert(msg);
				return false;
			}
			return true;
		}
		
		
		(function($) {
	
			function limit_chars(textid, limit) {
				var text = $('#'+textid).val();	
				var textlength = text.length;
				if(textlength > limit) {
					$('#'+textid).val(text.substr(0,limit));
					return false;
				}
			}	
	
			function register_limit_chars(textid, limit) {
				$(function(){
				 	$('#'+textid).keyup(function(){
				 		limit_chars(textid, limit);
				 	})
				});
			}
			
			$(document).ready(function(){
				// register limit chars elements (by "id" attribute)
				register_limit_chars('title', <?php echo $TITLE_LENGTH ?>);
				register_limit_chars('excerpt', <?php echo $EXCERPT_LENGTH ?>);
				
				// mutate form (id="post"), injecting validation
				$('#post').attr('onsubmit', 'return validate_fields(this);');
			});
			
		})(jQuery);	
	</script>
	
<?php	
}

add_action('dbx_post_sidebar', 'bi_validate_fields');
?>