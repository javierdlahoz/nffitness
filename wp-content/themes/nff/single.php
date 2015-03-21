<?php 
use INUtils\Entity\PostEntity;
use INUtils\Service\PostService;
get_header(); 
$pageEntity = new PostEntity(get_the_ID());
getBackgroundImage();
?>

<div class="phi-container">
   <center>
        <div class="phi-content">
            <div class="title blog-container">
        		<p>
        			<?php echo strtoupper($pageEntity->getTitle()); ?>
        		</p>
        	</div>
    	</div>
    	<hr class="title-bar">
    	<div class="phi-content" style="text-align: justify">
    	   <p>
    	       <?php echo $pageEntity->getContent(); ?>
    	   </p>
    	</div>
	</center>
</div>
<?php get_footer(); ?>