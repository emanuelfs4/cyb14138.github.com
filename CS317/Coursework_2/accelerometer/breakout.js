/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Paddle variables
var directionPaddle, xPaddle, yPaddle, wPaddle, hPaddle , paddleColor = 'black';


//Ball Variables
var xBall = 250, yBall = 300,dx = 2, dy = -4, raio = 7,ballColor = 'darkred';

//Canvas
var canvas, ctx,main;
//Bricks variables
var bricks,rows,cols, wBricks,hBricks,padding,bricksColor = ['darkblue', 'darkgreen', 'lightblue','yellow'];

var tWidth, tHeight;

var div = document.getElementById("myCanvasDiv");

if(window.DeviceMotionEvent != undefined){
    
    window.ondevicemotion = function (e){
        directionPaddle = event.accelerationIncludingGravity.x;
    };
}

function createBricks(){
    rows = 4;
    cols = 13;
    hBricks = 20;
    padding = 4;
    //wBricks = 25;
    wBricks = (canvas.width / cols) - 4.2;
    bricks = new Array(rows);
    
    for(i = 0; i < rows ; i++){
        
        bricks[i] = new Array(cols);
        for( j = 0; j < cols; j++){
            
            bricks[i][j] = true;
        }
    }
}

function init(){
    canvas = document.getElementById('myCanvas');
    main = document.getElementById('main');
    
    

    if (window.innerWidth) {
            tWidth=window.innerWidth;
        }
    else if (document.documentElement && document.documentElement.clientWidth) {
            tWidth=document.documentElement.clientWidth;
        }
    else if (document.body) {
            tWidth=document.body.clientWidth;
            }
    
    if (window.innerHeight) {
            tHeight=window.innerHeight;
        }
    else if (document.documentElement && document.documentElement.clientHeight) {
            tHeight=document.documentElement.clientHeight;
        }
    else if (document.body) {
            tHeight=document.body.clientHeight;
    }

    canvas.width = tWidth;
    
    canvas.height = tHeight;
    
    ctx = canvas.getContext("2d");
}

function createBall(){
    ctx.beginPath();
    ctx.arc(xBall, yBall, raio, 0, Math.PI*2, true);
    //ctx.moveTo(xBall - raio, 0);
    //ctx.lineTo(xBall- raio,canvas.height);
    ctx.closePath();
    ctx.fill();
    ctx.stroke();
    
}

function rect(x,y,w,h){
    ctx.beginPath();
    ctx.fillRect(x, y, w, h);
    ctx.closePath();
    ctx.fill();
    
}

function clear(){
    ctx.clearRect(0,0,canvas.width,canvas.height);
}


function createPaddle(){
  hPaddle = 15;
  wPaddle = 70;
  
  yPaddle = canvas.height - canvas.height/7;
  xPaddle = (canvas.width-wPaddle)/2;
  
}

//Check collision between ball and paddle;
function checkPaddle(){
    
    /*
    if(xBall + raio >= xPaddle + (wPaddle/2) - (wPaddle/2)
            && yBall <= hPaddle + yPaddle 
            && yBall >= yPaddle 
            && xBall - raio <= xPaddle - (wPaddle/2) - (wPaddle/2)){  
        dx = -dx;
    }
    */
    
    if(yBall + raio >= ((yPaddle + (hPaddle)/2) - (hPaddle)/2)
            && xBall >= xPaddle 
            && xBall <= xPaddle + wPaddle 
            && yBall - raio <= (yPaddle + (hPaddle)/2) + (hPaddle)/2 ){
            dy = -dy;
    }
}

//Move paddle and bounding check.
function movePaddle(){
      
    ctx.fillStyle = paddleColor;
    
    if(directionPaddle > 0.5 && xPaddle > 0){
        xPaddle = xPaddle - 3;
        rect(xPaddle,yPaddle, wPaddle,hPaddle);
         //document.getElementById('xPaddle').innerHTML = paddlex;
    }else  if(directionPaddle < -0.5 && xPaddle + wPaddle < canvas.width){
        xPaddle = xPaddle + 3;
        rect(xPaddle, yPaddle, wPaddle, hPaddle);
         //document.getElementById('xPaddle').innerHTML = paddlex;
    }else{
         //document.getElementById('xPaddle').innerHTML = "HERE" + paddlex;
         rect(xPaddle,yPaddle, wPaddle, hPaddle);
    }
}


function drawBricks(){
     
    for(i = 0 ; i < rows ; i++){
        
        for(j = 0 ; j < cols ; j++){
            ctx.fillStyle = bricksColor[i];
            if(bricks[i][j]){
            rect((j * (wBricks + padding)) + padding, (i * (hBricks + padding)) + padding, wBricks, hBricks);
                
            }
        }
    }
}


function checkBricks(){
    
    rowheight = hBricks + raio/2 +1;
    colwidth = wBricks+ raio/2 + 1;
    row = Math.floor((yBall)/rowheight);
    col = Math.floor( (xBall)/colwidth);
  
    if (yBall < rows * rowheight  && row >= 0 && col >= 0 && bricks[row][col]) {
        dy = -dy;
        bricks[row][col] = false;
    }
    
}
function checkBounding(){
    if(xBall + dx + raio >= canvas.width || xBall + dx - raio < 0){
        dx = -dx;
    }
    
    if(yBall + dy +raio >= canvas.height){
        sleep(2000);
        reset();
    }
    
    if(yBall + dy - raio <= 0){
        
        dy = -dy;
    }
}


function draw (){

    clear();
    ctx.fillStyle = ballColor;
    
    createBall();
  
    movePaddle();
    
    drawBricks();
    
    checkBricks();
    
    checkBounding();
    
    checkPaddle();
    
    //ctx.beginPath();
    //ctx.moveTo( xPaddle + wPaddle/2, 0);
    //ctx.lineTo(xPaddle + wPaddle/2,canvas.height);
    //ctx.stroke();
  
    xBall +=dx;
    yBall +=dy;
}



function initialize(){
    init();
    createPaddle();
    createBricks();
}

function start(){
    return setInterval(draw,10);
}   

function reset(){
    createBricks();
    drawBricks();
    xBall = 250; 
    yBall = 300;
    dx = 2;
    dy = -4;
}

//call it after the ball hit the bottom of the canvas
function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}

function getSize(){
    var i = 0,lol = 1;
    
    
    
    while(i < lol){
        
        div.style.height =  window.innerHeight+'px';
        div.style.width = window.innerWidth+'px';
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        i++;
    }
 
}
window.addEventListener("load", getSize);
window.addEventListener("load", init);
window.addEventListener("load", draw);
initialize();
start();






        