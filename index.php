<?php
// force UTF-8 Ø
if (!defined('WEBPATH')) die();

if ($_zenpage_enabled) { // check if Zenpage is enabled or not
	if ($_ifeeldirty_homepage) { // switch to home page
		$isHomePage = true;
		include ('pages.php');
	} else {
		if ($_ifeeldirty_news_on_homepage) { // switch to news page
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