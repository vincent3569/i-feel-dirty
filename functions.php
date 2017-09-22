<?php
if (!OFFSET_PATH) {

	setOption('personnal_thumb_width', '200', false);
	setOption('personnal_thumb_height', '120', false);

	setOption('comment_form_toggle', false, true);		// force this option of comment_form, to avoid JS conflits
	setOption('comment_form_pagination', false, true);	// force this option of comment_form, to avoid JS conflits
	setOption('tinymce4_comments', null, true);			// force this option to disable tinyMCE for comment form

	$_zenpage_enabled = extensionEnabled('zenpage');
	$_zenpage_and_pages_enabled = extensionEnabled('zenpage') && ZP_PAGES_ENABLED;
	$_zenpage_and_news_enabled = extensionEnabled('zenpage') && ZP_NEWS_ENABLED;

	$_ifeeldirty_homepage = $_zenpage_and_pages_enabled && (checkForPage(getOption('ifeeldirty_homepage')));
	echo getOption('ifeeldirty_homepage');
	echo 'checkForPage' . checkForPage(getOption('ifeeldirty_homepage'));
	echo '$_ifeeldirty_homepage' . $_ifeeldirty_homepage;
	$_ifeeldirty_news_on_homepage = $_zenpage_and_news_enabled && (getOption('ifeeldirty_news_on_homepage'));

	$_zp_page_check = 'my_checkPageValidity';
}

function my_checkPageValidity($request, $gallery_page, $page) {
	if ($gallery_page == 'gallery.php') {
		$gallery_page = 'index.php';
	}
	return checkPageValidity($request, $gallery_page, $page);
}
?>