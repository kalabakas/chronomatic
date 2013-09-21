<?php

class SearchController extends Controller
{
    private $_timelineId;

    public function getTimelineId()
    {
        if($this->_timelineId==null) {
            if(!isset($_GET['timeline'])) {
                throw new CHttpException(404, 'Timeline id not set');
            }
            $this->_timelineId = $_GET['timeline'];
        }
        return $this->_timelineId;
    }

	public function actionIndex($timeline)
	{
        $model = new EEuropeanaSearch();

        if(isset($_GET['EEuropeanaSearch'])) {
            $model->attributes = $_GET['EEuropeanaSearch'];
            if (isset($_GET['page'])) {
	        $model->page = $_GET['page'];
            }
	    if ($model->validate()){
            $data = Yii::app()->europeana->search($model);
//error_log(count($data->getData()));
	    }
        }
		$this->render('index', array(
            'model' => $model,
            'data'  => (isset($data)) ? $data : null,
        ));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
