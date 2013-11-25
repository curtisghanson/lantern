var maximized = 240;
var minimized = 60;

$('.drag-bar-handle').dblclick(function(e){
    e.preventDefault();
    var xcoord = e.pageX;
    if(maximized >= e.pageX - 6 && maximized <= e.pageX + 6){
        xcoord = minimized;
    }
    else if(minimized <= e.pageX + 6 && minimized >= e.pageX - 6){
        xcoord = maximized;
    }
    else if(maximized > e.pageX - 1){
        xcoord = minimized;
    }
    else{
        xcoord = maximized;
    }
    $('.sidebar').css('width', xcoord);
    $('.drag-bar').css('left', xcoord);
});
$('.drag-bar').mousedown(function(e){
    e.preventDefault();
    $(document).mousemove(function(e){
        var xcoord = e.pageX - 1;
        if(0 >= e.pageX - 1){
            xcoord = 0;
        }
        else if(document.width - 2 <= e.pageX){
            xcoord = document.width - 2;
        }
        else{
            xccord = e.pageX - 1;
        }
        $('.sidebar').css('width', xcoord);
        $('.drag-bar').css('left', xcoord);
    });
});
$(document).mouseup(function(e){
    $(document).unbind('mousemove');
});

function getTime(){
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var a = h > 11 ? 'pm' : 'am';
    h = h > 11 ? h - 12 : h;
    h = h == 0 ? 12 : h;
    m = m < 10 ? '0' + m : m;
    document.getElementById('clock').innerHTML = h + ':' + m + ' ' + a;
    t = setTimeout(function(){
        getTime();
    }, 1000);
}

$(document).ready(function(){
    getTime();
});

(function () {
    var viewFullScreen = document.getElementById("view-fullscreen");
    if (viewFullScreen) {
        viewFullScreen.addEventListener("click", function () {
            var docElm = document.documentElement;
            if (docElm.requestFullscreen) {
                docElm.requestFullscreen();
            }
            else if (docElm.mozRequestFullScreen) {
                docElm.mozRequestFullScreen();
            }
            else if (docElm.webkitRequestFullScreen) {
                docElm.webkitRequestFullScreen();
            }
        }, false);
    }

    var cancelFullScreen = document.getElementById("cancel-fullscreen");
    if (cancelFullScreen) {
        cancelFullScreen.addEventListener("click", function () {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            }
            else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            }
            else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            }
        }, false);
    }


    var fullscreenState = document.getElementById("fullscreen-state");
    if (fullscreenState) {
        document.addEventListener("fullscreenchange", function () {
            fullscreenState.innerHTML = (document.fullscreenElement)? "" : "not ";
        }, false);
        
        document.addEventListener("mozfullscreenchange", function () {
            fullscreenState.innerHTML = (document.mozFullScreen)? "" : "not ";
        }, false);
        
        document.addEventListener("webkitfullscreenchange", function () {
            fullscreenState.innerHTML = (document.webkitIsFullScreen)? "" : "not ";
        }, false);
    }

    var marioVideo = document.getElementById("mario-video")
        videoFullscreen = document.getElementById("video-fullscreen");

    if (marioVideo && videoFullscreen) {
        videoFullscreen.addEventListener("click", function (evt) {
            if (marioVideo.requestFullscreen) {
                marioVideo.requestFullscreen();
            }
            else if (marioVideo.mozRequestFullScreen) {
                marioVideo.mozRequestFullScreen();
            }
            else if (marioVideo.webkitRequestFullScreen) {
                marioVideo.webkitRequestFullScreen();
                /*
                    *Kept here for reference: keyboard support in full screen
                    * marioVideo.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
                */
            }
        }, false);
    }
})();

$('.ajaxRequest').click(function(e){
    e.preventDefault();
    var data = new Object();
    data.name = 'Curtis';
    ajax('somewhere', data, 'POST')
        .done(function(response){
            response = $.parseJSON(response);
            if(response.code == 100){
                $('.ajaxResponse').html(response.msg);
            }
    }).fail(function(){
        $('.ajaxResponse').html(response.msg);
    });
});

function ajax(route, data, method){
    if(undefined == data){
        data = new Object();
    }
    if(undefined == method || '' == method){
        method = 'GET'
    }
    data.route = route;
    return $.ajax({
        type: method,
        url: 'ajax',
        data: data,
        datatype: 'json'
    });
}