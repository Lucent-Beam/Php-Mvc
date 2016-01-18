<?php

class Home extends Controller
{

	public function index($name = '', $otherName = '')
	{
		echo $name. " ". $otherName;

	}

	public function test()
	{
		echo "test";
		
	}
}

?>