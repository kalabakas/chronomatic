<?php
class EEuropeanaSearch extends CFormModel
{
    public $term;

    public $type;

    public $from = 0;
    public $to   = 2014;

    public function rules()
    {
        return array(
            array('term', 'required')
        );
    }
}
