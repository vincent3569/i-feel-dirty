				<?php // album loop ?>

				<div id="albums">
					<?php $col = 1; while (next_album()): ; ?>
						<div class="album<?php if ($col == getOption('personnal_thumb_album_number_col')) { echo '-lastcol'; $col = 0; } ?>">
							<div class="albumthumb">
								<a href="<?php echo html_encode(getAlbumLinkURL()); ?>" title="<?php echo gettext('View album:'); ?><?php echo getAnnotatedAlbumTitle(); ?>"><?php printCustomAlbumThumbImage(getAnnotatedAlbumTitle(), NULL, getOption(personnal_thumb_width), getOption(personnal_thumb_height), getOption(personnal_thumb_width), getOption(personnal_thumb_height)); ?></a>
							</div>
							<div class="albumdesc">
								<h3><a href="<?php echo html_encode(getAlbumLinkURL()); ?>" title="<?php echo gettext('View album:'); ?><?php echo getAnnotatedAlbumTitle(); ?>">[ <?php printAlbumTitle(); ?> ]</a></h3>
							</div>
						</div>
					<?php $col++; endwhile; ?>

				</div>
				<br style="clear: both" />