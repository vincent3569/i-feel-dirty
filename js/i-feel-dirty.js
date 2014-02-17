
			jQuery(document).ready(function($) {
				
				//For Comment slide
				$('#comment-wrap').css('display', 'none');
				$('#comment-wrap').css('opacity', '0');
				$(".fadetoggler").click(function() {   
				$(this).next("#comment-wrap").fadeSliderToggle();
				});
				
				//For Googlemap slide -- hack VBO
				$('#googlemap-wrap').css('display', 'none');
				$('#googlemap-wrap').css('opacity', '0');
				$(".fadetoggler-googlemap").click(function() {   
				$(this).next("#googlemap-wrap").fadeSliderToggle();
				});

			});