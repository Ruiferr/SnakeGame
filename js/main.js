function easy(){
    var mode = localStorage.getItem('mode') || '';
    localStorage.setItem('mode','easy');
    location.reload();
}

function medium(){
    var mode = localStorage.getItem('mode') || '';
    localStorage.setItem('mode','medium');
    location.reload();
}

function hard(){
    var mode = localStorage.getItem('mode') || '';
    localStorage.setItem('mode','hard');
    location.reload();
}

window.onload=function() {
    canv=document.getElementById("panel");
    ctx=canv.getContext("2d");
    document.addEventListener("keydown",keyPush);
    var mode = localStorage.getItem('mode') || '';
    if (mode == "easy") {
        setInterval(game,3000/15);
        document.getElementById("panel").style.border = "1px solid green";
    } else if(mode == "hard"){
        setInterval(game,1000/15);
        document.getElementById("panel").style.border = "1px solid red";
    } else{
        setInterval(game,2000/15);
    }
    if (mode != '') {

        $('#info').hide();
        $('#info2').hide();
        document.getElementById("mode").innerHTML = "";
        document.getElementById("mode").style.background = "whitesmoke";

    }
    var started = localStorage.getItem('started') || '';
    if (started == "yes") {
        $("#info").hide();

    }

    var alerted = localStorage.getItem('alerted') || 'yes';
    localStorage.setItem('alerted','no');
}

px=py=10;
gs=tc=20;
ax=ay=15;
xv=yv=0;
trail=[];
tail = 5;
pts = 0;
maxPt = 0;
lastPressed = 0;

function game() {
    var mode = localStorage.getItem('mode') || '';

    px+=xv;
    py+=yv;
    if(px<0) {
        px= tc-1;
    }
    if(px>tc-1) {
        px= 0;
    }
    if(py<0) {
        py= tc-1;
    }
    if(py>tc-1) {
        py= 0;
    }

    ctx.fillStyle="white";
    ctx.fillRect(0,0,canv.width,canv.height);
 
    ctx.fillStyle="black";
    for(var i=0;i<trail.length;i++) {
        ctx.fillRect(trail[i].x*gs,trail[i].y*gs,gs-2,gs-2);
        if(trail[i].x==px && trail[i].y==py) {
          if (maxPt != 0) {
                scoreUpdate(maxPt);
                return;
            }

        }
    }
    trail.push({x:px,y:py});
    while(trail.length>tail) {
    trail.shift();  
    }
 
    if(ax==px && ay==py) {
        tail++;

        ax=Math.floor(Math.random()*tc);
        ay=Math.floor(Math.random()*tc);

        if (mode == "easy") {
            pts = pts + 10;
        } else if (mode == "hard") {
            pts = pts + 40;
        } else{
            pts = pts + 20;
        }
        
        if (pts >= maxPt) {
            maxPt = pts;
        }
        document.getElementById("points").innerHTML = "";
        document.getElementById("points").innerHTML = ""+pts+"";
    }
    if (mode == "hard") {
        ctx.fillStyle="darkred";
    }else{
        ctx.fillStyle="cadetblue";
    }
    ctx.fillRect(ax*gs,ay*gs,gs-2,gs-2);
}

function keyPush(evt) {
    switch(evt.keyCode) {
        case 37:
            if (lastPressed == 39) {

            }else{
            xv=-1;yv=0;
            $('#info').hide();
            $('#info2').hide();
            document.getElementById("mode").innerHTML = "";
            document.getElementById("mode").style.background = "whitesmoke";
            lastPressed = 37;
            }
            break;
        case 38:
            if (lastPressed == 40) {

            }else{
            xv=0;yv=-1;
            $('#info').hide();
            $('#info2').hide();
            document.getElementById("mode").innerHTML = "";
            document.getElementById("mode").style.background = "whitesmoke";
            lastPressed = 38;
            }
            break;
        case 39:
            if (lastPressed == 37) {

            }else{
            xv=1;yv=0;
            $('#info').hide();
            $('#info2').hide();
            document.getElementById("mode").innerHTML = "";
            document.getElementById("mode").style.background = "whitesmoke";
            lastPressed = 39;
            }
            break;
        case 40:
            if (lastPressed == 38) {

            }else{
            xv=0;yv=1;
            $('#info').hide();
            $('#info2').hide();
            document.getElementById("mode").innerHTML = "";
            document.getElementById("mode").style.background = "whitesmoke";
            lastPressed = 40;
            }
            break;
    }
}

function scoreUpdate(value) {
    var maxScore = value;
    $.post('updateScore.php',{val: maxScore},function(data) {
        $('.game').html(data);
        $('h2').html('');
        var alerted = localStorage.getItem('alerted') || '';
        if (alerted != 'yes') {
            alert('Game Over!\nYour Score: '+maxScore);
            localStorage.setItem('alerted','yes');
        }
        var mode = localStorage.getItem('mode') || '';
        localStorage.setItem('mode','');
        var started = localStorage.getItem('started') || '';
        localStorage.setItem('started','yes');
        return;
    });
 }


function restart(){
    location.reload(); 
}

function controls(){
    if ($('#info').hide()) {
        $('#info').fadeIn(1000); 
        $('#info2').hide(); 
    }
}

