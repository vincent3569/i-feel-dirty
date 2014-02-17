<?php
if (function_exists('checkForPage')) { // check if Zenpage is enabled or not
	if (checkForPage(getOption('ifeeldirty_homepage'))) { // switch to home page
		$ishomepage = true;
		include ('pages.php');
	} else {
		if (getOption('ifeeldirty_news_on_homepage')) { // switch to news page
			include ('news.php');
		} else {
			include ('gallery.php');
		}
	}
} else {
	include ('gallery.php');
}
?>