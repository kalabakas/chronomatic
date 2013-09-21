<div class="row">
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $provider,
    'itemView'     => '_item',
));
?>
</div>
