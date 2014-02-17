<?php
if (!class_exists('Zenpage')) die();
include ('inc_header.php');
?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printHomeLink('', ' » '); ?>
					<a href="<?php echo html_encode(getGalleryIndexURL(false)); ?>" title="<?php echo gettext('Main Index'); ?>"><?php echo gettext('Home'); ?></a>
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

				<?php if (function_exists('printCommentForm')) {include('inc_print_comment.php');} ?>

			</div>

		</div>	<!-- content -->

	<?php include('inc_sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('inc_footer.php'); ?>