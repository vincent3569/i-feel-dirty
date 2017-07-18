<?php
if (!function_exists('printRegistrationForm')) die();
include ('inc_header.php');
?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printHomeLink('', ' &raquo; '); ?>
					<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php echo gettext('Main Index'); ?>"><?php echo gettext('Home'); ?></a>&nbsp;&raquo;
					<?php echo gettext('User Registration') ?>
				</h2>
			</div>

			<?php if (function_exists('printRegistrationForm')) { ?>
			<div class="contact">
				<?php  printRegistrationForm(); ?>
			</div>
			<?php } ?>

		</div>	<!-- content -->

	<?php include('inc_sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('inc_footer.php'); ?>