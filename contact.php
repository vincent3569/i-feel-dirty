<?php
if (!extensionEnabled('contact_form')) die();
include ('inc_header.php');
?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printGalleryIndexURL('', gettext('Home'), false); ?>
					&raquo;&nbsp;<?php echo gettext('Contact') ?>
				</h2>
			</div>

			<div class="contact">
				<?php printContactForm(); ?>
			</div>

		</div>	<!-- content -->

	<?php include('inc_sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('inc_footer.php'); ?>