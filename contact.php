<?php include ('inc_header.php'); ?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printHomeLink('', ' » '); ?>
					<a href="<?php echo html_encode(getGalleryIndexURL(false)); ?>" title="<?php echo gettext('Main Index'); ?>"><?php echo gettext('Home'); ?></a>&nbsp;&raquo;
					<?php echo gettext('Contact') ?>
				</h2>
			</div>

			<div class="contact">
				<?php printContactForm(); ?>
			</div>

		</div>	<!-- content -->

	<?php include('inc_sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('inc_footer.php'); ?>