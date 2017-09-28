				<?php // images thumbnails loop ?>

				<div id="images" class="clearfix">
					<?php
					$col = 1;
					while (next_image()) { ?>
						<div class="image">
							<div class="imagethumb<?php if ($col == getOption('images_per_row')) { echo '-lastcol'; $col = 0; } ?>">
								<a class="thumb" href="<?php echo html_encode(getImageURL()); ?>" title="<?php echo html_encode(getBareImageTitle()) ?>"><?php printImageThumb(getBareImageTitle(), 'image'); ?></a>
							</div>
						</div>
						<?php
						$col++;
					} ?>
				</div>
				<br style="clear: both" />
