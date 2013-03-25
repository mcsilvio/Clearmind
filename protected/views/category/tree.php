<?php 
Yii::app()->clientScript->registerScript('liveSearch','
$("#nameField").bind("keyup", function(e) {
	//on letter number
	if ((e.which <= 90 && e.which >= 46 ) || e.which == 8 || (e.which >= 186 && e.which <= 222))
	{
		//write to tree
		$("#" + JsTreeBehavior.container_ID).jstree("rename_node", $("#node_" + $("#idField").val()), $("#nameField").val() );
		
		
		//save to database, when?
		$.ajax({
                type:"POST",
                url:Yii_js.baseUrl + "/" + JsTreeBehavior.controllerID + "/updateNode",
                data:{
					"Category" : "Category",
                    "update_id": $("#idField").val(),
					"name" : $("#nameField").val(),
					"nameOnly" : true,
                    "YII_CSRF_TOKEN":Yii_js.csrf
                },
               
               
            });
	}
});
		
$("#descriptionField").bind("keyup", function(e) {
	//on letter number
	if ((e.which <= 90 && e.which >= 46 ) || e.which == 8 || (e.which >= 186 && e.which <= 222))
	{		
		//save to database, when?
		$.ajax({
                type:"POST",
                url:Yii_js.baseUrl + "/" + JsTreeBehavior.controllerID + "/updateNode",
                data:{
					"Category" : "Category",
                    "update_id": $("#idField").val(),
					"descriptionOnly" : true,
					"description" : $("#descriptionField").val(),
                    "YII_CSRF_TOKEN":Yii_js.csrf
                },
               
               
            });
	}
});
		');

?>



<?php 
$this->widget('application.widgets.JsTreeWidget',
                               array('modelClassName' => 'Category',
                                           'jstree_container_ID' => 'Category-wrapper',
                                           'themes' => array('theme' => 'default', 'dots' => true, 'icons' => true),
                                           'plugins' => array('themes', 'html_data', 'contextmenu', 'crrm', 'dnd', 'cookies', 'ui')
                                            ));
?>

<input type="text" name="nameField" id="nameField" />
<br />
<input type="text" name="descriptionField" id="descriptionField" />
<input type="hidden" name="idField" id="idField" />

