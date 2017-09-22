<?php 
if (!extensionEnabled('favoritesHandler')) die();
include ('inc_header.php');
?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printGalleryIndexURL('', gettext('Home'), false); ?>
					<?php
					if ($_ifeeldirty_homepage || $_ifeeldirty_news_on_homepage) {
						printCustomPageURL(getGalleryTitle(), 'gallery', '', ' » ');
					}
					?>
					&raquo;&nbsp;<?php printAlbumTitle(); ?>
				</h2>
			</div>

			<?php printPageListWithNav(gettext('« prev'), gettext('next »'), false, true, 'pagelist', NULL, true, 7); ?>

			<div class="album-desc clearfix">
				<?php printAlbumDesc(); ?>
			</div>

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

		</div>	<!-- content -->

	<?php include('inc_sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('inc_footer.php'); ?>