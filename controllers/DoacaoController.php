<?php

namespace app\controllers;
use app\models\Doador;
use Yii;

class DoacaoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
	
    public function actionCreate()
    {
		$model = new Doador();
		
		if ($model->load(Yii::$app->request->post()) && $model->validateDonation() && $model->save()) {
			return $this->render('create', [
				'model' => $model,
			]);
        } else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
    }

}
