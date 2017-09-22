<?php
// force UTF-8 Ø
if (!defined('WEBPATH')) die();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php echo getOption('charset'); ?>">
	<?php zp_apply_filter('theme_head'); ?>
	<title>
	<?php
	echo getMainSiteName() . ' | ';
	switch ($_zp_gallery_page) {
		case 'index.php':
			if (isset($isHomePage) && $isHomePage) { echo gettext('Home'); } else { echo gettext('Gallery'); }; break;
		case '404.php':
			echo gettext('Object not found'); break;
		case 'album.php':
			echo getBareAlbumTitle(); if ($_zp_page > 1) { echo ' [' . $_zp_page . ']'; }; break;
		case 'archive.php':
			echo gettext('Archive View'); break;
		case 'contact.php':
			echo gettext('Contact'); break;
		case 'favorites.php':
			echo gettext('My favorites'); if ($_zp_page > 1) { echo ' [' . $_zp_page . ']'; }; break;
		case 'gallery.php':
			echo gettext('Gallery'); if ($_zp_page > 1) { echo ' [' . $_zp_page . ']'; }; break;
		case 'image.php':
			echo getBareAlbumTitle() . ' | ' . getBareImageTitle(); break;
		case 'news.php':
			if (is_NewsArticle()) { echo getBareNewsTitle(); } else { echo gettext('News'); if ($_zp_page > 1) { echo ' [' . $_zp_page . ']'; }; }; break;
		case 'pages.php':
			echo getBarePageTitle(); break;
		case 'password.php':
			echo gettext('Password Required...'); break;
		case 'register.php':
			echo gettext('Register'); break;
		case 'search.php':
			echo gettext('Search'); if ($_zp_page > 1) { echo ' [' . $_zp_page . ']'; }; break;
	}
	?>
	</title>

	<?php
	if (class_exists('RSS')) {
		if (getOption('RSS_album_image')) {
			printRSSHeaderLink('Gallery', gettext('Latest images RSS'));
		}
		if ($_zenpage_and_news_enabled && getOption('RSS_articles')) {
			printRSSHeaderLink('News', gettext('News and Gallery RSS'));
		}
	}
	?>

	<link rel="stylesheet" href="<?php echo $_zp_themeroot; ?>/css/style.css" type="text/css" media="screen"/>
	<link rel="shortcut icon" href="<?php echo $_zp_themeroot; ?>/images/faviconst.ico" />

	<script type="text/javascript" src="<?php echo $_zp_themeroot; ?>/js/fadeSliderToggle.js"></script>
	<script type="text/javascript" src="<?php echo $_zp_themeroot; ?>/js/i-feel-dirty.js"></script>

	<?php if (($_zp_gallery_page == 'image.php') || (($_zenpage_and_news_enabled) && (is_NewsArticle()))) { ?>
	<script type="text/javascript">
	//<![CDATA[
		<?php $NextURL = $PrevURL = false; ?>
		<?php if ($_zp_gallery_page == 'image.php') { ?>
			<?php if (hasNextImage()) { ?>var nextURL = "<? echo html_encode(getNextImageURL()); $NextURL = true; ?>";<?php } ?>
			<?php if (hasPrevImage()) { ?>var prevURL = "<? echo html_encode(getPrevImageURL()); $PrevURL = true; ?>";<?php } ?>
		<?php } else { ?>
			<?php if (($_zenpage_and_news_enabled) && (is_NewsArticle())) { ?>
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
				<?php if ($_zenpage_and_news_enabled && getOption('RSS_articles')) { ?>
				<div class="rsslink">
					<?php printRSSLink('News', '', '', '', false, 'rssimg'); $rss_feed = true; ?>
					<?php printRSSLink('News', '', gettext('News'), '', false, 'rsstext'); ?>
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

			<?php if (extensionEnabled('dynamic-locale')) { ?>
			<div class="flag-selector">
				<?php printLanguageSelector(); ?>
			</div>
			<?php } ?>
		</div>	<!-- head2 -->

	</div>	<!-- header -->