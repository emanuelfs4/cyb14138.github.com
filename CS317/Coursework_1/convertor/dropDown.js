
DropDown = function(idName) {
    
    var val = document.getElementById(idName),
        aqui = 0,
        i;

    for (i = 0; i < val.length; i = i + 1) {
        if (val[i].selected) {
            aqui = val[i].index;
        }
    }
    
    if (idName === "visitorCurrency") {
        document.getElementById("displayCurrency").value = val[aqui].text;
    }
    
    localStorage.setItem("index_" + idName, aqui);
    localStorage.setItem(idName, val[aqui].value);
    localStorage.setItem("id_" + idName, val[aqui].text);

    this.value = function () {
        return parseFloat(val[aqui].value);
    };

    this.text = function () {
        return val[aqui].text;

    };
};