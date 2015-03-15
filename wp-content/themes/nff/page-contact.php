<?php 
use INUtils\Entity\PostEntity;
use INUtils\Service\PostService;
get_header(); 
$pageEntity = new PostEntity(get_the_ID());
getBackgroundImage();
?>
<div class="phi-container">
   <center>
        <div class="title">
    		<p>
    			CONTACT
    		</p>
    	</div>
    	<hr class="title-bar">
    	<div class="phi-content">
    	   <p>
    	       <?php echo $pageEntity->getContent(); ?>
    	   </p>
    	   <br>
    	   <div class="contact-form">
    	       <?php echo do_shortcode("[contact_form]"); ?>
    	   </div>
    	</div>
	</center>
</div>
<?php get_footer(); ?>