/***************************************************************************/
/*                                                                         */
/*  This obfuscated code was created by Javascript Obfuscator Free Version.*/
/*  Javascript Obfuscator Free Version can be downloaded here              */
/*  http://javascriptobfuscator.com                                        */
/*                                                                         */
/***************************************************************************/
"use strict";
$(window).on("load", function() {
    var $window = $(window);
    $(".loader-bar").animate({
        width: $window.width()
    }, 2000);
    setTimeout(function() {
        while ($(".loader-bar").width() == $window.width()) {
            removeloader();
            break
        }
    }, 2500);

    function _0x123C1(_0x123E7, _0x1240D) {
        $.growl({
            message: _0x123E7
        }, {
            type: _0x1240D,
            allow_dismiss: false,
            label: "Cancel",
            className: "btn-xs btn-inverse",
            placement: {
                from: "bottom",
                align: "right"
            },
            delay: 2500,
            animate: {
                enter: "animated fadeInRight",
                exit: "animated fadeOutRight"
            },
            offset: {
                x: 30,
                y: 30
            }
        })
    }
    _0x123C1("Welcome to Able Admin", "inverse");
    $(".loader-bg").fadeOut("slow")
});
$(document).ready(function() {
    $(".designation").on("click", function() {
        $(".extra-profile-list").slideToggle()
    });
    var _0x12433 = $(window).height() - 50;
    $(".main-friend-list ").slimScroll({
        height: _0x12433,
        allowPageScroll: false,
        wheelStep: 5,
        color: "#1b8bf9"
    });
    $("#search-friends").on("keyup", function() {
        var _0x12459 = $(this).val()["toLowerCase"]();
        $(".friendlist-box .media-body .friend-header").each(function() {
            var _0x1247F = $(this).text()["toLowerCase"]();
            $(this).closest(".friendlist-box")[_0x1247F.indexOf(_0x12459) !== -1 ? "show" : "hide"]()
        })
    });
    $(".displayChatbox").on("click", function() {
        var _0x124A5 = {
            direction: "right"
        };
        $(".showChat").toggle("slide", _0x124A5, 500)
    });
    $(".friendlist-box").on("click", function() {
        var _0x124A5 = {
            direction: "right"
        };
        $(".showChat_inner").toggle("slide", _0x124A5, 500)
    });
    $(".back_chatBox").on("click", function() {
        var _0x124A5 = {
            direction: "right"
        };
        $(".showChat_inner").toggle("slide", _0x124A5, 500);
        $(".showChat").css("display", "block")
    });
    $("[data-toggle='utility-menu']").on("click", function() {
        $(this).next().slideToggle(300);
        $(this).toggleClass("open");
        return false
    })
});
$("[data-toggle=\"tooltip\"]").tooltip();
$("[data-toggle=\"popover\"]").popover({
    animation: true,
    delay: {
        show: 100,
        hide: 100
    }
});
Waves.init();
Waves.attach(".flat-buttons", ["waves-button"]);
Waves.attach(".float-buttons", ["waves-button", "waves-float"]);
Waves.attach(".float-button-light", ["waves-button", "waves-float", "waves-light"]);
Waves.attach(".flat-buttons", ["waves-button", "waves-float", "waves-light", "flat-buttons"]);
$.pushMenu = {
    activate: function(_0x124CB) {
        $(_0x124CB).on("click", function(_0x124F1) {
            _0x124F1.preventDefault();
            if ($(window).width() > (767)) {
                if ($("body").hasClass("sidebar-collapse")) {
                    $("body").removeClass("sidebar-collapse").trigger("expanded.pushMenu")
                } else {
                    $("body").addClass("sidebar-collapse").trigger("collapsed.pushMenu")
                }
            } else {
                if ($("body").hasClass("sidebar-open")) {
                    $("body").removeClass("sidebar-open").removeClass("sidebar-collapse").trigger("collapsed.pushMenu")
                } else {
                    $("body").addClass("sidebar-open").trigger("expanded.pushMenu")
                }
            };
            if ($("body").hasClass("fixed") && $("body").hasClass("sidebar-mini") && $("body").hasClass("sidebar-collapse")) {
                $(".sidebar").css("overflow", "visible");
                $(".main-sidebar").find(".slimScrollDiv").css("overflow", "visible")
            };
            if ($("body").hasClass("only-sidebar")) {
                $(".sidebar").css("overflow", "visible");
                $(".main-sidebar").find(".slimScrollDiv").css("overflow", "visible")
            }
        });
        $(".content-wrapper").on("click", function() {
            if ($(window).width() <= (767) && $("body").hasClass("sidebar-open")) {
                $("body").removeClass("sidebar-open")
            }
        })
    }
};
$.tree = function(_0x12563) {
    var _0x12517 = this;
    var _0x1253D = 200;
    $(document).on("click", _0x12563 + " li a", function(_0x124F1) {
        var $this = $(this);
        var _0x125AF = $this.next();
        if ((_0x125AF.is(".treeview-menu")) && (_0x125AF.is(":visible"))) {
            _0x125AF.slideUp(_0x1253D, function() {
                _0x125AF.removeClass("menu-open")
            });
            _0x125AF.parent("li").removeClass("active")
        } else {
            if ((_0x125AF.is(".treeview-menu")) && (!_0x125AF.is(":visible"))) {
                var _0x125D5 = $this.parents("ul").first();
                var _0x12621 = _0x125D5.find("ul:visible").slideUp(_0x1253D);
                _0x12621.removeClass("menu-open");
                var _0x125FB = $this.parent("li");
                _0x125AF.slideDown(_0x1253D, function() {
                    _0x125AF.addClass("menu-open");
                    _0x125D5.find("li.active").removeClass("active");
                    _0x125FB.addClass("active")
                })
            }
        };
        if (_0x125AF.is(".treeview-menu")) {
            _0x124F1.preventDefault()
        }
    })
};
$.tree(".sidebar");
$.pushMenu.activate("[data-toggle='offcanvas']");
(function() {
    var _0x12693;
    var _0x12705 = document.getElementById("morphsearch"),
        _0x1266D = _0x12705.querySelector("input.morphsearch-input"),
        _0x12647 = _0x12705.querySelector("span.morphsearch-close"),
        _0x126DF = _0x12693 = false,
        _0x126B9 = morphsearch.querySelector(".morphsearch-form"),
        _0x12751 = function(_0x12777) {
            if (_0x12777.type["toLowerCase"]() === "focus" && _0x126DF) {
                return false
            };
            var _0x1279D = morphsearch.getBoundingClientRect();
            if (_0x126DF) {
                classie.remove(_0x12705, "open");
                setTimeout(function() {
                    classie.add(_0x12705, "hideInput");
                    setTimeout(function() {
                        classie.add(_0x126B9, "p-absolute");
                        classie.remove(_0x12705, "hideInput");
                        _0x1266D.value = ""
                    }, 300)
                }, 500);
                _0x1266D.blur()
            } else {
                classie.remove(_0x126B9, "p-absolute");
                classie.add(_0x12705, "open")
            };
            _0x126DF = !_0x126DF
        };
    _0x1266D.addEventListener("focus", _0x12751);
    _0x12647.addEventListener("click", _0x12751);
    document.addEventListener("keydown", function(_0x127C3) {
        var _0x127E9 = _0x127C3.keyCode || _0x127C3.which;
        if (_0x127E9 === 27 && _0x126DF) {
            _0x12751(_0x127C3)
        }
    });
    var _0x1272B = document.getElementById("morphsearch-search");
    _0x1272B.addEventListener("click", _0x12751);
    _0x12705.querySelector("button[type=\"submit\"]").addEventListener("click", function(_0x127C3) {
        _0x127C3.preventDefault()
    })
})();

function toggleFullScreen() {
    if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement) {
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen()
        } else {
            if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen()
            } else {
                if (document.documentElement.webkitRequestFullscreen) {
                    document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)
                }
            }
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen()
        } else {
            if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen()
            } else {
                if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen()
                }
            }
        }
    }
}
var ost = 0;
$(window).scroll(function() {
    var $window = $(window);
    var _0x12835 = $(window).innerHeight();
    if ($window.width() <= 767) {
        var _0x1280F = $(this).scrollTop();
        if (_0x1280F == 0) {
            $(".showChat").removeClass("top-showChat").addClass("fix-showChat")
        } else {
            if (_0x1280F > ost) {
                $(".showChat").removeClass("fix-showChat").addClass("top-showChat")
            }
        };
        ost = _0x1280F
    }
});
$(document).ready(function() {
    $(".dropup-mega, .dropup, .dropdown-item").hover(function() {
        var _0x1285B = $(this).children(".dropdown-menu");
        $(this).toggleClass("open")
    })
});


/* --------------------------------------------------------
 Color picker - demo only
 --------------------------------------------------------   */
(function() {
    $('<div class="color-picker"><a href="#" class="handle"><i class="icofont icofont-color-bucket"></i></a><div class="settings-header"><h3>Setting panel</h3></div><div class="section"><h3 class="color">Normal color schemes:</h3><div class="colors"><a href="#" class="color-1" ></a><a href="#" class="color-2" ></a><a href="#" class="color-3" ></a><a href="#" class="color-4" ></a><a href="#" class="color-5"></a></div></div><div class="section"><h3 class="color">Inverse color:</h3><div><a href="#" class="color-inverse"><img class="img img-fluid img-thumbnail" src="assets/images/inverse-layout.jpg" /></a></div></div></div>').appendTo($('body'));
})();

/*Gradient Color*/


/*Normal Color */
$(".color-1").on('click',function() {
    $("#color").attr("href", "assets/css/color/color-1.css");
    return false;
});
$(".color-2").on('click',function(e) {
    $("#color").attr("href", "assets/css/color/color-2.css");
    return false;
});
$(".color-3").on('click',function() {
    $("#color").attr("href", "assets/css/color/color-3.css");
    return false;
});
$(".color-4").on('click',function() {

    $("#color").attr("href", "assets/css/color/color-4.css");
    return false;
});
$(".color-5").on('click',function() {
    $("#color").attr("href", "assets/css/color/color-5.css");
    return false;
});
$(".color-inverse").on('click',function() {
    $("#color").attr("href", "assets/css/color/inverse.css");
    return false;
});


$('.color-picker').animate({
    right: '-239px'
});

$('.color-picker a.handle').on('click',function(e) {
    e.preventDefault();
    var div = $('.color-picker');
    if (div.css('right') === '-239px') {
        $('.color-picker').animate({
            right: '0px'
        });
    } else {
        $('.color-picker').animate({
            right: '-239px'
        });
    }
});

/* Google analytics */

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-90726276-1', 'auto');
ga('send', 'pageview');