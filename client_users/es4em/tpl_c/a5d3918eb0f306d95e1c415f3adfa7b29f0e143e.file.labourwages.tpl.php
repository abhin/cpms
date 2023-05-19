<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-02-07 09:43:12
         compiled from "D:/xampp/htdocs/products/cpms/view/labourwages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1330156b5ad5a42a976-95349180%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5d3918eb0f306d95e1c415f3adfa7b29f0e143e' => 
    array (
      0 => 'D:/xampp/htdocs/products/cpms/view/labourwages.tpl',
      1 => 1454818390,
      2 => 'file',
    ),
    'a40cd3c80d8b2dea0e329420ab688f2002072872' => 
    array (
      0 => 'D:/xampp/htdocs/products/cpms/view/parent.tpl',
      1 => 1454725606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1330156b5ad5a42a976-95349180',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56b5ad5aae7cc4_49971193',
  'variables' => 
  array (
    'a_TemplateData' => 0,
    'loggtedUserType' => 0,
    'errors' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56b5ad5aae7cc4_49971193')) {function content_56b5ad5aae7cc4_49971193($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'D:\\xampp\\htdocs\\products\\CPMS\\model\\lib\\smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_capitalize')) include 'D:\\xampp\\htdocs\\products\\CPMS\\model\\lib\\smarty/plugins/modifier.capitalize.php';
if (!is_callable('smarty_function_actionurl')) include 'D:/xampp/htdocs/products/cpms/client_users/es4em/../../plugin/function.actionurl.php';
?><?php $_smarty_tpl->tpl_vars['ajaxFilePath'] = new Smarty_variable(smarty_modifier_replace(basename($_smarty_tpl->source->filepath),'.tpl','-ajax'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['actionPage'] = new Smarty_variable(smarty_modifier_replace(basename($_smarty_tpl->source->filepath),'.tpl',''), null, 0);?>

<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['SESSION']['userType'])) {?>
<?php $_smarty_tpl->tpl_vars['loggtedUserType'] = new Smarty_variable((int)$_smarty_tpl->tpl_vars['a_TemplateData']->value['SESSION']['userType'], null, 0);?>
<?php }?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3c.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black" /> 
    <meta name="robots" content="noindex, nofollow, noarchive">
    <meta id="extViewportMeta" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="imges/favicon.ico">
    <title><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['PRODUCT_NAME'];?>
 :: Labour Wages-<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['a_TemplateData']->value['clientName'],true);?>
</title>
    <link id="bs-css" href="../../css/jquery-ui.css" rel="stylesheet">
        <link rel="stylesheet" href="../../css/font-awesome.min.css"></link>

        <link id="bs-css" href="../../css/bootstrap.min.css" rel="stylesheet">
        <link id="bs-css" href="../../css/bootstrap-theme.min.css" rel="stylesheet">
        <link id="bs-css" href="../../css/jquery.dataTables.min.css" rel="stylesheet">
    

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
 src="../../js/form-validator/jquery.form-validator.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="../../js/jquery.autogrow-textarea.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="../../js/chosen/chosen.jquery.js"><?php echo '</script'; ?>
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
                        <?php if ($_smarty_tpl->tpl_vars['loggtedUserType']->value===$_smarty_tpl->tpl_vars['a_TemplateData']->value['SUPER_ADMIN']) {?>
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
                        
                        <?php if ($_smarty_tpl->tpl_vars['loggtedUserType']->value===$_smarty_tpl->tpl_vars['a_TemplateData']->value['SUPER_ADMIN']||$_smarty_tpl->tpl_vars['loggtedUserType']->value===$_smarty_tpl->tpl_vars['a_TemplateData']->value['ADMIN']) {?>
                            <ul class="nav nav-pills nav-stacked main-menu">
                                <li class="nav-header">Admin</li>
                                <li>
                                    <a href="<?php echo smarty_function_actionurl(array('page'=>'companybranches'),$_smarty_tpl);?>
">
                                        <i class="glyphicon glyphicon-th"></i>
                                        <span>Company Branches</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo smarty_function_actionurl(array('page'=>'paymentmethods'),$_smarty_tpl);?>
">
                                        <i class="glyphicon glyphicon-th"></i>
                                        <span>Payment Methods</span>
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
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['IS_PMS_ENABELD'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['IS_PMS_ENABELD']===true) {?>
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
                                    <span>Revenues</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'stages'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-signal"></i>
                                    <span>Stages</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'projectteams'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-signal"></i>
                                    <span>Project Teams</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'materialexpenses'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-globe"></i>
                                    <span>Material Expenses</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'labourwages'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-globe"></i>
                                    <span>Labour Wages</span>
                                </a>
                            </li>
                        </ul>
                        
                        
                        <?php if ($_smarty_tpl->tpl_vars['loggtedUserType']->value===$_smarty_tpl->tpl_vars['a_TemplateData']->value['SUPER_ADMIN']||$_smarty_tpl->tpl_vars['loggtedUserType']->value===$_smarty_tpl->tpl_vars['a_TemplateData']->value['ADMIN']||$_smarty_tpl->tpl_vars['loggtedUserType']->value===$_smarty_tpl->tpl_vars['a_TemplateData']->value['MANAGER']) {?>
                        <ul class="nav nav-pills nav-stacked main-menu">
                            <li class="nav-header  accordion">Project Settings</li>
                            
                            
                            
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
                                    <span>Materials</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'labourtypes'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Labour Types</span>
                                </a>
                            </li>
                            
                        </ul>
                        <?php }?>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['IS_HR_ENABELD'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['IS_HR_ENABELD']===true) {?>
                         <ul class="nav nav-pills nav-stacked main-menu">
                            <li class="nav-header  accordion">HR management</li>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'employees'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Employees</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'payments'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Payments</span>
                                </a>
                            </li>
                        </ul>
                        <?php if ($_smarty_tpl->tpl_vars['loggtedUserType']->value===$_smarty_tpl->tpl_vars['a_TemplateData']->value['SUPER_ADMIN']||$_smarty_tpl->tpl_vars['loggtedUserType']->value===$_smarty_tpl->tpl_vars['a_TemplateData']->value['ADMIN']||$_smarty_tpl->tpl_vars['loggtedUserType']->value===$_smarty_tpl->tpl_vars['a_TemplateData']->value['MANAGER']) {?>
                        <ul class="nav nav-pills nav-stacked main-menu">
                            <li class="nav-header  accordion">HR Settings</li>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'departments'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Departments</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'designations'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Designations</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'educationcourses'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Education Courses</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'paymenttypes'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Payment Types</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'employmenttypes'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Employment Types</span>
                                </a>
                            </li>
                        </ul>
                        <?php }?>
                        <?php }?>
                        
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
            
            
                
    <?php $_smarty_tpl->tpl_vars['paidStatus'] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['paidStatus'], null, 0);?>
    <?php $_smarty_tpl->tpl_vars['tableLabourDate'] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['tableLabourDate'], null, 0);?>
    <?php $_smarty_tpl->tpl_vars['tableToDate'] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['tableToDate'], null, 0);?>
    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['allLabourWages']['totalWages'])) {?>
        <?php $_smarty_tpl->tpl_vars['totalWages'] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['allLabourWages']['totalWages'], null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars['totalWages'] = new Smarty_variable(0, null, 0);?>
    <?php }?>
    <form method="post" action="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value),$_smarty_tpl);?>
" id="selectProject">
        <div class="row">
            <div class="breadcrumb">
                <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['projectId'])) {?>
                    <?php $_smarty_tpl->tpl_vars["projectId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['projectId'], null, 0);?>
                <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars["projectId"] = new Smarty_variable("0", null, 0);?>
                <?php }?>
                <select id="projectId" name="<?php echo md5('projectId');?>
" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Please select a valid projectTeam"  data-placeholder="Choose a project..." class="chosen-select" style="width: 390px; display: none;" tabindex="-1">
                    <option value="0"></option>
                    <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['projects']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['projectId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                            <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        </form>
        <?php if ($_smarty_tpl->tpl_vars['projectId']->value>0) {?>
        <!-- Add new form -->
        <form action="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value,'params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
" method="post" class="form-inline addForm"  style="text-align: center;">
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <input type="hidden" name="<?php echo md5('projectId');?>
" value="<?php echo $_smarty_tpl->tpl_vars['projectId']->value;?>
"/>
                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['id']>0) {?>
                        <?php $_smarty_tpl->tpl_vars['labourWageId'] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['id'], null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['labourWageId'] = new Smarty_variable(0, null, 0);?>
                    <?php }?>
                    <div class="box-header well" onclick="return false;">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['id']>0) {?>Edit<?php } else { ?>Add New<?php }?></h2>
                        
                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            
                        </div>
                    </div>
                        
                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['showForm'])) {?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(true, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(false, null, 0);?>
                    <?php }?>
                    <div class="box-content row" style="<?php if ($_smarty_tpl->tpl_vars['showForm']->value) {?>display: block;<?php } else { ?>display: none;<?php }?>">
                        <div class="col-lg-12 col-md-12">
                                <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['id']>0) {?>
                                    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['id'];?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['labourWageId'] = new Smarty_variable($_tmp1, null, 0);?>
                                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['labourWageId']->value;?>
"/>
                                <?php } else { ?>
                                    <?php $_smarty_tpl->tpl_vars['labourWageId'] = new Smarty_variable(0, null, 0);?>
                                <?php }?>
                                <div class="col-xs-12">  
                                    <div class="form-group col-xs-4">
                                        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['supervisorId'])) {?>
                                            <?php $_smarty_tpl->tpl_vars["supervisorId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['supervisorId'], null, 0);?>
                                        <?php } else { ?>
                                            <?php $_smarty_tpl->tpl_vars["supervisorId"] = new Smarty_variable('', null, 0);?>
                                        <?php }?>
                                        <label for="supervisorId" class="control-label">
                                            Supervisor
                                        </label>
                                        <select id="supervisorId" name="supervisorId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid supervisor" data-placeholder="Choose a supervisor...">
                                            <option value=""></option>
                                            <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allEmployees']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['supervisorId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                    <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['labourTypeId'])) {?>
                                            <?php $_smarty_tpl->tpl_vars["labourTypeId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['labourTypeId'], null, 0);?>
                                        <?php } else { ?>
                                            <?php $_smarty_tpl->tpl_vars["labourTypeId"] = new Smarty_variable('', null, 0);?>
                                        <?php }?>
                                        <label for="labourTypeId" class="control-label">
                                            Labour Type
                                            <a data-original-title="Eg: Mason/ Plumber/ Electrician" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select id="labourTypeId" name="labourTypeId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid type" data-placeholder="Choose a labour type...">
                                            <option value=""></option>
                                            <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allLabourType']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['labourTypeId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                    <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        <label for="name">
                                            Labour's Name
                                            <a data-toggle="tooltip" title="Name of the labour">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <input type="text" id="name" name="name" class="form-control" data-validation="required" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['name'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['name'];
}?>' autocomplete="off" placeholder="Name of the labour"/>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['totalHours'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["totalHours"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['totalHours'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["totalHours"] = new Smarty_variable(8, null, 0);?>
                                    <?php }?>
                                    <label for="totalHours" class="control-label">Total Hours</label>
                                    <select id="totalHours" name="totalHours" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid hour" data-placeholder="Choose hour...">
                                        <option></option>
                                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['hour'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['name'] = 'hour';
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start'] = (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['loop'] = is_array($_loop=24) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['step'] = ((int) 1) == 0 ? 1 : (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['total']);
?>

                                            <option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['hour']['index'];?>
" <?php if ($_smarty_tpl->tpl_vars['totalHours']->value==$_smarty_tpl->getVariable('smarty')->value['section']['hour']['index']) {?>selected='selected'<?php }?>>
                                                <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['hour']['index'];?>

                                            </option>
                                        <?php endfor; endif; ?>
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="amount" class="control-label">Amount</label>
                                    <div class="input-group" style="width:98.5% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                    <input type="text" id="amount" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['amount'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['amount'];
}?>' />
                                    </div>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="labourDate" class="control-label">
                                        Labour Date
                                        <a data-toggle="tooltip" title="Date of labour">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="labourDate" name="labourDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['labourDate'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['labourDate']!="0000-00-00") {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['labourDate'];
}?>' autocomplete="off" placeholder="Date of labour"/>
                                </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="notes" >Notes</label>
                                    <textarea id="notes" name="notes" class="form-control"> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['notes'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['notes'];
}?></textarea>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-primary" id='addLabourWage'  type="submit" name="add_labourWage" value="<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['labourWageData']['id']>0) {?>Save<?php } else { ?>Add<?php }?>"/>&nbsp;&nbsp;&nbsp;
                                    <input type="hidden" name="addLabourWage" value="Add"/>
                                    <a class="btn btn-default resetFormData" type="reset" href="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value),$_smarty_tpl);?>
">Clear</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <form action="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value,'params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
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
                        
                    
                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['search_labourWage'])) {?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(true, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(false, null, 0);?>
                    <?php }?>
                    <input type="hidden" name="<?php echo md5('projectId');?>
" value="<?php echo $_smarty_tpl->tpl_vars['projectId']->value;?>
"/>
                    <div class="box-content row" style="<?php if ($_smarty_tpl->tpl_vars['showForm']->value) {?>display: block;<?php } else { ?>display: none;<?php }?>">
                        <div class="col-lg-7 col-md-12 formContainer">
                            <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['id']>0) {?>
                               <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['id'];?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['labourWageId'] = new Smarty_variable($_tmp2, null, 0);?>
                               <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['labourWageId']->value;?>
"/>
                           <?php } else { ?>
                               <?php $_smarty_tpl->tpl_vars['labourWageId'] = new Smarty_variable(0, null, 0);?>
                           <?php }?>
                           <div class="col-xs-12">  
                               <div class="form-group col-xs-4">
                                   <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['supervisorId'])) {?>
                                       <?php $_smarty_tpl->tpl_vars["supervisorId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['supervisorId'], null, 0);?>
                                   <?php } else { ?>
                                       <?php $_smarty_tpl->tpl_vars["supervisorId"] = new Smarty_variable('', null, 0);?>
                                   <?php }?>
                                   <label for="supervisorId" class="control-label">
                                       Supervisor
                                   </label>
                                   <select id="supervisorId" name="supervisorId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid supervisor" data-validation-optional="true" data-placeholder="Choose a supervisor...">
                                       <option value=""></option>
                                       <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allEmployees']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                           <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['supervisorId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                               <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                           </option>
                                       <?php } ?>
                                   </select>
                               </div>
                               <div class="form-group col-xs-4">
                                   <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['labourTypeId'])) {?>
                                       <?php $_smarty_tpl->tpl_vars["labourTypeId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['labourTypeId'], null, 0);?>
                                   <?php } else { ?>
                                       <?php $_smarty_tpl->tpl_vars["labourTypeId"] = new Smarty_variable('', null, 0);?>
                                   <?php }?>
                                   <label for="labourTypeId" class="control-label">
                                       Labour Type
                                       <a data-original-title="Eg: Mason/ Plumber/ Electrician" data-toggle="tooltip" title="">
                                           <i class="glyphicon glyphicon-question-sign"></i>
                                       </a>
                                   </label>
                                   <select id="labourTypeId" name="labourTypeId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid type" data-validation-optional="true" data-placeholder="Choose a labour type...">
                                       <option value=""></option>
                                       <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allLabourType']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                           <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['labourTypeId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                               <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                           </option>
                                       <?php } ?>
                                   </select>
                               </div>
                               <div class="form-group col-xs-4">
                                   <label for="name">
                                       Labour's Name
                                       <a data-toggle="tooltip" title="Name of the labour">
                                           <i class="glyphicon glyphicon-question-sign"></i>
                                       </a>
                                   </label>
                                   <input type="text" id="name" name="name" class="form-control" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['name'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['name'];
}?>' autocomplete="off" placeholder="Name of the labour"/>
                               </div>
                           </div>
                           <div class="col-xs-12">
                           <div class="form-group col-xs-4">
                               <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['totalHours'])) {?>
                                   <?php $_smarty_tpl->tpl_vars["totalHours"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['totalHours'], null, 0);?>
                               <?php } else { ?>
                                   <?php $_smarty_tpl->tpl_vars["totalHours"] = new Smarty_variable(0, null, 0);?>
                               <?php }?>
                               <label for="totalHours" class="control-label">Total Hours</label>
                               <select id="totalHours" name="totalHours" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid hour" data-validation-optional="true" data-placeholder="Choose hour...">
                                   <option></option>
                                   <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['hour'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['name'] = 'hour';
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start'] = (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['loop'] = is_array($_loop=24) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['step'] = ((int) 1) == 0 ? 1 : (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['hour']['total']);
?>

                                       <option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['hour']['index'];?>
" <?php if ($_smarty_tpl->tpl_vars['totalHours']->value==$_smarty_tpl->getVariable('smarty')->value['section']['hour']['index']) {?>selected='selected'<?php }?>>
                                           <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['hour']['index'];?>

                                       </option>
                                   <?php endfor; endif; ?>
                               </select>
                           </div>
                           <div class="form-group col-xs-4">
                               <label for="amount" class="control-label">Amount</label>
                               <div class="input-group" style="width:98.5% !important;">
                                   <div class="input-group-addon">Rs.</div>
                               <input type="text" id="amount" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['amount'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['amount'];
}?>' />
                               </div>
                           </div>
                           <div class="form-group col-xs-4">
                               <label for="labourDate" class="control-label">
                                   Labour Date
                                   <a data-toggle="tooltip" title="Date of labour">
                                       <i class="glyphicon glyphicon-question-sign"></i>
                                   </a>
                               </label>
                               <input type="text" name="labourDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['labourDate'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['labourDate']!="0000-00-00") {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['labourDate'];
}?>'  data-validation-optional="true" autocomplete="off" placeholder="Date of labour"/>
                           </div>
                           </div>
                           <div class="col-xs-12">
                           <div class="form-group col-xs-4">
                               <label for="notes" >Notes</label>
                               <textarea id="notes" name="notes" class="form-control"> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['notes'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['notes'];
}?></textarea>
                           </div>
                           <input type="hidden" name="paidStatus" value="<?php echo $_smarty_tpl->tpl_vars['paidStatus']->value;?>
"/>
                            <?php if (!isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['labourDate'])) {?>
                                <input type="hidden" name="tableLabourDate" value="<?php echo $_smarty_tpl->tpl_vars['tableLabourDate']->value;?>
"/>
                                <input type="hidden" name="tableToDate" value="<?php echo $_smarty_tpl->tpl_vars['tableToDate']->value;?>
"/>
                            <?php }?>
                           </div>
                                
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-primary" type="submit" name="search_payment" value="Search"/>&nbsp;&nbsp;&nbsp;
                                    <div class="btn btn-default resetForm">Clear</div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <form method="post" class="form-inline bulkForm" id="bulkForm" action="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value,'params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
">
                            <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                       <h2><i class="glyphicon glyphicon-th-large"></i> Labour Wages</h2>
                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="col-lg-12">
                            <div class="breadcrumb col-lg-12">
                            
                            <div class="col-lg-6">
                                <div id="bulk-action" class="actions">
                                    Bulk Action:
                                    <select name="bulkAction" id="bulkAction" class="form-control" data-validation="number" data-validation-error-msg="Please select an action">
                                        <option value="">Choose an action</option>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['DELETE'];?>
">Delete</option>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['DO_PAY'];?>
">Pay Wage(s)</option>
                                    </select>
                                    <input class="btn btn-default btn-bulk btn-small" type="submit" name="do_bulkAction" value="Go"/>
                                </div>
                            </div>
                            <div class="col-lg-6" style="text-align: right; ">
                                        Wage(s) Total: <i class="fa fa-inr"></i> <span id="totalAmount">0</span>
                            </div>
                        </div>
                        <div  class="breadcrumb col-lg-12">
                            <div class="col-lg-8" style="text-align:left;">
                                Date from
                                <input type="text" name="tableLabourDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" data-validation-optional="true" value='<?php echo $_smarty_tpl->tpl_vars['tableLabourDate']->value;?>
' autocomplete="off" placeholder="wages start"/>
                               To <input type="text" name="tableToDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" value='<?php echo $_smarty_tpl->tpl_vars['tableToDate']->value;?>
' data-validation-optional="true" autocomplete="off" placeholder="wages end"/>
                               
                               <input class="btn btn-default btn-bulk btn-small" type="submit" name="do_payWages" id="do_payWages" value="Go"/>
                               <input class="btn btn-default btn-bulk btn-small" type="reset" id="resetTableFilter" value="Clear"/>
                            </div>
                            <div class="col-lg-4" style="text-align:right;">
                                All&nbsp;<input type="radio" name="paidStatus" value='0' <?php if ($_smarty_tpl->tpl_vars['paidStatus']->value===0) {?>checked="checked"<?php }?>/>&nbsp;
                                Paid&nbsp;<input type="radio" name="paidStatus" value='1' <?php if ($_smarty_tpl->tpl_vars['paidStatus']->value===1) {?>checked="checked"<?php }?>/>&nbsp;
                                Unpaid&nbsp;<input type="radio" name="paidStatus" value='2' <?php if ($_smarty_tpl->tpl_vars['paidStatus']->value===2) {?>checked="checked"<?php }?>/>
                            </div>
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
                            <table id="tableData" class="display" cellspacing="0" width="100%">
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
                                    <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['allLabourWages']) {?>
                                        <?php  $_smarty_tpl->tpl_vars['wageData'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['wageData']->_loop = false;
 $_smarty_tpl->tpl_vars['labourDate'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allLabourWages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['wageData']->key => $_smarty_tpl->tpl_vars['wageData']->value) {
$_smarty_tpl->tpl_vars['wageData']->_loop = true;
 $_smarty_tpl->tpl_vars['labourDate']->value = $_smarty_tpl->tpl_vars['wageData']->key;
?>
                                            <?php if ($_smarty_tpl->tpl_vars['labourDate']->value=='totalWages') {?>
                                                <?php continue 1;?>
                                            <?php }?>
                                            <tr>
                                               <td>
                                                   <input type="checkbox" name="selectedData_<?php echo $_smarty_tpl->tpl_vars['labourDate']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['labourDate']->value;?>
" />
                                               </td>
                                               <td>Labour Date - <?php echo $_smarty_tpl->tpl_vars['labourDate']->value;?>
</td>

                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                            </tr>
                                            <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['wageData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['details']->key;
?> 
                                                <?php if ($_smarty_tpl->tpl_vars['labourDate']->value!=$_smarty_tpl->tpl_vars['details']->value->labourDateF) {?>
                                                    <?php continue 1;?>
                                                <?php }?>
                                            <tr>
                                               <td>
                                                   <input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['labourDate']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" name="selectedData[]" value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" />
                                               </td>

                                               <td><?php echo $_smarty_tpl->tpl_vars['details']->value->supervisorName;?>
</td>
                                               <td><?php echo $_smarty_tpl->tpl_vars['details']->value->labourTypeName;?>
</td>
                                               <td><?php echo $_smarty_tpl->tpl_vars['details']->value->labourDateF;?>
</td>
                                               <td><?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>
</td>
                                               <td><?php echo $_smarty_tpl->tpl_vars['details']->value->totalHours;?>
</td>
                                               <td><?php echo $_smarty_tpl->tpl_vars['details']->value->amount;?>
</td>
                                               <td><?php echo $_smarty_tpl->tpl_vars['details']->value->receiptNo;?>
</td>
                                               <td><?php echo $_smarty_tpl->tpl_vars['details']->value->paymentDateF;?>
</td>
                                               <td>
                                                   <?php if ($_smarty_tpl->tpl_vars['details']->value->paidStatus==$_smarty_tpl->tpl_vars['a_TemplateData']->value['PAID']) {?>
                                                        <span class="label-default label label-success">
                                                            Paid
                                                        </span>
                                                    <?php } elseif ($_smarty_tpl->tpl_vars['details']->value->paidStatus==$_smarty_tpl->tpl_vars['a_TemplateData']->value['UNPAID']) {?>
                                                        <span class="label-default label">
                                                            Unpaid
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
                                                   <a class="btn btn-info btn-small" href="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value,'params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value,'id'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['EDIT'])),$_smarty_tpl);?>
">
                                                       <i class="glyphicon glyphicon-edit icon-white"></i>
                                                       Edit
                                                   </a>
                                                   <a class="btn btn-danger btn-small delete" href="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value,'params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value,'id'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['DELETE'])),$_smarty_tpl);?>
">
                                                       <i class="glyphicon glyphicon-trash icon-white"></i>
                                                       Delete
                                                   </a>
                                                   <a class="btn btn-success btn-small" href="<?php echo smarty_function_actionurl(array('page'=>"paylabourwages",'params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value,'wageId'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['SHOW_ADD_FORM'])),$_smarty_tpl);?>
">
                                                       <i class="fa fa-inr"></i>
                                                       Pay Wage
                                                   </a>
                                               </td>
                                             </tr>
                                          <?php } ?>
                                        <?php } ?>
                                        <?php }?>
                                    </tbody>
                                </table>
                                <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['allLabourWages'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['allLabourWages']) {?>
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
            validateFormWithServer();
            selectChosen();
            var options = {};
            options.maxDate = new Date();
            dateSelector(".datePicker",options);
            
            selectAllData(".selectAll", "selectedData");
            resetFromData(".searchForm");

           var tableOptions = {};
            
            <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['allLabourWages'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['allLabourWages']) {?>
            
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
                


                loadDataTable('#tableData', '<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['ajaxFilePath']->value,'params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
', <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['DATA_PER_PAGE'];?>
, tableOptions, bind);
                
           jQuery("#projectId").change(function(){
                $("#selectProject").submit();
            });  
            
           jQuery("#resetTableFilter").click(function(){
               $("input[name^='tableLabourDate']").val("");
               $("input[name^='tableToDate']").val("");
               $('#bulkAction').attr("data-validation-optional", "true");
               $("#bulkForm").submit();
           });
           jQuery("input[name^='paidStatus'], #do_payWages").click(function(){
               $('#bulkAction').attr("data-validation-optional", "true");
               $("#bulkForm").submit();
            }); 
            
            $("input[name^='do_bulkAction']").click(function(){
                var doPay = <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['DO_PAY'];?>
;
                var action = parseInt($("select[name='bulkAction']").val());
                if (action === doPay){
                    $("#bulkForm").attr("action", "<?php echo smarty_function_actionurl(array('page'=>"paylabourwages",'params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
");
                }
            });
            
            selectSpecificDateData();
            getRepeatedElement();
            getToalAmount(7);
        }
        
        function selectSpecificDateData()
        {
            jQuery('input[name^="selectedData_"]').click(function(){
                var selectedDate = $(this).attr("name").split('_')[1];
                var isCheck  = $(this).is(":checked")
                var selectable = $('input[id^="' + selectedDate + '"]');
                $("input[name='selectAll']").prop('checked', false);

                if(isCheck){
                    selectable.prop('checked', true);
                }
                else{
                    selectable.prop('checked', false);
                }
            });
            
            $('input[name^="selectedData["]').click(function(){
        
                var thisId = $(this).attr("id").split("-")[0];
                $('input[name^="selectedData_' + thisId + '"]').prop('checked', false);
            });
        }
        
        function getRepeatedElement()
        {
            jQuery('input[name^="selectedData_"]').each(function( index ) {
                var eleId = $(this).val() ;
                //console.log( index + ": " + eleId );
                var element = $('[name="selectedData_' + eleId + '"');
                for (var i=1; i < element.length; i++){
                    //var par = $(element[i]).parent().parent().remove();
                    var par = $(element[i]).closest("tr").remove();
                    
                    //alert(par);
                }
                $(element[0]).closest("tr").css({"background-color":"#1794E1", "color":"#FFFFFF", "font-weight":"bold", "font-size":"14px"});
            });
        }
        
        function bind(){
            selectSpecificDateData();
            getRepeatedElement();
            getToalAmount(7);
        }
    <?php echo '</script'; ?>
>
    

</body>
</html><?php }} ?>
