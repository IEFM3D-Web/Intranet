ddaccordion.init({headerclass:"submenuheader",contentclass:"submenu",revealtype:"click",mouseoverdelay:200,collapseprev:true,defaultexpanded:[],onemustopen:false,animatedefault:false,persiststate:true,toggleclass:["",""],togglehtml:["suffix","<div class='statusicon_plus'></div>","<div class='statusicon_minus'></div>"],animatespeed:"fast",oninit:function(headers,expandedindices){},onopenclose:function(header,index,state,isuseractivated){}})
$(document).ready(function(){$('.ask').jConfirmAction();});function deleteArticle()
{var answer=confirm("Supprimer les articles sélectionnés ?")
if(answer){document.messages.submit();}
return false;}
function deleteUser()
{var answer=confirm("Supprimer les utilisateurs sélectionnés ?")
if(answer){document.messages.submit();}
return false;}
function deleteComment()
{var answer=confirm("Supprimer les commentaires sélectionnés ?")
if(answer){document.messages.submit();}
return false;}
function deleteCategory()
{var answer=confirm("Supprimer les catégories sélectionnées ?")
if(answer){document.messages.submit();}
return false;}
function deleteRole()
{var answer=confirm("Supprimer les rôles sélectionnés ?")
if(answer){document.messages.submit();}
return false;}
function deleteSection()
{var answer=confirm("Supprimer les sections sélectionnées ?")
if(answer){document.messages.submit();}
return false;}
var myMessages=['info','warning','error','success'];function showMessage(type)
{$('.'+type).slideDown();}