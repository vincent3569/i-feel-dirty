<?php include ('inc_header.php'); ?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printGalleryIndexURL('', gettext('Home'), false); ?>
					&raquo;&nbsp;<?php echo gettext('Password required'); ?>
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