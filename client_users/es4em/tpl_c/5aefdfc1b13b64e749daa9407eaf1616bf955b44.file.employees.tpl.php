<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-06-28 18:36:38
         compiled from "C:/xampp/htdocs/products/CPMS/view/employees.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40215b34dd5e5f67d0-87381907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5aefdfc1b13b64e749daa9407eaf1616bf955b44' => 
    array (
      0 => 'C:/xampp/htdocs/products/CPMS/view/employees.tpl',
      1 => 1453822564,
      2 => 'file',
    ),
    'e2164140b0c3f91bc8d45bc235d32f3e6c6561e8' => 
    array (
      0 => 'C:/xampp/htdocs/products/CPMS/view/parent.tpl',
      1 => 1454725606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40215b34dd5e5f67d0-87381907',
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
  'unifunc' => 'content_5b34dd5ecb2102_74367169',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b34dd5ecb2102_74367169')) {function content_5b34dd5ecb2102_74367169($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'C:\\xampp\\htdocs\\products\\CPMS\\model\\lib\\smarty/plugins/modifier.replace.php';
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
 :: Employees-<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['a_TemplateData']->value['clientName'],true);?>
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
            
            
                
    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['id']>0) {?>
        <?php $_smarty_tpl->tpl_vars['employeeId'] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['id'], null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars['employeeId'] = new Smarty_variable(0, null, 0);?>
    <?php }?>
    <form action="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value,'params'=>array("id"=>$_smarty_tpl->tpl_vars['employeeId']->value)),$_smarty_tpl);?>
" method="post" class="form-inline addForm" enctype="multipart/form-data">
        <!-- Add new form -->
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i> <?php if ($_smarty_tpl->tpl_vars['employeeId']->value>0) {?>Update<?php } else { ?>Add New<?php }?></h2>

                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            
                        </div>
                    </div>
                        
                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['showForm'])) {?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(true, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(false, null, 0);?>
                    <?php }?>

                    <div class="box-content row" style="<?php if ($_smarty_tpl->tpl_vars['showForm']->value) {?>display: block;<?php } else { ?>display: none;<?php }?>">
                        <div class="col-lg-12 col-md-12">
                            <div>
                                <div class="col-xs-12">
                                    <h3>Personal Details</h3>
                                </div>
                                <div class="col-xs-12">
                                <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['allBranches']) {?>
                                <div class="form-group col-xs-4">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['branchId'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["branchId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['branchId'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["branchId"] = new Smarty_variable('', null, 0);?>
                                    <?php }?>
                                    <label for="branchId" class="control-label">Branches</label>
                                    <select id="branchId" name="branchId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid branch" data-placeholder="Choose a branch...">
                                        <option value=""></option>
                                        <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allBranches']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['branchId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php }?>
                                <div class="form-group col-xs-4">
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" data-validation="alphanumeric server" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-url="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['ajaxFilePath']->value,'params'=>array("do"=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['VALIDATE'],"id"=>$_smarty_tpl->tpl_vars['employeeId']->value)),$_smarty_tpl);?>
" data-validation-error-msg="Alphanumeric values only" placeholder="Employee name" value="<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['name'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['name'];
}?>">
                                </div>

                                <div class="form-group col-xs-4">
                                    <label for="address" class="control-label">Address</label>
                                    <textarea id="address" name="address" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['address'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['address'];
}?></textarea>
                                </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="email" class="control-label">
                                        Email
                                    </label>
                                    <input type="text" id="email" name="email" class="form-control" data-validation="email server" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-url="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['ajaxFilePath']->value,'params'=>array("do"=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['VALIDATE'],"id"=>$_smarty_tpl->tpl_vars['employeeId']->value)),$_smarty_tpl);?>
" data-validation-optional="true" data-validation-error-msg="Invalid Email" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['email'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['email'];
}?>' placeholder="Email" autocomplete="off"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="phone" class="control-label">
                                        Phone
                                    </label>
                                    <input type="text" id="phone" name="phone" class="form-control" data-validation="number length" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-length="min10" data-validation-error-msg="Invaid number" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['phone'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['phone'];
}?>' placeholder="Phone" autocomplete="off"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="alternatePhone" class="control-label">
                                        Alternate Phone
                                    </label>
                                    <input type="text" id="alternatePhone" name="alternatePhone" class="form-control" data-validation="number length" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-length="min10" data-validation-error-msg="Invaid number"  value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['alternatePhone'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['alternatePhone'];
}?>' placeholder="Alternate Phone" autocomplete="off"/>
                                </div>
                                </div>
                            <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="fatherName" class="control-label">Father Name</label>
                                    <input type="text" id="fatherName" name="fatherName" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-error-msg="Alphanumeric values only" placeholder="Father's Name" value="<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['fatherName'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['fatherName'];
}?>">
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="motherName" class="control-label">Mother Name</label>
                                    <input type="text" id="motherName" name="motherName" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-error-msg="Alphanumeric values only" placeholder="Mother's Name" value="<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['motherName'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['motherName'];
}?>">
                                </div>
                                <div class="form-group col-xs-4">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['gender'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["gender"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['gender'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["gender"] = new Smarty_variable('', null, 0);?>
                                    <?php }?>
                                    <label for="gender" class="control-label">Gender</label>
                                <select id="gender" name="gender" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid gender" data-placeholder="Choose a gender...">
                                    <option></option>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['MALE'];?>
" <?php if ($_smarty_tpl->tpl_vars['gender']->value==$_smarty_tpl->tpl_vars['a_TemplateData']->value['MALE']) {?>selected='selected'<?php }?>>
                                        Male
                                    </option>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['FEMALE'];?>
" <?php if ($_smarty_tpl->tpl_vars['gender']->value==$_smarty_tpl->tpl_vars['a_TemplateData']->value['FEMALE']) {?>selected='selected'<?php }?>>
                                        Female
                                    </option>
                                </select>
                                </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['maritalStatus'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["maritalStatus"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['maritalStatus'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["maritalStatus"] = new Smarty_variable('', null, 0);?>
                                    <?php }?>
                                    <label for="maritalStatus" class="control-label">Marital Status</label>
                                <select id="maritalStatus" name="maritalStatus" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid marital status" data-placeholder="Choose a marital status...">
                                    <option></option>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['MARRIED'];?>
" <?php if ($_smarty_tpl->tpl_vars['maritalStatus']->value==$_smarty_tpl->tpl_vars['a_TemplateData']->value['MARRIED']) {?>selected='selected'<?php }?>>
                                        Married
                                    </option>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['UNMARRIED'];?>
" <?php if ($_smarty_tpl->tpl_vars['maritalStatus']->value==$_smarty_tpl->tpl_vars['a_TemplateData']->value['UNMARRIED']) {?>selected='selected'<?php }?>>
                                        Unmarried
                                    </option>
                                </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['notes'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['notes'];
}?></textarea>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="photoLink" class="control-label">Upload Photo</label>
                                    <input type="file" name="photoLink" class="form-control" data-validation="mime size" data-validation-allowing="jpg, png, gif"  data-validation-max-size="2M" style="padding:0;">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['status'])) {?>
                                            <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['status'], null, 0);?>
                                        <?php } else { ?>
                                            <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable(1, null, 0);?>
                                        <?php }?>
                                        <label for="status" class="control-label">Status</label>
                                        <select id="status" name="status" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid status" data-placeholder="Choose a status...">
                                            <option value=""></option>
                                            <?php  $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['name']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value["dataStatus"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['name']->key => $_smarty_tpl->tpl_vars['name']->value) {
$_smarty_tpl->tpl_vars['name']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['name']->key;
?>
                                                <?php if ($_smarty_tpl->tpl_vars['id']->value!==1&&$_smarty_tpl->tpl_vars['id']->value!==2) {?>
                                                    <?php continue 1;?>
                                                <?php }?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['status']->value==$_smarty_tpl->tpl_vars['id']->value) {?>selected='selected'<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['name']->value;?>

                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <h3>Employment Details</h3>
                                </div>
                                <div class="col-xs-12">        
                                    <div class="form-group col-xs-4">
                                        <label for="salaryAmount" class="control-label">Salary Amount</label>
                                        <div class="input-group" style="width:98.5% !important;">
                                            <div class="input-group-addon">Rs.</div>
                                        <input type="text" id="	salaryAmount" name="salaryAmount" data-validation-optional="true" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid Amount" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['salaryAmount'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['salaryAmount'];
}?>' />
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['paymentTermId'])) {?>
                                            <?php $_smarty_tpl->tpl_vars["paymentTermId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['paymentTermId'], null, 0);?>
                                        <?php } else { ?>
                                            <?php $_smarty_tpl->tpl_vars["paymentTermId"] = new Smarty_variable('', null, 0);?>
                                        <?php }?>
                                        <label for="paymentTermId" class="control-label">
                                            Payment Terms
                                            <a data-original-title="Pay by Hour/ Day/ Week/ Month" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select id="paymentTermId" name="paymentTermId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid term" data-placeholder="Choose a term..." data-validation-optional="true" >
                                            <option value=""></option>
                                            <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allpaymentTerms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['paymentTermId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                    <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['departmentId'])) {?>
                                            <?php $_smarty_tpl->tpl_vars["departmentId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['departmentId'], null, 0);?>
                                        <?php } else { ?>
                                            <?php $_smarty_tpl->tpl_vars["departmentId"] = new Smarty_variable('', null, 0);?>
                                        <?php }?>
                                        <label for="departmentId" class="control-label">
                                            Department
                                            <a data-original-title="Eg: Accounts/ IT/ Reception" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select id="departmentId" name="departmentId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid department" data-placeholder="Choose a department..." data-validation-optional="true" >
                                            <option value=""></option>
                                            <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allDepartment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['departmentId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                    <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['designationId'])) {?>
                                            <?php $_smarty_tpl->tpl_vars["designationId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['designationId'], null, 0);?>
                                        <?php } else { ?>
                                            <?php $_smarty_tpl->tpl_vars["designationId"] = new Smarty_variable('', null, 0);?>
                                        <?php }?>
                                        <label for="designationId" class="control-label" data-validation-optional="true" >
                                            Designation
                                            <a data-original-title="Eg: Accountant/ Designer/ Plumber" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select id="designationId" name="designationId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid designation" data-placeholder="Choose a designation..." data-validation-optional="true" >
                                            <option value=""></option>
                                            <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allDesignation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['designationId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                    <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['employmentTypeId'])) {?>
                                            <?php $_smarty_tpl->tpl_vars["employmentTypeId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['employmentTypeId'], null, 0);?>
                                        <?php } else { ?>
                                            <?php $_smarty_tpl->tpl_vars["employmentTypeId"] = new Smarty_variable('', null, 0);?>
                                        <?php }?>
                                        <label for="employmentTypeId" class="control-label" data-validation-optional="true" >
                                            Employment Type
                                            <a data-original-title="Eg: Accountant/ Designer/ Plumber" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select id="employmentTypeId" name="employmentTypeId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid designation" data-placeholder="Choose a designation..." data-validation-optional="true" >
                                            <option value=""></option>
                                            <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allEmploymentTypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['employmentTypeId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                    <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['qualificationIds'])) {?>
                                            <?php $_smarty_tpl->tpl_vars["qualificationIds"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['qualificationIds'], null, 0);?>
                                        <?php } else { ?>
                                            <?php $_smarty_tpl->tpl_vars["qualificationIds"] = new Smarty_variable('', null, 0);?>
                                        <?php }?>
                                        <label for="qualificationIds" class="control-label" data-validation-optional="true" >
                                            Educational Qualification(s)
                                            <a data-original-title="Eg: Accountant/ Designer/ Plumber" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select id="qualificationIds" name="qualificationIds[]" class="form-control chosen-select" data-validation="required" data-validation-error-msg="Invalid qualification(s)" data-placeholder="Choose qualification(s)..." data-validation-optional="true" multiple="multiple" style="height:500px;">
                                            <option value="0"></option>
                                            <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allEducationCourse']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                                <?php  $_smarty_tpl->tpl_vars['qId'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['qId']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['qualificationIds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['qId']->key => $_smarty_tpl->tpl_vars['qId']->value) {
$_smarty_tpl->tpl_vars['qId']->_loop = true;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['qId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                        <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                                    </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="joinDate" class="control-label">Join Date</label>
                                    <input type="text" id="joinDate" name="joinDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['joinDate'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['joinDate']!="0000-00-00") {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['joinDate'];
}?>' autocomplete="off"/>
                                </div>
                                    <div class="form-group col-xs-4">
                                    <label for="releaveDate" class="control-label">Releave Date</label>
                                    <input type="text" id="releaveDate" name="releaveDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invaid date" data-validation-optional="true" <?php if ($_smarty_tpl->tpl_vars['employeeId']->value<=0) {?>disabled="disabled"<?php }?> value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['releaveDate'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['releaveDate']!="0000-00-00") {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']['releaveDate'];
}?>' autocomplete="off"/>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn"  type="submit" name="add_employee" id="addEmployee" value="<?php if ($_smarty_tpl->tpl_vars['employeeId']->value>0) {?>Update<?php } else { ?>Add<?php }?>"/>
                                    <input type="hidden" name="addEmployee" value="Add"/>
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
        <form action="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value),$_smarty_tpl);?>
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
                        
                    
                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['search_employee'])) {?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(true, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(false, null, 0);?>
                    <?php }?>
                        
                    <div class="box-content row" style="<?php if ($_smarty_tpl->tpl_vars['showForm']->value) {?>display: block;<?php } else { ?>display: none;<?php }?>">
                        <div class="col-lg-12 col-md-12 formContainer">
                                <div class="col-xs-12">
                                <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['allBranches']) {?>
                                <div class="form-group col-xs-4">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['branchId'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["branchId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['branchId'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["branchId"] = new Smarty_variable('', null, 0);?>
                                    <?php }?>
                                    <label for="branchId" class="control-label">Branches</label>
                                    <select name="branchId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid branch" data-placeholder="Choose a branch..." data-validation-optional="true">
                                        <option value=""></option>
                                        <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allBranches']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['branchId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php }?>
                                <div class="form-group col-xs-4">
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" name="name" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-optional="true" data-validation-error-msg="Alphanumeric values only" placeholder="Employee name" value="<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['name'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['name'];
}?>">
                                </div>

                                <div class="form-group col-xs-4">
                                    <label for="address" class="control-label">Address</label>
                                    <textarea name="address" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['address'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['address'];
}?></textarea>
                                </div>
                                </div>
                                
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="email" class="control-label">
                                        Email
                                    </label>
                                    <input type="text"  name="email" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-optional="true" data-validation-error-msg="Invalid Email" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['email'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['email'];
}?>' placeholder="Email" autocomplete="off"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="phone" class="control-label">
                                        Phone
                                    </label>
                                    <input type="text" name="phone" class="form-control" data-validation="number" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-length="min10" data-validation-optional="true" data-validation-error-msg="Invaid number" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['phone'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['phone'];
}?>' placeholder="Phone" autocomplete="off"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="alternatePhone" class="control-label">
                                        Alternate Phone
                                    </label>
                                    <input type="text" name="alternatePhone" class="form-control" data-validation="number" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-optional="true" data-validation-length="min10" data-validation-error-msg="Invaid number"  value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['alternatePhone'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['alternatePhone'];
}?>' placeholder="Alternate Phone" autocomplete="off"/>
                                </div>
                                </div>
                            <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="fatherName" class="control-label">Father Name</label>
                                    <input type="text" name="fatherName" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-optional="true" data-validation-error-msg="Alphanumeric values only" placeholder="Father's Name" value="<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['fatherName'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['fatherName'];
}?>">
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="motherName" class="control-label">Mother Name</label>
                                    <input type="text"  name="motherName" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-optional="true" data-validation-error-msg="Alphanumeric values only" placeholder="Mother's Name" value="<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['motherName'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['motherName'];
}?>">
                                </div>
                                <div class="form-group col-xs-4">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['gender'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["gender"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['gender'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["gender"] = new Smarty_variable('', null, 0);?>
                                    <?php }?>
                                    <label for="gender" class="control-label">Gender</label>
                                <select name="gender" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid gender" data-placeholder="Choose a gender..." data-validation-optional="true">
                                    <option value=""></option>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['MALE'];?>
" <?php if ($_smarty_tpl->tpl_vars['gender']->value==$_smarty_tpl->tpl_vars['a_TemplateData']->value['MALE']) {?>selected='selected'<?php }?>>
                                        Male
                                    </option>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['FEMALE'];?>
" <?php if ($_smarty_tpl->tpl_vars['gender']->value==$_smarty_tpl->tpl_vars['a_TemplateData']->value['FEMALE']) {?>selected='selected'<?php }?>>
                                        Female
                                    </option>
                                </select>
                                </div>
                                        </div>
                                    <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['status'])) {?>
                                            <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['status'], null, 0);?>
                                        <?php } else { ?>
                                            <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('', null, 0);?>
                                        <?php }?>
                                        <label for="status" class="control-label">Status</label>
                                        <select id="status" name="status" class="form-control chosen-select" data-validation="required number" data-validation-error-msg="Invalid status" data-validation-optional="true" data-placeholder="Choose a status...">
                                            <option value=""></option>
                                            <?php  $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['name']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value["dataStatus"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['name']->key => $_smarty_tpl->tpl_vars['name']->value) {
$_smarty_tpl->tpl_vars['name']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['name']->key;
?>
                                                <?php if ($_smarty_tpl->tpl_vars['id']->value!==1&&$_smarty_tpl->tpl_vars['id']->value!==2) {?>
                                                    <?php continue 1;?>
                                                <?php }?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['status']->value==$_smarty_tpl->tpl_vars['id']->value) {?>selected='selected'<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['name']->value;?>

                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                <div class="form-group col-xs-4">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['formValidChars'];?>
" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['notes'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['notes'];
}?></textarea>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="search_employee" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="btn btn-default btn resetForm">
                                        Clear
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <form method="post" class="bulkForm" action="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value),$_smarty_tpl);?>
">
        <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-th-large"></i> Employees</h2>
                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="breadcrumb">
                        
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
                                <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['allEmployees']) {?>
                                    <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allEmployees']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->branchName;?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->address;?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->email;?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->phone;?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->alternatePhone;?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->fatherName;?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->motherName;?>
</td>
                                           <td>
                                               <?php if ($_smarty_tpl->tpl_vars['details']->value->gender==$_smarty_tpl->tpl_vars['a_TemplateData']->value['MALE']) {?>
                                                   Male
                                               <?php } elseif ($_smarty_tpl->tpl_vars['details']->value->gender==$_smarty_tpl->tpl_vars['a_TemplateData']->value['FEMALE']) {?>
                                                   Female
                                               <?php } else { ?>
                                                   Unknown
                                               <?php }?>
                                           </td>
                                           <td>
                                               <?php if ($_smarty_tpl->tpl_vars['details']->value->maritalStatus==$_smarty_tpl->tpl_vars['a_TemplateData']->value['MARRIED']) {?>
                                                   Married
                                                <?php } elseif ($_smarty_tpl->tpl_vars['details']->value->maritalStatus==$_smarty_tpl->tpl_vars['a_TemplateData']->value['UNMARRIED']) {?>
                                                   Unmarried
                                               <?php } else { ?>
                                                   Unknown
                                               <?php }?>
                                           </td>
                                           <td>
                                               <?php if ($_smarty_tpl->tpl_vars['details']->value->status==$_smarty_tpl->tpl_vars['a_TemplateData']->value['ACTIVE']) {?>
                                                   <span class="label-default label label-success">
                                                       <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value["dataStatus"][$_smarty_tpl->tpl_vars['details']->value->status];?>

                                                   </span>
                                               <?php } elseif ($_smarty_tpl->tpl_vars['details']->value->status==$_smarty_tpl->tpl_vars['a_TemplateData']->value['INACTIVE']) {?>
                                                   <span class="label-default label">
                                                    <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value["dataStatus"][$_smarty_tpl->tpl_vars['details']->value->status];?>

                                                   </span>
                                               <?php } else { ?>
                                                   <span class="label-default label label-danger">
                                                    <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value["dataStatus"][0];?>

                                                   </span>
                                               <?php }?>
                                           </td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->notes;?>
</td>
                                           <td><?php echo $_smarty_tpl->tpl_vars['details']->value->addedDate;?>
</td>
                                           <td>
                                               <a class="btn btn-success btn-small" data-toggle="tooltip" data-original-title="View All Employee Details." href="<?php echo smarty_function_actionurl(array('page'=>'employeedetails','params'=>array('employeeId'=>$_smarty_tpl->tpl_vars['details']->value->id)),$_smarty_tpl);?>
" target="_blank">
                                                   <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                   View
                                               </a>
                                               <a class="btn btn-info btn-small" data-toggle="tooltip" data-original-title="Edit employee." href="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value,'params'=>array('id'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['EDIT'])),$_smarty_tpl);?>
">
                                                   <i class="glyphicon glyphicon-edit icon-white"></i>
                                                   Edit
                                               </a>
                                               <a class="btn btn-danger btn-small delete" data-toggle="tooltip" data-original-title="Delete employee." href="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value,'params'=>array('id'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>$_smarty_tpl->tpl_vars['a_TemplateData']->value['DELETE'])),$_smarty_tpl);?>
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
                        <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['allEmployees']) {?>
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
            
            <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['allEmployees'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['allEmployees']) {?>
            
                tableOptions.columns = [
                                {className: "columTextCenter", orderable: false, visible: true},
                                
                                <?php  $_smarty_tpl->tpl_vars['head'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['head']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['thead']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['head']->key => $_smarty_tpl->tpl_vars['head']->value) {
$_smarty_tpl->tpl_vars['head']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['head']->key;
?>
                                    {className: "<?php echo $_smarty_tpl->tpl_vars['head']->value['class'];?>
", orderable: <?php echo $_smarty_tpl->tpl_vars['head']->value['orderable'];?>
, visible: <?php echo $_smarty_tpl->tpl_vars['head']->value['visible'];?>
},
                                <?php } ?>
                                
                                ]; // Actions
                
                <?php }?>
                

                tableOptions.order = [[1, 'asc']];

                loadDataTable('#tableData', '<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['ajaxFilePath']->value),$_smarty_tpl);?>
', <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['DATA_PER_PAGE'];?>
, tableOptions);
               jQuery("#branchId").change(function(){
                    var branchId = $(this).val();

                    if (branchId > 1){
                        $("#joinDate").removeAttr("disabled");
                    }else{
                        $("#joinDate").val("");
                        $("#joinDate").attr("disabled", "disabled");
                    }

                    if ((branchId == 3 || branchId == 5)){
                        $("#releaveDate").removeAttr("disabled");
                    }else{
                        $("#releaveDate").val("");
                        $("#releaveDate").attr("disabled", "disabled");
                    }
                });
            
           /* $("#addEmployee").click(function(){
                alert(typeof $("#gender").val());
            });*/
            }
    <?php echo '</script'; ?>
>
    

</body>
</html><?php }} ?>
