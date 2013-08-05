<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		if (Yii::app()->user->checkAccess('3'))
		$this->render('index');
		if (Yii::app()->user->checkAccess('2'))
		$this->render('indexintsup');
		if (Yii::app()->user->checkAccess('1'))
		$this->render('indexprof');
		if (Yii::app()->user->checkAccess('0'))
		$this->render('indexstudent');
	}
}