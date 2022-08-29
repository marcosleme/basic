<?php

namespace app\controllers;
use app\models\Logica;
use Yii;

class LogicaController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$model = new Logica;
        return $this->render('index', [
			'model' => $model,
		]);
    }

}
