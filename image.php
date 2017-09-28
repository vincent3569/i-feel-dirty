<?php include ('inc_header.php'); ?>

	<div class="main">
		<div class="content-image">
			<div id="breadcrumb">
				<div class="img-nav">
				<?php if (hasPrevImage()) { ?>
					<div class="img-previous"><a href="<?php echo html_encode(getPrevImageURL()); ?>" title="<?php echo gettext('Previous Image'); ?>">&lt;</a></div>
				<?php } else { ?>
					<div class="img-previous disabledlink">&lt;</div>
				<?php } ?>
				<?php if (hasNextImage()) { ?>
					<div class="img-next"><a href="<?php echo html_encode(getNextImageURL()); ?>" title="<?php echo gettext('Next Image'); ?>">&gt;</a></div>
				<?php } else { ?>
					<div class="img-next disabledlink">&gt;</div>
				<?php } ?>
				</div>

				<h2>
					<?php printGalleryIndexURL('', gettext('Home'), false); ?>
					<?php
					if (isset($isHomePage) && $isHomePage) {
						printCustomPageURL(getGalleryTitle(), 'gallery', '', ' » ');
					}
					?>
					&raquo;&nbsp;<?php printParentBreadcrumb('', ' » ', ' » '); printAlbumBreadcrumb('', ' » '); printImageTitle(); ?>
				</h2>
			</div>

			<?php if (function_exists('printSlideShowLink')) { ?>
			<div class="img-slide clearfix">
				<?php printSlideShowLink(gettext('Slideshow')); ?>
			</div>
			<?php } ?>

			<div id="image">
				<?php $fullimage = getFullImageURL(); ?>
				<?php if ((getOption('use_colorbox_image')) && (!empty($fullimage))) { ?>
					<a rel="zoom" href="<?php echo html_encode($fullimage); ?>" title="<?php echo html_encode(getBareImageTitle()); ?>"><?php printDefaultSizedImage(getImageTitle()); ?></a>
				<?php } else { ?>
					<?php printDefaultSizedImage(getImageTitle()); ?>
				<?php } ?>
			</div>

			<div id="image-title"><?php printImageTitle(); ?></div>

			<div id="image-infos"><?php printImageDesc(); ?></div>

			<?php if ((getOption('show_exif')) && (getImageMetaData())) { ?>
			<div id="exif_link"><a href="#" title="<?php echo gettext('Image Info'); ?>" class="colorbox"><?php echo gettext('Image Info'); ?></a></div>
			<div style='display:none'><?php printImageMetadata('', false); ?></div>
			<?php } ?>

			<div class="tags">
				<?php printTags('links', NULL, 'taglist', ''); ?>
				<div class="clearfix"></div>
			</div>

			<?php if ((zp_loggedin()) && (extensionEnabled('favoritesHandler'))) { ?>
			<div class="favorites"><?php printAddToFavorites($_zp_current_image); ?></div>
			<?php } ?>

			<?php if (extensionEnabled('rating')) { ?>
			<div id="rating-wrap"><?php printRating(); ?></div>
			<?php } ?>

			<?php if (extensionEnabled('comment_form')) { ?>
				<?php include('inc_print_comment.php'); ?>
			<?php } ?>

		</div>	<!-- content -->

		<div class="clearfix"></div>

	</div>	<!-- main -->

<?php include('inc_footer.php'); ?>