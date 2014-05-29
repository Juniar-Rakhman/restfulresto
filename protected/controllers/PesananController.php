<?php

class PesananController extends Controller
{
	/**
	 * @var string tata letak yang digunakan untuk tampilan. Diisi dengan '//layouts/column1',
	 * berarti menggunakan tata letak 1 kolom. Lihat 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
        return array(
            'accessControl', // perform access control for CRUD operations
            array(
                'ext.starship.RestfullYii.filters.ERestFilter +
                REST.GET, REST.PUT, REST.POST, REST.DELETE'
            ),
        );
	}

    public function actions()
    {
        return array(
            'REST.'=>'ext.starship.RestfullYii.actions.ERestActionProvider',
        );
    }

	/**
	 * Menampilkan model.
	 * @param integer $id kunci primer dari model yang akan ditampilkan
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Membuat model.
	 * Jika berhasil, pengguna akan diarahkan ke halaman update untuk menambahkan
     * detail pesanan.
	 */
	public function actionCreate()
	{
		$model=new Pesanan;  
		// Hilangkan komentar berikut jika validasi AJAX diaktifkan
		// $this->performAjaxValidation($model);

		if (isset($_POST['Pesanan'])) {
			$model->attributes=$_POST['Pesanan'];
			if ($model->save()) {
				$this->redirect(array('update','id'=>$model->id));
			}
		}else{
            //set nilai default
            $model->tanggal = date('Y-m-d');
        }

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Mengubah model pesanan dan pesanan detail.
	 * Jika berhasil, pengguna akan diarahkan ke halaman detail.
	 * @param integer $id kunci primer dari model yang akan ditampilkan
	 */
	public function actionUpdate($id)
	{
		Yii::import('ext.multimodelform.MultiModelForm');

		$model=$this->loadModel($id); //model pesanan

		if (($model->lunas == 'Y') && (!Yii::app()->user->isAdmin)) {
			Yii::app()->user->setFlash('error','Pesanan yang sudah lunas tidak dapat diubah!');
			$this->redirect(array('view','id'=>$model->id));
		}

		$pesananDetail = new PesananDetail;
		$validatedMembers = array(); //kosongkan array

		if(isset($_POST['Pesanan']))
		{
            $model->attributes=$_POST['Pesanan'];

			//nilai untuk foreign key 'pesanan_id'
			$masterValues = array ('pesanan_id'=>$model->id);

			if( //Save the master model after saving valid members
				MultiModelForm::save($pesananDetail,$validatedMembers,$deletedMembers,$masterValues) &&
				$model->save()
				)
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
			//submit the member and validatedItems to the widget in the edit form
			'pesananDetail'=>$pesananDetail,
			'validatedMembers' => $validatedMembers,
		));        
	}

	/**
	 * Menghapus model.
	 * Jika berhasil, pengguna akan diarahkan ke halaman kelola.
	 * @param integer $id kunci primer dari model yang akan dihapus
	 */
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$model = $this->loadModel($id);
			if (($model->lunas == 'Y') && (!Yii::app()->user->isAdmin)) {
				throw new CHttpException(400,'Pesanan yang sudah lunas tidak boleh dihapus');
			}else{
				$model->delete();
			}

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Permintaan gagal. Mohon tidak melanjutkan permintaan ini.');
		}
	}

	/**
	 * Menampilkan semua model.
	 */
	public function actionIndex()
	{
		$model=new Pesanan('search');
		$model->unsetAttributes();  // kosongkan semua nilai
		if (isset($_GET['Pesanan'])) {
			$model->attributes=$_GET['Pesanan'];
		}

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Mengelola semua model.
	 */
	public function actionAdmin()
	{
		$model=new Pesanan('search');
		$model->unsetAttributes();  // kosongkan semua nilai
		if (isset($_GET['Pesanan'])) {
			$model->attributes=$_GET['Pesanan'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Kembalikan model berdasarkan kunci utama yang dilewatkan melalui variabel GET.
	 * Jika data model tidak ditemukan, HTTP exception akan dibuat.
	 * @param integer $id kunci primer dari model yang akan dimuat
	 * @return Pesanan model yang dimuat
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pesanan::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'Halaman yang diminta tidak ditemukan.');
		}
		return $model;
	}

	/**
	 * Melakukan validasi AJAX.
	 * @param Pesanan $model model yang divalidasi
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='pesanan-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
   public function actionSalinHarga() {
      $id = $_POST['pesanan_id'];
      $pajak = $_POST['pajak'];
      $data = Pesanan::model()->findByPk($id);
      $total = $data->total_harga + ($pajak * $data->total_harga / 100);
      echo CJSON::encode(array('jumlah' => $data->total_harga, 'total' => $total));
   }
   
   public function actionHitungPajak() {
      $pajak = $_POST['pajak'];
      $harga = $_POST['harga'];
      $total = $harga + ($pajak * $harga / 100);
      echo CJSON::encode(array('jumlah' => $total));      
   }     
}