/*jslint node: true, browser: true */
"use strict";

function ConvertorController() {
    
    var convertorView = new ConvertorView(),
            convertorModel = new ConvertorModel();


    this.init = function () {
        
        convertorModel.init();
        
        convertorView.init();
        
    };
}

window.addEventListener("load", (new ConvertorController()).init, false);