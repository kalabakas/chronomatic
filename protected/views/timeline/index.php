<?php
$this->breadcrumbs=array(
	'Timelines',
);

/**$this->menu=array(
	array('label'=>'Create Timeline','url'=>array('create')),
	array('label'=>'Manage Timeline','url'=>array('admin')),
);**/
?>

<h1>Timelines</h1>
<?php
echo CHtml::link('Create new',array('timeline/create'), array('class'=>'btn btn-primary'));
?>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
