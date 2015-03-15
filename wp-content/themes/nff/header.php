<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

require __DIR__.'/../../plugins/in_utils/config/module_loader.php';
require __DIR__.'/background-helper.php';

$pagesArgs = array(
    'posts_per_page'   => 10,
    'orderby'          => 'ID',
    'order'            => 'DESC',
    'post_type'        => 'page',
    'post_status'      => 'publish',
    'suppress_filters' => true
); 
$pages = get_posts($pagesArgs);
$requestUrl = $_SERVER["REQUEST_URI"];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<?php wp_head(); ?>
<link
	href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css"
	rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/index.css"
	rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/service.css"
	rel="stylesheet">
<link
	href="<?php echo get_template_directory_uri(); ?>/css/site_global.css"
	rel="stylesheet">

<script type="text/javascript">
       if(typeof Muse == "undefined") 
           window.Muse = {}; 
       window.Muse.assets = {
    	       "required":
        	       ["jquery-1.8.3.min.js",
          	        "museutils.js",
          	        "jquery.watch.js",
          	        "webpro.js", 
          	        "musewpslideshow.js", 
          	        "jquery.museoverlay.js", 
          	        "touchswipe.js", 
          	        "museredirect.js", 
          	        "index.css"], "outOfDate":[]};
    </script>
</head>
<body>
	<div class="clearfix" id="page">
		<!-- column -->
		<div class="position_content" id="page_position_content">
			<div class="clearfix colelem" id="pu75">
				<!-- group -->
				<div class="browser_width" id="u75-bw">
					<div id="u75">
						<div class="container">
                			 <div class="logo-left">
                			     <a href="/">
                			         <img src="<?php echo get_template_directory_uri(); ?>/images/logo1.png" >
                			     </a>
                			</div>
                			<div class="links-container">
                    			<p>
                        			<a class="nonblock nontext pinned-colelem links-at-the-top
                        			 <?php if(strpos($requestUrl, "service")) echo "link-active"; ?>" id="u93-4"
                        				href="/services">
                        				<!-- content -->
                        				SERVICES
                        			</a> 
                        			<a class="nonblock nontext pinned-colelem links-at-the-top
                        			<?php if(strpos($requestUrl, "blog")) echo "link-active"; ?>" id="u91-4"
                        				href="/blog">
                        				<!-- content -->
                        				BLOG
                        			</a> 
                        			<a class="nonblock nontext anim_swing pinned-colelem links-at-the-top 
                        			<?php if(strpos($requestUrl, "about")) echo "link-active"; ?>"
                        				id="u92-4" href="/about">
                        				<!-- content -->
                        				ABOUT
                        			</a> 
                        			<a class="nonblock nontext pinned-colelem links-at-the-top
                        			<?php if(strpos($requestUrl, "contact")) echo "link-active"; ?>" id="u89-4"
                        				href="/contact">
                        				<!-- content -->
                        				CONTACT
                        			</a>
                        		</p>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
    </div>