<?php
$this->breadcrumbs=array(
	'Timelines'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Timeline','url'=>array('index')),
	array('label'=>'Create Timeline','url'=>array('create')),
	array('label'=>'View Timeline','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Timeline','url'=>array('admin')),
);
?>

<h1>Update Timeline <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>