<?php
/* @var $this SearchController */

$this->breadcrumbs=array(
	'Search',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php if($data!==null) {
    $this->renderPartial('_list', array('provider'=>$data));
}
