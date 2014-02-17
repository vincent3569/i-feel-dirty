				<?php // images thumbnails loop ?>

				<div id="images" class="clearfix">
					<?php $col = 1; while (next_image(false, $firstPageImages)): ; ?>
						<div class="image">
							<div class="imagethumb<?php if ($col == getOption('personnal_thumb_image_number_col')) { echo '-lastcol'; $col = 0; } ?>">
								<a class="thumb" href="<?php echo html_encode(getImageLinkURL()); ?>" title="<?php echo getAnnotatedImageTitle(); ?>"><?php printImageThumb(getAnnotatedImageTitle()); ?></a>
							</div>
						</div>
					<?php $col++; endwhile; ?>
				</div>
				<br style="clear: both" />
