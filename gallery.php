<?php include ('header.php'); ?>

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
				</h2>
			</div>

			<div class="album-desc"><?php printGalleryDesc(true); ?></div>

			<?php printPageListWithNav(gettext('&laquo; prev'), gettext('next &raquo;'), false, true, 'pagelist', NULL, true, 7); ?>

			<?php include('print_album_thumb.php'); ?>

		</div>	<!-- content -->

	<?php include('sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('footer.php'); ?>