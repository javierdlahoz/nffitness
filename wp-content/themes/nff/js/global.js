(function(jQuery) {
  jQuery.fn.resizeToParent = function(opts) {
    var defaults = {
     parent: 'div',
     delay:0
    }

    var opts = jQuery.extend(defaults, opts);

    function positionImage(obj) {
      // reset image (in case we're calling this a second time, for example on resize)
      obj.css({'width': '', 'height': '', 'margin-left': '', 'margin-top': ''});

      // dimensions of the parent
      var parentWidth = obj.parents(opts.parent).width();
      var parentHeight = obj.parents(opts.parent).height();

      // dimensions of the image
      var imageWidth = obj.width();
      var imageHeight = obj.height();

      // step 1 - calculate the percentage difference between image width and container width
      var diff = imageWidth / parentWidth;

      // step 2 - if height divided by difference is smaller than container height, resize by height. otherwise resize by width
 if ((imageHeight / diff) < parentHeight) {
       obj.css({'width': 'auto', 'height': parentHeight});

       // set image variables to new dimensions
       imageWidth = imageWidth / (imageHeight / parentHeight);
       imageHeight = parentHeight;
      }
      else {
       obj.css({'height': 'auto', 'width': parentWidth});

       // set image variables to new dimensions
       imageWidth = parentWidth;
       imageHeight = imageHeight / diff;
      }

      // step 3 - center image in container
      var leftOffset = (imageWidth - parentWidth) / -3.3;
      var topOffset = (imageHeight - parentHeight) / -3;

      obj.css({'margin-left': leftOffset, 'margin-top': topOffset});
    }

    // run the position function on window resize (to make it responsive)
    var tid;
    var elems = this;

    jQuery(window).on('resize', function() {
      clearTimeout(tid);
      tid = setTimeout(function() {
        elems.each(function() {
          positionImage(jQuery(this));
        });
      }, opts.delay);
    });

    return this.each(function() {
      var obj = jQuery(this);
      obj.attr("src", obj.attr("src"));
      // bind to load of image
      obj.load(function() {
        positionImage(obj);
      });

      // run the position function if the image is cached
      if (this.complete) {
        positionImage(obj);
      }
    });
  }
})( jQuery );


function showItemsInSlideShow(i){
	var itemCount = $(".item").length;
	var itemToShow = $(".item")[i];
	$(".item").fadeOut(500);
	$(itemToShow).fadeIn(1000);
	$('.item-to-show').resizeToParent();
	
	if(i < itemCount - 1){
		i++;
	}
	else{
		i = 0;
	}
	setTimeout(function(){
		showItemsInSlideShow(i);
	}, 10000);
}

$(window).resize(function(){
	$('.slideshow').css("height", ($(window).height() - 0) + "px");
	$('.item-to-show').resizeToParent();
});

$(document).ready(function(){
	$('.slideshow').css("height", ($(window).height() - 0) + "px");
	$('.item-to-show').resizeToParent();
	
	if($(".item").length > 1){
		showItemsInSlideShow(0);
	}
	else{
		$('.item-to-show').fadeIn(500);
		$('.item-to-show').resizeToParent();
	}
});


function showBlog(index){
	$(".blog-list").removeClass("blog-active-li");
	$("#blog_list_"+index).addClass("blog-active-li");
	
	$(".blog-content").removeClass("blog-active");
	$("#blog_"+index).addClass("blog-active");
}

function showOrHideMenu(){
	var isMenuVisible = $("#mobile-menu-list").is(":visible"); 
	console.log(isMenuVisible);
	if(isMenuVisible === false){
		$("#mobile-menu-list").show('slide', {direction: 'right'}, 400);
		$("#menu-text").hide();
		$("#close-text").show();
	}
	else{
		$("#mobile-menu-list").hide('slide', {direction: 'right'}, 200);
		$("#menu-text").show();
		$("#close-text").hide();
	}
}