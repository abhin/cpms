<?php

class Debug
{
	public static function varDump($p_value, $message='')
	{
		echo ('<div style="color:red; line-height:2; border:1px dashed red; width:auto; padding:20px; margin:10px;"><pre><tt>');
		echo ('Dump Result : ' . $message . '<br/>');
		var_dump($p_value);
		echo ('</tt></pre></div>');
	}

	public static function printR($p_value, $message='')
	{
		echo ('<div style="color:red; line-height:2; border:1px dashed red; width:auto:25%; padding:20px; margin:10px;"><pre><tt>');
		echo ('Print Result : ' . $message . '<br/>');
		print_r($p_value);
		echo ('</tt></pre></div>');
	}
    
	public static function printERROR($p_value, $message='')
	{
		echo ('<div style="color:red; line-height:2; border:1px dashed red; width:auto:25%; padding:20px; margin:10px;"><pre><tt>');
		echo ('ERROR Desc : ' . $message . '<br/>');
		print_r($p_value);
		echo ('</tt></pre></div>');
	}
}