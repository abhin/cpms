<?php
require_once (PHP_LIB_FOLDER_PATH . "smarty/Smarty.class.php");

class TemplateEngine extends Smarty
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplateDir(VIEW_FOLDER_PATH);
		$this->setCompileDir(VIEW_COMPILER_FOLDER_PATH);
		$this->setCacheDir(VIEW_CACHE_FOLDER_PATH);
                $this->addPluginsDir(PLUGIN_FOLDER_PATH);
	} 
	
	//---------------------------------------------------------------------------------------------
	public function setTemplatePage($p_templatePage)
	{
		global $templatePage;
		
		$templatePage = $templatePage;
	}
	
	//---------------------------------------------------------------------------------------------
}