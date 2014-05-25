<?php

/**
 * This is the model class for table "transaksi".
 *
 * The followings are the available columns in table 'transaksi':
 * @property integer $id
 * @property string $tanggal
 * @property string $jam
 * @property integer $pesanan_id
 * @property double $harga_pesanan
 * @property double $pajak
 * @property double $harga_total
 * @property integer $pegawai_id
 *
 * The followings are the available model relations:
 * @property Pegawai $pegawai
 * @property Pesanan $pesanan
 */
class Transaksi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transaksi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal, jam, pesanan_id, harga_pesanan, pajak, harga_total, pegawai_id', 'required'),
			array('pesanan_id, pegawai_id', 'numerical', 'integerOnly'=>true),
			array('harga_pesanan, pajak, harga_total', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tanggal, jam, pesanan_id, harga_pesanan, pajak, harga_total, pegawai_id', 'safe', 'on'=>'search'),
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
			'pegawai' => array(self::BELONGS_TO, 'Pegawai', 'pegawai_id'),
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
			'tanggal' => 'Tanggal',
			'jam' => 'Jam',
			'pesanan_id' => 'Pesanan',
			'harga_pesanan' => 'Harga Pesanan',
			'pajak' => 'Pajak',
			'harga_total' => 'Harga Total',
			'pegawai_id' => 'Kasir',
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
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('jam',$this->jam,true);
		$criteria->compare('pesanan_id',$this->pesanan_id);
		$criteria->compare('harga_pesanan',$this->harga_pesanan);
		$criteria->compare('pajak',$this->pajak);
		$criteria->compare('harga_total',$this->harga_total);
		$criteria->compare('pegawai_id',$this->pegawai_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transaksi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function beforeSave() {
		$pesanan = $this->pesanan;
		if($pesanan) {
			if($this->harga_pesanan >= $pesanan->total_harga) {
				$pesanan->lunas = 'Y';
			}else{
				$pesanan->lunas = 'N';
			}
			$pesanan->save(false);
		}
		return parent::beforeSave();
	}
}
