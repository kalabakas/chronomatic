<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    /**
    * Render a JSON response with correct Content-type header.
    *
    * This method will also supress all log route output via {@link disableLogOutput}.
    *
    * @param mixed $data the data to render as JSON. Usually an array or object.
    * @param bool $endApplication wether to end the application afterwards. Defaults to false.
    * @param mixed $status an optional HTTP status to send, e.g. '404 Not found'.
    * @param bool $ieFix to alter the content-type for IE due to http://goo.gl/YJ2D2
    */
    public function renderJSON($data,$endApplication=true,$status=null,$ieFix=false)
    {
        if($ieFix && preg_match('/MSIE/i', Yii::app()->request->userAgent)) {
            header('Content-type: text/html; charset=utf-8');
            header('X-Content-Type-Options: nosniff');
        } else {
            header('Content-type: application/json');
        }
        if($status!==null)
            header('HTTP/1.0 '.$status);
            $this->layout = false;
            echo CJSON::encode($data);
            $this->disableLogOutput=true;
            if($endApplication) {
                $this->afterAction($this->action);
                Yii::app()->end();
            }
    }
}
