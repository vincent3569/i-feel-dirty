	<div class="footer">

		<div class="footer1">
			<?php if (($_zp_gallery_page == 'image.php') ||
					((function_exists('is_NewsArticle')) && (is_NewsArticle()))) { ?>
				<div class="nav-info">
					<img src="<?php echo $_zp_themeroot; ?>/images/info.png" title="<?php echo gettext_th('You can browse with the arrows keys of your keyboard'); ?>" alt="info_icon" />
				</div>
			<?php } ?>

			<p><a href="http://studio.st/i-feel-dirty/">I feel dirty theme</a> by <a href="http://studio.st">Studio ST</a> and <a href="http://vincent.bourganel.free.fr">vincent3569</a></p>
			<p><?php printZenphotoLink(); ?></p>
		</div>

		<div class="footer2">
			<?php printCustomPageURL(gettext('Archive View'), 'archive', '', ''); ?>
			<?php if (function_exists('printContactForm')) { ?>
				<?php printCustomPageURL(gettext('Contact'), 'contact', '', ' | '); ?>
			<?php } ?>
		</div>

	</div>	<!-- footer -->

</div>	<!-- container -->

<?php
printAdminToolbox();
zp_apply_filter('theme_body_close');
?>

</body>
</html>			<!-- i-feel-dirty 1.0 - a ZenPhoto/ZenPage theme by Studio ST and Vincent3569  --> 