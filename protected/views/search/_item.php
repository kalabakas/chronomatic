<div class="span3 search-item">
    <?php
    if(($img=$data->thumb)!==null) {
        echo CHtml::image($img, $data->title, array('class'=>'img-rounded search-item-thumb'));
    }
    ?>
<?php //CVarDumper::dump($data,10,1); ?>
</div>
