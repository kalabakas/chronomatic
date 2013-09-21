<div class="view">
    <?php echo CHtml::link($data->title,array('view','id'=>$data->id)).'&nbsp('.CHtml::tag('i',array(), "{$data->minYear} - {$data->maxYear}").')'; ?>
</div>
<hr/>
