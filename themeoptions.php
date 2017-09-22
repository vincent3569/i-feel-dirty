<?php

/* Plug-in for theme option handling
 * The Admin Options page tests for the presence of this file in a theme folder
 * If it is present it is linked to with a require_once call.
 * If it is not present, no theme options are displayed.
 */

require_once(SERVERPATH . '/' . ZENFOLDER . '/admin-functions.php');

class ThemeOptions {

	function __construct() {

		$me = basename(dirname(__FILE__));
		setThemeOption('albums_per_row', '2', NULL, 'i-feel-dirty');
		setThemeOptionDefault('albums_per_page', '8');
		setThemeOption('images_per_row', '3', NULL, 'i-feel-dirty');
		setThemeOptionDefault('images_per_page', '12');
		setThemeOption('thumb_size', '120', NULL, 'i-feel-dirty');
		setThemeOption('thumb_crop', '1', NULL, 'i-feel-dirty');
		setThemeOption('thumb_crop_width', '120', NULL, 'i-feel-dirty');
		setThemeOption('thumb_crop_height', '120', NULL, 'i-feel-dirty');
		setThemeOption('image_size', '700', NULL, 'i-feel-dirty');
		setThemeOptionDefault('image_use_side', 'longest');
		setThemeOptionDefault('custom_index_page', '');
		setThemeOptionDefault('ifeeldirty_homepage', 'none');
		setThemeOptionDefault('ifeeldirty_news_on_homepage', false);
		setThemeOptionDefault('allow_search', true);
		setThemeOptionDefault('show_archive', false);
		setThemeOptionDefault('show_exif', true);
		setThemeOptionDefault('show_random_pict', true);
		setThemeOptionDefault('show_tag_cloud', true);
		setThemeOptionDefault('use_colorbox_image', false);

		setOption('zp_plugin_print_album_menu', 5|THEME_PLUGIN);
		setOption('zp_plugin_colorbox_js', 5|THEME_PLUGIN);
		setOption('colorbox_' . $me . '_album', 1);
		setOption('colorbox_' . $me . '_archive', 1);
		setOption('colorbox_' . $me . '_contact', 1);
		setOption('colorbox_' . $me . '_favorites', 1);
		setOption('colorbox_' . $me . '_gallery', 1);
		setOption('colorbox_' . $me . '_image', 1);
		setOption('colorbox_' . $me . '_index', 1);
		setOption('colorbox_' . $me . '_news', 1);
		setOption('colorbox_' . $me . '_pages', 1);
		setOption('colorbox_' . $me . '_password', 1);
		setOption('colorbox_' . $me . '_register', 1);
		setOption('colorbox_' . $me . '_search', 1);

		if (class_exists('cacheManager')) {
			cacheManager::deleteThemeCacheSizes($me);
			cacheManager::addThemeCacheSize($me, getThemeOption('thumb_size'), NULL, NULL, getThemeOption('thumb_crop_width'), getThemeOption('thumb_crop_height'), NULL, NULL, true);
			cacheManager::addThemeCacheSize($me, getThemeOption('image_size'), NULL, NULL, NULL, NULL, NULL, NULL, false);
		}
	}

	function getOptionsDisabled() {
		return array('thumb_size', 'image_size', 'custom_index_page');
	}

	function getOptionsSupported() {
		$unpublishedpages = query_full_array("SELECT title, titlelink FROM " . prefix('pages') . " WHERE `show` != 1 ORDER by `sort_order`");
		$unpub_list = array();
		foreach ($unpublishedpages as $page) {
			$unpub_list[get_language_string($page['title'])] = $page['titlelink'];
		}

		return array(
			gettext('Homepage') => array('key' => 'ifeeldirty_homepage', 'type' => OPTION_TYPE_SELECTOR, 'selections' => $unpub_list, 'null_selection' => gettext('none'), 'desc' => gettext("Choose here any <em>un-published Zenpage page</em> (listed by <em>titlelink</em>) to act as your site's homepage instead the normal gallery index.")
																																													. "<p class='notebox'>" . gettext("<strong>Note:</strong> This of course overrides the <em>News on index page</em> option and your theme must be setup for this feature! Visit the theming tutorial for details.") . "</p>"),
			gettext('News on index page') => array('key' => 'ifeeldirty_news_on_homepage', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext("Enable this if you want to show the news section's first page on the <code>index.php</code> page.")),
			gettext('Allow search') => array('key' => 'allow_search', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Check to enable search form.')),
			gettext('Show Archive') => array('key' => 'show_archive', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext_th('Display a menu link to the Archive list.', 'i-feel-dirty')),
			gettext('Show image EXIF data') => array('key' => 'show_exif', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext_th('Show the EXIF Data on Image page. Remember you have to check EXIFs data you want to show on Admin>Options>Image>Metadata.', 'i-feel-dirty')),
			gettext('Show Random Picture') => array('key' => 'show_random_pict', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext_th('Display a random picture of the gallery.', 'i-feel-dirty')),
			gettext('Show Tags') => array('key' => 'show_tag_cloud', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext_th('Check to show a tag cloud with all the tags of the gallery.', 'i-feel-dirty')),
			gettext('Use Colorbox in Image page') => array('key' => 'use_colorbox_image', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext_th('Check to display the full size image with Colorbox in Image page.', 'i-feel-dirty'))
		);
	}

	function handleOption($option, $currentValue) {
	}
}
?>