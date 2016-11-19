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
		$paginator = classes\TransformObj::objectToArrayKeyValue($data[0]);
		$image = classes\TransformObj::objectToArrayKeyValue($data[1]);

		$regFormView = 'authentication.php';
		$gallery = $content_view;
		include __DIR__ . "/../template/$template_view";
	}
}


