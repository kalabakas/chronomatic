<?php
class EEuropeanaItem extends CModel
{
    const TYPE_IMAGE = 'IMAGE';

    public $id;

    public $title;

    public $type;

    public $thumb;

    public $year;

    public function rules()
    {
        return array(
            array('id', 'safe', 'on'=>'search'),
        );
    }
    public function attributeNames()
    {
        return array(
            'id',
            'title',
            'type',
            'thumb',
	    'year',
        );
    }
    public function mapAttributes()
    {
        return array(
            'thumb' => 'edmPreview'
        );
    }
}
