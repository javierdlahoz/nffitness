<?php 
use INUtils\Entity\PostEntity;
use INUtils\Service\PostService;
get_header(); 
$pageEntity = new PostEntity(get_the_ID());
getBackgroundImage();

$blogs = PostService::getSingleton()->getPosts();

?>
<div class="phi-container">
    
        <div class="container">
            <div class="row">
                <div class="col-md-4" style="margin-bottom: 50px;">
                    <div class="title white" style="margin-top: 0px">
            			<p>
            				BLOGS
            			</p>
            		</div>
            		<hr class="title-bar">
            		<center>
                        <ul class="blog-list">
                        <?php 
                        $i=0;
                        foreach($blogs as $blog): ?>
                            <li class="<?php if($i==0) echo "blog-active-li"; ?> blog-list" 
                            id="blog_list_<?php echo $i; ?>" onclick="showBlog(<?php echo $i; ?>);">
                                <i class="glyphicon glyphicon-play"></i>
                                <?php echo $blog->getTitle(); ?>
                            </li>
                        <?php 
                        $i++;
                        endforeach; ?>
                        </ul>
                    </center>
                </div>
                <div class="col-md-8">
                    <?php 
                    $i=0;
                    foreach($blogs as $blog): ?>
                        <div class="blog-content <?php if($i==0) echo "blog-active"; ?>" id="blog_<?php echo $i; ?>">
                            <div class="subtitle">
                                <?php echo $blog->getTitle(); ?><br>
                                <small><?php echo $blog->getFormattedDate(); ?></small>
                            </div>
                            <hr class="title-bar blog-title-bar">
                            <p>
                                <?php echo $blog->getContent(); ?>
                            </p>
                        </div>
                    <?php 
                    $i++;
                    endforeach; ?>
                </div>
            </div>
        </div> 
    </div>
</div>
<?php get_footer(); ?>