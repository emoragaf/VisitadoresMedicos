<?php

/**
 * This is the model class for table "persona".
 *
 * The followings are the available columns in table 'persona':
 * @property integer $id
 * @property string $nombre
 * @property string $apellido_p
 * @property string $apellido_m
 * @property string $fecha_nacimiento
 * @property string $cargo
 * @property string $profesion
 * @property string $telefono1
 * @property string $telefono2
 * @property string $telefono3
 * @property string $email
 * @property string $twitter
 * @property string $facebook
 * @property integer $hijos
 * @property string $estado
 * @property integer $situacion_familiar_id
 * @property integer $categoria_persona_id
 */
class Persona extends CActiveRecord
{
	public $organizacion;
	public $org_cargo;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'persona';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apellido_p', 'required'),
			array('hijos, situacion_familiar_id, categoria_persona_id', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido_p, apellido_m', 'length', 'max'=>45),
			array('cargo, profesion, telefono1, telefono2, telefono3, email, twitter, facebook, estado', 'length', 'max'=>255),
			array('fecha_nacimiento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, apellido_p, apellido_m, fecha_nacimiento, cargo, profesion, telefono1, telefono2, telefono3, email, twitter, facebook, hijos, estado, situacion_familiar_id, categoria_persona_id', 'safe', 'on'=>'search'),
		);
	}
	public function getOrga(){
		if($this->pOrganizacion){
			return $this->pOrganizacion->organizacion_id;
		}
		else
			return null;
	}
	public function setOrg($value){
		$this->organizacion = $value;
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'pOrganizacion'=>array(self::HAS_ONE,'PersonaOrganizacion','persona_id'),
		);
	}

	public function getNombreCompleto(){
		return $this->nombre.' '.$this->apellido_p;
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'apellido_p' => 'Apellido Paterno',
			'apellido_m' => 'Apellido Materno',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'cargo' => 'Cargo',
			'profesion' => 'Profesión',
			'telefono1' => 'Telefono 1',
			'telefono2' => 'Telefono 2',
			'telefono3' => 'Telefono 3',
			'email' => 'Email',
			'twitter' => 'Twitter',
			'facebook' => 'Facebook',
			'hijos' => 'Hijos',
			'estado' => 'Estado',
			'situacion_familiar_id' => 'Situacion Familiar',
			'categoria_persona_id' => 'Categoria Contacto',
			'organizacion'=>'Institución',
			'org_cargo'=>'Cargo',
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
		$criteria->with = array('pOrganizacion'=>array('select'=>'pOrganizacion.organizacion_id'));
		$criteria->together= true;
		$criteria->compare('pOrganizacion.organizacion',$this->organizacion,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido_p',$this->apellido_p,true);
		$criteria->compare('apellido_m',$this->apellido_m,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('cargo',$this->cargo,true);
		$criteria->compare('profesion',$this->profesion,true);
		$criteria->compare('telefono1',$this->telefono1,true);
		$criteria->compare('telefono2',$this->telefono2,true);
		$criteria->compare('telefono3',$this->telefono3,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('twitter',$this->twitter,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('hijos',$this->hijos);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('situacion_familiar_id',$this->situacion_familiar_id);
		$criteria->compare('categoria_persona_id',$this->categoria_persona_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Persona the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
