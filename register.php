<?php
if (extensionEnabled('register_user')) {
	include ('inc_header.php');
?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printGalleryIndexURL('', gettext('Home'), false); ?>
					&raquo;&nbsp;<?php echo gettext('User Registration') ?>
				</h2>
			</div>

			<?php if (function_exists('printRegistrationForm')) { ?>
			<div class="contact">
				<?php printRegistrationForm(); ?>
			</div>
			<?php } ?>

		</div>	<!-- content -->

	<?php include('inc_sidebar.php'); ?>

	</div>	<!-- main -->

<?php
	include('inc_footer.php');

} else {
	include(SERVERPATH . '/' . ZENFOLDER . '/404.php');
} ?>