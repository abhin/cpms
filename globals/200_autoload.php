<?php

function classLoader($p_className)
{
	$filePath = CLASS_FOLDER_PATH . "class." . $p_className . ".php";
	if (file_exists($filePath))
	{
		require_once ($filePath);
	}
}

spl_autoload_register('classLoader');