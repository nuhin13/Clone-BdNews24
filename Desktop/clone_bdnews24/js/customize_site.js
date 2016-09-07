
$(document).ready(function() {

  

    if ($("div#single_gallery_customize").length > 0) {
        var index = 0;
        var num = 1, thumbnum = 1;


        $("div#single_gallery_customize #gallery_slide_customize li").each(function() {
            $(this).attr("id", "" + num);
            num++;
        })

        $("div#single_gallery_customize .image_navigation li").each(function() {
            $(this).attr("id", "thumb-" + thumbnum);
            thumbnum++;
        })

        total_thumb_container_width = thumbnum * 128;
        $("div#single_gallery_customize .image_navigation ul").css("width", total_thumb_container_width);

        total_num_slide = Math.floor(total_thumb_container_width / 640);
        total_num_of_thumb = $("div#single_gallery_customize .image_navigation li").length;
        

        function disable_gal_thumb_nav (){
           if (parseInt($("#single_gallery_customize .image_navigation ul").css("left")) == 0) {
                $("#single_gallery_customize #previous_thumbs").addClass("disable");
            }

            if (parseInt($("#single_gallery_customize .image_navigation ul").css("left")) != 0) {
                $("#previous_thumbs").removeClass("disable");
            }

            if (Math.abs(parseInt($("#single_gallery_customize .image_navigation ul").css("left"))) == Math.abs(total_num_slide*640)) {
                $("#next_thumbs").addClass("disable");
            }

            if (Math.abs(parseInt($("#single_gallery_customize .image_navigation ul").css("left"))) != Math.abs(total_num_slide*640)) {
                 $("#next_thumbs").removeClass("disable");
            }
        }
        disable_gal_thumb_nav();
        $("#next_thumbs").bind("click", function(e4) {
            e4.preventDefault();
            if (!e4.detail || e4.detail == 1) {
                if (Math.abs(parseInt($("div#single_gallery_customize #gal_nav").css("left"))) != Math.abs(total_num_slide*640)) {
                   $("div#single_gallery_customize #gal_nav").animate({
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
                if (parseInt($("div#single_gallery_customize #gal_nav").css("left")) != 0) {
                    $("div#single_gallery_customize #gal_nav").animate({
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
            $("div#single_gallery_customize #gal_nav").animate({
                left: slide_amount
            }, 200)
        }

        function onAfter(curr, next, opts) {
            var num = '' + (opts.currSlide + 1) + ' of ' + opts.slideCount;
            $('#slide_numbers').html(num);

            //$("#gallery_slide_customize").height($(next).height());
            //$("#gallery_slide_customize ul").height($(next).height());
            disable_gal_thumb_nav();

        }

        function onBefore(curr, next, opts) {
            $("div#single_gallery_customize .image_navigation li a").each(function() {
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
                $("div#single_gallery_customize .caption").each(function() {
                    $(this).css("display", "none");

                })
                $(this).text("Show Caption");
                captionbtnstatus = 1
            } else {
                $("div#single_gallery_customize .caption").each(function() {
                    $(this).css("display", "block");

                })
                $(this).text("Hide Caption");
                captionbtnstatus = 0
            }

        })


        $('#gallery_slide_customize ul').cycle({
            fx:     'fade',
            speed:  'fast',
            timeout: 4000,
            next:   '#next_image',
            prev:   '#previous_image',
            nowrap:  0,
            fit:     0,
            after: onAfter,
            before: onBefore,
            pause: 1,
            pager:"#gal_nav",
            pagerAnchorBuilder: function(idx, slide) {
                // return selector string for existing anchor
                return '#gal_nav li:eq(' + idx + ') a';
            }
        });
        slideshow_pause_status = 0;
        $('#gallery_slide_customize ul').cycle('pause');
        $("#slideshow_start_stop_btn").click(function(e) {
            e.preventDefault();
            if (slideshow_pause_status == 0) {
                $('#gallery_slide_customize ul').cycle('resume');
                $(this).text("Pause SlideShow");
                slideshow_pause_status = 1
            } else {
                $('#gallery_slide_customize ul').cycle('pause');
                $(this).text("Start SlideShow");
                slideshow_pause_status = 0
            }

        })
    }

	
    if ($("div#galleries").length > 0) {

        function resize(curr, next, opts) {
            $("#gallery").height($(next).height());
        }

        $('div#galleries #gallery ul').cycle({
            fx:     'fade',
            speed:  'fast',
            timeout: 0,
            next:   '#next_home_gal',
            prev:   '#prev_home_gal',
            nowrap:  0,
            after: resize,
            fit:     1
        });
    }

	
   /* if ($("div#breaking").length > 0) {
        $("div#breaking ul").cycle({
            fx:     'fade',
            speed:  500,
            timeout: 2000,
            continuous: 0,
            pause: 0,
            next:   '#breaking-next',
            prev:   '#breaking-prev'

        })

        $('#breaking-pause').toggle(function() {
            $('div#breaking ul').cycle('pause');
            $(this).css('background-position', 'bottom')
        }, function() {
            $('div#breaking ul').cycle('resume');
            $(this).css('background-position', 'top')
        });

    }  */
	
	/*
    if ($('#latest_news').length > 0) {
        $('#latest_news li').hoverIntent(function() {
            $(this).find("p ").slideDown('fast');
        }, function() {
            $(this).find("p ").slideUp("fast");
        })
    }

    if ($('#latest_news2').length > 0) {
        $('#latest_news2 li').hoverIntent(function() {
            $(this).find("p ").slideDown('slow');
        }, function() {
            $(this).find("p ").slideUp("slow");
        })

    }
	*/
	

});