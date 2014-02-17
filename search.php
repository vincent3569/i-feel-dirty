<?php include ('inc_header.php'); ?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printHomeLink('', ' &raquo; '); ?>
					<a href="<?php echo html_encode(getGalleryIndexURL(/*false*/)); ?>" title="<?php echo gettext('Main Index'); ?>"><?php echo gettext('Home'); ?></a>&nbsp;&raquo;&nbsp;
					<?php if ((gettext(getOption('ifeeldirty_homepage')) == gettext('none')) && (!getOption('ifeeldirty_news_on_homepage'))) { ?>
						<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php echo gettext('Albums Index'); ?>"><?php echo getGalleryTitle(); ?></a>
					<?php } else { ?>
						<?php printCustomPageURL(getGalleryTitle(), 'gallery'); ?>
					<?php } ?>
					&nbsp;&raquo;&nbsp;<?php echo '<em>'.gettext('Recherche').'</em>'; ?>
				</h2>
			</div>

			<?php
			$numimages = getNumImages();
			$numalbums = getNumAlbums();
			$total1 = $numimages + $numalbums;

			$zenpage = getOption('zp_plugin_zenpage');
			if ($zenpage && !isArchive()) {
				$numnews = getNumNews();
				$numpages = getNumPages();
			} else {
				$numnews = $numpages = 0;
			}
			$total = $total1 + $numnews + $numpages ;

			$searchwords = getSearchWords();
			$searchdate = getSearchDate();
			if (!empty($searchdate)) {
				if (!empty($searchwords)) {
					$searchwords .= ": ";
				}
				$searchwords .= $searchdate;
			}
			?>

			<div class="search-result">
				<p><?php printf(ngettext('%1$u Hit for <em>%2$s</em>', '%1$u Hits for <em>%2$s</em>', $total), $total, $searchwords); ?></p>
				<?php if ($total == 0) { ?>
					<p><?php echo gettext("Sorry, no matches found. Try refining your search."); ?></p>
				<?php } ?>
			</div>

			<div>
				<?php
				if (getOption('search_no_albums')) {
					if ($numimages > 0) {
						echo'<ul class="search-item"><li>'; printf(gettext('Images (%s)'), $numimages); echo'</li></ul>';
					}
				} else {
					if (getOption('search_no_images')) {
						if ($numalbums > 0) {
							echo'<ul class="search-item"><li>'; printf(gettext('Albums (%s)'), $numalbums); echo'</li></ul>';
						}
					} else {
						if ($total1 > 0) {
							echo'<ul class="search-item"><li>'; printf(gettext('Albums (%1$s) &amp; Images (%2$s)'), $numalbums, $numimages); echo'</li></ul>';
						}
					}
				} ?>

				<?php printPageListWithNav(gettext('&laquo; prev'), gettext('next &raquo;'), false, true, 'pagelist', NULL, true, 7); ?>

				<?php if (function_exists('printSlideShowLink')) { ?>
				<div class="img-slide clearfix">
					<?php printSlideShowLink('Diaporama'); ?>
				</div>
				<?php } ?>

				<?php
				if (getNumAlbums() > 0) {
					include('inc_print_album_thumb.php');
				}
				if (getNumImages() > 0) {
					include('inc_print_image_thumb.php');
				}
				?>
			</div>

			<?php
			if ($_zp_page == 1) { //test of zenpage searches
				if ($numnews > 0) { ?>
					<div>
						<ul class="search-item"><li><?php printf(gettext('Articles (%s)'), $numnews); ?></li></ul>
						<?php while (next_news('date', 'desc')): ; ?>
							<div class="search-news clearfix">
								<h3 class="search-title"><?php printNewsTitleLink(); ?></h3>
								<div class="search-content clearfix">
									<?php echo shortenContent(strip_tags(getNewsContent()), 100, getOption('zenpage_textshorten_indicator')); ?>
								</div>
							</div>
						<?php endwhile; ?>
						
					</div>
				<?php
				}

				if ($numpages > 0) { ?>
					<div>
						<ul class="search-item"><li><?php printf(gettext('Pages (%s)'), $numpages); ?></li></ul>
						<?php while (next_page()): ; ?>
							<div class="search-page clearfix">
								<h3 class="search-title"><?php printPageTitlelink(); ?></h3>
								<div class="search-content clearfix">
									<?php echo shortenContent(strip_tags(getPageContent()), 100, getOption("zenpage_textshorten_indicator")); ?>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				<?php
				}
			}
			?>

			<br class="clearfix" />

		</div>	<!-- content -->

	<?php include('inc_sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('inc_footer.php'); ?>