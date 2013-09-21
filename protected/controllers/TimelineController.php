<?php

class TimelineController extends Controller
{
    /**
     * @param Timeline
     **/
    private $_timeline;

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete', 'add','test'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    /**
     * @param integer $id of the timeline
     **/
    public function actionAdd($id,$eid)
    {
        $added = false;
        if(($item=Item::model()->findByEuropeanaId($eid))!==null) {
            $added = $this->timeline->add($item->itemId);
        } else if(isset($_POST['Item'])) {
            $item = new Item();
            $item->attributes = $_POST['Item'];
            if($item->save()) {
                $added = $this->timeline->add($item->itemId);
            }
        }
        $this->renderJSON(array('added'=>$added));
    }
    //VALIDATE
    public function actionRemove($id,$eid)
    {
        $rows = 0;
        if(($item=Item::model()->findByEuropeanaId($eid))!==null) {
            $rows = TimelineItem::model()->deleteByPk(array(
                'timeline' => $this->timeline->id,
                'item'     => $this->itemId,
            ));
        }
        $this->renderJSON(array('removed'=>($rows>0)));
    }

    public function getTimeline()
    {
        if($this->_timeline===null) {
            if(!isset($_GET['id'])) {
                throw CHttpException(404,'timeline id not set');
            }
            $this->_timeline = Timeline::model()->findByPk((int)$_GET['id']);
        }
        return $this->_timeline;
    }
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id,$json=null)
	{
        if($json==null) {
            $this->render('view',array(
                'model'=>$this->loadModel($id),
            ));
        } else {
            //$this->renderTimelineJSON();//$this->loadModel($id));
        }
	}
    public function actionTest()//$timeline)
    {
        header('Content-type: application/json');
        //echo file_get_contents('http://timeline.verite.co/lib/timeline/data.json');
        $this->renderJSON(array(
            'timeline' => (object)array(
                'headline' =>'dafuq',// $timeline->title,
                'type'     => 'default',
                'text'     => '<scsdz',
                'startDate'=> '2000',
                //'endDate'  => '2013',
                'asset'    =>  array(
                    'media'=> 'http://2.bp.blogspot.com/-dxJbW0CG8Zs/TmkoMA5-cPI/AAAAAAAAAqw/fQpsz9GpFdo/s1600/voyage-dans-la-lune-1902-02-g.jpg',
                    'credit'=> 'foo',
                    'caption'=> 'foo'
                ),
                'date'=> array(
                    array(
                        'startDate'=>'2001',
                        //'endDate'  =>'2012',
                        'headline' => 'test',
                        'text'     => 'text',
                        'asset'    => array(
                            'media' => "http://en.wikipedia.org/wiki/A_Trip_to_the_Moon",
                            'credit' => "",
                            'caption' => ""
                        )
                    ),
                    array(
                        'startDate'=>'2002',
                        //'endDate'  =>'2012',
                        'headline' => 'test',
                        'text'     => 'text',
                        'asset'    => array(
                            'media' => "http://en.wikipedia.org/wiki/A_Trip_to_the_Moon",
                            'credit' => "",
                            'caption' => ""
                        )
                    ),
                    array(
                        'startDate'=>'2003',
                        //'endDate'  =>'2012',
                        'headline' => 'test',
                        'text'     => 'text',
                        'asset'    => array(
                           'media' => "http://en.wikipedia.org/wiki/A_Trip_to_the_Moon",
                            'credit' => "",
                            'caption' => ""
                        )
                    ),
                    array(
                        'startDate'=>'2004',
                        //'endDate'  =>'2012',
                        'headline' => 'test',
                        'text'     => 'text',
                        'asset'    => array(
                            'media' => "http://en.wikipedia.org/wiki/A_Trip_to_the_Moon",
                            'credit' => "",
                            'caption' => ""
                        )
                    ),
                    array(
                        'startDate'=>'2005',
                        //'endDate'  =>'2012',
                        'headline' => 'test',
                        'text'     => 'text',
                        'asset'    => array(
                            'media' => "http://en.wikipedia.org/wiki/A_Trip_to_the_Moon",
                            'credit' => "",
                            'caption' => ""
                        )
                    ),
                    array(
                        'startDate'=>'2006',
                        //'endDate'  =>'2012',
                        'headline' => 'test',
                        'text'     => 'text',
                        'asset'    => array(
                           'media' => "http://en.wikipedia.org/wiki/A_Trip_to_the_Moon",
                            'credit' => "",
                            'caption' => ""
                        )
                    ),
                ),
            ),
        ),true,200);
    }
/**"era": [
{
"startDate":"2011,12,10",
"endDate":"2011,12,11",
"headline":"Headline Goes Here",
"tag":"This is Optional"
}

],
"chart": [
{
"startDate":"2011,12,10",
"endDate":"2011,12,11",
"headline":"Headline Goes Here",
"value":"28"
}

]**/

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Timeline;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Timeline']))
		{
			$model->attributes=$_POST['Timeline'];
            $model->user = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('search/index','timeline'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Timeline']))
		{
			$model->attributes=$_POST['Timeline'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Timeline');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Timeline('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Timeline']))
			$model->attributes=$_GET['Timeline'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Timeline::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='timeline-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
