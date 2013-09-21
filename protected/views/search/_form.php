<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'search',
    'htmlOptions'=>array('class'=>'well'),
    'inlineErrors'=>true,
));
echo $form->errorSummary($model);
echo $form->error($model,'term');
echo $form->labelEx($model,'type');
echo $form->labelEx($model,'provider');

echo $form->dropDownListRow($model, 'type', $model->typeElements);
echo $form->textFieldRow($model, 'term', array('class'=>'input-medium', 'prepend'=>'<i class="icon-search"></i>')); 
echo $form->dropDownListRow($model, 'provider', $model->providerElements);
echo $form->textFieldRow($model, 'from', array()); 
echo $form->textFieldRow($model, 'to', array()); 
echo $form->checkBoxRow($model, 'imageOnly', array('hint'=>'Only images'));
$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Go')); 
 
$this->endWidget();
