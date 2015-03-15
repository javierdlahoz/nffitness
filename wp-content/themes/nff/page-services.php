<?php 
use INUtils\Entity\PostEntity;
use INUtils\Service\PostService;
use INUtils\Helper\TextHelper;
get_header(); 
$pageEntity = new PostEntity(get_the_ID());
getBackgroundImage();
$postService = PostService::getSingleton();
$postService->setPostType("service");
$services = $postService->getPosts();
?>
<div class="phi-container services-container">
   <center>
    	<div class="phi-content">
    	   <div class="row">
    	       <?php foreach($services as $service): ?>
    	           <div class="col-md-4">
    	               <div class="service-img">
    	                   <img src="<?php echo $service->getImage(); ?>">
    	               </div>
    	               <div class="service-title">
    	                   <?php echo $service->getTitle(); ?>
    	                   <hr class="title-bar">
    	               </div>
    	               <div class="service-content">
    	                   <p><?php echo TextHelper::cropText($service->getContent(), 300); ?></p>
    	               </div>
    	               <div class="service-more">
    	                   <a href="<?php echo $service->getPermalink(); ?>">More</a>
    	               </div>
    	           </div>
    	       <?php endforeach; ?>
    	   </div>
    	</div>
	</center>
</div>
<?php get_footer(); ?>