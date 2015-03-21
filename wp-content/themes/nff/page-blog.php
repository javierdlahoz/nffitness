<?php 
use INUtils\Entity\PostEntity;
use INUtils\Service\PostService;
use INUtils\Helper\TextHelper;
get_header(); 
$pageEntity = new PostEntity(get_the_ID());
getBackgroundImage();

$blogs = PostService::getSingleton()->getPosts();

?>
<div class="phi-container">
    <center>
    	<div class="phi-content blog-container">
            <div class="title" style="margin-top: 0px; margin-bottom: 30px;">
    			<p>
    				BLOG
    			</p>
    			<hr class="title-bar">
    		</div>
            <div class="row">
                <div class="col-md-12">
                    <?php 
                    $i=0;
                    foreach($blogs as $blog): ?>
                        <div class="blog-content blog-active" id="blog_<?php echo $i; ?>">
                            <div class="subtitle">
                                <?php echo $blog->getTitle(); ?><br>
                                <small><?php echo $blog->getFormattedDate(); ?></small>
                            </div>
                            <hr class="title-bar blog-title-bar">
                            <p>
                                <?php echo TextHelper::cropText($blog->getContent(), 400); ?>
                            </p>
                            <br>
                            <?php if(strlen($blog->getContent()) > 400): ?>
                            <div class="service-more">
                                <a href="<?php echo $blog->getPermalink(); ?>">More</a>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php 
                    $i++;
                    endforeach; ?>
                </div>
            </div>
       </div>
   </center>
</div>
<?php get_footer(); ?>