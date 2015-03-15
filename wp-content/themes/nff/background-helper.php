<?php
use INUtils\Entity\PostEntity;
use INUtils\Service\PostService;

function getBackgroundImage(){
    $pageEntity = new PostEntity(get_the_ID());
    $bkgroundImage = $pageEntity->getImage();
    $imageSize = getimagesize($bkgroundImage);
    if($imageSize[0] < 480){
        $bkgroundImage = "";
    }
    $blogs = PostService::getSingleton()->getPosts();
    ?>
    <div class="image-filter">
    	<div class="opacity-filter"></div>
        <div class="slideshow">
            <?php if($bkgroundImage != ""): ?>
                <div class="item" style="display: block">
                    <img src="<?php echo $bkgroundImage; ?>" class="item-to-show" style="display: none">
                </div>
            <?php else: ?>
                <?php echo do_shortcode('[slideshow]'); ?>
            <?php endif; ?>
        </div>
    </div>
    <?php 
}