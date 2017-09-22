<?php include ('inc_header.php'); ?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printGalleryIndexURL('', gettext('Home'), false); ?>
					&raquo;&nbsp;<?php echo gettext('Archive View'); ?>
				</h2>
			</div>

			<div class="post">
				<table id="archive">
					<tr>
						<td>
							<h4><?php echo gettext('Gallery archive'); ?></h4>
							<?php printAllDates('archive', 'year', 'month', 'desc'); ?>
						</td>
						<?php if ($_zenpage_and_news_enabled) { ?>
						<td id="newsarchive">
							<h4><?php echo gettext('News archive'); ?></h4>
							<?php printNewsArchive('archive', 'year', 'month', 'archive-active', false, 'desc'); ?>
						</td>
						<?php } ?>
					</tr>
				</table>
			</div>

		</div>	<!-- content -->

	<?php include('inc_sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('inc_footer.php'); ?>