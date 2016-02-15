<?php
	global $post;
	get_header();

	$website_link = get_implementing_partner_meta( $post->ID, '_official_website_meta' );
	$twitter_username = get_implementing_partner_meta( $post->ID, '_twitter_username_meta' );
	$rss_link = get_implementing_partner_meta( $post->ID, '_rss_link_meta' );

?>
	<div class="[ container ]">
		<div class="[ rowtight ][ postclass pageclass clearfix entry-content ]">
			<div class="[ tcol-ss-12 tcol-md-8 ]">
				<?php the_post_thumbnail( 'full', array( 'class' => '[ margin-bottom ][ image-responsive ]' ) ); ?>
				<div class="[ margin-bottom ]">
					<?php the_content(); ?>
				</div>
				<h4 class="[ hometitle ]">Recents Projects</h4>
				<?php get_template_part('templates/implementing-partner', 'projects'); ?>
			</div>
			<aside class="[ tcol-ss-12 tcol-md-4 ]">
				<div class="[ margin-bottom ]">
					<h4 class="[ hometitle ]">Site link</h4>
					<p><a href="<?php echo $website_link; ?>">Official Website</a></p>
				</div>
				<div class="[ margin-bottom ]">
					<h4 class="[ hometitle ]">Twitter</h4>
					<p>@<?php echo $twitter_username; ?></p>
				</div>
				<div class="[ margin-bottom ]">
					<h4 class="[ hometitle ]">RSS</h4>
				</div>
				
			</aside>
		</div>
	</div>

<script>//!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<script>function twit(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}
twit(document,"script","twitter-wjs");</script>
<?php get_footer(); ?>