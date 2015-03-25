/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*jslint node : true, browser: true */
"use strict";

function DiceController(){
    
    var diceModel = new DiceModel(),
            diceView = new DiceView (),
            
            updateDiceDisplay = function(){
                diceView.showDiceFace(diceModel.getCurrentFace());
                
            },
                    
            updateDiceDisplay2 = function(){
                
                diceView.showDiceFace2(diceModel.getCurrentFace());
            };
    
    
    this.init = function (){
        updateDiceDisplay();
        diceView.setRandomClickCallBack(function(){
            diceModel.randomise();
            updateDiceDisplay();
            diceModel.randomise();
            updateDiceDisplay2();
        });
    };
    
   
}

var diceController = new DiceController();
window.addEventListener("load",diceController.init(),false);
