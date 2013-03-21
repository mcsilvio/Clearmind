
<?php 
$this->pageTitle = "Business Name: or something goes here";
?>

<h1>Clearmind</h1>

<?php
$this->widget('application.widgets.JsTreeWidget',
		array('modelClassName' => 'Clearmind',
				'jstree_container_ID' => 'clearmind-wrapper',//jstree will be rendered in this div.id of your choice.
				'themes' => array('theme' => 'default', 'dots' => true, 'icons' => true),
				'plugins' => array('themes', 'html_data', 'contextmenu', 'crrm', 'dnd', 'cookies', 'ui')
		));
?>

<div class="row">
	<input type="textfield" name="title" id="title_text" />
</div>

<div class="row">
	<input type="textfield" name="title" id="content_text" />
</div>
