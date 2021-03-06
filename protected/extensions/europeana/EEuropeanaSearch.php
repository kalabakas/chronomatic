<?php
class EEuropeanaSearch extends CFormModel
{
    private $onlyWithThumbs = true;
    private $rows = 10;

    public $page; //not initial value, only if is set then ask for the correct page

    public $term;

    public $provider; //Europeana, Natural Europe

    public $type; //Place, Creator

    public $from = 0;
    public $to   = 2014;
    
    public $imageOnly=false;

    public $typeElements = array('*'=>'General', 'where'=>'Place', 'who'=>'Creator');
    
    public $providerElements = array('europeana'=>'Europeana','nature'=>'Natural Europe');

    public function rules()
    {
        return array(
            array('term', 'required'),
            array('type', 'in', 'range'=>array_keys($this->typeElements)),
            array('provider', 'in', 'range'=>array_keys($this->providerElements)),
            array('from, to', 'numerical', 'integerOnly' => true),
	    array('imageOnly', 'boolean')
        );
    }
    public function __toString() {
	$subject = ($this->type == '*') ? '' : $this->type.':' ;
 	$query = 'query='.$subject.$this->term;
	$yearRange = 'qf=YEAR:['.$this->from.' TO '.$this->to.']';

	$params = ''.$query.'&'.$yearRange;
	if ($this->imageOnly){ 
	    $params .= '&TYPE:IMAGE';
    	}
	
	if ($this->onlyWithThumbs) {
	    $params .= '&edmPreview:*';
	}

	$start = (isset($this->page)) ? '&start='.(($this->rows*$this->page)-$this->rows) : '';
	$pagination = $start.'&rows='.$this->rows;
	$params .= $pagination;
	error_log($params);
	return $params;
    }
}
