document.addEventListener('DOMContentLoaded', function(){ 
var currentRegstep = 0;
showRegstep(currentRegstep);

function showRegstep(n) {
var x = document.getElementsByClassName("registration");
x[n].style.display = "block";
if (n == 0) {
	document.getElementById("previous").style.display = "none";
}
else {
document.getElementById("previous").style.display = "inline";
}
if (n == (x.length - 1)) {
	document.getElementById("next").innerHTML = "Submit";
}
else {
	document.getElementById("next").innerHTML = "Next";
}
 registrationController(n);
}


document.getElementById("previous").onclick = function() {changeStep(-1); }
document.getElementById("next").onclick = function() {changeStep(1); }

function changeStep(n) {
	var x = document.getElementsByClassName("registration");
	if (n == 1 && !checkForm()) return false 
	x[currentRegstep].style.display = "none";
	currentRegstep = currentRegstep + n 
	if (currentRegstep >= x.length) {
		document.getElementById("registrationmain").submit();
		return false;
}
showRegstep(currentRegstep);
}

function checkForm() {
var x, y, i, valid = true;
x = document.getElementsByClassName("registration");
y = x[currentRegstep].getElementsByTagName("input");
for (i = 0; i < y.length; i++) {
	if (y[i].value == "") {
		y[i].className += " invalid";
		valid = false;
		showerror()	


}
}

if (valid) {
document.getElementsByClassName("progress")[currentRegstep].className += " finish";
}
return valid;
}


function registrationController(n) {
	var i, x = document.getElementsByClassName("progress");
	for (i = 0; i < x.length; i++) {
		x[i].className = x[i].className.replace(" active", "");
}
x[n].className += " active";
}

document.getElementsByName("havepartner")[0].addEventListener("click", addPartner);
function addPartner(){
	var newfrag = document.createDocumentFragment();
		newdiv = document.createElement("DIV")
		textnodename = document.createTextNode ("Your Partner's Name");
		inputfieldname = document.createElement("INPUT");
		textnodesurname = document.createTextNode ("Your Partner's Surname");
		inputfieldsurname = document.createElement("INPUT");
		textnodebirthdate = document.createTextNode ("Your Partner's Birth Date");
		inputfieldbirthdate = document.createElement("INPUT");
		textnodeoccupation = document.createTextNode ("Your Partner's Occupation");
		inputfieldoccupation = document.createElement("INPUT");
		textnodegender = document.createTextNode ("Your Partner's Gender");
		selectelement = document.createElement("SELECT");
		option1 = document.createElement("OPTION");
		option2 = document.createElement("OPTION");
		option3 = document.createElement("OPTION");
		textnodemale = document.createTextNode("Male");
		textnodefemale = document.createTextNode("Female");
		textnodeother = document.createTextNode("Other");
	
	newdiv.setAttribute("id", "partnerinfo2")
	inputfieldname.setAttribute("name", "partnerfname");
	inputfieldsurname.setAttribute("name", "partnersname");
	inputfieldbirthdate.setAttribute("type", "date");
	inputfieldbirthdate.setAttribute("name", "partnerbirthdate");
	inputfieldbirthdate.setAttribute("min", "1918-01-01");
	inputfieldbirthdate.setAttribute("max", "2000-09-01");
	inputfieldoccupation.setAttribute("name", "partneroccupation");
	selectelement.setAttribute("name", "partnergender");
	option1.setAttribute("value", "male");
	option2.setAttribute("value", "female");
	option3.setAttribute("value", "other");

	if (document.getElementsByName("havepartner")[0].checked){
	newfrag.appendChild(newdiv);
	newdiv.appendChild(textnodename);
	newdiv.appendChild(inputfieldname);
	newdiv.appendChild(textnodesurname);
	newdiv.appendChild(inputfieldsurname);
	newdiv.appendChild(textnodebirthdate);
	newdiv.appendChild(inputfieldbirthdate);
	newdiv.appendChild(textnodeoccupation);
	newdiv.appendChild(inputfieldoccupation);
	newdiv.appendChild(textnodegender);
	newdiv.appendChild(selectelement);
	selectelement.appendChild(option1);
	selectelement.appendChild(option2);
	selectelement.appendChild(option3);
	option1.appendChild(textnodemale);
	option2.appendChild(textnodefemale);
	option3.appendChild(textnodeother);

	
	document.getElementById("partnerinfo").appendChild(newfrag);
	document.getElementsByName("havepartner")[0].disabled = true;
	document.getElementsByName("havepartner")[1].disabled = false;
}
}

document.getElementsByName("havepartner")[1].addEventListener("click", removePartner);
function removePartner(){
	var checkdiv = document.getElementById("partnerinfo2");
	if (document.getElementsByName("havepartner")[1].checked) {
	document.getElementById("partnerinfo").removeChild(checkdiv);
	document.getElementsByName("havepartner")[1].disabled = true;
	document.getElementsByName("havepartner")[0].disabled = false;
}
}
document.getElementsByName("withchildren")[0].addEventListener("click", enterChildNumber);
function enterChildNumber() {
	
	var parent = document.createElement("DIV");
	var createinput = document.createElement("INPUT");
	var createparagraph = document.createElement("P");
	var createtextnode = document.createTextNode("Please enter the number of children you are taking to travel with you");
	
	parent.setAttribute("id", "childreninfo2");
	createinput.setAttribute("name", "numberofchildren");
	createinput.setAttribute("type", "number");
	createinput.setAttribute("min", "1");
	createinput.setAttribute("max", "6");
	createinput.setAttribute("oninput", "addChildren()");

	parent.appendChild(createparagraph);
	parent.appendChild(createparagraph);
	createparagraph.appendChild(createtextnode);
	parent.appendChild(createinput);
	
	document.getElementById("childreninfo").appendChild(parent);
	
	document.getElementsByName("withchildren")[0].disabled = true;
	document.getElementsByName("withchildren")[1].disabled = false;		
}


document.getElementsByName("withchildren")[1].addEventListener("click", removeChildren);
function removeChildren() {
	var checkdiv2 = document.getElementById("childreninfo2");
	var checkdiv3 = document.getElementById("childreninfo3");
	
	if (document.getElementsByName("withchildren")[1].checked && checkdiv3 == null) {
	
	document.getElementById("childreninfo").removeChild(checkdiv2);
	document.getElementsByName("withchildren")[1].disabled = true;
	document.getElementsByName("withchildren")[0].disabled = false;
}
	else if (document.getElementsByName("withchildren")[1].checked && checkdiv3 !== null) {


	document.getElementById("childreninfo").removeChild(checkdiv2);
	document.getElementById("childreninfo").removeChild(checkdiv3);
	document.getElementsByName("withchildren")[1].disabled = true;
	document.getElementsByName("withchildren")[0].disabled = false;
	}
}

document.getElementsByName("withfriends")[0].addEventListener("click", enterFriendNumber);
function enterFriendNumber() {
	
	var parent = document.createElement("DIV");
	var createinput = document.createElement("INPUT");
	var createparagraph = document.createElement("P");
	var createtextnode = document.createTextNode("Please enter the number of your friends you are going to travel with");
	
	parent.setAttribute("id", "friendinfo2");
	createinput.setAttribute("name", "numberoffriend");
	createinput.setAttribute("type", "number");
	createinput.setAttribute("min", "1");
	createinput.setAttribute("max", "6");
	createinput.setAttribute("oninput", "addFriend()");

	parent.appendChild(createparagraph);
	parent.appendChild(createparagraph);
	createparagraph.appendChild(createtextnode);
	parent.appendChild(createinput);
	
	document.getElementById("friendinfo").appendChild(parent);
	
	document.getElementsByName("withfriends")[0].disabled = true;
	document.getElementsByName("withfriends")[1].disabled = false;		
}


document.getElementsByName("withfriends")[1].addEventListener("click", removeFriend);
function removeFriend() {
	var checkdiv2 = document.getElementById("friendinfo2");
	var checkdiv3 = document.getElementById("friendinfo3");
	
	if (document.getElementsByName("withfriends")[1].checked && checkdiv3 == null) {
	
	document.getElementById("friendinfo").removeChild(checkdiv2);
	document.getElementsByName("withfriends")[1].disabled = true;
	document.getElementsByName("withfriends")[0].disabled = false;
}
	else if (document.getElementsByName("withfriends")[1].checked && checkdiv3 !== null) {


	document.getElementById("friendinfo").removeChild(checkdiv2);
	document.getElementById("friendinfo").removeChild(checkdiv3);
	document.getElementsByName("withfriends")[1].disabled = true;
	document.getElementsByName("withfriends")[0].disabled = false;
	}
}



document.getElementById("preferredaccomodation").addEventListener("change", selectAccommodation);
function selectAccommodation() {
var userselect = document.getElementById("preferredaccomodation").value;
checkdiv = document.getElementById("preferredaccom2");
if (checkdiv == null){
	switch(userselect) {
		case "hotel": 
	var newdiv = document.createElement("DIV");
	newparagraph = document.createElement("P");
	newtextnode = document.createTextNode("Please specify one from the list");
	newselect = document.createElement("SELECT");
	option1 = document.createElement("OPTION");
	option2 = document.createElement("OPTION");
	option3 = document.createElement("OPTION");
	option4 = document.createElement("OPTION");
	optiontext1 = document.createTextNode("5 star");
	optiontext2 = document.createTextNode("3 star");
	optiontext3 = document.createTextNode("Single room");
	optiontext4 = document.createTextNode("Shared");

	newdiv.setAttribute("id", "preferredaccom2");
	newselect.setAttribute("name", "hotel_option");
	option1.setAttribute("value", "5 star");
	option2.setAttribute("value", "3 star");
	option3.setAttribute("value", "single room");
	option4.setAttribute("value", "shared");

	newdiv.appendChild(newparagraph);
	newparagraph.appendChild(newtextnode);
	newdiv.appendChild(newselect);
	newselect.appendChild(option1);
	option1.appendChild(optiontext1);
	newselect.appendChild(option2);
	option2.appendChild(optiontext2);
	newselect.appendChild(option3);
	option3.appendChild(optiontext3);
	newselect.appendChild(option4);
	option4.appendChild(optiontext4);

	document.getElementById("preferredaccom").appendChild(newdiv);
	break;

		case "bed&breakfast": 
	var newdiv = document.createElement("DIV");
	newparagraph = document.createElement("P");
	newtextnode = document.createTextNode("Please specify one from the list");
	newselect = document.createElement("SELECT");
	option1 = document.createElement("OPTION");
	option2 = document.createElement("OPTION");
	optiontext1 = document.createTextNode("With Bathroom");
	optiontext2 = document.createTextNode("Shared Bathroom");
	
	newdiv.setAttribute("id", "preferredaccom2");
	newselect.setAttribute("name", "bed&breakfast_option");
	option1.setAttribute("value", "with bathroom");
	option2.setAttribute("value", "shared bathroom");
	
	newdiv.appendChild(newparagraph);
	newparagraph.appendChild(newtextnode);
	newdiv.appendChild(newselect);
	newselect.appendChild(option1);
	option1.appendChild(optiontext1);
	newselect.appendChild(option2);
	option2.appendChild(optiontext2);
	
	document.getElementById("preferredaccom").appendChild(newdiv);
	break;
		case "other": 
	var newdiv = document.createElement("DIV");
	newparagraph = document.createElement("P");
	newtextnode = document.createTextNode("Insert Your Own Accomodation type Below ");
	newtextfield = document.createElement("TEXTAREA");
	
	newdiv.setAttribute("id", "preferredaccom2");
	newtextfield.setAttribute("name", "prefaccom_other_userinput");
	newtextfield.setAttribute("rows", "3");
	newtextfield.setAttribute("cols", "30");
	newtextfield.setAttribute("maxlength", "80");
	
	newdiv.appendChild(newparagraph);
	newparagraph.appendChild(newtextnode);
	newdiv.appendChild(newtextfield);
		
	document.getElementById("preferredaccom").appendChild(newdiv);
	break;
}
}
 	else if (checkdiv == !null && userselect ==!"hotel", "bed&breakfast", "other"){
	document.getElementById("preferredaccom").removeChild(checkdiv);
	selectAccommodation()
}
}

document.getElementsByName("preftravelmode")[0].addEventListener("change", controlTravelModeAir);
function controlTravelModeAir() {
checkboxair = document.getElementsByName("preftravelmode")[0];
if (this.checked) {
	var newdiv = document.createElement("DIV");
	newparagraph = document.createElement("P");
	newtextnode = document.createTextNode("Please specify one from the list or type your own");
	newh4 = document.createElement("H4");
	newh4text = document.createTextNode("Air");
	newinput = document.createElement("INPUT");
	newlist = document.createElement("DATALIST");
	option1 = document.createElement("OPTION");
	option2 = document.createElement("OPTION");
	option3 = document.createElement("OPTION");
	optiontext1 = document.createTextNode("Jet");
	optiontext2 = document.createTextNode("Turbo-prop");
	optiontext3 = document.createTextNode("Helicopter");

	newdiv.setAttribute("id", "travelmode1");
	newdiv.setAttribute("class", "flexcolumn");
	newinput.setAttribute("name", "preftravelmodeair_option")
	newinput.setAttribute("list", "travelmodelist")
	newlist.setAttribute("id", "travelmodelist")
	option1.setAttribute("value", "Jet");
	option2.setAttribute("value", "Turbo-prop");
	option3.setAttribute("value", "Helicopter");
	
	newdiv.appendChild(newparagraph);
	newparagraph.appendChild(newtextnode);
	newdiv.appendChild(newh4);
	newh4.appendChild(newh4text);
	newdiv.appendChild(newinput);
	newinput.appendChild(newlist);
	newlist.appendChild(option1);
	option1.appendChild(optiontext1);
	newlist.appendChild(option2);
	option2.appendChild(optiontext2);
	newlist.appendChild(option3);
	option3.appendChild(optiontext3);

document.getElementById("travelmodecontainer").appendChild(newdiv);


}
else {
var createddiv = document.getElementById("travelmode1");
document.getElementById("travelmodecontainer").removeChild(createddiv);
}
}



document.getElementsByName("preftravelmode")[1].addEventListener("change", controlTravelModeWater);
function controlTravelModeWater(){
	checkboxwater = document.getElementsByName("preftravelmode")[1];
	if (this.checked) {
	var newdiv = document.createElement("DIV");
	newparagraph = document.createElement("P");
	newtextnode = document.createTextNode("Please specify one from the list or type your own");
	newh4 = document.createElement("H4");
	newh4text = document.createTextNode("Water");
	newinput = document.createElement("INPUT");
	newlist = document.createElement("DATALIST");
	option1 = document.createElement("OPTION");
	option2 = document.createElement("OPTION");
	option3 = document.createElement("OPTION");
	option4 = document.createElement("OPTION");
	option5 = document.createElement("OPTION");
	optiontext1 = document.createTextNode("cruise");
	optiontext2 = document.createTextNode("sail");
	optiontext3 = document.createTextNode("barge");
	optiontext4 = document.createTextNode("small");
	optiontext5 = document.createTextNode("large");

	newdiv.setAttribute("id", "travelmode2");
	newdiv.setAttribute("class", "flexcolumn");
	newinput.setAttribute("name", "preftravelmodewater_option")
	newinput.setAttribute("list", "travelmodelist1")
	newlist.setAttribute("id", "travelmodelist1")
	option1.setAttribute("value", "cruise");
	option2.setAttribute("value", "sail");
	option3.setAttribute("value", "barge");
	option4.setAttribute("value", "small");
	option5.setAttribute("value", "large");
	
	newdiv.appendChild(newparagraph);
	newparagraph.appendChild(newtextnode);
	newdiv.appendChild(newh4);
	newh4.appendChild(newh4text);
	newdiv.appendChild(newinput);
	newinput.appendChild(newlist);
	newlist.appendChild(option1);
	option1.appendChild(optiontext1);
	newlist.appendChild(option2);
	option2.appendChild(optiontext2);
	newlist.appendChild(option3);
	option3.appendChild(optiontext3);
	newlist.appendChild(option4);
	option4.appendChild(optiontext4);
	newlist.appendChild(option5);
	option5.appendChild(optiontext5);
document.getElementById("travelmodecontainer").appendChild(newdiv);
}
else {
var createddiv = document.getElementById("travelmode2");
document.getElementById("travelmodecontainer").removeChild(createddiv);
}
}

document.getElementsByName("preftravelmode")[9].addEventListener("change", controlTravelModeOther);
function controlTravelModeOther(){
	checkboxother = document.getElementsByName("preftravelmode")[9];
	if (this.checked) {
	var newdiv = document.createElement("DIV");
	newparagraph = document.createElement("P");
	newtextnode = document.createTextNode("Please type your own travel mode");
	newh4 = document.createElement("H4");
	newh4text = document.createTextNode("Your own");
	newtextfield = document.createElement("TEXTAREA");
	
	newdiv.setAttribute("id", "travelmode3");
	newdiv.setAttribute("class", "flexcolumn");
	newtextfield.setAttribute("name", "travelmode_other_userinput");
	newtextfield.setAttribute("rows", "2");
	newtextfield.setAttribute("cols", "30");
	newtextfield.setAttribute("maxlength", "50");
		
	newdiv.appendChild(newparagraph);
	newparagraph.appendChild(newtextnode);
	newdiv.appendChild(newh4);
	newh4.appendChild(newh4text);
	newdiv.appendChild(newtextfield);
	
document.getElementById("travelmodecontainer").appendChild(newdiv);
}
else {
var createddiv = document.getElementById("travelmode3");
document.getElementById("travelmodecontainer").removeChild(createddiv);
}
}

var popappear = document.getElementsByClassName("helppopup");
for(i=0;i<popappear.length;i++){
	popappear[i].addEventListener("click", helppopupAppear);
}

function helppopupAppear() {
	var pop = document.getElementsByClassName("helppopuptext");
	for(i=0;i<popappear.length;i++){
	pop[i].classList.toggle("display");
}
}

var popdisappear = document.getElementsByClassName("helppopuptext");
for(i=0;i<popdisappear.length;i++){
	popdisappear[i].addEventListener("click", helppopupDisappear);
}
function helppopupDisappear() {
	var popclass = document.getElementsByClassName("helppopuptext");
	for(i=0;i<popclass.length;i++){
	popclass[i].classList.remove("display");
}
}


});

function addChildren() {
	var childnumber = document.getElementsByName("numberofchildren")[0].value;
	var div = document.getElementById("childreninfo3");
	if (div == null) {

		var tt = document.createElement("DIV");
		tt.setAttribute("id", "childreninfo3");
		document.getElementById("childreninfo").appendChild(tt);

	for (var i = 1; i <= childnumber; i++) {

	var newfrag = document.createDocumentFragment();
 		textnodename = document.createTextNode ("Name");
		inputfieldname = document.createElement("INPUT");
		textnodesurname = document.createTextNode ("Surname");
		inputfieldsurname = document.createElement("INPUT");
		textnodebirthdate = document.createTextNode ("Birth Date");
		inputfieldbirthdate = document.createElement("INPUT");
		textnodegender = document.createTextNode ("Gender");
		selectelement = document.createElement("SELECT");
		option1 = document.createElement("OPTION");
		option2 = document.createElement("OPTION");
		option1text = document.createTextNode("Male");
		option2text = document.createTextNode("Female");
		h3element = document.createElement("H3");
		textnodeh3 = document.createTextNode("");

	h3element.setAttribute("id", "child" + i + "heading");
	textnodeh3.nodeValue = "Child " + i;
	inputfieldname.setAttribute("name", "child" + i + "firstname");
	inputfieldsurname.setAttribute("name", "child" + i + "surname");
	inputfieldbirthdate.setAttribute("type", "date");
	inputfieldbirthdate.setAttribute("name", "child" + i + "birthdate");
	inputfieldbirthdate.setAttribute("min", "1918-01-01");
	selectelement.setAttribute("name", "child" + i + "gender");
	option1.setAttribute("value", "male");
	option2.setAttribute("value", "female");

	tt.appendChild(newfrag);
	newfrag.appendChild(h3element);
	h3element.appendChild(textnodeh3);
	newfrag.appendChild(textnodename);
	newfrag.appendChild(inputfieldname);
	newfrag.appendChild(textnodesurname);
	newfrag.appendChild(inputfieldsurname);
	newfrag.appendChild(textnodebirthdate);
	newfrag.appendChild(inputfieldbirthdate);
	newfrag.appendChild(textnodegender);
	newfrag.appendChild(selectelement);
	selectelement.appendChild(option1);
	selectelement.appendChild(option2);
	option1.appendChild(option1text);
	option2.appendChild(option2text);
	
	document.getElementById("childreninfo3").appendChild(newfrag);
}
}

else {
	document.getElementById("childreninfo").removeChild(div);
	return addChildren()
}
}



function addFriend() {
	var friendnumber = document.getElementsByName("numberoffriend")[0].value;
	var div = document.getElementById("friendinfo3");
	if (div == null) {

		var tt = document.createElement("DIV");
		tt.setAttribute("id", "friendinfo3");
		document.getElementById("friendinfo").appendChild(tt);

	for (var i = 1; i <= friendnumber; i++) {

	var newfrag = document.createDocumentFragment();
 		textnodename = document.createTextNode ("Name");
		inputfieldname = document.createElement("INPUT");
		textnodesurname = document.createTextNode ("Surname");
		inputfieldsurname = document.createElement("INPUT");
		textnodebirthdate = document.createTextNode ("Birth Date");
		inputfieldbirthdate = document.createElement("INPUT");
		textnodegender = document.createTextNode ("Gender");
		selectelement = document.createElement("SELECT");
		option1 = document.createElement("OPTION");
		option2 = document.createElement("OPTION");
		option1text = document.createTextNode("Male");
		option2text = document.createTextNode("Female");
		h3element = document.createElement("H3");
		textnodeh3 = document.createTextNode("");

	h3element.setAttribute("id", "friend" + i + "heading");
	textnodeh3.nodeValue = "Friend " + i;
	inputfieldname.setAttribute("name", "friend" + i + "firstname");
	inputfieldsurname.setAttribute("name", "friend" + i + "surname");
	inputfieldbirthdate.setAttribute("type", "date");
	inputfieldbirthdate.setAttribute("name", "friend" + i + "birthdate");
	inputfieldbirthdate.setAttribute("min", "1918-01-01");
	selectelement.setAttribute("name", "friend" + i + "gender");
	option1.setAttribute("value", "male");
	option2.setAttribute("value", "female");

	tt.appendChild(newfrag);
	newfrag.appendChild(h3element);
	h3element.appendChild(textnodeh3);
	newfrag.appendChild(textnodename);
	newfrag.appendChild(inputfieldname);
	newfrag.appendChild(textnodesurname);
	newfrag.appendChild(inputfieldsurname);
	newfrag.appendChild(textnodebirthdate);
	newfrag.appendChild(inputfieldbirthdate);
	newfrag.appendChild(textnodegender);
	newfrag.appendChild(selectelement);
	selectelement.appendChild(option1);
	selectelement.appendChild(option2);
	option1.appendChild(option1text);
	option2.appendChild(option2text);
	
	document.getElementById("friendinfo3").appendChild(newfrag);
}
}

else {
	document.getElementById("friendinfo").removeChild(div);
	return addFriend()
}
}

function showerror() {
	var a = document.getElementsByClassName("showerror");
	for (var i=0; i<a.length; i++) {
		a[i].innerHTML = "Please fill the forms and then continue";
	
}
}

