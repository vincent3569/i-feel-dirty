<?php
if (function_exists('checkForPage')) { // check if Zenpage is enabled or not
	if (checkForPage(getOption('ifeeldirty_homepage'))) { // switch to home page
		$ishomepage = true;
		include ('pages.php');
	} else {
		if (getOption('ifeeldirty_news_on_homepage')) { // switch to news page
			$ishomepage = true;
			include ('news.php');
		} else {
			$isGallery = true;
			include ('gallery.php');
		}
	}
} else {
	$isGallery = true;
	include ('gallery.php');
}
?>