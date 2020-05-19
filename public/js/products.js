!function(n){"use strict";n.fn.idle=function(e){var t,i,o={idle:6e4,events:"mousemove keydown mousedown touchstart",onIdle:function(){},onActive:function(){},onHide:function(){},onShow:function(){},keepTracking:!0,startAtIdle:!1,recurIdleCall:!1},c=e.startAtIdle||!1,d=!e.startAtIdle||!0,l=n.extend({},o,e),u=null;return n(this).on("idle:stop",{},function(){n(this).off(l.events),l.keepTracking=!1,t(u,l)}),t=function(n,e){return c&&(e.onActive.call(),c=!1),clearTimeout(n),e.keepTracking?i(e):void 0},i=function(n){var e,t=n.recurIdleCall?setInterval:setTimeout;return e=t(function(){c=!0,n.onIdle.call()},n.idle)},this.each(function(){u=i(l),n(this).on(l.events,function(){u=t(u,l)}),(l.onShow||l.onHide)&&n(document).on("visibilitychange webkitvisibilitychange mozvisibilitychange msvisibilitychange",function(){document.hidden||document.webkitHidden||document.mozHidden||document.msHidden?d&&(d=!1,l.onHide.call()):d||(d=!0,l.onShow.call())})})}}(jQuery);

var startIMG = "<img class=\"act\" src=\"./img/produkter.png\">";
var startText = "Produkter";

$(document).idle({
    onIdle: function(){
        $('#group').removeClass('hide');
        $('#info').addClass('hide');
        $('#aboutText').removeClass('hide');
        $('#produktText').addClass('hide');
        $("div[id^=product]").removeClass('active');
        $("#actImg").html(startIMG).html();
        $("p[id=actText]").text(startText).text();
    },
    idle: 30000
  });

function productMobile(){
    $('#mobile').removeClass('hide');
}

function toggleAbout(prod,prodsAll) {
   /* setTimeout(function(){ 
        
    $('#aboutText').removeClass('hide');
    $('#produktText').addClass('hide');
    $('#product'+prod).removeClass('active');
    $('#group').removeClass('hide');
    $('#info').addClass('hide');
            
    }, 20000);*/


    $('#aboutText').addClass('hide');
    $('#produktText').removeClass('hide');
    $('#group').removeClass('hide');
    $('#info').addClass('hide');

    for(i = 1; i<= prodsAll; i++){
        $('#prod'+i).addClass('hide');
        $('#product'+i).removeClass('active');    
        if(i == prod){
            $('#prod'+i).removeClass('hide');
            $('#product'+i).addClass('active');
            $('#mobile').addClass('hide');
            $("#actImg").html($('#productImg'+i).html());
            $("p[id=actText]").text($('#product'+i).text());
        }
    }
}

function medarbejderInfo(medID,medAll){
    $('#group').addClass('hide');
    $('#info').removeClass('hide');
    for(i = 1; i<= medAll; i++){
        $('#med'+i).addClass('hide');
        if(i == medID){
            $('#med'+i).removeClass('hide');
        }
    }
}