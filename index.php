<!DOCTYPE html>
<html id="html" >
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
canvas {
    border:1px solid #d3d3d3;
/*    background-color: #f1f1f1;*/
}
input { width: 105px }
</style>
</head>
<body onload="startGame()" >
<input type="text" id="gameAreaWidth" placeholder="gameArea Width" />
<input type="text" id="gameAreaHeight" placeholder="gameArea height" />
<input type="text" id="rectangleWidth" placeholder="rectangle Width" />
<input type="text" id="rectangleHeight" placeholder="rectangle height" />
<input type="text" id="rectangleX" placeholder="rectangle X" />
<input type="text" id="rectangleY" placeholder="rectangle Y" />
<input type="text" id="gameAreaBgColor" placeholder="gameArea bgColor" />
<input type="text" id="rectangleColor" placeholder="rectangle color" />
<input type="button" id="gameAreaAyarla" value="Ayarla" />
<select id="boyaRengi" style="background-color:white ">
    <option style="background-color:red ">red</option>
    <option style="background-color:orange ">orange</option>
    <option style="background-color:yellow ">yellow</option>
    <option style="background-color:green ">green</option>
    <option style="background-color:blue ">blue</option>
    <option style="background-color:purple ">purple</option>
    <option style="background-color:pink ">pink</option>
</select>
<br>
<canvas id="gameCanvas"></canvas>
<script>

var myGamePiece;
var gameAreaWidth=500;//default values
var gameAreaHeight=370;
var rectangleWidth=30;
var rectangleHeight=30;
var rectangleX=10;
var rectangleY=120;
var gameAreaBgColor="#f1f1f1";
var rectangleColor="red";
var boyaRengi=document.getElementById("boyaRengi").value;
document.getElementById("boyaRengi").onclick=function(){
  boyaRengi=document.getElementById("boyaRengi").value;
}
document.getElementById("gameAreaAyarla").onclick=function(){
  gameAreaWidth=document.getElementById("gameAreaWidth").value;
  gameAreaHeight=document.getElementById("gameAreaHeight").value;
  rectangleWidth=document.getElementById("rectangleWidth").value;
  rectangleHeight=document.getElementById("rectangleHeight").value;
  rectangleX=document.getElementById("rectangleX").value;
  rectangleY=document.getElementById("rectangleY").value;
  gameAreaBgColor=document.getElementById("gameAreaBgColor").value;
  rectangleColor=document.getElementById("rectangleColor").value;
  startGame();
}
function startGame() {
    myGameArea.start(); 
    myGamePiece = new component(rectangleWidth, rectangleHeight, rectangleColor, rectangleX, rectangleY);
}

var myGameArea = {
    canvas : document.getElementById("gameCanvas"),
    start : function() {
        this.canvas.width = gameAreaWidth;
        this.canvas.height = gameAreaHeight;
        this.canvas.style="background-color:" + gameAreaBgColor ;
        this.context = this.canvas.getContext("2d");
    }
}

function component(width, height, color, x, y) {
    this.width = width;
    this.height = height;
    this.x = x;
    this.y = y;    
    ctx = myGameArea.context;
    ctx.fillStyle = color;
    ctx.fillRect(this.x, this.y, this.width, this.height);
}
//koordinat gösterme
function cnvs_getCoordinates(e)
{
x=e.clientX;
y=e.clientY;
document.getElementById("xycoordinates").innerHTML="Coordinates: (" + x + "," + y + ")";

//myGameArea.start();
if(kareCizme) myGamePiece=new component(5, 5, boyaRengi, x-12, y-75);
}
//boyama işlemi mouse ile kontrol edilir
var kareCizme=false;
document.getElementById("html").onmousedown=function(){
    kareCizme=true;
}
document.getElementById("html").onmouseup=function(){
    kareCizme=false;
}
document.getElementById("html").onmousemove=function(event){
    cnvs_getCoordinates(event);
}

</script>

<p>We have added a component to our game, a red square!</p>
<p id="xycoordinates">  </p>
</body>
</html>
