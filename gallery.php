<?php include ('inc_header.php'); ?>

	<div class="main">
		<div class="content">
			<div id="breadcrumb">
				<h2>
					<?php printGalleryIndexURL('', gettext('Home'), false); ?>
					<?php
					if ($isHomePage) {
						printCustomPageURL(getGalleryTitle(), 'gallery', '', ' » ');
					}
					?>
				</h2>
			</div>

			<div class="album-desc"><?php printGalleryDesc(); ?></div>

			<?php printPageListWithNav(gettext('« prev'), gettext('next »'), false, true, 'pagelist', NULL, true, 7); ?>

			<?php include('inc_print_album_thumb.php'); ?>

			<?php printPageListWithNav(gettext('« prev'), gettext('next »'), false, true, 'pagelist', NULL, true, 7); ?>

		</div>	<!-- content -->

	<?php include('inc_sidebar.php'); ?>

	</div>	<!-- main -->

<?php include('inc_footer.php'); ?>