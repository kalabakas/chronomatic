<?php
$this->breadcrumbs=array(
	'Timelines'=>array('index'),
	'Create',
);

/**$this->menu=array(
	array('label'=>'List Timeline','url'=>array('index')),
	array('label'=>'Manage Timeline','url'=>array('admin')),
);**/
?>

<h1>Create Timeline</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
