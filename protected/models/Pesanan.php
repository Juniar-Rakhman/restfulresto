<?php

/**
 * This is the model class for table "pesanan".
 *
 * The followings are the available columns in table 'pesanan':
 * @property integer $id
 * @property integer $nomor_meja
 * @property string $tanggal
 * @property string $nama_pelanggan
 * @property integer $pegawai_id
 * @property double $total_harga
 * @property string $lunas
 *
 * The followings are the available model relations:
 * @property Pegawai $pegawai
 * @property PesananDetail[] $pesananDetails
 * @property Transaksi[] $transaksis
 */
class Pesanan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pesanan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nomor_meja, nama_pelanggan, pegawai_id', 'required'),
			array('nomor_meja, pegawai_id', 'numerical', 'integerOnly'=>true),
			array('total_harga', 'numerical'),
			array('nama_pelanggan', 'length', 'max'=>64),
			array('lunas', 'length', 'max'=>1),
			array('tanggal', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nomor_meja, tanggal, nama_pelanggan, pegawai_id, total_harga, lunas', 'safe', 'on'=>'search'),
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
			'pesananDetails' => array(self::HAS_MANY, 'PesananDetail', 'pesanan_id'),
			'transaksis' => array(self::HAS_MANY, 'Transaksi', 'pesanan_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nomor_meja' => 'Nomor Meja',
			'tanggal' => 'Tanggal',
			'nama_pelanggan' => 'Nama Pelanggan',
			'pegawai_id' => 'Pelayan',
			'total_harga' => 'Total Harga',
			'lunas' => 'Lunas',
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
		$criteria->compare('nomor_meja',$this->nomor_meja);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('nama_pelanggan',$this->nama_pelanggan,true);
		$criteria->compare('pegawai_id',$this->pegawai_id);
		$criteria->compare('total_harga',$this->total_harga);
		$criteria->compare('lunas',$this->lunas,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pesanan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    protected function beforeSave() {
        if (isset($this->id)) {
            $total = Yii::app()->db->createCommand()
                    ->select('sum(harga * jumlah) as total')
                    ->from('pesanan_detail')
                    ->where('pesanan_id = ' . $this->id . ' and batal <> "Y"')
                    ->queryRow();
            if ($total) {
                $this->total_harga = $total['total'];
            }
        }
        return parent::beforeSave();
    }    
}
