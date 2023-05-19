<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-06-28 18:36:48
         compiled from "C:/xampp/htdocs/products/CPMS/view/employeedetails.tpl" */ ?>
<?php /*%%SmartyHeaderCode:262635b34dd688c26b7-21208023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f02510e937971e9cc23e7d381d7efb326dc8772' => 
    array (
      0 => 'C:/xampp/htdocs/products/CPMS/view/employeedetails.tpl',
      1 => 1451211538,
      2 => 'file',
    ),
    'e2164140b0c3f91bc8d45bc235d32f3e6c6561e8' => 
    array (
      0 => 'C:/xampp/htdocs/products/CPMS/view/parent.tpl',
      1 => 1454725606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '262635b34dd688c26b7-21208023',
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
  'unifunc' => 'content_5b34dd68bb5042_81543186',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b34dd68bb5042_81543186')) {function content_5b34dd68bb5042_81543186($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'C:\\xampp\\htdocs\\products\\CPMS\\model\\lib\\smarty/plugins/modifier.replace.php';
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
 :: Employee Details-<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['a_TemplateData']->value['clientName'],true);?>
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
            
            
                
        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeId'])) {?>
            <?php $_smarty_tpl->tpl_vars["employeeId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeId'], null, 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars["employeeId"] = new Smarty_variable("0", null, 0);?>
        <?php }?>
        <!-- Add new form -->
        <?php if ($_smarty_tpl->tpl_vars['employeeId']->value>0) {?>
       <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-th-large"></i> Employee Details </h2>
                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            
                        </div>
                    </div>
                    <div class="box-content">
                        <table class="table table-bordered table-striped table-condensed">
                            <tbody>
                                <tr> 
                                    <th style="width: 250px;">Name</th>  
                                    <td><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->name;?>
</td> 
                                </tr>
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Address</th>
                                  <td><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->address;?>
</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Email</th>
                                  <td><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->email;?>
</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Phone</th>
                                  <td><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->phone;?>
</td> 
                                </tr> 
                                <tr class="tablesorter-headerRow">
                                  <th>Alternative Phone</th>
                                  <td><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->alternatePhone;?>
</td> 
                                </tr> 
                                <tr class="tablesorter-headerRow">
                                  <th>Father's Name</th>
                                  <td><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->phone;?>
</td> 
                                </tr> 
                                <tr class="tablesorter-headerRow">
                                  <th>Mother's Name</th>
                                  <td><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->phone;?>
</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th style="vertical-align: middle;">Gender</th>
                                  <td >
                                        <?php if ((int)$_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->gender===$_smarty_tpl->tpl_vars['a_TemplateData']->value['MALE']) {?>
                                                Male
                                        <?php } elseif ((int)$_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->gender===$_smarty_tpl->tpl_vars['a_TemplateData']->value['FEMALE']) {?>
                                            Female
                                        <?php } else { ?>
                                            <span class="label-default label">
                                             Unknown
                                            </span>
                                        <?php }?>
                                  </td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Marital Status</th>
                                  <td>
                                      <?php if ((int)$_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->maritalStatus===$_smarty_tpl->tpl_vars['a_TemplateData']->value['MARRIED']) {?>
                                        Married
                                      <?php } elseif ((int)$_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->maritalStatus===$_smarty_tpl->tpl_vars['a_TemplateData']->value['UNMARRIED']) {?>
                                        unmarried
                                      <?php }?>
                                  </td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Salary</th>
                                  <td>
                                        <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->salaryAmount;?>

                                  </td> 
                                </tr>
                                <tr class="tablesorter-headerRow">
                                  <th>Payment Term</th>
                                  <td><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->paymentTermName;?>
</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Department</th>
                                  <td>
                                      <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->departmentName;?>

                                  </td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Designation</th>
                                  <td>
                                    <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->designationName;?>

                                  </td> 
                                </tr>
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Employment Type</th>
                                  <td><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->employmentTypeName;?>
</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Qualification</th>
                                  <td><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->qualificationNames;?>
</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Join Date</th>
                                  <td>
                                      <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->joinDateFormatted)) {?>
                                          <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->joinDateFormatted;?>

                                     <?php }?>
                                  </td> 
                                </tr> 
                                <tr class="tablesorter-headerRow">
                                  <th>Releave Date</th>
                                  <td>
                                      <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->releaveDateFormatted)&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->releaveDateFormatted) {?>
                                          <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->releaveDateFormatted;?>

                                     <?php }?>
                                  </td> 
                                </tr> 
                                <tr class="tablesorter-headerRow">
                                  <th>Notes</th>
                                  <td><?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->notes;?>
</td> 
                                </tr> 
                                <tr class="tablesorter-headerRow">
                                  <th>Status</th>
                                  <td>
                                      <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->status==$_smarty_tpl->tpl_vars['a_TemplateData']->value['ACTIVE']) {?>
                                            <span class="label-default label label-success">
                                                <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value["dataStatus"][$_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->status];?>

                                            </span>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->status==$_smarty_tpl->tpl_vars['a_TemplateData']->value['INACTIVE']) {?>
                                            <span class="label-default label">
                                             <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value["dataStatus"][$_smarty_tpl->tpl_vars['a_TemplateData']->value['employeeData']->status];?>

                                            </span>
                                        <?php } else { ?>
                                            <span class="label-default label label-danger">
                                             <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value["dataStatus"][0];?>

                                            </span>
                                        <?php }?>
                                  </td> 
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-th-large"></i> Payments</h2>
                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="showHideColumns">
                            <div class="btn-group">
                                <?php  $_smarty_tpl->tpl_vars['head'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['head']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['thead']['payment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                        <table id="paymentTableData" class="display" cellspacing="0" width="100%" data-order='[[ 1, "asc" ]]'>
                            <thead>
                              <tr class="tablesorter-headerRow">
                                <?php  $_smarty_tpl->tpl_vars['head'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['head']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['thead']['payment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                                <?php  $_smarty_tpl->tpl_vars['head'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['head']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['thead']['payment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['head']->key => $_smarty_tpl->tpl_vars['head']->value) {
$_smarty_tpl->tpl_vars['head']->_loop = true;
?>
                                    <th><?php echo $_smarty_tpl->tpl_vars['head']->value['name'];?>
</th>
                                <?php } ?>
                              </tr>
                            </tfoot>
                                <tbody>
                                <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['allPayments']) {?>
                                    <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allPayments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['details']->key;
?>    
                                        <tr class="<?php if ($_smarty_tpl->tpl_vars['index']->value%2==0) {?>odd<?php } else { ?>even<?php }?>">
                                            <td><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value->employeeName;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value->amount;?>
</td>
                                            <td>
                                                <?php if ($_smarty_tpl->tpl_vars['details']->value->salaryMonth&&$_smarty_tpl->tpl_vars['details']->value->salaryMonth!="0000-00") {?>
                                                <?php echo $_smarty_tpl->tpl_vars['details']->value->salaryMonthF;?>

                                                <?php }?>
                                            </td>
                                            <td>
                                                 <?php if ((int)$_smarty_tpl->tpl_vars['details']->value->isItSalary===1) {?>
                                                    Salary
                                                 <?php } else { ?>
                                                     <?php echo $_smarty_tpl->tpl_vars['details']->value->paymentType;?>

                                                 <?php }?>
                                            </td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value->paymentMethod;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value->paymentTerm;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value->totalHours;?>
</td>
                                            <td>
                                                <?php if ($_smarty_tpl->tpl_vars['details']->value->salaryDateStartF&&$_smarty_tpl->tpl_vars['details']->value->salaryDateStartF!="0000-00-00") {?>
                                                    <?php echo $_smarty_tpl->tpl_vars['details']->value->salaryDateStartF;?>

                                                 <?php }?>
                                            </td>
                                            <td>
                                                <?php if ($_smarty_tpl->tpl_vars['details']->value->salaryDateEndF&&$_smarty_tpl->tpl_vars['details']->value->salaryDateEndF!="0000-00-00") {?>
                                                 <?php echo $_smarty_tpl->tpl_vars['details']->value->salaryDateEndF;?>

                                                <?php }?>
                                             </td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value->receiptNo;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value->paymentDateF;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value->notes;?>
</td>
                                          </tr>
                                      <?php } ?>
                                    <?php }?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
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
       function init() {
            var paymentTableOptions = {};
            
            <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['allPayments'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['allPayments']) {?>
            
                paymentTableOptions.columns = [<?php  $_smarty_tpl->tpl_vars['head'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['head']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['thead']['payment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                

                paymentTableOptions.order = [[0, 'asc']];

                loadDataTable('#paymentTableData', "", 0, paymentTableOptions);
        }
    <?php echo '</script'; ?>
>
    

</body>
</html><?php }} ?>
