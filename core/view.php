<?php
namespace gallery\core;
use gallery\classes;
use gallery\classes\paginator;

class view
{
	public $header_view;

	public function generate($content_view , $template_view, $data)
	{
		$paginator = $data[0];
		$image = $data[1];
		// $header_view = view::getHeaderView($this->header_view);
		/*if(is_array($data)) {

			// преобразуем элементы массива в переменные

		}*/

		$paginator = classes\TransformObj::objectToArrayKeyValue($data[0]);
		var_dump($paginator);
		$image = classes\TransformObj::objectToArrayKeyValue($data[1]);

		$regFormView = 'authentication.php';
		$gallery = $content_view;
		/*
		динамически подключаем общий шаблон (вид),
		внутри которого будет встраиваться вид
		для отображения контента конкретной страницы.
		*/
		include __DIR__ . "/../template/$template_view";
	}
}


