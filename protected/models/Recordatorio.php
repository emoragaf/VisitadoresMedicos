<?php

/**
 * This is the model class for table "recordatorio".
 *
 * The followings are the available columns in table 'recordatorio':
 * @property integer $id
 * @property integer $autor_id
 * @property integer $destinatario_id
 * @property string $fecha_creacion
 * @property string $fecha_recordatorio
 * @property string $texto
 * @property integer $leido
 */
class Recordatorio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'recordatorio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('autor_id, destinatario_id, fecha_creacion, fecha_recordatorio, texto', 'required'),
			array('autor_id, destinatario_id, leido', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, autor_id, destinatario_id, fecha_creacion, fecha_recordatorio, texto, leido', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'autor_id' => 'Autor',
			'destinatario_id' => 'Destinatario',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_recordatorio' => 'Fecha Recordatorio',
			'texto' => 'Recordatorio',
			'leido' => 'Leido',
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
		$criteria->compare('autor_id',$this->autor_id);
		$criteria->compare('destinatario_id',$this->destinatario_id);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_recordatorio',$this->fecha_recordatorio,true);
		$criteria->compare('texto',$this->texto,true);
		$criteria->compare('leido',$this->leido);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Recordatorio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
