<?php include ('inc_header.php'); ?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printGalleryIndexURL('', gettext('Home'), false); ?>
					&raquo;&nbsp;<?php echo gettext('Object not found'); ?>
				</h2>
			</div>

			<h4>
				<?php print404status(isset($album) ? $album : NULL, isset($image) ? $image : NULL, $obj); ?>
			</h4>

		</div>	<!-- content -->

	<?php include('inc_sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('inc_footer.php'); ?>