<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {actionurl} function plugin
 * Type:     function<br>
 * Name:     actionurl<br>
 * Date:     May 21, 2002
 * Purpose:  Create a hashed url.<br>
 * Params:
 * <pre>
 * - page   - (required) - action page
 * - params - (optional) - url parameters
 *
 * @return string
 */
function smarty_function_actionurl($params)
{
    $url = "?" . md5("action") . "=" . md5($params['page']);
    
    if (isset($params['params']))
    {
        foreach ($params['params'] as $name=>$value){
            $url .= "&" . md5($name) . "=" . $value;
        }
    }
    return $url;
}
