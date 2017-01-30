var emailNode = document.getElementById("email");
var passwordNode = document.getElementById("password");
var addprice=document.getElementById("addprice");
var addimg=document.getElementById("addimg");
var addqty=document.getElementById("addqty");


emailNode.addEventListener("change", chkEmail, false);
passwordNode.addEventListener("change", chkPassword, false);
addprice.addEventListener("change", validatePrice, false);
addimg.addEventListener("change", validateImg, false);
addqty.addEventListener("change", validateQty);



function chkEmail(event) {

  var myEmail = event.currentTarget;


  var pos = myEmail.value.search(/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,4}$/);

  if (pos != 0) {
    alert("The email you entered (" + myEmail.value + 
          ") is not in the correct form. \n" +
          "The correct form is: " +
          "wordcharacters@wordcharacters.two-to-four_wordcharacters \n");
    myEmail.focus();
    myEmail.select();
	return false;
  } 
}

function chkPassword(event) {
  

  var myPass = event.currentTarget;
  var passLength = myPass.value.search(/^\w{8,}$/);
  var upp = myPass.value.match(/[A-Z]/g); //search for consecutive upper case
  var num = myPass.value.search(/\d/);
 

  if (passLength != 0) {
    alert("Password must contain at least 8 word characters");
  }
  
  else if (upp == null) { //check if no upper case
    alert("Password must contain at least 1 upper case characters");
  }
  
  else if (upp.length < 1) { //check <2 upper case given there is >=1
    alert("Password must contain at least 1 upper case characters");
  }
  
  else if (num == -1) { //check >=1 number
    alert("Password must contain at least 1 number");
  } 
  myPass.focus();
  myPass.select();

}

function validatePrice(event){
  var chkprice=event.currentTarget;

  var patt = new RegExp(/^[1-9]\d*\.?\d*$/);
  var res = patt.test(chkprice.value);

  if(!res){
    alert("Cannot contain letter and other characters");
    chkprice.focus();
    chkprice.select();
  }
}

function validateImg(event){
  var chkimg=event.currentTarget;

  var patt = new RegExp(/^[a-zA-z].*\.(jpg|png|gif)$/);
  var res = patt.test(chkimg.value);

  if(!res){
    alert("The image should be in png, jpg, or gif format");
    chkprice.focus();
    chkprice.select();
  }
}

function validateQty(event){
  var chkimg=event.currentTarget;

  var patt = new RegExp(/^[1-9]\d{0,2}$/);
  var res = patt.test(chkimg.value);

  if(!res){
    alert("Cannot contain letter and have to be less than 4 digits");
    chkprice.focus();
    chkprice.select();
  }
}
