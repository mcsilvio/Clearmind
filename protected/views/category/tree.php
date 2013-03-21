<?php 
$this->pageTitle = 'Business Name: or something goes here';
$this->description = 'Describe the page shortly here'; 

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

<div id="account">
				<?php if(!Yii::app()->user->isGuest) : ?>
			
					
					Logged In:
					<?php echo CHtml::link(Yii::app()->user->name, array('profile/index')); ?>
					<?php echo ' ( ' . CHtml::link('Log Out', array('user/logout')) . ' ) '; ?>		
				<?php else: ?>	
				<div style="height: 30px;display:block;width: 600px;"> &nbsp; </div>
				<?php endif; ?>
			</div>

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