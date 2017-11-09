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


function checkifPret(idbtn,idP,input){
  var theInput = document.getElementById(input).value;
  var iscorect = document.getElementById(idP);
  var btnAdd = document.getElementById(idbtn);
  var matches = /^[^.][\d]*\.?[\d]*$/.test(theInput);
  if(theInput==""){
    iscorect.innerHTML="Campul nu poate fi gol!";
    return 0;
  }else if(matches ==false){
    iscorect.innerHTML="Doar cifre si un singur punct.";
    return 0;
  } else {
    iscorect.innerHTML="";
    return 1;
  }

}

function checkifStoc(idbtn,idP,input){
  var iscorect = document.getElementById(idP);
  var btnAdd = document.getElementById(idbtn);
  var theInput = document.getElementById(input).value;
  var matches = /^\d+$/.test(theInput);
  if(theInput==""){
    iscorect.innerHTML="Campul nu poate fi gol!";
    // btnAdd.disabled = true;
    return 0;
  }else if(matches ==false){
    iscorect.innerHTML="Doar cifre!(fara spatiu sau caractere speciale)";
    return 0;
  } else {
    // btnAdd.disabled = false;
    iscorect.innerHTML="";
    return 1;
  }
}



function checkifDenumireProdus(idbtn,idP,input){
  
    var iscorect = document.getElementById(idP);
    var btnAdd = document.getElementById(idbtn);
    var theInput = document.getElementById(input).value;
    // var matches = theInput.match(/^[a-zA-Z_ ]/i);
    if(theInput==""){
      iscorect.innerHTML="Campul nu poate fi gol!";
      // btnAdd.disabled = true;
      return 0;
    } else {
      iscorect.innerHTML="";
      // btnAdd.disabled = false;
      return 1;
    }
}


function checkContentProdus (idbtn,idP,input){
  var iscorect = document.getElementById(idP);
  var btnAdd = document.getElementById(idbtn);
  var theInput = CKEDITOR.instances[input].getData();
  if(theInput==""){
      iscorect.innerHTML="Campul nu poate fi gol!";
      // btnAdd.disabled = true;
      console.log("0");
      return 0;
    } else {
      iscorect.innerHTML="";
      // btnAdd.disabled = false;
      console.log("!");
      return 1;
    }
}

