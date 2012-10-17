$(document).ready(function() {
$('#checkall').click(function(){
$("input[type='checkbox']").attr('checked', $('#checkall').is(':checked'));
});

//------calculate the value---------
$('form').find(':checkbox').click(function(){
var amt=0;
$('div').filter(':gt(0)').find(':checkbox').each(function(){
if($('div:gt(0)'))
{
if($(this).is(':checked'))
{
amt=amt+parseInt($(this).val());
}
}
});
});
});