<?php

class Security
{
    public static function cleanFormFields(array $variable)
    {
        $data = array();
        foreach ($variable as $key => $value) {
            if (is_array($value)){
                $data[$key] = self::cleanFormFields($value);
            }
            else{
                $data[$key] = filter_var(str_replace(',', '&#44;',htmlentities(trim($value))), FILTER_SANITIZE_STRING);
            }
        }
        return $data;
    }
    
    public static function actionUrl($pageName, $params=array())
    {
        $url = "?" . md5("action") . "=" . md5($pageName);
    
        if ($params)
        {
            foreach ($params as $name=>$value){
                $url .= "&" . md5($name) . "=" . $value;
            }
        }
        return $url;
    }
    
    
}