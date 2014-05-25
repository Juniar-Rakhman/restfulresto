<?php

/**
 * This is the model class for table "pegawai".
 *
 * The followings are the available columns in table 'pegawai':
 * @property integer $id
 * @property string $nomor_induk
 * @property string $tgl_masuk
 * @property string $tgl_keluar
 * @property string $nama
 * @property string $alamat
 * @property string $telepon
 * @property string $aktif
 *
 * The followings are the available model relations:
 * @property Pesanan[] $pesanans
 * @property Transaksi[] $transaksis
 */
class Pegawai extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pegawai';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nomor_induk, tgl_masuk, nama, alamat, telepon', 'required'),
			array('nomor_induk', 'length', 'max'=>8),
			array('nama', 'length', 'max'=>64),
			array('telepon', 'length', 'max'=>16),
			array('aktif', 'length', 'max'=>1),
			array('tgl_keluar', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nomor_induk, tgl_masuk, tgl_keluar, nama, alamat, telepon, aktif', 'safe', 'on'=>'search'),
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
			'pesanans' => array(self::HAS_MANY, 'Pesanan', 'pegawai_id'),
			'transaksis' => array(self::HAS_MANY, 'Transaksi', 'pegawai_id'),
			'pengguna' => array(self::HAS_ONE, 'Pengguna', 'pegawai_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nomor_induk' => 'Nomor Induk',
			'tgl_masuk' => 'Tgl Masuk',
			'tgl_keluar' => 'Tgl Keluar',
			'nama' => 'Nama',
			'alamat' => 'Alamat',
			'telepon' => 'Telepon',
			'aktif' => 'Aktif',
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
		$criteria->compare('nomor_induk',$this->nomor_induk,true);
		$criteria->compare('tgl_masuk',$this->tgl_masuk,true);
		$criteria->compare('tgl_keluar',$this->tgl_keluar,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('telepon',$this->telepon,true);
		$criteria->compare('aktif',$this->aktif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pegawai the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * Ambil semua data pegawai yang tidak memiliki pengguna
	 * @return type
	 */
	public static function getNoLoginList($p1) {
		$criteria = new CDbCriteria;
		$criteria->select = 't.id, t.nama, pengguna.pegawai_id';
		$criteria->join = 'LEFT JOIN pengguna ON pengguna.pegawai_id=t.id';
		$criteria->condition = 'pengguna.pegawai_id is null or pengguna.pegawai_id=:p1';
		$criteria->params = array(':p1'=>$p1);
		$pegawai = Pegawai::model()->findAll($criteria);
		return CHtml::listData($pegawai, 'id', 'nama');
	}
}
