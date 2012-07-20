<script type="text/javascript" src="<?= base_url() ?>js/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('textarea.tinymce').tinymce({
	
			// Location of TinyMCE script
			script_url : 'js/tinymce/jscripts/tiny_mce/tiny_mce.js',
			
			// General options
			theme : "advanced",
			plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
	
			// Theme options
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,outdent,indent,blockquote,|,bullist,numlist,|,formatselect,fontsizeselect,styleselect",
			theme_advanced_buttons2 : "undo,redo,|,link,unlink,anchor,|,forecolor,backcolor,|,tablecontrols,|,hr,fullscreen,code",
	
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,
	
			// Example content CSS (should be your site CSS)
	
			content_css : "css/tinymce.css",
	
			// Style formats
			style_formats : [
                	{title : 'URL styles'},
					{title : 'Resource', inline : 'dfn', styles : {color : '#339900'}},
					{title : 'Resource Item', inline : 'dfn', styles : {color : '#0099cc'}},
					{title : 'Id', inline : 'dfn', styles : {color : '#cc9900'}},
               		{title : 'Notice', inline : 'blockquote', classes : 'important'},
               		{title : 'Note', inline : 'blockquote', classes : 'note'},
               		{title : 'HTML styles'},
					{title : 'Definition', inline : 'dfn', styles : {color : '#00620C'}},
					{title : 'Variable', inline : 'var', styles : {color : '#8F5B00'}},
					{title : 'Sample', inline : 'samp', styles : {color : '#480091'}},
					{title : 'User Input', inline : 'kbd', styles : {color : '#A70000'}}
			]
		});
});
</script>
<div class="doc_create_form">
	<?
    
    echo form_open('create');
	echo '<div class="doc_select_container">';
	echo form_dropdown('ResourceArea', $resourceAreas, set_value('ResourceArea'), 'class="doc_select", id="ResourceArea"');
	echo '</div>';
	
	echo '<a href="javascript:void(0);" class="doc_add_btn" id="AddFieldBtn">';
	//echo '<input type="submit" id="DocAddFieldBtn" class="doc_add_field_btn" value=""/>';
	echo '</a>';
	
	echo '<div class="doc_add_field" id="AddDocField">';
	echo '<input type="text" class="field" id="AddFieldValue" placeholder="Enter new field..." />';
	echo '<a href="javascript:void(0);" id="DocAddFieldBtn" class="doc_add_field_btn"></a>';
	echo '</div>';
            
    $data = array(
        'name'        => 'DocItem',
        'id'          => 'DocItem',
        'value'       => set_value('DocItem'),
        'class'		=> 'doc_input',
		'placeholder' => 'Enter Documentation Item Name'
        );
    echo form_input($data);
        
    $data = array(
        'name'        => 'DocItemContent',
        'id'          => 'DocItemContent',
        'value'       => set_value('DocItemContent'),
        'class'		=> 'doc_text tinymce',
		'placeholder' => 'Enter Documentation Here...'
        );
    echo form_textarea($data);
	
	echo '<a href="javascript:void(0);" class="doc_create_btn" id="CreateDocBtn"></a>';
	echo '<div class="doc_create_message" id="CreateMessage"></div>';
    
    echo form_close();
    ?>
</div>