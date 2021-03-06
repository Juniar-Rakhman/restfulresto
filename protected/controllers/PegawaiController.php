<?php

class PegawaiController extends Controller
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
	 * Jika berhasil, pengguna akan diarahkan ke halaman detail.
	 */
	public function actionCreate()
	{
		$model=new Pegawai;

		// Hilangkan komentar berikut jika validasi AJAX diaktifkan
		// $this->performAjaxValidation($model);

		if (isset($_POST['Pegawai'])) {
			$model->attributes=$_POST['Pegawai'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Mengubah model.
	 * Jika berhasil, pengguna akan diarahkan ke halaman detail.
	 * @param integer $id kunci primer dari model yang akan ditampilkan
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Hilangkan komentar berikut jika validasi AJAX diaktifkan
		// $this->performAjaxValidation($model);

		if (isset($_POST['Pegawai'])) {
			$model->attributes=$_POST['Pegawai'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
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
			if($model->pengguna) {
				throw new CHttpException(400,'Pegawai ini tidak dapat dihapus karena telah memiliki pengguna.');
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
		$model=new Pegawai('search');
		$model->unsetAttributes();  // kosongkan semua nilai
		if (isset($_GET['Pegawai'])) {
			$model->attributes=$_GET['Pegawai'];
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
		$model=new Pegawai('search');
		$model->unsetAttributes();  // kosongkan semua nilai
		if (isset($_GET['Pegawai'])) {
			$model->attributes=$_GET['Pegawai'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Kembalikan model berdasarkan kunci utama yang dilewatkan melalui variabel GET.
	 * Jika data model tidak ditemukan, HTTP exception akan dibuat.
	 * @param integer $id kunci primer dari model yang akan dimuat
	 * @return Pegawai model yang dimuat
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pegawai::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'Halaman yang diminta tidak ditemukan.');
		}
		return $model;
	}

	/**
	 * Melakukan validasi AJAX.
	 * @param Pegawai $model model yang divalidasi
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='pegawai-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}