$(function() {
    var transformCanvas = function () {
        $("canvas").css("-webkit-transform", "translatey(-" + (0 - this.y) + "px)");
    };

    // https://github.com/cubiq/iscroll
    var scroller = new IScroll("#wrapper", { mouseWheel: true, probeType: 3 });
    scroller.on("scroll", transformCanvas);
    scroller.on("scrollEnd", transformCanvas);

    // https://html2canvas.hertzen.com
    html2canvas($("body"), { 
        onrendered: function(canvas) {
        $("#header").show();
        $("#wrapper").css("overflow", "hidden");
        $(".header-blur").append(canvas);
        $("canvas").attr("id", "canvas");
        // http://www.quasimondo.com/StackBlurForCanvas
        stackBlurCanvasRGB("canvas", 0, 0, $("canvas").width(), $("canvas").height(), 20);
        }
    });

    $(document).bind("touchmove touchend", function(e) {
        e.preventDefault();
        transformCanvas();
    });
});