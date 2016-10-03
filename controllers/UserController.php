<?php
namespace gallery\controllers;
use gallery\models\users;


class UserController
{
	public function actionAuth()
	{
		return users::getAuth();
	}

	public function actionReg()
	{
		return users::getReg();
	}
}