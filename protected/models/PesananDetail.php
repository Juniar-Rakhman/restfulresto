<?php

/**
 * This is the model class for table "pesanan_detail".
 *
 * The followings are the available columns in table 'pesanan_detail':
 * @property integer $id
 * @property integer $pesanan_id
 * @property integer $menu_id
 * @property double $harga
 * @property integer $jumlah
 * @property integer $status
 * @property string $catatan
 * @property string $batal
 *
 * The followings are the available model relations:
 * @property Menu $menu
 * @property Pesanan $pesanan
 */
class PesananDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pesanan_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pesanan_id, menu_id, harga, jumlah', 'required'),
			array('pesanan_id, menu_id, status, jumlah', 'numerical', 'integerOnly'=>true),
			array('harga', 'numerical'),
			array('batal', 'length', 'max'=>1),
			array('catatan', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pesanan_id, menu_id, harga, status, catatan, batal', 'safe', 'on'=>'search'),
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
			'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
			'pesanan' => array(self::BELONGS_TO, 'Pesanan', 'pesanan_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pesanan_id' => 'Pesanan',
			'menu_id' => 'Menu',
			'harga' => 'Harga',
			'status' => 'Status',
			'catatan' => 'Catatan',
			'batal' => 'Batal',
			'jumlah' => 'Jumlah'
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
		$criteria->compare('pesanan_id',$this->pesanan_id);
		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('harga',$this->harga);
		$criteria->compare('status',$this->status);
		$criteria->compare('catatan',$this->catatan,true);
		$criteria->compare('batal',$this->batal,true);
		$criteria->compare('jumlah',$this->jumlah);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PesananDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getMultiModelForm()
	{
		return array(
		  'elements'=>array(
			'menu_id'=>array(
				'type'=>'dropdownlist',
                'items'=>  CHtml::listData(Menu::model()->findAll(), 'id', 'nama'),
                'prompt'=>'',
			),
			'jumlah'=>array(
				'type'=>'text',
				'maxLength'=>4,
				'style'=>'width:100px',
			),
		  	'status'=>array(
		  		'type'=>'dropdownlist',
                'items'=>array('1'=>'Dipesan','2'=>'Dimasak','3'=>'Siap','4'=>'Disajikan'),
                'prompt'=>'',
		  	),
			'catatan'=>array(
				'type'=>'text',
				'maxLength'=>256,
			),
		  	'batal'=>array(
		  		'type'=>'dropdownlist',
		  		'items'=>array('N'=>'Tidak','Y'=>'Ya'),
                'prompt'=>'',
				'style'=>'width:150px'
		  	),
		));
	} 
    
    protected function beforeValidate() {
        if(isset($this->menu->harga)) {
            $this->harga = $this->menu->harga;
        }
        return parent::beforeValidate();
    }
    
    protected function beforeSave() {
        if($this->status == 0) {
            $this->status = 1;
        }
        if(trim($this->batal)=='') {
            $this->batal = 'N';
        }        
        return parent::beforeValidate();
    }    
    
    public static function getStatusList() {
        return array('1'=>'Dipesan','2'=>'Dimasak','3'=>'Siap','4'=>'Disajikan');
    }
    
    public static function getStatusDesc($status) {
        $tmp = self::getStatusList();
        if(isset($tmp[$status])) {
            return $tmp[$status];
        }else{
            return '';
        }
    }
    
}
