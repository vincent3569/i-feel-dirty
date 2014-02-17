<?php

/* Plug-in for theme option handling
 * The Admin Options page tests for the presence of this file in a theme folder
 * If it is present it is linked to with a require_once call.
 * If it is not present, no theme options are displayed.
 */

require_once(SERVERPATH . '/' . ZENFOLDER . '/admin-functions.php');

class ThemeOptions {

	function ThemeOptions() {
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
		setThemeOptionDefault('show_contact', false);
		setThemeOptionDefault('show_exif', true);
		setThemeOptionDefault('show_random_pict', true);
		setThemeOptionDefault('show_tag_cloud', true);
		setThemeOptionDefault('use_colorbox_image', false);

		setOption('zp_plugin_print_album_menu', 9|THEME_PLUGIN);
		setOption('zp_plugin_colorbox_js', 9|THEME_PLUGIN);
		setOption('colorbox_i-feel-dirty_album', 1);
		setOption('colorbox_i-feel-dirty_archive', 1);
		setOption('colorbox_i-feel-dirty_contact', 1);
		setOption('colorbox_i-feel-dirty_favorites', 1);
		setOption('colorbox_i-feel-dirty_gallery', 1);
		setOption('colorbox_i-feel-dirty_image', 1);
		setOption('colorbox_i-feel-dirty_index', 1);
		setOption('colorbox_i-feel-dirty_news', 1);
		setOption('colorbox_i-feel-dirty_pages', 1);
		setOption('colorbox_i-feel-dirty_password', 1);
		setOption('colorbox_i-feel-dirty_register', 1);
		setOption('colorbox_i-feel-dirty_search', 1);
	}

	function getOptionsDisabled() {
		return array('thumb_size', 'image_size', 'custom_index_page');
	}

	function getOptionsSupported() {
		return array(
			gettext('Homepage') => array('key' => 'ifeeldirty_homepage', 'type' => OPTION_TYPE_CUSTOM, 'desc' => gettext("Choose here any <em>un-published Zenpage page</em> (listed by <em>titlelink</em>) to act as your site's homepage instead the normal gallery index.")."<p class='notebox'>".gettext("<strong>Note:</strong> This of course overrides the <em>News on index page</em> option and your theme must be setup for this feature! Visit the theming tutorial for details.")."</p>"),
			gettext('News on index page') => array('key' => 'ifeeldirty_news_on_homepage', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext("Enable this if you want to show the news section's first page on the <code>index.php</code> page.")),
			gettext('Allow search') => array('key' => 'allow_search', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext('Check to enable search form.')),
			gettext('Show Archive') => array('key' => 'show_archive', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext_th('Display a menu link to the Archive list.', 'i-feel-dirty')),
			gettext('Show Contact') => array('key' => 'show_contact', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext_th('Display a menu link to the Contact box.', 'i-feel-dirty')),
			gettext('Show image EXIF data') => array('key' => 'show_exif', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext_th('Show the EXIF Data on Image page. Remember you have to check EXIFs data you want to show on admin>image>information EXIF.', 'i-feel-dirty')),
			gettext('Show Random Picture') => array('key' => 'show_random_pict', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext_th('Display a random picture of the gallery.', 'i-feel-dirty')),
			gettext('Show Tags') => array('key' => 'show_tag_cloud', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext_th('Check to show a tag cloud with all the tags of the gallery.', 'i-feel-dirty')),
			gettext('Use Colorbox in Image page') => array('key' => 'use_colorbox_image', 'type' => OPTION_TYPE_CHECKBOX, 'desc' => gettext_th('Check to display the full size image with Colorbox in Image page.', 'i-feel-dirty'))
		);
	}

	function handleOption($option, $currentValue) {
		if ($option == 'ifeeldirty_homepage') {
			$unpublishedpages = query_full_array("SELECT titlelink, title FROM " . prefix('pages') . " WHERE `show` != 1 ORDER by `sort_order`");
			if (empty($unpublishedpages)) {
				echo gettext("No unpublished pages available");
				// clear option if no unpublished pages are available or have been published meanwhile
				// so that the normal gallery index appears and no page is accidentally set if set to unpublished again.
				setThemeOption('zenpage_homepage', 'none', NULL, 'i-feel-dirty');
			} else {
				echo '<input type="hidden" name="' . CUSTOM_OPTION_PREFIX . 'selector-zenpage_homepage" value=0 />' . "\n";
				echo '<select id="' . $option . '" name="' . $option . '">' . "\n";

				echo '<option value="none"';
				if ($currentValue == 'none') {
					echo ' selected="selected">' . gettext("none") . '</option>\n';
				} else {
					echo '>' . gettext("none") . '</option>\n';
				}

				foreach($unpublishedpages as $page) {
					if ($currentValue == $page["titlelink"]) {
						$selected = " selected = 'selected'";
					} else {
						$selected = "";
					}
					echo '<option value="' . $page["titlelink"] . '"' . $selected . '>' . get_language_string($page["title"]) . '</option>';
				}

				echo "</select>\n";
			}
		}
	}

}
?>