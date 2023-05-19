<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-12-06 16:51:33
         compiled from "D:/xampp/htdocs/products/cpms/view/measuringunits.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1116756641a3dbe6a29-66493710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d5ef0550411549371ebc69e3a4cbb46c9285e96' => 
    array (
      0 => 'D:/xampp/htdocs/products/cpms/view/measuringunits.tpl',
      1 => 1449398392,
      2 => 'file',
    ),
    'a40cd3c80d8b2dea0e329420ab688f2002072872' => 
    array (
      0 => 'D:/xampp/htdocs/products/cpms/view/parent.tpl',
      1 => 1449393343,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1116756641a3dbe6a29-66493710',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'a_TemplateData' => 0,
    'errors' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56641a3e09d0b7_10360410',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56641a3e09d0b7_10360410')) {function content_56641a3e09d0b7_10360410($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'D:\\xampp\\htdocs\\products\\CPMS\\model\\lib\\smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_capitalize')) include 'D:\\xampp\\htdocs\\products\\CPMS\\model\\lib\\smarty/plugins/modifier.capitalize.php';
if (!is_callable('smarty_function_actionurl')) include 'D:/xampp/htdocs/products/cpms/client_users/buildea/../../plugin/function.actionurl.php';
?><?php $_smarty_tpl->tpl_vars['ajaxFilePath'] = new Smarty_variable(smarty_modifier_replace(basename($_smarty_tpl->source->filepath),'.tpl','-ajax'), null, 0);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3c.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black" /> 
    <meta name="robots" content="noindex, nofollow,  noarchive">
    <meta id="extViewportMeta" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="imges/favicon.ico">
    <title><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['PRODUCT_NAME'];?>
 :: Measuring Units-<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['a_TemplateData']->value['clientName'],true);?>
</title>
    <link id="bs-css" href="../../css/jquery-ui.css" rel="stylesheet">


        <link id="bs-css" href="../../css/bootstrap.min.css" rel="stylesheet">
        <link id="bs-css" href="../../css/bootstrap-theme.min.css" rel="stylesheet">
        <link id="bs-css" href="../../css/jquery.dataTables.css" rel="stylesheet">
    

        <link href='../../js/chosen/chosen.min.css' rel='stylesheet'>
        <link href="../../css/main1.css" rel="stylesheet">

        <link href='../../css/tbs.css' rel='stylesheet'>
        <link href="../../css/main.css" rel="stylesheet">
    
    
    
    
    <?php echo '<script'; ?>
 src="../../js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../../js/jquery-ui.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../../js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../../js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
    

        <?php echo '<script'; ?>
 src="../../js/jquery.form-validator.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="../../js/jquery.autogrow-textarea.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="../../js/chosen/chosen.jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="../../js/TableSorter.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="../../js/main.js"><?php echo '</script'; ?>
>
    
    
    
</head>
<body>
    
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-inner">
            
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <a class="navbar-brand" href="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['HOME_PAGE']),$_smarty_tpl);?>
"> 
                
                <span style="color:#177EE5"><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['PRODUCT_NAME'];?>
-<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['a_TemplateData']->value['clientName'],true);?>
</span>
            </a>
            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" id="profileButton">
                     Hi!&nbsp;
                    <i class="glyphicon glyphicon-user"></i>
                    <span class="hidden-sm hidden-xs">
                       <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['SESSION']['userDisplayName'];?>
&nbsp;(<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['SESSION']['userTypeName'];?>
)
                    </span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="profileMenu">
                    <li><a href="<?php echo smarty_function_actionurl(array('page'=>'users'),$_smarty_tpl);?>
">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo smarty_function_actionurl(array('page'=>'logout'),$_smarty_tpl);?>
">Logout</a></li>
                </ul>
            </div>
        
        </div>
    </div>
    
        <noscript>
            <div class="alert alert-danger" style="text-align: center;">
                <button data-dismiss="alert" class="close" type="button">×</button>
                <h4 class="alert-heading">Warning!</h4>
                <p>
                    You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.
                </p>
            </div>
        </noscript>
    <div class="ch-container">
        <div class="row">
            
            <!-- left menu starts -->
            <div class="col-sm-2 col-lg-2" >
                <div class="sidebar-nav">
                    <div class="nav-canvas">
                        <div class="nav-sm nav nav-stacked">
                        </div>
                        <ul class="nav nav-pills nav-stacked main-menu">

                            <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['HOME_PAGE']=="home") {?>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'home'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-home"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            <?php }?>
                        </ul>
                        <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['SESSION']['userType']==1) {?>
                            <ul class="nav nav-pills nav-stacked main-menu">
                                <li class="nav-header">Super Admin Menu</li>
                                <li>
                                    <a href="<?php echo smarty_function_actionurl(array('page'=>'users'),$_smarty_tpl);?>
">
                                        <i class="glyphicon glyphicon-user"></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                                <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'paymentterms'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Payment Terms</span>
                                </a>
                            </li>
                            </ul>
                        <?php }?>
                        
                        <ul class="nav nav-pills nav-stacked main-menu">
                            <li class="nav-header">Project Mangement</li>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'projects'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Projects</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'advances'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-calendar"></i>
                                    <span>Advances</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'stages'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-signal"></i>
                                    <span>Project Stages</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'expenses'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-globe"></i>
                                    <span>Project Expenses</span>
                                </a>
                            </li>
                        </ul>
                        
                        
                        <ul class="nav nav-pills nav-stacked main-menu">
                            <li class="nav-header  accordion">Admin Settings</li>
                            
                            
                            
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'measuringunits'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Measuring Units</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'products'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Products/ Expenses</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'taxes'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Taxes</span>
                                </a>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
            
            <div id="content" class="col-lg-10 col-sm-10">
            <!--/span-->
            
            <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['errorMessage']) {?>
                <div class="alert alert-danger" style="text-align: center;">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <h4 class="alert-heading">Warning!</h4>
                    <p>
                        <?php  $_smarty_tpl->tpl_vars['errors'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['errors']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['errorMessage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['errors']->key => $_smarty_tpl->tpl_vars['errors']->value) {
$_smarty_tpl->tpl_vars['errors']->_loop = true;
?>
                            * <?php echo $_smarty_tpl->tpl_vars['errors']->value;?>
<br/>
                        <?php } ?>
                    </p>
                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['a_TemplateData']->value['message']&&isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['message']['error'])) {?>
                <div class="alert alert-danger" style="text-align: center;">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <h4 class="alert-heading">Error!! <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['message']['error'];?>
</h4>
                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['a_TemplateData']->value['message']&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['message']['success']) {?>
                <div class="alert alert-success" style="text-align: center;">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <h4 class="alert-heading"><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['message']['success'];?>
</h4>
                </div>
            <?php }?>
            </div>
            <!-- left menu ends -->
            <div id="content" class="col-lg-10 col-sm-10">
            
            
                
        <!-- Add new form -->
        <form action="<?php echo smarty_function_actionurl(array('page'=>'measuringunits'),$_smarty_tpl);?>
" method="post" class="form-inline addForm"  style="text-align: center;">
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" onclick="return false;">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['measuringUnitData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['measuringUnitData']['id']>0) {?>Edit<?php } else { ?>Add New<?php }?></h2>

                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            
                        </div>
                    </div>
                        
                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['measuringUnitData']['showForm'])) {?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(true, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(false, null, 0);?>
                    <?php }?>
                    <div class="box-content row" style="<?php if ($_smarty_tpl->tpl_vars['showForm']->value) {?>display: block;<?php } else { ?>display: none;<?php }?>">
                        <div class="col-lg-12 col-md-12">
                                <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['measuringUnitData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['measuringUnitData']['id']>0) {?>
                                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['measuringUnitData']['id'];?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['unitId'] = new Smarty_variable($_tmp1, null, 0);?>
                                <?php } else { ?>
                                    <?php $_smarty_tpl->tpl_vars['unitId'] = new Smarty_variable(0, null, 0);?>
                                <?php }?>
                                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['unitId']->value;?>
"/>
                                    
                                <div class="form-group col-xs-4">
                                    <label for="name">
                                        Name
                                        <a data-toggle="tooltip" title="Unit name Eg: Kilogram">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="name" name="name" class="form-control" data-validation="alphanumeric server" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
"  data-validation-url="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['ajaxFilePath']->value,'params'=>array("do"=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['VALIDATE'],"id"=>$_smarty_tpl->tpl_vars['unitId']->value)),$_smarty_tpl);?>
" data-validation-error-msg="Alphanumeric values only" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['measuringUnitData']['name'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['measuringUnitData']['name'];
}?>' autocomplete="off" placeholder="Unit name"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="shortCode">
                                        Short Code
                                        <a data-toggle="tooltip" title="Short code Eg: KG/kg">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="shortCode" name="shortCode"  class="form-control" data-validation="alphanumeric server" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
"  data-validation-url="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['ajaxFilePath']->value,'params'=>array("do"=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['VALIDATE'],"id"=>$_smarty_tpl->tpl_vars['unitId']->value)),$_smarty_tpl);?>
" data-validation-error-msg="Alphanumeric values only"  data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['measuringUnitData']['shortCode'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['measuringUnitData']['shortCode'];
}?>' autocomplete="off" placeholder="Unit short code"/>
                                </div>
                                                                
                                <div class="form-group col-xs-4">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['measuringUnitData']['status'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['measuringUnitData']['status'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable(1, null, 0);?>
                                    <?php }?>
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control" data-validation="number" data-validation-error-msg="Invalid status" >
                                        <option value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value==1) {?>selected='selected'<?php }?>>
                                            Active
                                        </option>
                                        <option value="2" <?php if ($_smarty_tpl->tpl_vars['status']->value==2) {?>selected='selected'<?php }?>>
                                            Inactive
                                        </option>
                                    </select>
                                </div>
                                
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="notes" >Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['measuringUnitData']['notes'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['measuringUnitData']['notes'];
}?></textarea>
                                </div>
                                </div>
                                
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-primary" id='addUnit'  type="submit" name="add_unit" value="<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['measuringUnitData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['measuringUnitData']['id']>0) {?>Save<?php } else { ?>Add<?php }?>"/>&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-default resetFormData" type="reset" href="<?php echo smarty_function_actionurl(array('page'=>'measuringunits'),$_smarty_tpl);?>
">Clear</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         </form>
            <form action="<?php echo smarty_function_actionurl(array('page'=>'measuringunits'),$_smarty_tpl);?>
" method="post" class="form-inline searchForm"  style="text-align: center;">
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-search"></i> Search</h2>

                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            
                        </div>
                    </div>
                        
                    
                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['search_unit'])) {?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(true, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(false, null, 0);?>
                    <?php }?>
                        
                    <div class="box-content row" style="<?php if ($_smarty_tpl->tpl_vars['showForm']->value) {?>display: block;<?php } else { ?>display: none;<?php }?>">
                        <div class="col-lg-7 col-md-12 formContainer">
                                <div class="form-group col-xs-4">
                                    <label for="name">
                                        Name
                                        <a data-toggle="tooltip" title="Unit name Eg: Kilogram">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" name="name" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
"  data-validation-error-msg="Alphanumeric values only"  data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['name'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['name'];
}?>' autocomplete="off" placeholder="Unit name"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="shortCode">
                                        Short Code
                                        <a data-toggle="tooltip" title="Short code Eg: KG/kg">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" name="shortCode" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-error-msg="Alphanumeric values only"  data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['shortCode'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['shortCode'];
}?>' autocomplete="off" placeholder="Unit short code"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['status'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['status'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable("0", null, 0);?>
                                    <?php }?>
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" data-validation="number" data-validation-error-msg="Invalid status" data-validation-optional="true">
                                        <option value="0">Select</option>
                                        <option value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value==1) {?>selected='selected'<?php }?>>
                                            Active
                                        </option>
                                        <option value="2" <?php if ($_smarty_tpl->tpl_vars['status']->value==2) {?>selected='selected'<?php }?>>
                                            Inactive
                                        </option>
                                    </select>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="notes" >Notes</label>
                                    <textarea name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['notes'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['notes'];
}?></textarea>
                                </div>
                                
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-primary" type="submit" name="search_unit" value="Search"/>&nbsp;&nbsp;&nbsp;
                                    <div class="btn btn-default resetForm">Clear</div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
                        <form method="post" class="bulkForm" action="<?php echo smarty_function_actionurl(array('page'=>'measuringunits'),$_smarty_tpl);?>
">
                             <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-th-large"></i> Measuring Units</h2>
                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            
                        </div>
                    </div>
                    <div class="box-content">
                            <div class="breadcrumb">
                                <div id="bulk-action" class="actions">
                                    Bulk Action:
                                    <select name="bulkAction" class="form-control" data-validation="number" data-validation-error-msg="Please select an action">
                                        <option value="">Choose...</option>
                                        <option value="100">Delete</option>
                                        
                                    </select>
                                    <input class="btn btn-default btn-bulk btn-small" type="submit" name="do_bulk_action" value="Go"/>
                                </div>
                            </div>
                            <div class="showHideColumns">
                                <div class="btn-group">
                                    <a class="toggle-vis btn btn-default" data-column="0" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                        All&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                                    </a>
                                    <?php  $_smarty_tpl->tpl_vars['head'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['head']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['thead']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['head']->key => $_smarty_tpl->tpl_vars['head']->value) {
$_smarty_tpl->tpl_vars['head']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['head']->key;
?>
                                        <a class="toggle-vis btn btn-default" data-column="<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                           <?php echo $_smarty_tpl->tpl_vars['head']->value['name'];?>
&nbsp;<i class='glyphicon <?php if ($_smarty_tpl->tpl_vars['head']->value['visible']==="false") {?>glyphicon-eye-close<?php } else { ?>glyphicon-eye-open<?php }?>'></i>
                                        </a>
                                    <?php } ?>
                                </div>
                                <input type="hidden" name="startIndex" id="startIndex" value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['DATA_PER_PAGE'];?>
"/>
                            </div>
                            <table id="tableData" class="display" cellspacing="0" width="100%" data-order='[[ 1, "asc" ]]'>
                                <thead>
                                  <tr class="tablesorter-headerRow">
                                      <th class="selectAllTableHead">
                                        All
                                        <input type="checkbox" name="selectAll" class="selectAll"/>
                                    </th>
                                    <?php  $_smarty_tpl->tpl_vars['head'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['head']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['thead']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['head']->key => $_smarty_tpl->tpl_vars['head']->value) {
$_smarty_tpl->tpl_vars['head']->_loop = true;
?>
                                        <th <?php if (isset($_smarty_tpl->tpl_vars['head']->value['width'])) {?>width="<?php echo $_smarty_tpl->tpl_vars['head']->value['width'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['head']->value['name'];?>
</th>
                                    <?php } ?>
                                  </tr>
                                </thead>
                                <tfoot>
                                  <tr class="tablesorter-headerRow">
                                    <th>
                                    </th>
                                    <?php  $_smarty_tpl->tpl_vars['head'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['head']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['thead']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['head']->key => $_smarty_tpl->tpl_vars['head']->value) {
$_smarty_tpl->tpl_vars['head']->_loop = true;
?>
                                        <th><?php echo $_smarty_tpl->tpl_vars['head']->value['name'];?>
</th>
                                    <?php } ?>
                                  </tr>
                                </tfoot>
                                    <tbody>
                                    <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['allUnits']) {?>
                                        <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allUnits']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['details']->key;
?>    
                                            <tr>
                                               <td>
                                                   <input type="checkbox" name="selectedData[]" value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" />
                                               </td>
                                               <td><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</td>
                                               <td><?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>
</td>
                                               <td><?php echo $_smarty_tpl->tpl_vars['details']->value->shortCode;?>
</td>
                                               <td>
                                                   <?php if ($_smarty_tpl->tpl_vars['details']->value->status==1) {?>
                                                       <span class="label-default label label-success">
                                                           Active
                                                       </span>
                                                   <?php } elseif ($_smarty_tpl->tpl_vars['details']->value->status==2) {?>
                                                       <span class="label-default label">
                                                        Inactive
                                                       </span>
                                                   <?php } else { ?>
                                                       <span class="label-default label label-danger">
                                                        Unknown
                                                       </span>
                                                   <?php }?>
                                               </td>
                                               <td><?php echo $_smarty_tpl->tpl_vars['details']->value->notes;?>
</td>
                                               <td>
                                                   <a class="btn btn-info btn-small delete" data-toggle="tooltip" data-original-title="Edit unit." href="<?php echo smarty_function_actionurl(array('page'=>'measuringunits','params'=>array('id'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['EDIT'])),$_smarty_tpl);?>
">
                                                       <i class="glyphicon glyphicon-edit icon-white"></i>
                                                       Edit
                                                   </a>
                                                   <a class="btn btn-danger btn-small delete" data-toggle="tooltip" data-original-title="Delete unit." href="<?php echo smarty_function_actionurl(array('page'=>'measuringunits','params'=>array('id'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['DELETE'])),$_smarty_tpl);?>
">
                                                       <i class="glyphicon glyphicon-trash icon-white"></i>
                                                       Delete
                                                   </a>
                                               </td>
                                             </tr>
                                          <?php } ?>
                                        <?php }?>
                                    </tbody>
                                </table>
                                    <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['allUnits']) {?>
                        <div id="loadMore" class="breadcrumb">
                            Load More&nbsp;<i class="glyphicon glyphicon-download-alt"></i>
                        </div>
                        <div class="breadcrumb loading">Loading...</div>
                                <?php }?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
                                        </form>

            <!-- content ends -->
            </div><!--/#content.col-md-0-->
        </div><!--/fluid-row-->

        
        <hr>
        <footer class="row">
            <p class="col-md-9 col-sm-9 col-xs-12 copyright">
                &copy; <a href="http://www.es4em.com">ES4EM Technologies</a> 2014 - <?php echo date('Y');?>

            </p>

            <p class="col-md-3 col-sm-3 col-xs-12 powered-by">
                An <a href="http://www.es4em.com">ES4EM Technologies</a> Product
            </p>
        </footer>
        
    </div><!--/.fluid-container-->
    

    
    
    
    <?php echo '<script'; ?>
>
        function init(){
            validateFormWithServer();
            selectChosen();
            selectAllData(".selectAll", "selectedData");
            resetFromData(".searchForm");
            
            var tableOptions = {};
            
            <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['allUnits'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['allUnits']) {?>
            
                tableOptions.columns = [
                                { className: "columTextCenter", orderable: false, visible: true},
                                
                                <?php  $_smarty_tpl->tpl_vars['head'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['head']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['thead']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['head']->key => $_smarty_tpl->tpl_vars['head']->value) {
$_smarty_tpl->tpl_vars['head']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['head']->key;
?>
                                    { className: "<?php echo $_smarty_tpl->tpl_vars['head']->value['class'];?>
", orderable: <?php echo $_smarty_tpl->tpl_vars['head']->value['orderable'];?>
, visible: <?php echo $_smarty_tpl->tpl_vars['head']->value['visible'];?>
 },
                                <?php } ?>
                                
                                ]; // Actions*/
                
                <?php }?>
                

                tableOptions.order = [[1, 'asc']];

                loadDataTable('#tableData', '<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['ajaxFilePath']->value),$_smarty_tpl);?>
', <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['DATA_PER_PAGE'];?>
, tableOptions);
        }
    <?php echo '</script'; ?>
>
    

</body>
</html><?php }} ?>
