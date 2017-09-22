<?php include ('inc_header.php'); ?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printGalleryIndexURL('', gettext('Home'), false); ?>
					<?php
					if (isset($isHomePage) && $isHomePage) {
						printCustomPageURL(getGalleryTitle(), 'gallery', '', ' » ');
					}
					?>
					&raquo;&nbsp;<?php printParentBreadcrumb('', ' » ', ' » '); printAlbumTitle(); ?>
				</h2>
			</div>

			<div class="album-desc clearfix">
				<?php printAlbumDesc(); ?>
			</div>

			<?php printPageListWithNav(gettext('« prev'), gettext('next »'), false, true, 'pagelist', NULL, true, 7); ?>

			<?php if (function_exists('printSlideShowLink')) { ?>
			<div class="img-slide clearfix">
				<?php printSlideShowLink(gettext('Slideshow')); ?>
			</div>
			<?php } ?>

			<?php if (isAlbumPage()) { ?>
				<?php include('inc_print_album_thumb.php'); ?>
			<?php } ?>

			<?php if (getNumImages() > 0) { ?>
				<?php include('inc_print_image_thumb.php'); ?>
			<?php } ?>

			<?php printPageListWithNav(gettext('« prev'), gettext('next »'), false, true, 'pagelist', NULL, true, 7); ?>

			<?php if ((zp_loggedin()) && (extensionEnabled('favoritesHandler'))) { ?>
			<div class="favorites"><?php printAddToFavorites($_zp_current_album); ?></div>
			<?php } ?>

			<?php if (extensionEnabled('GoogleMap')) { ?>
			<div class="googlemap"><?php printGoogleMap(NULL, 'googlemap'); ?></div>
			<?php } ?>

			<?php if (extensionEnabled('comment_form')) { ?>
				<?php include('inc_print_comment.php'); ?>
			<?php } ?>

		</div>	<!-- content -->

	<?php include('inc_sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('inc_footer.php'); ?>