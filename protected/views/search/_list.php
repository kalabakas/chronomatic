<div class="row" data-hook="search-list">
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $provider,
    'itemView'     => '_item',
));
?>
</div>
<?php
$script = <<<EOF
$('div[data-hook="search-list"]').on('click', 'input[data-hook="add-item"]', function() {
    var frm=$(this).closest('form');
    $.ajax({
        url: frm.attr('action'),
        data: frm.serialize(),
        type: 'POST',
        sucess: function(r) {
            console.log(r);
        }
    });
});
EOF;
Yii::app()->clientScript->registerScript('views.search.index',new CJavaScriptExpression($script), CClientScript::POS_READY);
