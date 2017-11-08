function checkifCategorie(idbtn,idP,input){
  $(input).keyup(function(){
    var iscorect = document.getElementById(idP);
    var btnAdd = document.getElementById(idbtn);
    var input1 = input.substr(1);
    var theInput = document.getElementById(input1).value;
    var matches = theInput.match(/^[a-zA-Z_ ]+$/i);
    if(theInput==""){
      iscorect.innerHTML="Campul nu poate fi gol!";
      btnAdd.disabled = true;
    }else if(matches ==null){
      btnAdd.disabled = true;
      iscorect.innerHTML="textul nu poate avea cifre sau caractere speciale si nu poate incepe cu spatiu!";
    }else{
      iscorect.innerHTML="OK";
      btnAdd.disabled = false;
    }
  });
}

function checkeifDenumire(idbtn,idP,input){
  $(input).keyup(function(){
    var iscorect = document.getElementById(idP);
    var btnAdd = document.getElementById(idbtn);
    var input1 = input.substr(1);
    var theInput = document.getElementById(input1).value;
    var matches = theInput.match(/^[a-zA-Z_ ]+$/i);
    if(theInput==""){
      iscorect.innerHTML="Campul nu poate fi gol!";
      btnAdd.disabled = true;
    }else if(matches ==null){
      btnAdd.disabled = true;
      iscorect.innerHTML="textul nu poate avea cifre sau caractere speciale si nu poate incepe cu spatiu!";
    }else{
      iscorect.innerHTML="OK";
      btnAdd.disabled = false;
    }
  });
}


function checkifStocPret(idbtn,idP,input){
  $(input).keyup(function(){
    var iscorect = document.getElementById(idP);
    var btnAdd = document.getElementById(idbtn);
    var input1 = input.substr(1);
    var theInput = document.getElementById(input1).value;
    var matches = theInput.match(/[0-9]+$/i);
    if(theInput==""){
      iscorect.innerHTML="Campul nu poate fi gol!";
      btnAdd.disabled = true;
    }else if(matches ==null){
      btnAdd.disabled = true;
      iscorect.innerHTML="Doar cifre!(fara spatiu sau caractere speciale)";
    } else {
      btnAdd.disabled = false;
      iscorect.innerHTML="";
    }
  });
}

function checkifDenumireProdus(idbtn,idP,input){
  $(input).keyup(function(){
    var iscorect = document.getElementById(idP);
    var btnAdd = document.getElementById(idbtn);
    var input1 = input.substr(1);
    var theInput = document.getElementById(input1).value;
    // var matches = theInput.match(/^[a-zA-Z_ ]+$/i);
    if(theInput==""){
      iscorect.innerHTML="Campul nu poate fi gol!";
      btnAdd.disabled = true;
    } else {
      btnAdd.disabled = false;
      iscorect.innerHTML="";
    }
  });
}

