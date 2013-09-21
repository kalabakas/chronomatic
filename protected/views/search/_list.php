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
    var btn=$(this),
        frm=$(this).closest('form');

    $.ajax({
        url: frm.attr('action'),
        data: frm.serialize(),
        type: 'POST',
        success: function(r) {
            if(r.added) {
                btn.val('Remove').removeClass('btn-primary').addClass('btn-warning');
                btn.attr('data-hook','remove-item');
                frm.attr('action', r.action);
            }
        }
    });
}).on('click', 'input[data-hook="remove-item"]', function() {
    var btn=$(this),
        frm=$(this).closest('form');

    $.ajax({
        url: frm.attr('action'),
        type: 'POST',
        success: function(r) {
            if(r.removed) {
                btn.val('Add').addClass('btn-primary').removeClass('btn-warning');
                btn.attr('data-hook','add-item');
                frm.attr('action', r.action);
            }
        }
    });
});
EOF;
Yii::app()->clientScript->registerScript('views.search.index',new CJavaScriptExpression($script), CClientScript::POS_READY);
