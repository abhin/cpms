<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-12-06 17:49:26
         compiled from "D:/xampp/htdocs/products/cpms/view/users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25354db28c3bfcfe5-59493938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0c2a0b7f4c62be9d97d48661fc0663f31b09f6f' => 
    array (
      0 => 'D:/xampp/htdocs/products/cpms/view/users.tpl',
      1 => 1449398454,
      2 => 'file',
    ),
    'a40cd3c80d8b2dea0e329420ab688f2002072872' => 
    array (
      0 => 'D:/xampp/htdocs/products/cpms/view/parent.tpl',
      1 => 1449393343,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25354db28c3bfcfe5-59493938',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54db28c407ffa5_24503170',
  'variables' => 
  array (
    'a_TemplateData' => 0,
    'errors' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54db28c407ffa5_24503170')) {function content_54db28c407ffa5_24503170($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'D:\\xampp\\htdocs\\products\\CPMS\\model\\lib\\smarty/plugins/modifier.replace.php';
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
 :: <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['IS_SUPER_ADMIN']===true) {?>Users<?php } else { ?>Profile<?php }?>-<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['a_TemplateData']->value['clientName'],true);?>
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
            
            
                
        <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['IS_SUPER_ADMIN']===true) {?>
        <div class="row">
            <div class="breadcrumb" >
                <form action="<?php echo smarty_function_actionurl(array('page'=>'users'),$_smarty_tpl);?>
" method="post" id="client">
                        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['clientId'])) {?>
                            <?php $_smarty_tpl->tpl_vars["clientId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['clientId'], null, 0);?>
                        <?php } else { ?>
                            <?php $_smarty_tpl->tpl_vars["clientId"] = new Smarty_variable('', null, 0);?>
                        <?php }?>
                        <select id="clientId" name="<?php echo md5("clientId");?>
" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid client" data-placeholder="Choose a client...">
                            <option value=""></option>
                            <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['clientId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                    <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                </option>
                            <?php } ?>
                        </select>
                </form>
            </div>
        </div>
        <?php }?>
        <?php if (($_smarty_tpl->tpl_vars['a_TemplateData']->value['IS_SUPER_ADMIN']===true&&isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['clientId'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['clientId']>0)||($_smarty_tpl->tpl_vars['a_TemplateData']->value['IS_SUPER_ADMIN']!=true&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['CLIENT_ID']>0)) {?>
        <!-- Add new form -->
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" onclick="return false;">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['id']>0) {?>Edit Profile<?php } else { ?>Add New<?php }?></h2>

                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            
                        </div>
                    </div>
                        
                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['showForm'])||($_smarty_tpl->tpl_vars['a_TemplateData']->value['IS_SUPER_ADMIN']!==true)) {?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(true, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(false, null, 0);?>
                    <?php }?>

                    <div class="box-content row" style="<?php if ($_smarty_tpl->tpl_vars['showForm']->value) {?>display: block;<?php } else { ?>display: none;<?php }?>">
                        <div class="col-lg-12 col-md-12">
                            <div>
                                <form action="<?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['IS_SUPER_ADMIN']===true) {
echo smarty_function_actionurl(array('page'=>'users','params'=>array('clientId'=>$_smarty_tpl->tpl_vars['clientId']->value)),$_smarty_tpl);
} else {
echo smarty_function_actionurl(array('page'=>'users'),$_smarty_tpl);
}?>" method="post" class="form-inline addForm">
                                <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['id']>0) {?>
                                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['id'];?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['userId'] = new Smarty_variable($_tmp1, null, 0);?>
                                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['id'];?>
"/>
                                <?php } else { ?>
                                    <?php $_smarty_tpl->tpl_vars['userId'] = new Smarty_variable(0, null, 0);?>
                                <?php }?>
                                
                                <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['clientId'])) {?>
                                     <input type="hidden" name="<?php echo md5("clientId");?>
" value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['clientId'];?>
"/>       
                                <?php }?>
                                    
                                <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['IS_SUPER_ADMIN']===true) {?>
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['userType'])) {?>
                                            <?php $_smarty_tpl->tpl_vars["userType"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['userType'], null, 0);?>
                                        <?php } else { ?>
                                            <?php $_smarty_tpl->tpl_vars["userType"] = new Smarty_variable('', null, 0);?>
                                        <?php }?>
                                        <label for="userType" class="control-label">User Type</label>
                                        <select id="userType" name="userType" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid user type" data-placeholder="Choose a type...">
                                            <option value=""></option>
                                            <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['userTypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['userType']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                    <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                        
                                    <div class="form-group col-xs-4">
                                        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['status'])) {?>
                                            <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['status'], null, 0);?>
                                        <?php } else { ?>
                                            <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('', null, 0);?>
                                        <?php }?>
                                        <label for="status" class="control-label">User Status</label>
                                        <select id="status" name="status" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid status" data-placeholder="Choose a status...">
                                            <option value=""></option>
                                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value==1) {?>selected='selected'<?php }?>>
                                                Active
                                            </option>
                                            <option value="2" <?php if ($_smarty_tpl->tpl_vars['status']->value==2) {?>selected='selected'<?php }?>>
                                                Inactive
                                            </option>
                                        </select>
                                    </div>
                                <?php }?>
                                
                                <div class="form-group col-xs-4">
                                    <label for="username" class="control-label">
                                        Username&nbsp;
                                        <a data-toggle="tooltip" title="Used for login Only alphanumeric charcters and '_' allowed.">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="username" name="username" class="form-control" data-validation="alphanumeric server" data-validation-allowing="_"  data-validation-url="<?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['IS_SUPER_ADMIN']===true) {
ob_start();?><?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_actionurl(array('page'=>'usernamevalidate','params'=>array("id"=>$_tmp2,"clientId"=>$_smarty_tpl->tpl_vars['clientId']->value)),$_smarty_tpl);
} else {
ob_start();?><?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_actionurl(array('page'=>'usernamevalidate','params'=>array("id"=>$_tmp3)),$_smarty_tpl);
}?>" data-validation-error-msg="Alphanumeric values only" value="<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['username'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['username'];
}?>">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['IS_SUPER_ADMIN']===true) {?>
                                <div class="form-group col-xs-4">
                                    <label for="password" class="control-label">Password</label>
                                    <input type="text" id="password" name="password" class="form-control" autocomplete="off" />
                                </div>
                                <?php }?>
                                

                                <div class="form-group col-xs-4">
                                    <label for="email" class="control-label">
                                        Email
                                        <a data-toggle="tooltip" title="Email using for password recovery and login">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="email" name="email" class="form-control" data-validation="required email server" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
"  data-validation-url="<?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['IS_SUPER_ADMIN']===true) {
ob_start();?><?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
<?php $_tmp4=ob_get_clean();?><?php echo smarty_function_actionurl(array('page'=>'emailvalidate','params'=>array("do"=>"2","id"=>$_tmp4,"clientId"=>$_smarty_tpl->tpl_vars['clientId']->value)),$_smarty_tpl);
} else {
ob_start();?><?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
<?php $_tmp5=ob_get_clean();?><?php echo smarty_function_actionurl(array('page'=>'emailvalidate','params'=>array("do"=>"2","id"=>$_tmp5)),$_smarty_tpl);
}?>" data-validation-error-msg="Invalid Email" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['email'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['email'];
}?>' autocomplete="off"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="phoneNumber" class="control-label">
                                        Phone
                                        <a data-toggle="tooltip" title="Only number, +, - and space allowed">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" data-validation="alphanumeric length" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-length="min10" data-validation-error-msg="Invaid number" data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['phoneNumber'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['phoneNumber'];
}?>' autocomplete="off"/>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="firstName" class="control-label">
                                        First Name
                                    </label>
                                    <input type="text" id="firstName" name="firstName" class="form-control" data-validation="alphanumeric length" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-length="min2" data-validation-error-msg="Valid only alphanumeric, min 2 characters" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['firstName'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['firstName'];
}?>' autocomplete="off"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="lastName" class="control-label">Last Name</label>
                                    <input type="text" id="lastName" name="lastName" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-optional="true" data-validation-optional="true" data-validation-error-msg="Valid only alphanumeric, min 2 characters" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['lastName'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['lastName'];
}?>' autocomplete="off"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="displayName" class="control-label">
                                        Display Name
                                        <a data-toggle="tooltip" title="The name display in top right corner after login">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="displayName" name="displayName" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['displayName'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['displayName'];
}?>' autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" id='addUser' type="submit" name="add_user" value="<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['id']>0) {?>Save<?php } else { ?>Add<?php }?>"/>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (($_smarty_tpl->tpl_vars['a_TemplateData']->value['IS_SUPER_ADMIN']===true&&isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['clientId'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['clientId']>0)) {?>
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
                        
                    
                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['search_user'])) {?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(true, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(false, null, 0);?>
                    <?php }?>
                        
                    <div class="box-content row" style="<?php if ($_smarty_tpl->tpl_vars['showForm']->value) {?>display: block;<?php } else { ?>display: none;<?php }?>">
                        <div class="col-lg-7 col-md-12 formContainer">
                            <form action="<?php echo smarty_function_actionurl(array('page'=>'users'),$_smarty_tpl);?>
" method="post" class="form-inline searchForm">
                                <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['clientId'])) {?>
                                     <input type="hidden" name="<?php echo md5("clientId");?>
" value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['clientId'];?>
"/>       
                                <?php }?>
                                <div class="form-group col-xs-4">
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" id="searchName" name="name" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
"  data-validation-error-msg="Name field has to be an alphanumeric value" data-validation-optional="true" value="<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['name'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['name'];
}?>">
                                </div>

                                <div class="form-group col-xs-4">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['progressStatus'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["progressStatus"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['progressStatus'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["progressStatus"] = new Smarty_variable("0", null, 0);?>
                                    <?php }?>
                                    <label for="progressStatus" class="control-label">Progress</label>
                                    <select id="searchProgressStatus" name="progressStatus" class="form-control" data-validation="number" data-validation-error-msg="Invaid progress"  data-validation-optional="true">
                                        <option value="0">Choose a progress...</option>
                                        <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['progressStatus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['progressStatus']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-xs-4">
                                    <label for="startedDate" class="control-label">Started Date</label>
                                    <input type="text" name="startedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid started date" data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['startedDate'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['startedDate'];
}?>' autocomplete="off"/>
                                </div>
                                <br/>
                                <div class="form-group col-xs-4">
                                    <label for="completedDate" class="control-label">Completed Date</label>
                                    <input type="text" name="completedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid completed date" data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['completedDate'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['completedDate'];
}?>' autocomplete="off"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-error-msg="Notes field has to be an alphanumeric value" data-validation-optional="true"> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['notes'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['notes'];
}?></textarea>
                                </div>
                                <div class="form-group col-xs-4" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="search_user" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="btn btn-default btn resetFormData">
                                        Clear
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-th-large"></i> Users</h2>
                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            
                        </div>
                    </div>
                    <div class="box-content">
                        <form method="post" class="bulkForm"  action="<?php echo smarty_function_actionurl(array('page'=>'users'),$_smarty_tpl);?>
">
                            
                            <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['clientId'])) {?>
                                     <input type="hidden" name="<?php echo md5("clientId");?>
" value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['userData']['clientId'];?>
"/>       
                                <?php }?>
                            <div class="breadcrumb">
                                <div id="bulk-action" class="actions" style="border:0px solid red;width: 220px;">
                                    Bulk Action:
                                    <select name="bulkAction" class="form-control" data-validation="number" data-validation-error-msg="Please select an action">
                                        <option value="">Choose...</option>
                                        <option value="100">Delete</option>
                                        
                                    </select>
                                    <input class="btn btn-default btn-bulk btn-small" type="submit" name="bulk_action" value="Go"/>
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
&nbsp;<i class='glyphicon <?php if ($_smarty_tpl->tpl_vars['head']->value['visible']===false) {?>glyphicon-eye-close<?php } else { ?>glyphicon-eye-open<?php }?>'></i>
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
                                        <th><?php echo $_smarty_tpl->tpl_vars['head']->value['name'];?>
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
                                <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['allUsers']) {?>
                                    <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allUsers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['details']->key;
?>    
                                        <tr class="<?php if ($_smarty_tpl->tpl_vars['index']->value%2==0) {?>odd<?php } else { ?>even<?php }?>">
                                           <td style="width:1%; text-align: center;">
                                               <?php if ($_smarty_tpl->tpl_vars['details']->value->user_type!=1) {?>
                                               <input type="checkbox" name="selectedData[]" value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" />
                                               <?php } else { ?>
                                                <a data-original-title="Cannot do bulk actions/ Delete for supper user" data-toggle="tooltip" title="">
                                                    <i class="glyphicon glyphicon-question-sign"></i>
                                                </a>
                                               <?php }?>
                                           </td>
                                           <td style="width:1%; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</td>
                                           <td style="width:11%"><?php echo $_smarty_tpl->tpl_vars['details']->value->clientName;?>
</td>
                                           <td style="width:9%; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['details']->value->userTypeName;?>
</td>
                                           <td style="width:5%" text-align: center;">
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
                                           <td style="width:9%; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['details']->value->username;?>
</td>
                                           <td style="width:6%"><?php echo $_smarty_tpl->tpl_vars['details']->value->email;?>
</td>
                                           <td style="width:6%"><?php echo $_smarty_tpl->tpl_vars['details']->value->phone_number;?>
</td>
                                           <td style="width:10%"><?php echo $_smarty_tpl->tpl_vars['details']->value->first_name;?>
</td>
                                           <td style="width:10%"><?php echo $_smarty_tpl->tpl_vars['details']->value->last_name;?>
</td>
                                           <td style="width:5%"><?php echo $_smarty_tpl->tpl_vars['details']->value->display_name;?>
</td>
                                           <td style="width:5%; text-align: center;">
                                               <?php if ($_smarty_tpl->tpl_vars['details']->value->is_logged_in==1) {?>
                                                   <img src="../../images/status-online.png"/>
                                               <?php } else { ?>
                                                   <img src="../../images/status-offline.png"/>
                                               <?php }?>
                                           </td>
                                           <td style="width:10%"><?php echo $_smarty_tpl->tpl_vars['details']->value->lastAccessTime;?>
</td>
                                           <td style="width:10%"><?php echo $_smarty_tpl->tpl_vars['details']->value->addedDate;?>
</td>
                                           <td style="width:15%">
                                               <a class="btn btn-success btn-small" data-toggle="tooltip" data-original-title="View All Project Details." href="<?php echo smarty_function_actionurl(array('page'=>'users','params'=>array('id'=>$_smarty_tpl->tpl_vars['details']->value->id)),$_smarty_tpl);?>
">
                                                   <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                   View
                                               </a>
                                               <a class="btn btn-info btn-small" data-toggle="tooltip" data-original-title="Edit user." href="<?php echo smarty_function_actionurl(array('page'=>'users','params'=>array('id'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>1,'clientId'=>$_smarty_tpl->tpl_vars['clientId']->value)),$_smarty_tpl);?>
">
                                                   <i class="glyphicon glyphicon-edit icon-white"></i>
                                                   Edit
                                               </a>
                                               <?php if ($_smarty_tpl->tpl_vars['details']->value->user_type!=1) {?>
                                               <a class="btn btn-danger btn-small delete" data-toggle="tooltip" data-original-title="Delete user." href="<?php echo smarty_function_actionurl(array('page'=>'users','params'=>array('id'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>2,'clientId'=>$_smarty_tpl->tpl_vars['clientId']->value)),$_smarty_tpl);?>
">
                                                   <i class="glyphicon glyphicon-trash icon-white"></i>
                                                   Delete
                                               </a>
                                                <?php }?>
                                           </td>
                                         </tr>
                                      <?php } ?>
                                    <?php }?>
                                </tbody>
                            </table>
                        </form>
                        <div id="loadMore" class="breadcrumb">
                            Load More&nbsp;<i class="glyphicon glyphicon-download-alt"></i>
                        </div>
                        <div class="breadcrumb loading">Loading...</div>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
    <?php }?>

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
        function init()
        {
            jQuery("#clientId").change(function(){
                    $("#client").submit();
                });
            validateFormWithServer();
            selectChosen();

            var tableOptions = {};
        
        <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['allUsers']&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['IS_SUPER_ADMIN']===true) {?>
        
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
", orderable: "<?php echo $_smarty_tpl->tpl_vars['head']->value['orderable'];?>
", visible: "<?php echo $_smarty_tpl->tpl_vars['head']->value['visible'];?>
" },
                            <?php } ?>
                            
                            ]; // Actions*/
            
            <?php }?>
            
                 
            tableOptions.order = [[1, 'asc']];
            
            loadDataTable('#tableData', '<?php echo smarty_function_actionurl(array('page'=>"users",'params'=>array("do"=>"loadData")),$_smarty_tpl);?>
', <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['DATA_PER_PAGE'];?>
, tableOptions);
        }
    <?php echo '</script'; ?>
>
    

</body>
</html><?php }} ?>
