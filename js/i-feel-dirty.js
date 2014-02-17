			jQuery(document).ready(function($) {
				
				//For Comment slide : force to open #comment-wrap if there is an errorbox
				if ($('#comment-wrap .errorbox').length){
					$('#comment-wrap').css('display', 'block');
					$('#comment-wrap').css('opacity', '1');
				} else {
					$('#comment-wrap').css('display', 'none');
					$('#comment-wrap').css('opacity', '0');
				};
				$('.fadetoggler').click(function(){
					$(this).next('#comment-wrap').fadeSliderToggle();
				});
			});