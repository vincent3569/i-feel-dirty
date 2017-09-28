				<?php // album loop ?>

				<div id="albums">
					<?php
					$col = 1;
					while (next_album()) { ?>
						<div class="album<?php if ($col == getOption('albums_per_row')) { echo '-lastcol'; $col = 0; } ?>">
							<div class="albumthumb">
								<a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo html_encode(getBareAlbumTitle()); ?>"><?php printCustomAlbumThumbImage(getBareAlbumTitle(), NULL, getOption('personnal_thumb_width'), getOption('personnal_thumb_height'), getOption('personnal_thumb_width'), getOption('personnal_thumb_height'), NULL, NULL, 'image'); ?></a>
							</div>
							<div class="albumdesc">
								<h3><a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo html_encode(getBareAlbumTitle()); ?>">[ <?php printAlbumTitle(); ?> ]</a></h3>
							</div>
						</div>
						<?php
						$col++;
					} ?>

				</div>
				<br style="clear: both" />