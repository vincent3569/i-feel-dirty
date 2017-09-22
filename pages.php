<?php 
if ($_zenpage_and_pages_enabled) {
	include ('inc_header.php');
?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printGalleryIndexURL('', gettext('Home'), false); ?>
				</h2>
			</div>

			<div class="post">
				<div class="posttitle">
					<h3><?php printPageTitle(); ?></h3>
				</div>

				<?php if (getPageExtraContent()) { ?>
				<div class="extra-content">
					<?php printPageExtraContent(); ?>
				</div>
				<?php } ?>

				<div class="entrytext clearfix">
					<?php
					printPageContent();
					printCodeblock(1);
					?>
				</div>

				<?php if (extensionEnabled('comment_form')) { ?>
					<?php include('inc_print_comment.php'); ?>
				<?php } ?>

			</div>

		</div>	<!-- content -->

	<?php include('inc_sidebar.php'); ?>

	</div>	<!-- main -->

<?php
	include('inc_footer.php');

} else {
	include(SERVERPATH . '/' . ZENFOLDER . '/404.php');
} ?>