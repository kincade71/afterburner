// JavaScript Document

jQuery.fn.revealMenu = function(){
	$(this).click(function(){
		if($('#nav_inner').is(':hidden')){
			$('#nav_inner').slideDown();
		}
		else{
			$('#nav_inner').slideUp();
		}
	});
}

jQuery.fn.showAddField = function(){
	$(this).click(function(){
		if($('#AddDocField').is(':hidden')){
			$('#AddDocField').show();
			$('#AddFieldValue').focus();
		}
		else{
			$('#AddDocField').hide();
			$('#AddFieldValue').blur();
		}
		return false;
	});
	
	$('#AddFieldValue').blur(function(){
			//$('#AddDocField').hide();
	});
}

jQuery.fn.addField = function(){
	$(this).click(function(){
		var FieldName = $('#AddFieldValue').val();
		if(!FieldName){
			alert('Enter a field');
		}
		else{
			$.ajax({
				type:	'POST',
				url:	'docs/add_doc_field',
				data:	'FieldName='+FieldName,
				success: function(id){
					$('#AddFieldValue').val('');
					$('#AddDocField').hide();
					$('#ResourceArea')
						 .append($("<option></option>")
						 .attr("value",id)
						 .text(FieldName)); 
				}
			});
		}
	});
}

jQuery.fn.addDocItem = function(){
	
	$(this).click(function(){
		var DocItem = $('#DocItem').val();
		var DocItemContent = escape($('#DocItemContent').val());
		var ResourceArea = $('#ResourceArea').val();
		
		
		if(!DocItem || !DocItemContent){
			alert('Complete all fields');
		}
		else{
			$.ajax({
				type:	'POST',
				url:	'docs/add_doc_item',
				data:	'DocItem='+DocItem+'&DocItemContent='+DocItemContent+'&ResourceArea='+ResourceArea,
				success: function(id){
					if(id){
						$('#DocItem').val('');
						$('#DocItemContent').val('');
						$('#ResourceArea').val('');
						
						$('#CreateMessage').show('fast', function(){
							$('#CreateMessage').html('Documentation Created!');
							setTimeout(hideMessage, 2000);
						});
					}
					else{
						$('#CreateMessage').show('fast', function(){
							$('#CreateMessage').css('color', '#F00');
							$('#CreateMessage').html('Creation Failed!');
							setTimeout(hideMessage, 2000);
						});
					}
					//SHOW MESSAGE, ITEM CREATED, OR GO TO ITEM?
				}
			});
		}
		
		function hideMessage(){
			$('#CreateMessage').fadeOut(function(){
				$('#CreateMessage').css('color', '#090');
			});
		}
	});
}

jQuery.fn.updateDocItem = function(){
	$(this).click(function(){
		updateDocItemNow();
	});
}

function updateDocItemNow(){
		var DocItemId = $('input[name=DocItemId]').val();
		var DocItem = $('#DocItem').val();
		var DocItemContent = escape($('#DocItemContent').val());
		var ResourceArea = $('#ResourceArea').val();
		var str = 'DocItemId='+DocItemId+'&DocItem='+DocItem+'&DocItemContent='+DocItemContent+'&ResourceArea='+ResourceArea
		
		if(!DocItemId){
			alert('No Item Id!');
		}
		else{ 
			if(!DocItem || !DocItemContent){
				alert('Complete all fields');
			}
			else{
				$.ajax({
					type:	'POST',
					url:	'../../docs/update_doc_item',
					data:	str,
					success: function(html){
						if(html=='Pass'){
							/*$('#DocItem').val('');
							$('#DocItemContent').val('');
							$('#ResourceArea').val('');*/
							
							$('#CreateMessage').show('fast', function(){
								$('#CreateMessage').html('Documentation Updated!');
								setTimeout(hideMessage, 2000);
							});
						}
						else{
							$('#CreateMessage').show('fast', function(){
								$('#CreateMessage').css('color', '#F00');
								$('#CreateMessage').html('Creation Failed!');
								setTimeout(hideMessage, 2000);
							});
						}
						//SHOW MESSAGE, ITEM CREATED, OR GO TO ITEM?
					}
				});
			}
			
			function hideMessage(){
				$('#CreateMessage').fadeOut(function(){
					$('#CreateMessage').css('color', '#090');
				});
			}
		}
}