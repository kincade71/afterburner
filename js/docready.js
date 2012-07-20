// JavaScript Document

$(document).ready(function(){
	$('.OpenNavBtn').revealMenu();
	$('#AddFieldBtn').showAddField();
	$('#DocAddFieldBtn').addField();
	$('#CreateDocBtn').addDocItem();
	
	if($('#UpdateDocBtn')[0])
		$('#UpdateDocBtn').updateDocItem();
	///////////////////////////////////////
});