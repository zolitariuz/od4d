<?php
	global $post;
	get_header();

	$website_link = get_implementing_partner_meta( $post->ID, '_official_website_meta' );
	$twitter_username = get_implementing_partner_meta( $post->ID, '_twitter_username_meta' );
	$widget_id = get_post_meta($post->ID, '_widget_id_meta', true);
	$pdfs = get_result_pdfs( $post->ID );
?>

	<div id="pageheader" class="titleclass">
		<div class="header-color-overlay"></div>
		<div class="container">
			<div class="page-header">
				<div class="row">
					<div class="col-md-12">
						<h1 class="kad-page-title entry-title" itemprop="name headline"><?php the_title( ); ?></h1>
					</div>
				</div>
			</div>
		</div><!--container-->
	</div>
	<br />
	<div class="[ container ]">
		<div class="[ rowtight ][ postclass pageclass clearfix entry-content ]">
			<div class="[ tcol-ss-12 tcol-md-8 ]">
				<?php the_post_thumbnail( 'full', array( 'class' => '[ margin-bottom ][ image-responsive image-centered ][ padding ]' ) ); ?>
				<div class="[ margin-bottom ]">
					<?php the_content(); ?>
				</div>
				<?php get_template_part('templates/implementing-partner', 'projects'); ?>

				<?php
				$args_news = array(
					'post_type' 		=> 'post',
					'posts_per_page' 	=> 4,
					'tax_query' => array(
						array(
							'taxonomy' => 'implementing_partner',
							'field'    => 'slug',
							'terms'    => array( $post->post_title ),
						)
					)
				);
				$query_news = new WP_Query($args_news);
				if( have_posts() ) : ?>
					<h4 class="[ hometitle ]">Highlights</h4>
					<div class="row">
					<?php while ( $query_news->have_posts() ) : $query_news->the_post(); ?>	
						
							<div class="[ col-sm-12 col-md-6 col-lg-4 ][ news-item ]">
								<a href="<?php echo the_permalink(); ?>">
									<?php echo get_the_title(); ?>
								</a>
							</div>
						
				<?php endwhile; endif; wp_reset_query(); ?>
				</div>
			</div>
			<aside class="[ tcol-ss-12 tcol-md-4 ]">
				<?php if ( $website_link != '' ){ ?>
					<div class="[ margin-bottom ]">
						<h4 class="[ hometitle ]">Official website</h4>
						<p class="[ text-center ]"><a href="<?php echo $website_link; ?>"><?php echo $website_link; ?></a></p>
					</div>
				<?php } ?>
				<?php if( ! empty( $pdfs ) ) : ?>
					<div class="[ margin-bottom ]">
						<h4 class="[ hometitle ]">Accountability</h4>
						<div class="[ isotope-container ]">
							<div class="[ rowtight ]">
								<?php foreach ( $pdfs as $key => $pdf ) : ?>
									<div class="[ post ][ tcol-ss-12 tcol-sm-6 tcol-md-12 ][ margin-bottom ]">
										<div class="[ post__card ]">
											<a class="[ text-ellipsis ]" href="<?php echo $pdf['url'] ?>" target="_blank"><?php echo $pdf['title'] ?></a>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( ! empty($twitter_username)  AND ! empty($widget_id)  ){ ?>
					<div class="[ margin-bottom ]">
						<div id="post-85" class="blog_item postclass" itemscope="" itemtype="http://schema.org/BlogPosting">
							<a class="twitter-timeline" href="https://twitter.com/<?php echo $twitter_username; ?>" data-widget-id="<?php echo $widget_id; ?>">kneknk @<?php echo $twitter_username; ?>.</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</div> <!-- Blog Item -->
					</div>
				<?php } ?>
			</aside>
		</div>
	</div>

<script>//!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<script>function twit(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}
twit(document,"script","twitter-wjs");</script>
<?php get_footer(); ?>