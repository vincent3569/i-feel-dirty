<?php include ('inc_header.php'); ?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printHomeLink('', ' » '); ?>
					<a href="<?php echo html_encode(getGalleryIndexURL(false)); ?>" title="<?php echo gettext('Main Index'); ?>"><?php echo gettext('Home'); ?></a>&nbsp;&raquo;
					<?php echo gettext('Object not found'); ?>
				</h2>
			</div>

			<h4>
				<?php
				echo gettext('The Zenphoto object you are requesting cannot be found.');
				if (isset($album)) {
					echo '<br />'.sprintf(gettext('Album: %s'), html_encode($album));
				}
				if (isset($image)) {
					echo '<br />'.sprintf(gettext('Image: %s'), html_encode($image));
				}
				if (isset($obj)) {
					echo '<br />'.sprintf(gettext('Page: %s'), html_encode(substr(basename($obj), 0, -4)));
				}
				?>
			</h4>

		</div>	<!-- content -->

	<?php include('inc_sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('inc_footer.php'); ?>