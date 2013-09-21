<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'timeline-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php //echo $form->textFieldRow($model,'user',array('class'=>'span5','maxlength'=>255)); ?>
<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>
<?php //echo $form->textFieldRow($model,'createdAt',array('class'=>'span5')); ?>
<?php //echo $form->textFieldRow($model,'updatedAt',array('class'=>'span5')); ?>
<?php //echo $form->textFieldRow($model,'public',array('class'=>'span5')); ?>
<?php //echo $form->textFieldRow($model,'cloneOf',array('class'=>'span5')); ?>
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>$model->isNewRecord ? 'Create' : 'Save',
    )); ?>
</div>
<?php $this->endWidget(); ?>
