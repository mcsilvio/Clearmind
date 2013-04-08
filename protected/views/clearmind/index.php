<?php 
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js_plugins/jquery-1.9.1.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js_plugins/jquery.layout.js');
Yii::app()->clientScript->registerScript('Clearmind','

		var outerLayout, eastLayout;
		


		$(document).ready(function() {
		 
		// load jTable
		outerLayout = $("#appContainer").layout({
		minSize:			100	// ALL panes
		,	west__size:			250
		, spacing_open: 20
		, closable: false,
		
});

eastLayout = $("div.ui-layout-center").layout({
	minSize:				50	// ALL panes
	,	center__paneSelector:	".center-center"
	,	north__paneSelector:	".center-north"
	,	north__size:			80
	, spacing_open: 20
	, closable: false
});
});
		
	
$("#titleField").bind("keyup", function(e) {
	//on letter number
	if ((e.which <= 90 && e.which >= 46 ) || e.which == 8 || (e.which >= 186 && e.which <= 222))
	{
		//write to tree
		$("#" + JsTreeBehavior.container_ID).jstree("rename_node", $("#node_" + $("#idField").val()), $("#titleField").val() );


		//save to database, when?
		$.ajax({
			type:"POST",
			url:Yii_js.baseUrl + "/" + JsTreeBehavior.controllerID + "/updateNode",
			data:{
				"Node" : "Node",
				"update_id": $("#idField").val(),
				"title" : $("#titleField").val(),
				"titleOnly" : true,
				"YII_CSRF_TOKEN":Yii_js.csrf
			},
			 
			 
		});
	}
});

$("#contentField").bind("keyup", function(e) {
	//on letter number
	if ((e.which <= 90 && e.which >= 46 ) || e.which == 8 || (e.which >= 186 && e.which <= 222))
	{
		//save to database, when?
		$.ajax({
			type:"POST",
			url:Yii_js.baseUrl + "/" + JsTreeBehavior.controllerID + "/updateNode",
			data:{
				"Node" : "Node",
				"update_id": $("#idField").val(),
				"contentOnly" : true,
				"content" : $("#contentField").val(),
				"YII_CSRF_TOKEN":Yii_js.csrf
			},
			 
			 
		});
	}
});
');

?>
<div id="appContainer">

<DIV class="ui-layout-west border fill">
<?php
$this->widget('application.widgets.JsTreeWidget',
array('modelClassName' => 'Node',
'jstree_container_ID' => 'Node-wrapper',
'themes' => array('theme' => 'default', 'dots' => true, 'icons' => false),
'plugins' => array('themes', 'html_data', 'contextmenu', 'crrm', 'dnd', 'cookies', 'ui'),
'jstree_classes' => '',
));
?>
</DIV>
<DIV class="ui-layout-center">

	<DIV class="center-north">
		<input type="text" name="titleField" id="titleField" class="fill border" />
	</div>
	<DIV class="center-center">
		<textarea name="contentField" id="contentField" class="fill border"></textarea>
	</div>

</DIV>

</div>
<input type="hidden"
	name="idField" id="idField" />
