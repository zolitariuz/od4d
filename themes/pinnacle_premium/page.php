<?php get_header(); ?>
	<?php get_template_part('templates/page', 'header'); ?>
	
    <div id="content" class="container">
   	<div class="row">
    <div class="main <?php echo kadence_main_class(); ?>" role="main">
    	<div class="postclass pageclass clearfix entry-content" itemprop="mainContentOfPage">
			<?php get_template_part('templates/content', 'page'); ?>
		</div>
		<?php do_action('kt_after_pagecontent'); ?>

</div><!-- /.main -->
  <?php get_footer(); ?>