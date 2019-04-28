<?php
/**
 * adding custom data within post content
 * highly usable for adding tracking code or ads
 * Codex: https://codex.wordpress.org/Plugin_API/Filter_Reference/the_content
 */
add_filter('the_content','display_custom_post_content');
function display_custom_post_content($content) {
	global $post;
	// for posts only
	if (is_single()) {
		$after = 1; // number of paragraph
		$content = explode ("</p>", $content);
		$data = '';
		for ($i = 0; $i < count ($content); $i++) {
			if ($i == $after) {
				// change your data here
				$data .= '<div id="custom-id">YOUR CUSTOM CONTENT</div>';
			}
			$data .= $content[$i]. "</p>";
		}
		return $data;
	}  else {
		// keep page content intact
		return $content;
	}
}
?>