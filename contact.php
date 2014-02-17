<?php include ('header.php'); ?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printHomeLink('', ' &raquo; '); ?>
					<a href="<?php echo html_encode(getGalleryIndexURL(/*false*/)); ?>" title="<?php echo gettext('Main Index'); ?>"><?php echo gettext('Home'); ?></a>&nbsp;&raquo;&nbsp;
					<?php echo gettext('Contact') ?>
				</h2>
			</div>

			<div class="contact">
				<?php printContactForm(); ?>
			</div>

		</div>	<!-- content -->

	<?php include('sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('footer.php'); ?>