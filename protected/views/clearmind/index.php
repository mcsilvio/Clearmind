<?php 
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js_plugins/jquery-1.9.1.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js_plugins/jquery.layout.js');
Yii::app()->clientScript->registerScript('Export Tree','
	function exportTree()
	{
	
		
		//change text
		$("#exportLink").text("")
		$("#exportText").text("Exporting...");
		
		//send node id to server for exportation
		$.ajax
		({
		type:"POST",
		url:Yii_js.baseUrl + "/" + JsTreeBehavior.controllerID + "/exportTree",
		data: { id: $("#idField").val() },
		success: function(data)
		{
			//set session variable
			$.ajax({
			  type: "POST",
			  url: Yii_js.baseUrl + "/" + JsTreeBehavior.controllerID + "/setVar",
			  data: { var: data },
			  success: function (data)
			  {
				//redirect to download file
				window.location.href = Yii_js.baseUrl + "/" + JsTreeBehavior.controllerID + "/downloadFile";
			
				//change text back
	  			$("#exportLink").text("Export")
	  			$("#exportText").text("");
			  }
			});
		
			
		}
		});
	
	}
	', CClientScript::POS_HEAD);

Yii::app()->clientScript->registerScript('Clearmind','

		var outerLayout, eastLayout;
		var autoSaveTimedCommand;

		function checkValidEditKey(e)
		{
		return ((e.which <= 90 && e.which >= 46 ) || e.which == 8 || (e.which >= 186 && e.which <= 222));
}

		function hasChanged(titleChanged)
		{
		$("#saveLink").text("Waiting...");
		if(autoSaveTimedCommand) clearTimeout(autoSaveTimedCommand);
		autoSaveTimedCommand = setTimeout(function(){ saveNode($("#idField").val(), titleChanged); }, 3000);
}

		function saveNode(id, titleChanged )
		{
		$("#saveLink").text("Saving...");
		var data =
		{
		"Node" : "Node",
		"update_id": id,
		"YII_CSRF_TOKEN":Yii_js.csrf
}

		if(titleChanged)
		{
		data.title = $("#titleField").val();
		data.titleOnly = true;
}
		else
		{
		data.content = $("#contentField").val();
		data.contentOnly = true;
}

		$.ajax
		({
		type:"POST",
		url:Yii_js.baseUrl + "/" + JsTreeBehavior.controllerID + "/updateNode",
		data: data,
		success: function(data)
		{
		$("#saveLink").text("Saved");
		}
		});
}



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
		if (checkValidEditKey(e))
		{
		//rename node on tree
		$("#" + JsTreeBehavior.container_ID).jstree("rename_node", $("#node_" + $("#idField").val()), $("#titleField").val() );

		//mark content as changed
		hasChanged(true);
}
});

		$("#contentField").bind("keyup", function(e) {
		//on letter number
		if (checkValidEditKey(e))
		{
		//mark content as changed
		hasChanged(false);
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
			<input type="text" name="titleField" id="titleField"
				class="fill border" />
		</div>
		<DIV class="center-center">
			<textarea name="contentField" id="contentField" class="fill border"></textarea>
		</div>

	</DIV>

</div>
<input type="hidden" name="idField"
	id="idField" />

