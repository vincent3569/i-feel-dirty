<?php include ('inc_header.php'); ?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printHomeLink('', ' &raquo; '); ?>
					<a href="<?php echo html_encode(getGalleryIndexURL(/*false*/)); ?>" title="<?php echo gettext('Main Index'); ?>"><?php echo gettext('Home'); ?></a>&nbsp;&raquo;&nbsp;
					<?php if ((gettext(getOption('ifeeldirty_homepage')) == gettext('none')) && (!getOption('ifeeldirty_news_on_homepage'))) { ?>
						<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php echo gettext('Albums Index'); ?>"><?php echo getGalleryTitle(); ?></a>
					<?php } else { ?>
						<?php printCustomPageURL(getGalleryTitle(), 'gallery'); ?>
					<?php } ?>
					<?php printParentBreadcrumb(' &raquo; ', ' &raquo; ', ' &raquo; '); ?><?php printAlbumTitle(true); ?>
				</h2>
			</div>

			<?php printPageListWithNav(gettext('&laquo; prev'), gettext('next &raquo;'), false, true, 'pagelist', NULL, true, 7); ?>

			<?php if (function_exists('printSlideShowLink')) { ?>
			<div class="img-slide clearfix">
				<?php printSlideShowLink('Diaporama'); ?>
			</div>
			<?php } ?>

			<div class="album-desc clearfix"><?php printAlbumDesc(true); ?></div>

			<?php if (isAlbumPage()) { ?>
				<?php include('inc_print_album_thumb.php'); ?>
			<?php } ?>

			<?php include('inc_print_image_thumb.php'); ?>

			<?php printPageListWithNav(gettext('&laquo; prev'), gettext('next &raquo;'), false, true, 'pagelist', NULL, true, 7); ?>

			<?php if (function_exists('printGoogleMap')) { ?>
				<div class="googlemap"><?php printGoogleMap(NULL, 'googlemap'); ?></div>
			<?php } ?>

			<?php include('inc_print_comment.php'); ?>

		</div>	<!-- content -->

	<?php include('inc_sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('inc_footer.php'); ?>