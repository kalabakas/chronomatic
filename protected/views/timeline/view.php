<?php
$this->breadcrumbs=array(
	'Timelines'=>array('index'),
	$model->title,
);
$timeLineId = "timeline-{$model->id}";
echo CHtml::tag('div', array('id'=>$timeLineId), '');
Yii::app()->clientScript->registerScriptFile('https://raw.github.com/NUKnightLab/TimelineJS/master/build/js/storyjs-embed.js', CClientScript::POS_HEAD);
$script =<<<EOF
var timeline = {
"timeline":
{
"headline":"The Main Timeline Headline Goes here",
"type":"default",
"text":"<p>Intro body text goes here, some HTML is ok</p>",
"asset": {
"media":"http://twitter.com/ArjunaSoriano/status/164181156147900416",
"credit":"Credit Name Goes Here",
"caption":"Caption text goes here"
},
"date": [
{
"startDate":"2011,12,10",
"endDate":"2011,12,11",
"headline":"Headline Goes Here",
"text":"<p>Body text goes here, some HTML is OK</p>",
"tag":"This is Optional",
"classname":"optionaluniqueclassnamecanbeaddedhere",
"asset": {
"media":"http://twitter.com/ArjunaSoriano/status/164181156147900416",
"thumbnail":"optional-32x32px.jpg",
"credit":"Credit Name Goes Here",
"caption":"Caption text goes here"
}
}
],
"era": [
{
"startDate":"2011,12,10",
"endDate":"2011,12,11",
"headline":"Headline Goes Here",
"text":"<p>Body text goes here, some HTML is OK</p>",
"tag":"This is Optional"
}

]
}
};
createStoryJS({
    type:       'timeline',
    width:      '800',
    height:     '600',
    source:     timeline,
    embed_id:   '$timeLineId'
});
EOF;
Yii::app()->clientScript->registerScript('views.timeline.view',$script, CClientScript::POS_READY);
