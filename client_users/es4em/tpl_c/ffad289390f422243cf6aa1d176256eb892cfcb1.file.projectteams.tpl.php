<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-07-02 10:00:34
         compiled from "C:/xampp/htdocs/products/CPMS/view/projectteams.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99045b39aa6a204ec7-41904510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffad289390f422243cf6aa1d176256eb892cfcb1' => 
    array (
      0 => 'C:/xampp/htdocs/products/CPMS/view/projectteams.tpl',
      1 => 1454837632,
      2 => 'file',
    ),
    'e2164140b0c3f91bc8d45bc235d32f3e6c6561e8' => 
    array (
      0 => 'C:/xampp/htdocs/products/CPMS/view/parent.tpl',
      1 => 1454725606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99045b39aa6a204ec7-41904510',
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
  'unifunc' => 'content_5b39aa6b95b0e0_27190074',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b39aa6b95b0e0_27190074')) {function content_5b39aa6b95b0e0_27190074($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'C:\\xampp\\htdocs\\products\\CPMS\\model\\lib\\smarty/plugins/modifier.replace.php';
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
 :: Project Teams-<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['a_TemplateData']->value['clientName'],true);?>
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
                <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['projectId'])) {?>
                    <?php $_smarty_tpl->tpl_vars["projectId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['projectId'], null, 0);?>
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
            <form action="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value,'params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
" method="post" class="form-inline addForm">
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['id']>0) {?>Update<?php } else { ?>Add New<?php }?></h2>

                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            
                        </div>
                    </div>
                        

                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['showForm'])) {?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(true, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(false, null, 0);?>
                    <?php }?>
                    <div class="box-content row" style="<?php if ($_smarty_tpl->tpl_vars['showForm']->value) {?>display: block;<?php } else { ?>display: none;<?php }?>">
                        <div class="col-lg-12 col-md-12">
                            <div>
                                <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['id']>0) {?>
                                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['id'];?>
"/>
                                <?php }?>
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['stageId'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["stageId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['projectStageId'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["projectStageId"] = new Smarty_variable(0, null, 0);?>
                                    <?php }?>
                                    <label for="projectStageId" class="control-label">Stages</label>
                                    <select id="projectStageId" name="projectStageId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid stage" data-placeholder="Choose a stage..."  data-validation-optional="true">
                                        <option value="0"></option>
                                        <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allStages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['projectStageId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['paymentData']['employeeIds'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["employeeIds"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['paymentData']['employeeIds'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["employeeIds"] = new Smarty_variable('', null, 0);?>
                                    <?php }?>
                                    <label for="employeeIds" class="control-label">
                                        Employee
                                        <a data-original-title="Eg: Salary/ Bonus/ Insentive" data-toggle="tooltip" title="">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <select id="employeeIds" name="employeeIds[]" class="form-control chosen-select" data-validation="required" data-validation-error-msg="Invalid employee(s)" data-placeholder="Choose employee(s)..."  multiple="multiple" style="height:500px;">
                                        <option value=""></option>
                                        <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allEmployees']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['employeeIds']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                    <div class="form-group col-xs-4">
                                        <label for="assignedDate" class="control-label">Assigned Date</label>
                                        <input type="text" id="assignedDate" name="assignedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['assignedDate'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['assignedDate']=="0000-00-00") {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['assignedDate'];
}?>' autocomplete="off"/>
                                    </div>
                                </div>
                                
                        <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="releasedDate" class="control-label">Released Date</label>
                                    <input type="text" id="releasedDate" name="releasedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['releasedDate'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['releasedDate']=="0000-00-00") {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['releasedDate'];
}?>' autocomplete="off" data-validation-optional="true"/>
                                </div>

                            <div class="form-group col-xs-4">
                                <label for="notes" class="control-label">Notes</label>
                                <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['notes'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['notes'];
}?></textarea>
                            </div>
                        </div>
                                    <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="add_projectTeam" value="<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['projectTeamData']['id']>0) {?>Update<?php } else { ?>Add<?php }?>"/>
                                    <input type="hidden" name="addProjectTeam"  value="Add"/>
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
                        
                    
                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['search_projectTeam'])) {?>
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
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['projectStageId'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["projectStageId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['projectStageId'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["projectStageId"] = new Smarty_variable(0, null, 0);?>
                                    <?php }?>
                                    <label for="projectStageId" class="control-label">Stages</label>
                                    <select  name="projectStageId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid stage" data-placeholder="Choose a stage..."  data-validation-optional="true">
                                        <option value="0"></option>
                                        <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allStages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['projectStageId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                    <div class="form-group col-xs-4">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['productId'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["productId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['productId'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["productId"] = new Smarty_variable(0, null, 0);?>
                                    <?php }?>
                                    <label for="productId" class="control-label">Product/ ProjectTeam Category</label>
                                    <select  name="productId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid product/projectTeam" data-placeholder="Choose a product/projectTeam..." data-validation-optional="true">
                                        <option value="0"></option>
                                        <?php  $_smarty_tpl->tpl_vars['catDataArray'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['catDataArray']->_loop = false;
 $_smarty_tpl->tpl_vars['groupName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allProducts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['catDataArray']->key => $_smarty_tpl->tpl_vars['catDataArray']->value) {
$_smarty_tpl->tpl_vars['catDataArray']->_loop = true;
 $_smarty_tpl->tpl_vars['groupName']->value = $_smarty_tpl->tpl_vars['catDataArray']->key;
?>
                                            <optgroup label="<?php echo $_smarty_tpl->tpl_vars['groupName']->value;?>
">
                                                <?php  $_smarty_tpl->tpl_vars['catDetails'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['catDetails']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['catDataArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['catDetails']->key => $_smarty_tpl->tpl_vars['catDetails']->value) {
$_smarty_tpl->tpl_vars['catDetails']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['catDetails']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['productId']->value==$_smarty_tpl->tpl_vars['catDetails']->value->id) {?>selected='selected'<?php }?>>
                                                    <?php echo $_smarty_tpl->tpl_vars['catDetails']->value->name;?>

                                                </option>
                                                <?php } ?>
                                            </optgroup>
                                        <?php } ?>
                                    </select>
                                </div>
                                    <div class="form-group col-xs-4">
                                        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['paymentData']['employeeId'])) {?>
                                            <?php $_smarty_tpl->tpl_vars["employeeId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['paymentData']['employeeId'], null, 0);?>
                                        <?php } else { ?>
                                            <?php $_smarty_tpl->tpl_vars["employeeId"] = new Smarty_variable('', null, 0);?>
                                        <?php }?>
                                        <label for="employeeId" class="control-label">
                                            Employee
                                            <a data-original-title="Eg: Salary/ Bonus/ Insentive" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select id="employeeId" name="employeeId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid employee" data-placeholder="Choose a employee...">
                                            <option value=""></option>
                                            <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allEmployees']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['employeeId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                    <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4">
                                    <label for="quantity" class="control-label">Quantity</label>
                                    <input type="text" name="quantity" class="form-control" data-validation="number" data-validation-error-msg="Invalid quantity" data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['quantity'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['quantity'];
}?>' autocomplete="off"/>
                                </div>
                                </div>
                                
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                    <label for="unitPrice" class="control-label">Unit Price</label>
                                    <div class="input-group" style="width:100% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                    <input type="text" name="unitPrice" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid price" data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['unitPrice'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['unitPrice'];
}?>' autocomplete="off"/>
                                </div>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="amount" class="control-label">Amount</label>
                                    <div class="input-group" style="width:100% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                    <input type="text" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['amount'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['amount'];
}?>' autocomplete="off"/>
                                </div>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="assignedDate" class="control-label">Purchase/  ProjectTeam Date</label>
                                    <input type="text" name="assignedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['assignedDate'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['assignedDate'];
}?>' autocomplete="off"/>
                                </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['notes'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['notes'];
}?></textarea>
                                </div>
                                </div>
                                <div class="form-group has-feedback" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="search_projectTeam" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <h2><i class="glyphicon glyphicon-th-large"></i> Project Teams</h2>
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
                                <div id="bulk-action" class="actions" style="border:0px solid red;width: 220px;">
                                    Bulk Action:
                                    <select name="bulkAction" class="form-control" data-validation="number" data-validation-error-msg="Please select an action">
                                        <option value="">Choose...</option>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['DELETE'];?>
">Delete</option>
                                        
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
                                <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['allProjectTeams']) {?>
                                    <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allProjectTeams']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['details']->key;
?>    
                                        <?php if (!isset($_smarty_tpl->tpl_vars['details']->value->id)) {
continue 1;
}?>
                                        <tr class="<?php if ($_smarty_tpl->tpl_vars['index']->value%2==0) {?>odd<?php } else { ?>even<?php }?>">
                                           <td>
                                               <input type="checkbox" name="selectedData[]" value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" />
                                           </td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->stageName;?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->employeeName;?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->assignedDateF;?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->releasedDateF;?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->notes;?>
</td>
                                           <td>
                                                <a class="btn btn-info btn-small" href="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value,'params'=>array('id'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['EDIT'],'projectId'=>$_smarty_tpl->tpl_vars['details']->value->projectId)),$_smarty_tpl);?>
">
                                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-small delete" href="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value,'params'=>array('id'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['DELETE'],'projectId'=>$_smarty_tpl->tpl_vars['details']->value->projectId)),$_smarty_tpl);?>
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
                        <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['allProjectTeams']) {?>
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
                validateFormWithOutServer();
                var options = {};
                options.maxDate = new Date();
                dateSelector(".datePicker",options);
                selectChosen();
                selectAllData(".selectAll", "selectedData");
                resetFromData(".searchForm");

                 var tableOptions = {};
            
            <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['allProjectTeams'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['allProjectTeams']) {?>
            
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
            
            jQuery("#projectId").change(function(){
                $("#selectProject").submit();
            });
        }
    <?php echo '</script'; ?>
>
    

</body>
</html><?php }} ?>
