<?php

class SearchController extends Controller
{
	public function actionIndex()
	{
        $model = new EEuropeanaSearch();

        if(isset($_POST['EEuropeanaSearch'])) {
            $model->attributes = $_POST['EEuropeanaSearch'];
	    if ($model->validate()){
            $data = Yii::app()->europeana->search($model);
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
