<?php

/**
 * This is the model class for table "persona_organizacion".
 *
 * The followings are the available columns in table 'persona_organizacion':
 * @property integer $id
 * @property integer $persona_id
 * @property integer $organizacion_id
 * @property string $cargo
 */
class PersonaOrganizacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'persona_organizacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('persona_id, organizacion_id', 'required'),
			array('persona_id, organizacion_id', 'numerical', 'integerOnly'=>true),
			array('cargo', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, persona_id, organizacion_id, cargo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Persona' => array(self::BELONGS_TO, 'Persona', 'persona_id'),
			'Organizacion' => array(self::BELONGS_TO, 'Organizacion', 'organizacion_id'),
		);
	}

	public function getNombre(){
		return $this->Persona->NombreCompleto;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'persona_id' => 'Persona',
			'organizacion_id' => 'Organizacion',
			'cargo' => 'Cargo',
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
		$criteria->compare('persona_id',$this->persona_id);
		$criteria->compare('organizacion_id',$this->organizacion_id);
		$criteria->compare('cargo',$this->cargo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PersonaOrganizacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
