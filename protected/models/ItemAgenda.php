<?php

/**
 * This is the model class for table "item_agenda".
 *
 * The followings are the available columns in table 'item_agenda':
 * @property integer $id
 * @property integer $agenda_id
 * @property string $hora_inicio
 * @property string $hora_final
 * @property integer $bloque
 * @property integer $all_day
 * @property string $texto
 * @property string $titulo
 */
class ItemAgenda extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item_agenda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('agenda_id', 'required'),
			array('agenda_id, bloque, all_day', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>255),
			array('hora_inicio, hora_final, texto, fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, agenda_id, hora_inicio, hora_final, bloque, all_day, texto, titulo', 'safe', 'on'=>'search'),
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
			'agenda_id' => 'Agenda',
			'hora_inicio' => 'Hora Inicio',
			'hora_final' => 'Hora Final',
			'bloque' => 'Bloque',
			'all_day' => 'All Day',
			'texto' => 'Texto',
			'titulo' => 'Titulo',
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
		$criteria->compare('agenda_id',$this->agenda_id);
		$criteria->compare('hora_inicio',$this->hora_inicio,true);
		$criteria->compare('hora_final',$this->hora_final,true);
		$criteria->compare('bloque',$this->bloque);
		$criteria->compare('all_day',$this->all_day);
		$criteria->compare('texto',$this->texto,true);
		$criteria->compare('titulo',$this->titulo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemAgenda the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
