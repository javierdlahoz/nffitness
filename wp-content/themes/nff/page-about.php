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
    			ABOUT
    		</p>
    	</div>
    	<hr class="title-bar">
    	<div class="phi-content">
    	   <p>
    	       <?php echo $pageEntity->getContent(); ?>
    	   </p>
    	</div>
	</center>
</div>
<?php get_footer(); ?>