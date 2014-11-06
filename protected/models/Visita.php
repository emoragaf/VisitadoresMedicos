<?php

/**
 * This is the model class for table "visita".
 *
 * The followings are the available columns in table 'visita':
 * @property integer $id
 * @property integer $organizacion_id
 * @property integer $visitador_id
 * @property integer $visitado_id
 * @property string $fecha_programada
 * @property string $fecha_realizada
 * @property string $notas
 */
class Visita extends CActiveRecord
{
	public $maxFecha = 0;
	public $minFecha = 0;
	public $cantidad = 0;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'visita';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('visitado_id, fecha_programada', 'required'),
			array('organizacion_id, visitador_id, visitado_id', 'numerical', 'integerOnly'=>true),
			array('fecha_realizada, notas, cargo_visitado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, organizacion_id, visitador_id, visitado_id, fecha_programada, fecha_realizada, notas', 'safe', 'on'=>'search'),
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
			'organizacion' => array(self::BELONGS_TO, 'Organizacion', 'organizacion_id'),
			'recordatorio' => array(self::HAS_ONE, 'Recordatorio', 'visita_id'),
			'user' => array(self::BELONGS_TO, 'User', 'visitador_id'),
			'persona' => array(self::BELONGS_TO, 'Persona', 'visitado_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'organizacion_id' => 'Organizacion',
			'visitador_id' => 'Visitador',
			'visitado_id' => 'Visitado',
			'fecha_programada' => 'Fecha Programada',
			'fecha_realizada' => 'Fecha Realizada',
			'notas' => 'Notas',
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
		$criteria->compare('organizacion_id',$this->organizacion_id);
		$criteria->compare('visitador_id',$this->visitador_id);
		$criteria->compare('visitado_id',$this->visitado_id);
		$criteria->compare('fecha_programada',$this->fecha_programada,true);
		$criteria->compare('fecha_realizada',$this->fecha_realizada,true);
		$criteria->compare('notas',$this->notas,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Visita the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
