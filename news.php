<?php include ('header.php'); ?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printHomeLink('', ' &raquo; '); ?>
					<a href="<?php echo html_encode(getGalleryIndexURL(/*false*/)); ?>" title="<?php echo gettext('Main Index'); ?>"><?php echo gettext('Home'); ?></a>
					<?php printNewsIndexURL('News', ' &raquo; '); ?><?php printCurrentNewsCategory(' &raquo; Cat&eacute;gorie : '); ?><?php printNewsTitle(' &raquo; '); printCurrentNewsArchive(' | '); ?>
				</h2>
			</div>

			<?php  if (is_NewsArticle()) {

				// single news article ?>
				<?php if ((getPrevNewsURL()) || (getNextNewsURL())) { ?>
				<div class="navigation">
					<?php if (getPrevNewsURL()) { ?><div class="singlenews_prev"><?php printPrevNewsLink(); ?></div><?php } ?>
					<?php if (getNextNewsURL()) { ?><div class="singlenews_next"><?php printNextNewsLink(); ?></div><?php } ?>
				</div>
				<?php } ?>

				<div class="post">
					<div class="posttitle">
						<h3><?php printNewsTitle(); ?></h3>
					</div>

					<div class="postmetadata">
						<?php printNewsDate(); ?><?php printNewsCategories(', ', gettext(' | '), 'hor-list'); ?>
					</div>

					<?php if (getNewsExtraContent()) { ?>
					<div class="extra-content">
						<?php printNewsExtraContent(); ?>
					</div>
					<?php } ?>

					<div class="entrytext clearfix">
						<?php
						printNewsContent();
						printCodeblock(1);
						?>
					</div>

					<div class="tags clearfix">
						<?php printTags('links', NULL, 'taglist', ''); ?>
					</div>

					<?php include('print_comment.php'); ?>

				</div>

			<?php } else {
				
				// news article loop
				include('print_news_loop.php');
			} ?>

		</div>	<!-- content -->

	<?php include('sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('footer.php'); ?>