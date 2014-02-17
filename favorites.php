<?php include ('inc_header.php'); ?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printHomeLink('', ' » '); ?>
					<a href="<?php echo html_encode(getGalleryIndexURL(false)); ?>" title="<?php echo gettext('Main Index'); ?>"><?php echo gettext('Home'); ?></a>&nbsp;&raquo;
					<?php if ((gettext(getOption('ifeeldirty_homepage')) == gettext('none')) && (!getOption('ifeeldirty_news_on_homepage'))) { ?>
						<a href="<?php echo html_encode(getGalleryIndexURL(false)); ?>" title="<?php echo gettext('Albums Index'); ?>"><?php echo html_encode(getGalleryTitle()); ?></a>
					<?php } else { ?>
						<?php printCustomPageURL(getGalleryTitle(), 'gallery'); ?>
					<?php } ?>
					&raquo;&nbsp;<?php printAlbumTitle(true); ?>
				</h2>
			</div>

			<?php printPageListWithNav(gettext('« prev'), gettext('next »'), false, true, 'pagelist', NULL, true, 7); ?>

			<div class="album-desc clearfix"><?php printAlbumDesc(true); ?></div>

			<?php if (isAlbumPage()) { ?>
				<?php include('inc_print_album_thumb.php'); ?>
			<?php } ?>

			<?php include('inc_print_image_thumb.php'); ?>

			<?php printPageListWithNav(gettext('« prev'), gettext('next »'), false, true, 'pagelist', NULL, true, 7); ?>

		</div>	<!-- content -->

	<?php include('inc_sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('inc_footer.php'); ?>