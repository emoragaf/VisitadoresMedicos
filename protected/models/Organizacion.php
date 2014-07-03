<?php

/**
 * This is the model class for table "organizacion".
 *
 * The followings are the available columns in table 'organizacion':
 * @property integer $id
 * @property string $nombre
 * @property string $direccion
 * @property integer $comuna
 * @property string $email
 * @property string $descripcion
 * @property string $created_at
 * @property string $updated_at
 * @property integer $categoria_id
 * @property integer $modo_compra_id
 * @property integer $tipo_financiamiento_id
 */
class Organizacion extends CActiveRecord
{

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'organizacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, direccion', 'required'),
			array('categoria_id, modo_compra_id, tipo_financiamiento_id, cantidad_camas', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>40),
			array('direccion', 'length', 'max'=>255),
			array('email, comuna', 'length', 'max'=>128),
			array('email', 'email'),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, direccion, comuna, email, descripcion, created_at, updated_at, categoria_id, modo_compra_id, tipo_financiamiento_id', 'safe', 'on'=>'search'),
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
			'categoria' => array(self::BELONGS_TO, 'CategoriaOrganizacion', 'categoria_id'),
			'visitas' => array(self::HAS_MANY, 'Visita', 'organizacion_id'),
			'modoCompra' => array(self::BELONGS_TO, 'ModoCompra', 'modo_compra_id'),
			'tipoFinanciamiento' => array(self::BELONGS_TO, 'TipoFinanciamiento', 'tipo_financiamiento_id'),

		);
	}

	public function getFrecuencia(){
		$criteria = new CDbCriteria();
		$criteria->condition = 'organizacion_id = :id';
		$criteria->params = array(':id'=>$this->id);
		$criteria->select='count(*) AS cantidad, max(fecha_programada) AS maxFecha, min(fecha_programada) AS minFecha';
		$datos = Visita::model()->find($criteria);
		$cantidad = $datos['cantidad'];
		$maxFecha = date('Y-m-d');
		$minFecha = $datos['minFecha'];
		$datetime1 = date_create($minFecha);
	    $datetime2 = date_create($maxFecha);
	    
	    $interval = date_diff($datetime1, $datetime2);
	    $semanas = ceil($interval->format('%a')/7);

		if($cantidad == 0 || $semanas == 0)
			return 0;
		return round($cantidad/$semanas,2);
	}

	public function ColorFrecuencia(){
		$categoria = $this->categoria;
		if($this->getFrecuencia() >= $categoria->valor_frecuencia_ok)
			return 'success';	
		if($this->getFrecuencia() < $categoria->valor_frecuencia_ok && $this->getFrecuencia() >= $categoria->valor_frecuencia_warning)
			return 'warning';
		if($this->getFrecuencia() < $categoria->valor_frecuencia_warning)
			return 'error';
	}

	public function ColorUltimaVisita(){
		$categoria = $this->categoria;
		if($this->getUltimaVisita(false,true) <= $categoria->valor_ultima_visita_ok)
			return 'success';	
		if($this->getUltimaVisita(false,true) > $categoria->valor_ultima_visita_ok && $this->getUltimaVisita(false,true) <= $categoria->valor_ultima_visita_warning)
			return 'warning';
		if($this->getUltimaVisita(false,true) > $categoria->valor_ultima_visita_warning)
			return 'error';
	}

	public function getUltimaVisita($date = false, $numbers = false){
		$criteria = new CDbCriteria();
		$criteria->condition = 'organizacion_id = :id';
		$criteria->order = 'fecha_programada Desc';
		$criteria->params = array(':id'=>$this->id);
		$datos = Visita::model()->find($criteria);
		if(!$datos){
			return 'Nunca';
		}
		$fecha_visita= $datos['fecha_programada'];
		$datetime1 = date_create($fecha_visita);
	    $datetime2 = date_create(date('Y-m-d'));
	    $interval = date_diff($datetime1, $datetime2);
	    if ($date) {
	    	return $fecha_visita;
	    }
	    if ($numbers) {
	    	return $interval->format('%a');
	    }
	    switch ($interval->format('%a')) {
	    	case '0':
	    		return 'Hoy';
	    		break;
	    	case '1':
	    		return 'Ayer';
	    		break;
	    	default:
	    		return 'Hace '.$interval->format('%a').' días';
	    		break;
	    }
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'direccion' => 'Direccion',
			'comuna' => 'Comuna',
			'email' => 'Email',
			'descripcion' => 'Descripcion',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'categoria_id' => 'Categoria',
			'modo_compra_id' => 'Modo Compra',
			'tipo_financiamiento_id' => 'Tipo Financiamiento',
			'cantidad_camas' => 'Cantidad de Camas',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('comuna',$this->comuna);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('categoria_id',$this->categoria_id);
		$criteria->compare('modo_compra_id',$this->modo_compra_id);
		$criteria->compare('tipo_financiamiento_id',$this->tipo_financiamiento_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Organizacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
