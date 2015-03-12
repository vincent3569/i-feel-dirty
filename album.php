<?php include ('inc_header.php'); ?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printHomeLink('', ' » '); ?>
					<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php echo gettext('Main Index'); ?>"><?php echo gettext('Home'); ?></a>
					<?php if ((class_exists('Zenpage')) && ((gettext(getOption('ifeeldirty_homepage')) <> gettext('none')) || (getOption('ifeeldirty_news_on_homepage')))) { ?>
						&raquo;&nbsp;<?php printCustomPageURL(getGalleryTitle(), 'gallery'); ?>
					<?php } ?>
					&raquo;&nbsp;<?php printParentBreadcrumb('', ' » ', ' » '); ?><?php printAlbumTitle(); ?>
				</h2>
			</div>

			<?php printPageListWithNav(gettext('« prev'), gettext('next »'), false, true, 'pagelist', NULL, true, 7); ?>

			<?php if (function_exists('printSlideShowLink')) { ?>
			<div class="img-slide clearfix">
				<?php printSlideShowLink(gettext('Slideshow')); ?>
			</div>
			<?php } ?>

			<div class="album-desc clearfix"><?php printAlbumDesc(); ?></div>

			<?php if (isAlbumPage()) { ?>
				<?php include('inc_print_album_thumb.php'); ?>
			<?php } ?>

			<?php include('inc_print_image_thumb.php'); ?>

			<?php printPageListWithNav(gettext('« prev'), gettext('next »'), false, true, 'pagelist', NULL, true, 7); ?>

			<?php if (function_exists('printAddToFavorites')) { ?>
			<div class="favorites"><?php printAddToFavorites($_zp_current_album); ?></div>
			<?php } ?>

			<?php if (function_exists('printGoogleMap')) { ?>
			<div class="googlemap"><?php printGoogleMap(NULL, 'googlemap'); ?></div>
			<?php } ?>

			<?php if (function_exists('printCommentForm')) {include('inc_print_comment.php');} ?>


		</div>	<!-- content -->

	<?php include('inc_sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('inc_footer.php'); ?>