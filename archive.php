<?php include ('header.php'); ?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printHomeLink('', ' &raquo; '); ?>
					<a href="<?php echo html_encode(getGalleryIndexURL(/*false*/)); ?>" title="<?php echo gettext('Main Index'); ?>"><?php echo gettext('Home'); ?></a>&nbsp;&raquo;&nbsp;
					<?php echo gettext('Archive View'); ?>
				</h2>
			</div>

			<div class="post">
				<table id="archive">
					<tr>
						<td>
							<h4><?php echo gettext('Gallery Archive'); ?></h4>
							<?php printAllDates('archive', 'year', 'month', 'desc'); ?>
						</td>
						<?php if (function_exists('printNewsArchive')) { ?>
						<td id="newsarchive">
							<h4><?php echo gettext('News archive'); ?></h4>
							<?php printNewsArchive('archive'); ?>
						</td>
						<?php } ?>
					</tr>
				</table>
			</div>

		</div>	<!-- content -->

	<?php include('sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('footer.php'); ?>