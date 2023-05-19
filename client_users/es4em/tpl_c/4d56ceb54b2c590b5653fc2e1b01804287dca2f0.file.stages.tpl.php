<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-06-28 18:36:30
         compiled from "C:/xampp/htdocs/products/CPMS/view/stages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54435b34dd56b4d926-93647209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d56ceb54b2c590b5653fc2e1b01804287dca2f0' => 
    array (
      0 => 'C:/xampp/htdocs/products/CPMS/view/stages.tpl',
      1 => 1454238618,
      2 => 'file',
    ),
    'e2164140b0c3f91bc8d45bc235d32f3e6c6561e8' => 
    array (
      0 => 'C:/xampp/htdocs/products/CPMS/view/parent.tpl',
      1 => 1454725606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54435b34dd56b4d926-93647209',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'a_TemplateData' => 0,
    'loggtedUserType' => 0,
    'errors' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5b34dd56dcb7f3_29395838',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b34dd56dcb7f3_29395838')) {function content_5b34dd56dcb7f3_29395838($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'C:\\xampp\\htdocs\\products\\CPMS\\model\\lib\\smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_capitalize')) include 'C:\\xampp\\htdocs\\products\\CPMS\\model\\lib\\smarty/plugins/modifier.capitalize.php';
if (!is_callable('smarty_function_actionurl')) include 'C:/xampp/htdocs/products/CPMS/client_users/es4em/../../plugin/function.actionurl.php';
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
 :: Stages-<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['a_TemplateData']->value['clientName'],true);?>
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
            
            
                
        <!-- Add new form -->
        <form method="post" action="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value),$_smarty_tpl);?>
" id="selectProject">
        <div class="row">
            <div class="breadcrumb">
                <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['projectId'])) {?>
                    <?php $_smarty_tpl->tpl_vars["projectId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['projectId'], null, 0);?>
                <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars["projectId"] = new Smarty_variable("0", null, 0);?>
                <?php }?>
                    <select id="projectId" name="<?php echo md5('projectId');?>
" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Please select a valid project"  data-placeholder="Choose a project..." style="width: 390px; display: none;" tabindex="-1">
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
            <form action="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value,'params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
" method="post" class="form-inline addForm">
            <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['id']>0) {?>Update<?php } else { ?>Add New<?php }?></h2>

                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            
                        </div>
                    </div>
                        

                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['showForm'])) {?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(true, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(false, null, 0);?>
                    <?php }?>
                    <div class="box-content row" style="<?php if ($_smarty_tpl->tpl_vars['showForm']->value) {?>display: block;<?php } else { ?>display: none;<?php }?>">
                         <div class="col-lg-12 col-md-12">
                            <div>
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                    <input type="hidden" name="<?php echo md5('projectId');?>
" value="<?php echo $_smarty_tpl->tpl_vars['projectId']->value;?>
"/>
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['id']>0) {?>
                                        <?php $_smarty_tpl->tpl_vars['stageId'] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['id'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars['stageId'] = new Smarty_variable(0, null, 0);?>
                                    <?php }?>
                                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['stageId']->value;?>
"/>
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" data-validation="alphanumeric server" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-url="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['ajaxFilePath']->value,'params'=>array("do"=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['VALIDATE'],"id"=>$_smarty_tpl->tpl_vars['stageId']->value,"projectId"=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
" data-validation-error-msg="Alphanumeric values only" placeholder="Stage name" value="<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['name'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['name'];
}?>">
                                </div>

                                    <div class="form-group col-xs-4">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['progressId'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["progressId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['progressId'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["progressId"] = new Smarty_variable(1, null, 0);?>
                                    <?php }?>
                                    <label for="progressId" class="control-label">Progress</label>
                                    <select id="progressId" name="progressId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid progress">
                                        <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allProgress']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['progressId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                    <div class="form-group col-xs-4">
                                    <label for="startedDate" class="control-label">Started Date</label>
                                    <input type="text" id="startedDate" name="startedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" <?php if ($_smarty_tpl->tpl_vars['progressId']->value<=1) {?>disabled="disabled"<?php }?> data-validation-error-msg="Invalid date" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['startedDate'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['startedDate'];
}?>' autocomplete="off"/>
                                </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                    <label for="completedDate" class="control-label">Completed Date</label>
                                    <input type="text" id="completedDate" name="completedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" <?php if ($_smarty_tpl->tpl_vars['progressId']->value!=3&&$_smarty_tpl->tpl_vars['progressId']->value!=5) {?>disabled="disabled"<?php }?> data-validation-error-msg="Invaid date" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['completedDate'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['completedDate'];
}?>' autocomplete="off"/>
                                </div>

                                <div class="form-group col-xs-4">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['notes'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['notes'];
}?></textarea>
                                </div>
                                </div>
                                    <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="add_stage" value="<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['stageData']['id']>0) {?>Update<?php } else { ?>Add<?php }?>"/>
                                    <input  type="hidden" name="addStage" value="Add"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <form action="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value,'params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
" method="post" class="form-inline searchForm">
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
                        
                    
                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['search_stage'])) {?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(true, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(false, null, 0);?>
                    <?php }?>
                        
                    <div class="box-content row" style="<?php if ($_smarty_tpl->tpl_vars['showForm']->value) {?>display: block;<?php } else { ?>display: none;<?php }?>">
                        <div class="col-lg-12 col-md-12">
                            <div>
                                <input type="hidden" name="<?php echo md5('projectId');?>
" value="<?php echo $_smarty_tpl->tpl_vars['projectId']->value;?>
"/>
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" id="searchName" name="name" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
"  data-validation-error-msg="Name field has to be an alphanumeric value" data-validation-optional="true" value="<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['name'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['name'];
}?>">
                                </div>

                                <div class="form-group col-xs-4">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['progressId'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["progressId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['progressId'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["progressId"] = new Smarty_variable('', null, 0);?>
                                    <?php }?>
                                    <label for="progressId" class="control-label">Progress</label>
                                    <select id="searchProgressStatus" name="progressId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invaid progress"  data-validation-optional="true" data-placeholder="Choose a progress">
                                        <option value=""></option>
                                        <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allProgress']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['progressId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
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
                                </div>
                                <div class="col-xs-12">
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
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="search_stage" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="btn btn-default btn resetForm">
                                        Clear
                                    </div>
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <form method="post" class="bulkForm" action="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value,'params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
">
        <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-th-large"></i> Stages</h2>
                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            
                        </div>
                    </div>
                    <div class="box-content">
                            <input type="hidden" name="<?php echo md5('projectId');?>
" value="<?php echo $_smarty_tpl->tpl_vars['projectId']->value;?>
"/>
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
                                <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['allStages']) {?>
                                    <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allStages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['details']->key;
?>    
                                        <tr class="<?php if ($_smarty_tpl->tpl_vars['index']->value%2==0) {?>odd<?php } else { ?>even<?php }?>">
                                           <td>
                                               <input type="checkbox" name="selectedData[]" value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" />
                                           </td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>
</td>
                                           <td>
                                               <?php if ($_smarty_tpl->tpl_vars['details']->value->progressId==2) {?>
                                                   <span class="label-default label label-success">
                                               <?php } elseif ($_smarty_tpl->tpl_vars['details']->value->progressId==3) {?>
                                                   <span class="label-default label" style="background-color:#2FA4E7;">
                                               <?php } elseif ($_smarty_tpl->tpl_vars['details']->value->progressId==4) {?>
                                                   <span class="label-default label  label-warning">
                                               <?php } elseif ($_smarty_tpl->tpl_vars['details']->value->progressId==5) {?>
                                                   <span class="label-default label label-danger">
                                               <?php } else { ?>
                                                   <span class="label-default label">
                                               <?php }?>
                                                   <?php echo $_smarty_tpl->tpl_vars['details']->value->progressName;?>

                                               </span>
                                           </td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->startedDate;?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->completedDate;?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->addedDate;?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->notes;?>
</td>
                                           <td>
                                                <a class="btn btn-info btn-small" href="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value,'params'=>array('id'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['EDIT'],'projectId'=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
">
                                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-small delete" href="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value,'params'=>array('id'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['DELETE'],'projectId'=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
">
                                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                                    Delete
                                                </a>

                                                <a class="btn btn-info btn-addStages btn-small" data-toggle="tooltip" data-original-title="Expenses" href="<?php echo smarty_function_actionurl(array('page'=>'expenses','params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value,'stageId'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['SHOW_ADD_FORM'])),$_smarty_tpl);?>
">
                                                   <i class="glyphicon glyphicon-plus icon-white"></i>
                                                   Expense
                                               </a>
                                           </td>
                                         </tr>
                                      <?php } ?>
                                    <?php }?>
                                </tbody>
                            </table>
                                <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['allStages']) {?>
                        <div id="loadMore" class="breadcrumb">
                            Load More&nbsp;<i class="glyphicon glyphicon-download-alt"></i>
                        </div>
                        <div class="breadcrumb loading">Loading...</div>
                                <?php }?>
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
                var options = {};
                options.maxDate = new Date();
                dateSelector(".datePicker",options);
                selectChosen();
                selectAllData(".selectAll", "selectedData");
                resetFromData(".searchForm");

                var tableOptions = {};
            
            <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['allStages'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['allStages']) {?>
            
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

                loadDataTable('#tableData', '<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['ajaxFilePath']->value,'params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
', <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['DATA_PER_PAGE'];?>
, tableOptions);

            jQuery("#progressId").change(function(){
                var progressId = $(this).val();
                
                if (progressId > 1){
                    $("#startedDate").removeAttr("disabled");
                }else{
                    $("#startedDate").val("");
                    $("#startedDate").attr("disabled", "disabled");
                }
       
                if ((progressId == 3 || progressId == 5)){
                    $("#completedDate").removeAttr("disabled");
                }else{
                    $("#completedDate").val("");
                    $("#completedDate").attr("disabled", "disabled");
                }
            });
            
            jQuery("#projectId").change(function(){
                $("#selectProject").submit();
            });
        }
    <?php echo '</script'; ?>
>
    

</body>
</html><?php }} ?>
