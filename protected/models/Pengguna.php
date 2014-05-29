<?php

/**
 * This is the model class for table "pengguna".
 *
 * The followings are the available columns in table 'pengguna':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $saltPassword
 * @property string $email
 * @property string $tgl_daftar
 * @property integer $level_id
 * @property integer $pegawai_id
 */
class Pengguna extends CActiveRecord
{
    public $password2; 
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pengguna';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email, pegawai_id', 'required'),
			array('level_id, pegawai_id', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>20),
			array('password, password2','required','on'=>'register'),
            array('password', 'compare', 'compareAttribute'=>'password2', 'on'=>'register'),
			array('password, saltPassword, email', 'length', 'max'=>50),
            
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, email, tgl_daftar, level_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
            'password2' => 'Ulangi Password',
			'saltPassword' => 'Salt Password',
			'email' => 'Email',
			'tgl_daftar' => 'Tgl Daftar',
			'level_id' => 'Hak Akses',
			'pegawai_id' => 'Pegawai'
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
		$criteria->with = 'pegawai';

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('tgl_daftar',$this->tgl_daftar,true);
		$criteria->compare('level_id',$this->level_id);
		$criteria->compare('pegawai.nama',$this->pegawai_id, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pengguna the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function validatePassword($password) { 
        return $this->hashPassword($password,$this->saltPassword)===$this->password; 
        
    } 
    
    public function hashPassword($password,$salt) { 
        return md5($salt.$password); 
    } 
    
    public function generateSalt() { 
        return uniqid('',true); 
    }
    
    public static function getLevelList() {
        return array(
            1=>'Kasir',
            2=>'Dapur',
            3=>'Pelayan',
            9=>'Administor'
        );
    }

	public static function getLevelDesc($level_id) {
        $level = self::getLevelList();
        return $level[$level_id];
    }
    
}
