	<div class="footer">

		<div class="footer1">
			<?php if (($_zp_gallery_page == 'image.php') ||
					((function_exists('is_NewsArticle')) && (is_NewsArticle()))) { ?>
			<div class="nav-info">
				<img src="<?php echo $_zp_themeroot; ?>/images/help.png" title="<?php echo gettext_th('You can browse with the arrows keys of your keyboard'); ?>" alt="info_icon" />
			</div>
			<?php } ?>

			<p><?php printZenphotoLink(); ?></p>
		</div>

		<div class="footer2">
			<?php
			if (getOption('show_archive')) {
				printCustomPageURL(gettext('Archive View'), 'archive', '', '', ' | ');
			}
			if (extensionEnabled('contact_form')) {
				printCustomPageURL(gettext('Contact'), 'contact');
			}
			?>
		</div>
	</div>	<!-- footer -->
</div>		<!-- container -->

<?php
	zp_apply_filter('theme_body_close');
?>

</body>
</html>
<!-- i-feel-dirty 1.4.14 - a Zenphoto theme by Studio ST and Vincent3569 -->