<?php
$this->breadcrumbs=array(
	'Timelines'=>array('index'),
	$model->title,
);
$timeLineId = "timeline-{$model->id}";
$url = $this->createUrl('timeline/view',array('id'=>time(),'json'=>1));
//echo CHtml::tag('div', array('id'=>'timeline-embed'),'');//$timeLineId), '');

//echo CHtml::tag('script',array('type'=>'text/javascript'), $script);
//echo CHtml::tag('script',array('type'=>'text/javascript', 'src'=>'http://timeline.verite.co/lib/timeline/js/storyjs-embed.js'));
?>
<div id="timeline-embed"></div>
    <script type="text/javascript">
        var timeline_config = {
            width:              '100%',
            height:             '600',
            source:             'index.php?r=timeline/test',
            embed_id:           'timeline-embed',               //OPTIONAL USE A DIFFERENT DIV ID FOR EMBED
            start_at_end:       false,                          //OPTIONAL START AT LATEST DATE
            start_at_slide:     '4',                            //OPTIONAL START AT SPECIFIC SLIDE
            start_zoom_adjust:  '3',                            //OPTIONAL TWEAK THE DEFAULT ZOOM LEVEL
            hash_bookmark:      true,                           //OPTIONAL LOCATION BAR HASHES
            font:               'Bevan-PotanoSans',             //OPTIONAL FONT
            debug:              true,                           //OPTIONAL DEBUG TO CONSOLE
            lang:               'fr',                           //OPTIONAL LANGUAGE
            maptype:            'watercolor',                   //OPTIONAL MAP STYLE
            css:                'css/timeline.css',     //OPTIONAL PATH TO CSS
            js:                 'js/timeline-min.js'    //OPTIONAL PATH TO JS
        }
    </script>
    <script type="text/javascript" src="js/storyjs-embed.js"></script>
