<?php
$this->breadcrumbs=array(
	'Timelines'=>array('index'),
	$model->title,
);
$timeLineId = "timeline-{$model->id}";
$url = $this->createUrl('timeline/view',array('id'=>time(),'json'=>1));
echo CHtml::tag('div', array('id'=>'timeline-embed'),'');//$timeLineId), '');

$script =<<<EOF
var timeline_config = {
    width:  "100%",
    height:   "100%",
    debug:    false,
    source:   '/index.php?r=timeline/test',
    font:   'NewsCycle-Merriweather' 
}
EOF;
echo CHtml::tag('script',array('type'=>'text/javascript'), $script);
echo CHtml::tag('script',array('type'=>'text/javascript', 'src'=>'http://timeline.verite.co/lib/timeline/js/storyjs-embed.js'));
//Yii::app()->clientScript->registerScript('views.timeline.view',$script);
//Yii::app()->clientScript->registerScriptFile('http://timeline.verite.co/lib/timeline/js/storyjs-embed.js');//, CClientScript::POS_END);
/**
$script =<<<EO
createStoryJS({
    type:       'timeline',
    width:      '800',
    height:     '600',
    source:     '$url',
    embed_id:   '$timeLineId'
});
EOF;
