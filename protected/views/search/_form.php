<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'search',
    'htmlOptions'=>array('class'=>'well'),
));
echo $form->textFieldRow($model, 'term', array('class'=>'input-medium', 'prepend'=>'<i class="icon-search"></i>')); 
$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Go')); 
 
$this->endWidget();
