<?php
/* @var $this SearchController */

$this->breadcrumbs=array(
	'Search',
);
?>
<h1><?php echo "Add items to '{$this->timeline->title}'"; ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php if($data!==null) {
    $this->renderPartial('_list', array('provider'=>$data));
}
