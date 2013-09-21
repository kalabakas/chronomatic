<div class="span3 search-item">
<?php
if(($img=$data->thumb)!==null) {
    echo CHtml::image($img, $data->title, array('class'=>'img-rounded search-item-thumb'));
}
$content = CHtml::encode($data->title)." - ".CHtml::tag('small',array(),$data->year);
echo CHtml::tag('p',array(),$content);

$form = $this->beginWidget('CActiveForm', array(
    'id'=>"add-item-".uniqid(),
    'action' => array('timeline/add', 'id'=>$this->timelineId, 'eid'=>$data->id),
));
$model = new Item();
$model->attributes = $data->attributes;
foreach($model->attributeNames() as $attr)
{
    if($attr=='itemId' || $attr=='createdAt') {
        continue;
    }
    echo $form->hiddenField($model, $attr);
}
echo CHtml::button('Add', array('class'=>'btn btn-primary', 'data-hook'=>'add-item'));
$this->endWidget();
?>
</div>
