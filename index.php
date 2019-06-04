<?php

?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="resources/scripts/style.css">
    <script src="resources/scripts/jquery-1.12.4.js"></script>
</head>
    <body>
        <div id="infotext"></div>
    <div id="mainframe" class="allign">
        <div id="imgframe">
        <map id="Map"></map>


        </div>
        <div style="clear:both;"></div>
    </div>
    <div id="inventory" class="allign"> </div>
    <div id="minimap" class="allign"></div>
		<div id="questWin"></div>
    </body>
</html>
<script>
    var resetScroll = 0;
    var imgpos = 0;
    var curkey = "null";
    var keydown = 0;
    var id = setInterval(scroll, 2);
    var elemcnt = 0;
    var roomdata = 0;
    var loc = "HO000";
    var tempo;
    var widthCon = 11472;
    var imgpath = "resources/img/";
	$( function() {
        loadImg(0);
        
        // Inconsistency elemcnt is not reset on new map load
        console.log("JQuery genehmigte eine Ausführung. Nett");

    });
	$(window).resize(function() {
		console.log("resize happened");
		setMap();
	});
    function getApData() {
        if(typeof elemcnt !== 'undefined') {
            elemcnt = 0;
        }
        $.get("resources/scripts/getActionpoints.php", {Roomname: loc})
		.done(function(data) {
            var fac = widthCon/$("#mainimg").width();
            console.log("getApData() fac: "+fac);
            roomdata = data;
            var arr = data.split(";");
            arr.pop();
            console.log("loading Actionpoints with fac: "+fac+" and arr: "+arr);
            $("#Map").load("resources/scripts/loadActionpoints.php", {fac: fac, arr: arr}, function() {
                    console.log("actionmap loaded");
                });
            $("#minimap").load("resources/scripts/minimap.php", {room: loc, imgpath: imgpath}, function() {
                console.log("minimap loaded");
            });
            $("#inventory").load("resources/scripts/inventory.php", {mode: "display"}, function()  {
                console.log("inventory loaded");
                $("#questWin").load("resources/scripts/Quest.php", {RoomnameQuest : loc}, function() {
                    console.log("questWindow loaded");
                });
            });
		});
    }
    function scroll() {
        if(resetScroll == 1) {
            console.log("scroll reset");
            imgpos = 0;
            resetScroll = 0;
            console.log("imgpos: "+imgpos);
        }
        if(keydown == 1) {
            
            if(curkey == "left" && imgpos < 0)  {
                imgpos = imgpos+3;
                document.getElementById("mainimg").style.left = imgpos+"px";
            }
            else if(curkey == "right" && imgpos >= -2800) {
                imgpos = imgpos-3;
                document.getElementById("mainimg").style.left = imgpos+"px";
            }
        }
    }
    $(document).keydown(function(event){
        if(event.which == 37) {
            curkey = "left";
            keydown = 1;
            console.log("keydown triggered");
        }
        else if(event.which == 39) {
            curkey = "right";
            keydown = 1;
            console.log("keydown triggered");
        }
    } );
    $(document).keyup(function(){
        curkey = "null";
        keydown = 0;
        console.log("keyup triggered");
    });
        function mapClicked(value) {
            loadImg(value);
        }
	function setMap(counter) {
        console.log("setMap() called");
        console.log("widthCon: "+widthCon+" / "+$("#mainimg").width());
        var fac = widthCon/$("#mainimg").width();
        var arr = roomdata.split(";");
        arr.pop();
        console.log("arr: "+arr);
        $("#Map").load("resources/scripts/loadActionpoints.php", {fac: fac, arr: arr}, function() {
                    console.log("done loading");
                });
	}
    function loadImg(value) {
        console.log("value is: "+value);
        if(value == 0) {
            console.log("value was 0");
            $.get("resources/scripts/getSession.php", {mode: "loc"})
            .done(function(data) {
                console.log("got value out of Session: "+data);
                $.get("resources/scripts/getData.php", {loc: data})
                .done(function(value) {
                    var arr = value.split(";");
                    console.log("got "+value+" from getData.php");
                    
                    $.get("resources/scripts/getSettings.php", {mode: "imgpath"})
                    .done(function(value) {
                        console.log("got imgpath out of settings");
                        imgpath = value;
                        console.log("imgpath: "+imgpath);
                        $("#imgframe").load("resources/scripts/drawImg.php", {loc: arr[1], imgpath: imgpath}, function() {
                            console.log("drawImg finished");
                        });
                        $("#infotext").load("resources/scripts/loadDesc.php", {desc: arr[0]});
                    });
                });
            });
        } else {
            console.log("An Image was loaded, now it shall be: "+value);
            loc = value;
            $.get("resources/scripts/getData.php", {loc: value})
            .done(function(value) {
                var arr = value.split(";");
                console.log("got "+value+" from getData.php");
                var imgpath = "resources/img/";
                $.get("resources/scripts/getSettings.php", {mode: "imgpath"})
                .done(function(value) {
                    console.log("got imgpath out of settings");
                    imgpath = value;
                    console.log("calling drawImg.php: loc="+arr[1]+", imgpath: "+imgpath);
                    $("#imgframe").load("resources/scripts/drawImg.php", {loc: arr[1], imgpath: imgpath}, function() {
                        console.log("Image is loaded. It´s width is: "+$("#mainimg").width());
                        getApData();
                        resetScroll = 1;
                    });
                    $("#infotext").load("resources/scripts/loadDesc.php", {desc: arr[0]});
                });
            });

        }

    }
    $("#mainimg").on("click", function(e) {
        console.log("s");
        console.log(e.pageX+$(document).width()+', '+ e.pageY+$(document).width());
    })
	
    function picloaded() {
        console.log("image fully loaded");
        getApData();
        imgpos = 0;
        console.log(imgpos);
    }
</script>
