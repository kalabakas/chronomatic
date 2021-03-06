<?php
$this->breadcrumbs=array(
	'Timelines'=>array('index'),
	$model->title,
);
?>
<div id="timeline-embed"></div>
<script type="text/javascript">
    var timeline_config = {
        width:              '100%',
        height:             '600',
        source:             '<?php echo $this->createUrl('timeline/view',array('id'=>$model->id,'json'=>1,'killcache'=>time())); ?>',
        embed_id:           'timeline-embed',               //OPTIONAL USE A DIFFERENT DIV ID FOR EMBED
        start_at_end:       false,                          //OPTIONAL START AT LATEST DATE
        //start_at_slide:     '0',                            //OPTIONAL START AT SPECIFIC SLIDE
        start_zoom_adjust:  '3',                            //OPTIONAL TWEAK THE DEFAULT ZOOM LEVEL
        hash_bookmark:      true,                           //OPTIONAL LOCATION BAR HASHES
        font:               'Bevan-PotanoSans',             //OPTIONAL FONT
        debug:              true,                           //OPTIONAL DEBUG TO CONSOLE
        lang:               'en',                           //OPTIONAL LANGUAGE
        maptype:            'watercolor',                   //OPTIONAL MAP STYLE
        css:                'css/timeline.css',     //OPTIONAL PATH TO CSS
        js:                 'js/timeline.js'    //OPTIONAL PATH TO JS
    }
</script>
<script type="text/javascript" src="js/storyjs-embed.js"></script>
