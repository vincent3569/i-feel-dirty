				<?php // news article loop ?>

				<?php printNewsPageListWithNav(gettext('next &raquo;'), gettext('&laquo; prev')); ?>

				<?php while (next_news()): ; ?>
				<div class="post clearfix">
					<div class="posttitle">
						<h3><?php printNewsTitleLink(); ?></h3>
					</div>

					<div class="postmetadata">
						<?php printNewsDate(); ?><?php printNewsCategories(', ', gettext(' | '), 'hor-list'); ?>
					</div>

					<div class="entrytext clearfix" >
						<?php printNewsContent(); ?>
					</div>
				</div>
				<?php endwhile; ?>

				<?php printNewsPageListWithNav(gettext('next &raquo;'), gettext('&laquo; prev')); ?>