<?php
if (function_exists('checkForPage')) { // check if Zenpage is enabled or not
	if (checkForPage(getOption('ifeeldirty_homepage'))) { // switch to home page
		$isHomePage = true;
		include ('pages.php');
	} else {
		if (getOption('ifeeldirty_news_on_homepage')) { // switch to news page
			$isHomePage = true;
			include ('news.php');
		} else {
			$isHomePage = false;
			include ('gallery.php');
		}
	}
} else {
	$isHomePage = false;
	include ('gallery.php');
}
?>