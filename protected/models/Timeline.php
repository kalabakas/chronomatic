<?php

/**
 * This is the model class for table "timelines".
 *
 * The followings are the available columns in table 'timelines':
 * @property integer $id
 * @property string $user
 * @property string $title
 * @property string $createdAt
 * @property string $updatedAt
 * @property integer $public
 * @property integer $cloneOf
 */
class Timeline extends CActiveRecord
{
    private $_minYear;
    private $_maxYear;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'timelines';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('user', 'required'),
			array('public, cloneOf', 'numerical', 'integerOnly'=>true),
			array('user, title', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
            array('id, user, createAt, updatedAt, public, cloneOf', 'unsafe'),
			array('id, user, title, createdAt, updatedAt, public, cloneOf', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
            'timelineItems'=>array(self::HAS_MANY, 'TimelineItem','timeline'),
            'items'        =>array(self::HAS_MANY, 'Item',array('item'=>'itemId'),'through'=>'timelineItems'),
		);
	}

    public function beforeSave()
    {
        $at = date('Y-m-d H:i:s', time());
        if($this->isNewRecord) {
            $this->createdAt = $this->updatedAt = $at ;
        } else {
            $this->updatedAt = $at;
        }
        return parent::beforeSave();
    }

    /**
     * Add item to this timeline
     **/
    public function add($item)
    {
        $timelineItem = new TimelineItem();
        $timelineItem->timeline = $this->id;
        $timelineItem->item     = ($item instanceof Item) ? $item->itemId : $item;
        return $timelineItem->save();
    }


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user' => 'User',
			'title' => 'Title',
			'createdAt' => 'Created At',
			'updatedAt' => 'Updated At',
			'public' => 'Public',
			'cloneOf' => 'Clone Of',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user',$this->user,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('createdAt',$this->createdAt,true);
		$criteria->compare('updatedAt',$this->updatedAt,true);
		$criteria->compare('public',$this->public);
		$criteria->compare('cloneOf',$this->cloneOf);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Timeline the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function getMaxYear()
    {
        if($this->_maxYear===null) {
            $this->_maxYear=$this->_queryScalarYear('max');
        }
        return $this->_maxYear;
    }
    public function getMinYear()
    {
        if($this->_minYear===null) {
            $this->_minYear=$this->_queryScalarYear('min');
        }
        return $this->_minYear;
    }
    private function _queryScalarYear($type)
    {
        $type=strtoupper($type);
        if(!in_array($type,array('MIN','MAX'))) {
            return null;
        }
        return $this->getDbConnection()->createCommand("SELECT {$type}(year) FROM items i INNER JOIN timeline_items ti ON ti.item=i.itemId WHERE ti.timeline=:timeline")->queryScalar(array(
            ':timeline'=>$this->id
        ));
    }
    public function ofUser($user)
    {
        $this->getDbCriteria()->compare('user',$user);
        return $this;
    }
    public function lastEdited()
    {
        $this->getDbCriteria()->order = 'updatedAt DESC';
        return $this;
    }
}
