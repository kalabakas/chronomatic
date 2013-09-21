<?php
/* @var $this SearchController */

$this->breadcrumbs=array(
	'Search',
);
?>
<h1><?php echo "Add items to '{$this->timeline->title}'"; ?>&nbsp;
<?php echo CHtml::link('Done',array('timeline/view', 'id'=>$this->timeline->id), array('class'=>'btn btn-success')); ?></h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php if($data!==null) {
    $this->renderPartial('_list', array('provider'=>$data));
}
