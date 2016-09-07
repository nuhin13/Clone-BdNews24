

/* ed by tahmina@bdnews24.com */
/* autoslideshow for 10 sec */


$(document).ready(function() {

 
      
		if ($("div#mainDisplayContainer_autoSlideshow").length > 0) {

                

              
               $('#imageslide_for_mainDisplayContainer ul').cycle({ 
                      fx:     'fade',
					  pause:1,
                      pauseOnPagerHover: true,
                      timeout: 4000,				  
                      next:   '#picturestory_next_pic', 
                      prev:   '#picturestory_prev_pic' 
                              });
                    }



    if ($("div#picture_story_for_section").length > 0) {
        var index = 0;
        var num = 1, thumbnum = 1;


        $("div#picture_story_for_section #imageslide_for_mainDisplayContainer li").each(function() {
            $(this).attr("id", "" + num);
            num++;
        })

        $("div#picture_story_for_section .image_navigation li").each(function() {
            $(this).attr("id", "thumb-" + thumbnum);
            thumbnum++;
        })

        total_thumb_container_width = thumbnum * 128;
        $("div#picture_story_for_section .image_navigation ul").css("width", total_thumb_container_width);

        total_num_slide = Math.floor(total_thumb_container_width / 640);
        total_num_of_thumb = $("div#picture_story_for_section .image_navigation li").length;
        

        function disable_gal_thumb_nav (){
           if (parseInt($("#picture_story_for_section .image_navigation ul").css("left")) == 0) {
                $("#picture_story_for_section #previous_thumbs").addClass("disable");
            }

            if (parseInt($("#picture_story_for_section .image_navigation ul").css("left")) != 0) {
                $("#previous_thumbs").removeClass("disable");
            }

            if (Math.abs(parseInt($("#picture_story_for_section .image_navigation ul").css("left"))) == Math.abs(total_num_slide*640)) {
                $("#next_thumbs").addClass("disable");
            }

            if (Math.abs(parseInt($("#picture_story_for_section .image_navigation ul").css("left"))) != Math.abs(total_num_slide*640)) {
                 $("#next_thumbs").removeClass("disable");
            }
        }
        disable_gal_thumb_nav();
        $("#next_thumbs").bind("click", function(e4) {
            e4.preventDefault();
            if (!e4.detail || e4.detail == 1) {
                if (Math.abs(parseInt($("div#picture_story_for_section #gal_nav").css("left"))) != Math.abs(total_num_slide*640)) {
                   $("div#picture_story_for_section #gal_nav").animate({
                        left: '-=640'
                    }, 200, function() {
                        disable_gal_thumb_nav();
                    });
                }
            }
        })

        $("#previous_thumbs").bind("click", function(e4) {
            e4.preventDefault();
            if (!e4.detail || e4.detail == 1) {
                if (parseInt($("div#picture_story_for_section #gal_nav").css("left")) != 0) {
                    $("div#picture_story_for_section #gal_nav").animate({
                        left: '+=640'
                    }, 200, function() {
                        disable_gal_thumb_nav();
                    });
                }
            }
        })
        $("#previous_thumbs").bind("dblclick", function(e4) {
            e4.preventDefault();
        })

        function move_gal_thumb_ul(current){
            current_image_id = current;
            slide_need = Math.floor((current_image_id - 1) / 5);
            slide_amount = -(slide_need * 640);
            $("div#picture_story_for_section #gal_nav").animate({
                left: slide_amount
            }, 200)
        }

        function onAfter(curr, next, opts) {
            var num = '' + (opts.currSlide + 1) + ' of ' + opts.slideCount;
            $('#slide_numbers').html(num);

            //$("#gallery_slide_for_section").height($(next).height());
            //$("#gallery_slide_for_section ul").height($(next).height());
            disable_gal_thumb_nav();

        }

        function onBefore(curr, next, opts) {
            $("div#picture_story_for_section .image_navigation li a").each(function() {
                $(this).removeClass("selected");
            })
            $("#thumb-" + $(this).attr("id") + " a").addClass("selected");
            move_gal_thumb_ul($(this).attr("id"));
            disable_gal_thumb_nav();
        }

        captionbtnstatus = 0
        $("#hide_show_caption_btn").click(function(e) {
            e.preventDefault();
            if (captionbtnstatus == 0) {
                $("div#picture_story_for_section .caption").each(function() {
                    $(this).css("display", "none");

                })
                $(this).text("Show Caption");
                captionbtnstatus = 1
            } else {
                $("div#picture_story_for_section .caption").each(function() {
                    $(this).css("display", "block");

                })
                $(this).text("Hide Caption");
                captionbtnstatus = 0
            }

        })

     
		
		
    }

	
    
  
	

});
