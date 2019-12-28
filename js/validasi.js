// JavaScript Document
 
function notEmpty(elem, helperMsg){
    if(elem.value.length == 0){
        alert(helperMsg);
        elem.focus();
        return false;
    }
    return true;
}

//validasi nomor 
function isNumeric(elem, helperMsg){
    var numericExpression = /^[0-9]+$/;
    if(elem.value.match(numericExpression)){
        return true;
    }else{
        alert(helperMsg);
        elem.focus();
        return false;
    }
}
//validasi huruf 
function isAlphabet(elem, helperMsg){
    var alphaExp = /^[\ \][a-zA-Z]+$/;
    if(elem.value.match(alphaExp)){
        return true;
    }else{
        alert(helperMsg);
        elem.focus();
        return false;
    }
}
 //validasi nomor dan huruf
function isAlphanumeric(elem, helperMsg){
    var alphaExp = /^[\ \][0-9a-zA-Z]+$/;
    if(elem.value.match(alphaExp)){
        return true;
    }else{
        alert(helperMsg);
        elem.focus();
        return false;
    }
}
//validasi panjang karakter 
function lengthRestriction(elem, min, max){
    var uInput = elem.value;
    if(uInput.length >= min && uInput.length <= max){
        return true;
    }else{
        alert("Harap isikan di antara " +min+ " dan " +max+ " karakter");
        elem.focus();
        return false;
    }
}
 //validasi selection
function madeSelection(elem, helperMsg){
    if(elem.value == "Pilih Status"){
        alert(helperMsg);
        elem.focus();
        return false;
    }else{
        return true;
    }
}
 // validasi email
function emailValidator(elem, helperMsg){
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if(elem.value.match(emailExp)){
        return true;
    }else{
        alert(helperMsg);
        elem.focus();
        return false;
    }
}
