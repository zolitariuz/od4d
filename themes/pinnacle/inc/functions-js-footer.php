<?php

/**
* Here we add all the javascript that needs to be run on the footer.
**/
function footer_scripts(){
	global $post;

	if( wp_script_is( 'functions', 'done' ) ) :

?>
		<script type="text/javascript">
			$( document ).ready(function() {
				runIsotope('.isotope-container', '.post');
				filterIsotope('.isotope-container', '.post');
			});
		</script>
<?php
	endif;
}// footer_scripts
?>