<div class="author-box">
	<div class="author-box-avtar">
		<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '60' );  } ?>
	</div>
	<div class="author-info-container">
		<div class="author-info">
			<div class="author-head">
				<h5><?php the_author_meta('display_name'); ?></h5>
			</div>
			<p><?php the_author_meta('description') ?></p>
			<div class="author-social">
				<?php if(get_the_author_meta('facebook')) { ?><span class="author-fb"><a class="fa fa-facebook" href="<?php echo get_the_author_meta('facebook'); ?>"></a></span><?php } ?>
				<?php if(get_the_author_meta('twitter')) { ?><span class="author-twitter"><a class="fa fa-twitter" href="<?php echo get_the_author_meta('twitter'); ?>"></a></span><?php } ?>
				<?php if(get_the_author_meta('googleplus')) { ?><span class="author-gp"><a class="fa fa-google-plus" href="<?php echo get_the_author_meta('googleplus'); ?>"></a></span><?php } ?>
				<?php if(get_the_author_meta('linkedin')) { ?><span class="author-linkedin"><a class="fa fa-linkedin" href="<?php echo get_the_author_meta('linkedin'); ?>"></a></span><?php } ?>
				<?php if(get_the_author_meta('pinterest')) { ?><span class="author-pinterest"><a class="fa fa-pinterest" href="<?php echo get_the_author_meta('pinterest'); ?>"></a></span><?php } ?>
				<?php if(get_the_author_meta('dribbble')) { ?><span class="author-dribbble"><a class="fa fa-dribbble" href="<?php echo get_the_author_meta('dribble'); ?>"></a></span><?php } ?>
			</div>
		</div>
	</div>
</div>