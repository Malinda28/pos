<?php

/**
 * This is the model class for table "bot".
 *
 * The followings are the available columns in table 'bot':
 * @property integer $bot_id
 * @property integer $table_no
 * @property integer $room_no
 * @property integer $steward_id
 * @property string $date_time
 */
class Bot extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bot';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' steward_id', 'required'),
			array('bot_id, table_no, room_no, steward_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('bot_id, table_no, room_no, steward_id, date_time', 'safe', 'on'=>'search'),
			array('table_no, room_no', 'sp_required'), 
		);
	}

	public function sp_required($attribute_name, $params)
	{
    if((empty($this->table_no) or $this->table_no<0) && (empty($this->room_no) or $this->room_no<0)) 
	{
		
        $this->addError($attribute_name, Yii::t('user', 'At least 1 of the field must be filled up properly'));

        return false;
		
    }

    return true;
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'bot_id' => 'Bot',
			'table_no' => 'Table No',
			'room_no' => 'Room No',
			'steward_id' => 'Steward',
			'date_time' => 'Date Time',
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

		$criteria->compare('bot_id',$this->bot_id);
		$criteria->compare('table_no',$this->table_no);
		$criteria->compare('room_no',$this->room_no);
		$criteria->compare('steward_id',$this->steward_id);
		$criteria->compare('date_time',$this->date_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Bot the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
