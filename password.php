<?php include ('inc_header.php'); ?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printHomeLink('', ' » '); ?>
					<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php echo gettext('Main Index'); ?>"><?php echo gettext('Home'); ?></a>&nbsp;&raquo;
					<?php echo gettext('Password required'); ?>
				</h2>
			</div>

			<div class="post">
				<div style='display: none;'>
					<?php printPasswordForm('', true); ?>
				</div>
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					$.colorbox({
						inline: true,
						href: "#passwordform",
						innerWidth: "400px",
						close: '<?php echo gettext("close"); ?>',
						open: true
					});
				});
			</script>

		</div>	<!-- content -->

	<?php include('inc_sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('inc_footer.php'); ?>