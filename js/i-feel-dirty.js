jQuery(document).ready(function($) {

	//For Comment slide : force to open #comment-wrap if there is an errorbox or notebox
	if (($('#comment-wrap .errorbox').length) || ($('#comment-wrap .notebox').length)) {
		$('#comment-wrap').css('display', 'block');
		$('#comment-wrap').css('opacity', '1');
	} else {
		$('#comment-wrap').css('display', 'none');
		$('#comment-wrap').css('opacity', '0');
	};

	$('.fadetoggler').click(function() {
		$(this).next('#comment-wrap').fadeSliderToggle();
	});

	$('#comment-wrap a img[alt="RSS Feed"]').remove();
	$('#comment-wrap a[rel="nofollow"]').prepend('<img src="/themes/i-feel-dirty/images/feedicon.gif" alt="RSS Feed"> ');
});