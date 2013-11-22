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
    $('.content').css('margin-left', xcoord);
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
        $('.content').css('margin-left', xcoord);
        $('.drag-bar').css('left', xcoord);
    });
});
$(document).mouseup(function(e){
    $(document).unbind('mousemove');
});