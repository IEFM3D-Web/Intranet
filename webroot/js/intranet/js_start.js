/////////////////////// Initialisation ddaccordion ///////////////////////
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<div class='statusicon_plus'></div>", "<div class='statusicon_minus'></div>"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})

/////////////////////// Initialisation jConfirmAction ///////////////////////
$(document).ready(function() {

	$('.ask').jConfirmAction();
	
});

/////////////////////// Confirmation suppressions multiples ///////////////////////
function deleteArticle()
{
	var answer = confirm("Supprimer les articles sélectionnés ?")
	if (answer){
		document.messages.submit();
	}

	return false;  
}	

function deleteUser()
{
	var answer = confirm("Supprimer les utilisateurs sélectionnés ?")
	if (answer){
		document.messages.submit();
	}

	return false;  
}

function deleteComment()
{
	var answer = confirm("Supprimer les commentaires sélectionnés ?")
	if (answer){
		document.messages.submit();
	}

	return false;  
}

function deleteCategory()
{
	var answer = confirm("Supprimer les catégories sélectionnées ?")
	if (answer){
		document.messages.submit();
	}

	return false;  
}

function deleteRole()
{
	var answer = confirm("Supprimer les rôles sélectionnées ?")
	if (answer){
		document.messages.submit();
	}

	return false;  
}

var myMessages = ['info','warning','error','success']; // define the messages types		 

function showMessage(type)
{		  
		  
		  $('.'+type).slideDown();
}
