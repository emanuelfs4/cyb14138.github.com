/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*jslint node : true, browser : true */
"use strict";

function DiceView(){
    var imgElement1 = document.getElementById("diceImg1"),
            imgElement2 = document.getElementById("diceImg2"),
            randomButton = document.getElementById("randomButton");
    
    this.showDiceFace = function(faceNo){
        
        if(faceNo <=6){
             imgElement1.src = "images/" + faceNo + ".png";
        }else{
            imgElement1.src = "images/blur.png";
        }
       
    };
    
    this.showDiceFace2 = function (faceNo){
        
        if(faceNo <= 6){
            imgElement2.src = "images/" + faceNo + ".png";
        }else{
            imgElement2.src = "images/blur.png";
        }
    };
    
    
    this.setRandomClickCallBack = function(callback){
        
        randomButton.addEventListener("click",callback);
    };
}

/*
var diceView = new DiceView();
var diceModel = new DiceModel();

diceModel.randomise();
document.write(diceModel.getCurrentFace());
diceView.showDiceFace(diceModel.getCurrentFace()); */