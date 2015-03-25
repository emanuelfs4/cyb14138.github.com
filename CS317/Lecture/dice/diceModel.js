/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*jslint node: true, browser: true */

"use strict";

function DiceModel(){
    var value = 1;
    
    this.randomise = function (){
        value = Math.floor(Math.random()*7+1);
        
    };
    
    this.getCurrentFace = function(){
        return value;
    };
    
}
/*
var diceModel = new DiceModel();
diceModel.randomise()
document.write(diceModel.getCurrentFace()) */


