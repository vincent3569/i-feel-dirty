<?php 

// force UTF-8 Ø

if (!defined('WEBPATH')) die();

setOption('personnal_thumb_width', '200', false);
setOption('personnal_thumb_height', '120', false);

/*
setOption('personnal_thumb_album_number_col', '2', false);
setOption('personnal_thumb_image_number_col', '3', false);
*/

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=<?php echo getOption('charset'); ?>" />
	<?php zp_apply_filter('theme_head'); ?>
	<title>
	<?php
	echo getMainSiteName();
	if (($_zp_gallery_page == 'index.php') && ($isHomePage)) {echo ' | '.gettext('Home'); }
	if (($_zp_gallery_page == 'index.php') && (!$isHomePage)) {echo ' | '.gettext('Gallery'); }
	if ($_zp_gallery_page == '404.php') {echo ' | '.gettext('Object not found'); }
	if ($_zp_gallery_page == 'album.php') {echo ' | '.getBareAlbumTitle(); if ($_zp_page > 1) {echo ' [' . $_zp_page . ']'; }}
	if ($_zp_gallery_page == 'archive.php') {echo ' | '.gettext('Archive View'); }
	if ($_zp_gallery_page == 'contact.php') {echo ' | '.gettext('Contact'); }
	if ($_zp_gallery_page == 'favorites.php') {echo ' | ' . gettext('My favorites'); if ($_zp_page > 1) {echo ' [' . $_zp_page . ']'; }}
	if ($_zp_gallery_page == 'gallery.php') {echo ' | '.gettext('Gallery'); if ($_zp_page > 1) {echo ' [' . $_zp_page . ']'; }}
	if ($_zp_gallery_page == 'image.php') {echo ' | '.getBareAlbumTitle().' | '.getBareImageTitle(); }
	if ($_zp_gallery_page == 'news.php') {echo ' | '.gettext('News'); if ($_zp_page > 1) {echo ' [' . $_zp_page . ']'; }}
	if (($_zp_gallery_page == 'news.php') && (is_NewsArticle())) {echo ' | '.getBareNewsTitle(); }
	if ($_zp_gallery_page == 'pages.php') {echo ' | '.getBarePageTitle(); }
	if ($_zp_gallery_page == 'password.php') {echo ' | '.gettext('Password Required...'); }
	if ($_zp_gallery_page == 'register.php') {echo ' | '.gettext('Register'); }
	if ($_zp_gallery_page == 'search.php') {echo ' | '.gettext('Search'); if ($_zp_page > 1) {echo ' [' . $_zp_page . ']'; }}
	?>
	</title>

	<?php
	if (class_exists('RSS')) {
		if (getOption('RSS_album_image')) {
			printRSSHeaderLink('Gallery', gettext('Latest images RSS'));
		}
		if (getOption('RSS_articles')) {
			printRSSHeaderLink('NewsWithImages', gettext('News and Gallery RSS'));
		}
	}
	?>

	<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/css/style.css" type="text/css" media="screen"/>
	<link rel="shortcut icon" href="<?php echo $_zp_themeroot; ?>/images/faviconst.ico" />

	<script type="text/javascript" src="<?php echo $_zp_themeroot; ?>/js/fadeSliderToggle.js"></script>
	<script type="text/javascript" src="<?php echo $_zp_themeroot; ?>/js/i-feel-dirty.js"></script>

	<?php if (($_zp_gallery_page == 'image.php') || ((function_exists('is_NewsArticle')) && (is_NewsArticle()))) { ?>
	<script type="text/javascript">
	//<![CDATA[
		<?php $NextURL = $PrevURL = false; ?>
		<?php if ($_zp_gallery_page == 'image.php') { ?>
			<?php if (hasNextImage()) { ?>var nextURL = "<? echo html_encode(getNextImageURL()); $NextURL = true; ?>";<?php } ?>
			<?php if (hasPrevImage()) { ?>var prevURL = "<? echo html_encode(getPrevImageURL()); $PrevURL = true; ?>";<?php } ?>
		<?php } else { ?>
			<?php if ((function_exists('checkForPage')) && (is_NewsArticle())) { ?>
				<?php if (getNextNewsURL()) { $article_url = getNextNewsURL(); ?>var nextURL = "<?php echo html_decode($article_url['link']); $NextURL = true; ?>";<?php } ?>
				<?php if (getPrevNewsURL()) { $article_url = getPrevNewsURL(); ?>var prevURL = "<?php echo html_decode($article_url['link']); $PrevURL = true; ?>";<?php } ?>
			<?php } ?>
		<?php } ?>

		var ColorboxActive = false;				// cohabitation entre script de navigation et colorbox

		function keyboardNavigation(e) {

			if (ColorboxActive) return true;	// cohabitation entre script de navigation et colorbox

			if (!e) e = window.event;
			if (e.altKey) return true;
			var target = e.target || e.srcElement;
			if (target && target.type) return true;		//an input editable element
			var keyCode = e.keyCode || e.which;
			var docElem = document.documentElement;
			switch(keyCode) {
				case 63235: case 39:
					if (e.ctrlKey || (docElem.scrollLeft == docElem.scrollWidth-docElem.clientWidth)) {
						<?php if ($NextURL) { ?>window.location.href = nextURL; <?php } ?>return false; }
					break;
				case 63234: case 37:
					if (e.ctrlKey || (docElem.scrollLeft == 0)) {
						<?php if ($PrevURL) { ?>window.location.href = prevURL; <?php } ?>return false; }
					break;
			}
			return true;
		}

		document.onkeydown = keyboardNavigation;

		// cohabitation entre script de navigation et colorbox
		$(document).bind('cbox_open', function() {ColorboxActive = true; })
		$(document).bind('cbox_closed', function() {ColorboxActive = false; });

	//]]>
	</script>
	<?php } ?>

	<?php if (getOption('use_colorbox_image')) { ?>
	<script type="text/javascript">
	//<![CDATA[
		$(document).ready(function() {
			$("a[rel='zoom']").colorbox({
				slideshow: true,
				slideshowSpeed: 3000,
				slideshowStart: '<?php echo gettext("start slideshow"); ?>',
				slideshowStop: '<?php echo gettext("stop slideshow"); ?>',
				previous: '<?php echo gettext("prev"); ?>',
				next: '<?php echo gettext("next"); ?>',
				close: '<?php echo gettext("close"); ?>',
				current : "image {current} / {total}",
				maxWidth: "98%",
				maxHeight: "98%",
				photo: true
			});
		});
	//]]>
	</script>
	<?php } ?>

	<?php if ($_zp_gallery_page == 'image.php') { ?>
	<script type="text/javascript">
	//<![CDATA[
		$(document).ready(function() {
			$(".colorbox").colorbox({
				inline:true,
				href:"#imagemetadata",
				close: '<?php echo gettext('close'); ?>'
				});
		});
	//]]>
	</script>
	<?php } ?>

</head>

<body>
<?php zp_apply_filter('theme_body_open'); ?>

<div class="container">
	<div class="header">

		<div class="head1">
			<h1><?php echo getMainSiteName(); ?></h1>
			<div class="description"><?php printGalleryDesc(); ?></div>
		</div>	<!-- head1 -->

		<div class="head2">
			<?php if (class_exists('RSS')) { ?>
				<?php $rss_feed = false; ?>
				<?php if (getOption('RSS_album_image')) { ?>
				<div class="rsslink">
					<?php printRSSLink('Gallery', '', '', '', false, 'rssimg'); $rss_feed = true; ?>
					<?php printRSSLink('Gallery', '', gettext('Gallery'), '', false, 'rsstext'); ?>
				</div>
				<?php } ?>
				<?php if (getOption('RSS_articles')) { ?>
				<div class="rsslink">
					<?php printRSSLink('NewsWithImages', '', '', '', false, 'rssimg'); $rss_feed = true; ?>
					<?php printRSSLink('NewsWithImages', '', gettext('News and Gallery'), '', false, 'rsstext'); ?>
				</div>
				<?php } ?>
				<?php if ($rss_feed) { ?>
					<script type="text/javascript">
					//<![CDATA[
						$('.rssimg').prepend('<img alt="RSS Feed" src="<?php echo $_zp_themeroot; ?>/images/feedicon.gif">');
					//]]>
					</script>
				<?php } ?>
			<?php } ?>

			<?php if (function_exists('printLanguageSelector')) { ?>
			<div class="flag-selector">
				<?php printLanguageSelector('langselector'); ?>
			</div>
			<?php } ?>
		</div>	<!-- head2 -->

	</div>	<!-- header -->