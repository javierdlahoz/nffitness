<?php

$phiPage = get_page_by_title("philosophy");
$pageContent = $phiPage->post_content;
get_header();
?>
<div class="image-filter">
	<div class="opacity-filter"></div>
	<div class="slideshow">
        <?php echo do_shortcode('[slideshow]'); ?>
    </div>
</div>
<div class="phi-container">
    <center>
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo3.png">
    		<div class="title">
    			<!-- content -->
    			<p>
    				PHILO<br />SOPHY
    			</p>
    		</div>
    		<div class="slogan">
    			<!-- content -->
    			<p>Inspire.Train.Nourish.</p>
    		</div>
    		<hr class="title-bar">
    		<!-- rasterized frame -->
    	    <div class="phi-content">
    	       <p><?php echo $pageContent; ?></p>
    	    </div>
	</center>
</div>
<?php get_footer(); 