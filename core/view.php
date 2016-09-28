<?php
namespace gallery\core;

class view
{
	public $header_view;

	public function generate($content_view , $template_view, $data = null)
	{

		// $header_view = view::getHeaderView($this->header_view);
		/*if(is_array($data)) {

			// преобразуем элементы массива в переменные

		}*/



			$regFormView = $data[0];
			$image = $data[1];
			$gallery = $content_view;



		/*
		динамически подключаем общий шаблон (вид),
		внутри которого будет встраиваться вид
		для отображения контента конкретной страницы.
		*/
		include __DIR__ . "/../template/$template_view";
	}

}


