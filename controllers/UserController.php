<?php
//namespace gallery\controllers;
require_once __DIR__ . "/../models/Users.php";
require_once __DIR__ . "/../core/view.php";

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