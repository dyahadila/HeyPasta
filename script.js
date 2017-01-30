//order menu code
//add item buttons
var add1 = document.getElementById("add1");
var add2 = document.getElementById("add2");
var add3 = document.getElementById("add3");
var add4 = document.getElementById("add4");
var add5 = document.getElementById("add5");
var add6 = document.getElementById("add6");
var add7 = document.getElementById("add7");
var add8 = document.getElementById("add8");
var add9 = document.getElementById("add9");

//drop item buttons
var drop1 = document.getElementById("drop1");
var drop2 = document.getElementById("drop2");
var drop3 = document.getElementById("drop3");
var drop4 = document.getElementById("drop4");
var drop5 = document.getElementById("drop5");
var drop6 = document.getElementById("drop6");
var drop7 = document.getElementById("drop7");
var drop8 = document.getElementById("drop8");
var drop9 = document.getElementById("drop9");

//item quota
var qty1 = document.getElementById("quota1");
var qty2 = document.getElementById("quota2");
var qty3 = document.getElementById("quota3");
var qty4 = document.getElementById("quota4");
var qty5 = document.getElementById("quota5");
var qty6 = document.getElementById("quota6");
var qty7 = document.getElementById("quota7");
var qty8 = document.getElementById("quota8");
var qty9 = document.getElementById("quota9");

//add item functions
if(add1 != null){
	add1.onclick = function(){
		var temp = parseInt(qty1.value);
		temp = temp+1;
		qty1.value = temp;
	}
	drop1.onclick = function(){
	var temp = parseInt(qty1.value);
	if(temp-1>=0){
		temp = temp-1;
	} else{
		temp = 0;
	}
	qty1.value = temp;
}
}

if(add2 != null){
	add2.onclick = function(){
		var temp = parseInt(qty2.value);
		temp = temp+1;
		qty2.value = temp;
	}
	drop2.onclick = function(){
	var temp = parseInt(qty2.value);
	if(temp-1>=0){
		temp = temp-1;
	} else{
		temp = 0;
	}
	qty2.value = temp;
}
}

if(add3!=null){
	add3.onclick = function(){
		var temp = parseInt(qty3.value);
		temp = temp+1;
		qty3.value = temp;
	}
	drop3.onclick = function(){
	var temp = parseInt(qty3.value);
	if(temp-1>=0){
		temp = temp-1;
	} else{
		temp = 0;
	}
	qty3.value = temp;
}
}

if(add4!=null){
	add4.onclick = function(){
		var temp = parseInt(qty4.value);
		temp = temp+1;
		qty4.value = temp;
	}
	drop4.onclick = function(){
	var temp = parseInt(qty4.value);
		if(temp-1>=0){
			temp = temp-1;
		} else{
			temp = 0;
		}
		qty4.value = temp;
	}
}

if(add5 != null){
add5.onclick = function(){
	var temp = parseInt(qty5.value);
	temp = temp+1;
	qty5.value = temp;
}
drop5.onclick = function(){
	var temp = parseInt(qty5.value);
	if(temp-1>=0){
		temp = temp-1;
	} else{
		temp = 0;
	}
	qty5.value = temp;
}
}

if(add6!=null){
	add6.onclick = function(){
		var temp = parseInt(qty6.value);
		temp = temp+1;
		qty6.value = temp;
	}
	drop6.onclick = function(){
	var temp = parseInt(qty6.value);
	if(temp-1>=0){
		temp = temp-1;
	} else{
		temp = 0;
	}
	qty6.value = temp;
}
}

if(add7!=null){
	add7.onclick = function(){
		var temp = parseInt(qty7.value);
		temp = temp+1;
		qty7.value = temp;
	}
	drop7.onclick = function(){
	var temp = parseInt(qty7.value);
	if(temp-1>=0){
		temp = temp-1;
	} else{
		temp = 0;
	}
	qty7.value = temp;
}
}

if(add8!=null){
	add8.onclick = function(){
		var temp = parseInt(qty8.value);
		temp = temp+1;
		qty8.value = temp;
	}
	drop8.onclick = function(){
	var temp = parseInt(qty8.value);
	if(temp-1>=0){
		temp = temp-1;
	} else{
		temp = 0;
	}
	qty8.value = temp;
}
}

if(add9!=null){
add9.onclick = function(){
	var temp = parseInt(qty9.value);
	temp = temp+1;
	qty9.value = temp;
}

drop9.onclick = function(){
	var temp = parseInt(qty9.value);
	if(temp-1>=0){
		temp = temp-1;
	} else{
		temp = 0;
	}
	qty9.value = temp;
}
}