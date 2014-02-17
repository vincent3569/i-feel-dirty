<?php include ('header.php'); ?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printHomeLink('', ' &raquo; '); ?>
					<a href="<?php echo html_encode(getGalleryIndexURL(/*false*/)); ?>" title="<?php echo gettext('Main Index'); ?>"><?php echo gettext('Home'); ?></a>&nbsp;&raquo;&nbsp;
					<?php echo gettext('Object not found'); ?>
				</h2>
			</div>

			<h4>
				<?php echo gettext('The Zenphoto object you are requesting cannot be found.');
				if (isset($album)) {
					echo '<br />'.sprintf(gettext('Album: %s'), sanitize($album));
				}
				if (isset($image)) {
					echo '<br />'.sprintf(gettext('Image: %s'), sanitize($image));
				}
				if (isset($obj)) {
					echo '<br />'.sprintf(gettext('Page: %s'), substr(basename($obj), 0, -4));
				} ?>
			</h4>

		</div>	<!-- content -->

	<?php include('sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('footer.php'); ?>