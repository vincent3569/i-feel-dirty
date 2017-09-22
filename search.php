<?php include ('inc_header.php'); ?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printGalleryIndexURL('', gettext('Home'), false); ?>
					&raquo;&nbsp;<?php echo '<em>'.gettext('Search').'</em>'; ?>
				</h2>
			</div>

			<?php
			$numimages = getNumImages();
			$numalbums = getNumAlbums();
			$total1 = $numimages + $numalbums;

			$numnews = $numpages = 0;
			if ($_zenpage_enabled && !isArchive()) {
				if ($_zenpage_and_news_enabled) {
					$numnews = getNumNews();
				}
				if ($_zenpage_and_pages_enabled) {
					$numpages = getNumPages();
				}
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
				<p><?php printf(ngettext('%1$u Hit for <em>%2$s</em>', '%1$u Hits for <em>%2$s</em>', $total), $total, html_encode($searchwords)); ?></p>
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
				}
				?>

				<?php printPageListWithNav(gettext('« prev'), gettext('next »'), false, true, 'pagelist', NULL, true, 7); ?>

				<?php if (function_exists('printSlideShowLink')) { ?>
				<div class="img-slide clearfix">
					<?php printSlideShowLink(gettext('Slideshow')); ?>
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

				<?php printPageListWithNav(gettext('« prev'), gettext('next »'), false, true, 'pagelist', NULL, true, 7); ?>
			</div>

			<?php
			if ($_zp_page == 1) { //test of zenpage searches
				if ($numnews > 0) { ?>
					<div>
						<ul class="search-item"><li><?php printf(gettext('Articles (%s)'), $numnews); ?></li></ul>
						<?php while (next_news()) { ?>
							<div class="search-news clearfix">
								<h3 class="search-title"><?php printNewsURL(); ?></h3>
								<div class="search-content clearfix">
									<?php echo shortenContent(getBare(getNewsContent()), 100, getOption("zenpage_textshorten_indicator")); ?>
								</div>
							</div>
						<?php } ?>
					</div>
				<?php
				}

				if ($numpages > 0) { ?>
					<div>
						<ul class="search-item"><li><?php printf(gettext('Pages (%s)'), $numpages); ?></li></ul>
						<?php while (next_page()) { ?>
							<div class="search-page clearfix">
								<h3 class="search-title"><?php printPageURL(); ?></h3>
								<div class="search-content clearfix">
									<?php echo shortenContent(getBare(getPageContent()), 100, getOption("zenpage_textshorten_indicator")); ?>
								</div>
							</div>
						<?php } ?>
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