// alert("ys");
$(document).ready(function() {


       
    if ($("#nav").length > 0) {

        $("#nav li").hover(
            function(e) {
                e.preventDefault();
                $(this).find(".extended_menu").fadeIn('fast');
                $(this).find(".has_submenu").addClass("selected");
            },
            function(e) {
                e.preventDefault();
                $(this).find(".extended_menu").fadeOut('fast');
                $(this).find(".has_submenu").removeClass("selected");
            }

        )
    }

    if ($("#stock_market").length > 0) {

        if ($("#stock_market .title a.selected")) {
            var default_data_id = $("#stock_market .title a.selected").attr("rel")
            $("#stock_market .data" + " #" + default_data_id).show();
        }

        $("#stock_market .title a").click(
            function(e2) {
                e2.preventDefault();

                $("#stock_market .title a").each(function() {
                    if ($(this).hasClass("selected")) {
                        $(this).removeClass("selected");
                    }
                })
                $(this).addClass("selected");


                $("#stock_market .data li").each(function() {
                    $(this).hide();
                })
                var data_li_id = $(this).attr("rel");
                $("#stock_market .data" + " #" + data_li_id).show();
            }
        )

    }

    if ($("div.shared").length > 0) {

        $("div.shared .header a").click(
            function(e3) {
                e3.preventDefault();

                $("div.shared .header a").each(function() {
                    if ($(this).hasClass("selected")) {
                        $(this).removeClass("selected");
                    }
                })
                $(this).addClass("selected");


                $("div.shared .inner > div").each(function() {
                    $(this).hide();
                })
                var data_li_id = $(this).attr("rel");
                $("div.shared .inner" + " #" + data_li_id).show();
            }
        )
    }

    if ($("div#special_today").length > 0) {
        function disable_btn() {
            if (parseInt($("#special_today .spacial_content .inside").css("left")) == 0) {
                $("#special_today a.previous").addClass("disable");
            }

            if (parseInt($("#special_today .spacial_content .inside").css("left")) != 0) {
                $("#special_today a.previous").removeClass("disable");
            }

            if (Math.abs(parseInt($("#special_today .spacial_content .inside").css("left"))) == Math.abs(last_position_left)) {
                $("#special_today a.next").addClass("disable");
            }

            if (Math.abs(parseInt($("#special_today .spacial_content .inside").css("left"))) != Math.abs(last_position_left)) {
                $("#special_today a.next").removeClass("disable");
            }
        }

        var single_item_width = ($(".spacial_content li:first").outerWidth() + 10);
        var spacial_content_inner_width = $(".spacial_content li").length * single_item_width;
        var last_position_left = spacial_content_inner_width - (single_item_width * 6);
        //console.log(spacial_content_inner_width);
        //console.log($(".spacial_content li").length);
        $("#special_today .spacial_content .inside").width(spacial_content_inner_width);
        disable_btn();
        $("#special_today a.next").bind("click", function(e4) {
            e4.preventDefault();
            if (!e4.detail || e4.detail == 1) {
                if (Math.abs(parseInt($("#special_today .spacial_content .inside").css("left"))) != Math.abs(last_position_left)) {
                    $("#special_today .spacial_content .inside").animate({
                        left: '-=165'
                    }, 200, function() {
                        disable_btn();
                    });
                }
            }
        })

        $("#special_today a.previous").bind("click", function(e4) {
            e4.preventDefault();
            if (!e4.detail || e4.detail == 1) {
                if (parseInt($("#special_today .spacial_content .inside").css("left")) != 0) {
                    $("#special_today .spacial_content .inside").animate({
                        left: '+=165'
                    }, 200, function() {
                        disable_btn();
                    });
                }
            }
        })
        $("#special_today a.previous").bind("dblclick", function(e4) {
            e4.preventDefault();
        })


    }

    if ($("div#big_stock_market").length > 0) {


        $("div#big_stock_market .header a").each(function() {
            if ($(this).hasClass("selected")) {
                var data_stock = $(this).attr("rel");
                $("div#big_stock_market .stock_content" + " #" + data_stock + "_content").show();
            }
        })


        $("div#big_stock_market .stock_market .header a").click(
            function(e3) {
                e3.preventDefault();

                $("div#big_stock_market .header a").each(function() {
                    if ($(this).hasClass("selected")) {
                        $(this).removeClass("selected");
                    }
                })
                $(this).addClass("selected");


                $("div#big_stock_market .stock_content .exchange").each(function() {
                    $(this).hide();
                })
                var data_stock = $(this).attr("rel");
                $("div#big_stock_market .stock_content" + " #" + data_stock + "_content").show();
            }
        )

        $("div#big_stock_market .data ul").each(function() {
            $(this).width(($(this).find("li").length) * ($(this).find("li:first").width()));
        })


        $("div#big_stock_market .data .next").click(function(ede) {
            ede.preventDefault();
            if (!ede.detail || ede.detail == 1) {

                var moved_object = $(this).parent().parent().parent().parent().find(".data_inner ul");

                if (Math.abs(parseInt(moved_object.css("left"))) != (moved_object.find("li").length - 1) * 254) {
                    moved_object.animate({
                        "left": '-=254'
                    }, 200)

                }
            }
        })

        $("div#big_stock_market .data .previous").click(function(ede) {
            ede.preventDefault();
            if (!ede.detail || ede.detail == 1) {
                if (parseInt($(this).parent().parent().parent().parent().find(".data_inner ul").css("left")) != 0) {
                    $(this).parent().parent().parent().parent().find(".data_inner ul").animate({
                        "left": '+=254'
                    }, 200)
                }
            }
            console.log($(this).parent().parent().parent().parent().find(".data_inner ul").css("left"));
        })


    }

    /*
     if ($("div#single_gallery").length > 0) {

     var index = 0, hash = window.location.hash;
     if (hash) {
     index = /\d+/.exec(hash)[0];
     index = (parseInt(index) || 1) - 1;
     }

     function onAfter(curr, next, opts) {
     var num = '' + (opts.currSlide + 1) + ' of ' + opts.slideCount;
     $('#slide_numbers').html(num);
     window.location.hash = opts.currSlide + 1;
     $("#gallery_slide").height($(next).height());
     $("#gallery_slide ul").height($(next).height());


     }

     $('#gallery_slide ul').cycle({
     fx:     'fade',
     speed:  'fast',
     timeout: 0,
     next:   '#next_image',
     prev:   '#previous_image',
     nowrap:  1,
     fit:     1,
     after: onAfter,
     allowPagerClickBubble: true
     });
     }
     */

    if ($("div#single_gallery").length > 0) {
        var index = 0;
        var num = 1, thumbnum = 1;


        $("div#single_gallery #gallery_slide li").each(function() {
            $(this).attr("id", "" + num);
            num++;
        })

        $("div#single_gallery .image_navigation li").each(function() {
            $(this).attr("id", "thumb-" + thumbnum);
            thumbnum++;
        })

        total_thumb_container_width = thumbnum * 128;
        $("div#single_gallery .image_navigation ul").css("width", total_thumb_container_width);

        total_num_slide = Math.floor(total_thumb_container_width / 640);
        total_num_of_thumb = $("div#single_gallery .image_navigation li").length;
        

        function disable_gal_thumb_nav (){
           if (parseInt($("#single_gallery .image_navigation ul").css("left")) == 0) {
                $("#single_gallery #previous_thumbs").addClass("disable");
            }

            if (parseInt($("#single_gallery .image_navigation ul").css("left")) != 0) {
                $("#previous_thumbs").removeClass("disable");
            }

            if (Math.abs(parseInt($("#single_gallery .image_navigation ul").css("left"))) == Math.abs(total_num_slide*640)) {
                $("#next_thumbs").addClass("disable");
            }

            if (Math.abs(parseInt($("#single_gallery .image_navigation ul").css("left"))) != Math.abs(total_num_slide*640)) {
                 $("#next_thumbs").removeClass("disable");
            }
        }
        disable_gal_thumb_nav();
        $("#next_thumbs").bind("click", function(e4) {
            e4.preventDefault();
            if (!e4.detail || e4.detail == 1) {
                if (Math.abs(parseInt($("div#single_gallery #gal_nav").css("left"))) != Math.abs(total_num_slide*640)) {
                   $("div#single_gallery #gal_nav").animate({
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
                if (parseInt($("div#single_gallery #gal_nav").css("left")) != 0) {
                    $("div#single_gallery #gal_nav").animate({
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
            $("div#single_gallery #gal_nav").animate({
                left: slide_amount
            }, 200)
        }

        function onAfter(curr, next, opts) {
            var num = '' + (opts.currSlide + 1) + ' of ' + opts.slideCount;
            $('#slide_numbers').html(num);

            //$("#gallery_slide").height($(next).height());
            //$("#gallery_slide ul").height($(next).height());
            disable_gal_thumb_nav();

        }

        function onBefore(curr, next, opts) {
            $("div#single_gallery .image_navigation li a").each(function() {
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
                $("div#single_gallery .caption").each(function() {
                    $(this).css("display", "none");

                })
                $(this).text("Show Caption");
                captionbtnstatus = 1
            } else {
                $("div#single_gallery .caption").each(function() {
                    $(this).css("display", "block");

                })
                $(this).text("Hide Caption");
                captionbtnstatus = 0
            }

        })


        $('#gallery_slide ul').cycle({
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
        $('#gallery_slide ul').cycle('pause');
        $("#slideshow_start_stop_btn").click(function(e) {
            e.preventDefault();
            if (slideshow_pause_status == 0) {
                $('#gallery_slide ul').cycle('resume');
                $(this).text("Pause SlideShow");
                slideshow_pause_status = 1
            } else {
                $('#gallery_slide ul').cycle('pause');
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
	
	
	
	
	
	 if ($("div#tickertape_eng").length > 0) {
        $("div#tickertape_eng ul").cycle({
            fx:     'fade',
            speed:  500,
            timeout: 4000,
            continuous: 0,
            pause: 0,
            next:   '#breaking-next',
            prev:   '#breaking-prev'

        })

        $('#breaking-pause').toggle(function() {
            $('div#tickertape_eng ul').cycle('pause');
            $(this).css('background-position', 'bottom')
        }, function() {
            $('div#tickertape_eng ul').cycle('resume');
            $(this).css('background-position', 'top')
        });

    }
	
	
	
	
	if ($("div#tickertape_bangla").length > 0) {
        $("div#tickertape_bangla ul").cycle({
            fx:     'fade',
            speed:  500,
            timeout: 4000,
            continuous: 0,
            pause: 0,
            next:   '#breaking-next',
            prev:   '#breaking-prev'

        })

        $('#breaking-pause').toggle(function() {
            $('div#tickertape_bangla ul').cycle('pause');
            $(this).css('background-position', 'bottom')
        }, function() {
            $('div#tickertape_bangla ul').cycle('resume');
            $(this).css('background-position', 'top')
        });

    }
	
	

    if ($("div#breaking").length > 0) {
        $("div#breaking ul").cycle({
            fx:     'fade',
            speed:  500,
            timeout: 4000,
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

    }
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

});