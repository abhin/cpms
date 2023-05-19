<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-02-07 14:13:03
         compiled from "D:/xampp/htdocs/products/cpms/view/paylabourwages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3141056b5ab022b1750-51541158%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '833de7945561e540de8b531c1b41cbf380089ab9' => 
    array (
      0 => 'D:/xampp/htdocs/products/cpms/view/paylabourwages.tpl',
      1 => 1454834518,
      2 => 'file',
    ),
    'a40cd3c80d8b2dea0e329420ab688f2002072872' => 
    array (
      0 => 'D:/xampp/htdocs/products/cpms/view/parent.tpl',
      1 => 1454725606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3141056b5ab022b1750-51541158',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56b5ab02722a68_56054155',
  'variables' => 
  array (
    'a_TemplateData' => 0,
    'loggtedUserType' => 0,
    'errors' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56b5ab02722a68_56054155')) {function content_56b5ab02722a68_56054155($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'D:\\xampp\\htdocs\\products\\CPMS\\model\\lib\\smarty/plugins/modifier.replace.php';
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
            
            
                
        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['payWageData']['projectId'])) {?>
            <?php $_smarty_tpl->tpl_vars["projectId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['payWageData']['projectId'], null, 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars["projectId"] = new Smarty_variable("0", null, 0);?>
        <?php }?>
        
        <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['allLabourWages']['totalWages'])) {?>
           <?php $_smarty_tpl->tpl_vars['totalWages'] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['allLabourWages']['totalWages'], null, 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars['totalWages'] = new Smarty_variable(0, null, 0);?>;
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['projectId']->value>0) {?>
        <!-- Add new form -->
        <form action="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value,'params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value,'totalWages'=>$_smarty_tpl->tpl_vars['totalWages']->value)),$_smarty_tpl);?>
" method="post" class="form-inline addForm"  style="text-align: center;">
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['payWageData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['payWageData']['id']>0) {?>
                        <?php $_smarty_tpl->tpl_vars['labourWageId'] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['payWageData']['id'], null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['labourWageId'] = new Smarty_variable(0, null, 0);?>
                    <?php }?>
                    <div class="box-header well" onclick="return false;">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['payWageData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['payWageData']['id']>0) {?>Edit<?php } else { ?>Add New<?php }?></h2>
                        
                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            
                        </div>
                    </div>
                        
                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['payWageData']['showForm'])) {?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(true, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(false, null, 0);?>
                    <?php }?>
                    <div class="box-content row" style="<?php if ($_smarty_tpl->tpl_vars['showForm']->value) {?>display: block;<?php } else { ?>display: none;<?php }?>">
                        <div class="col-lg-12 col-md-12">
                            <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="receiptNo">
                                        Receipt Number
                                        <a data-toggle="tooltip" title="Eg: Voucher/ Cheque/ Transaction Number">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" name="receiptNo" class="form-control" data-validation="required" data-validation-error-msg="Receipt number required" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['payWageData']['receiptNo'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['payWageData']['receiptNo'];
}?>' autocomplete="off" placeholder="Voucher/ Cheque/ Transaction Number"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="paymentDate" class="control-label">
                                        Payment/ Receipt Date
                                        <a data-toggle="tooltip" title="Date of payment made">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="paymentDate" name="paymentDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invaid date" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['payWageData']['paymentDate'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['payWageData']['paymentDate']!="0000-00-00") {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['payWageData']['paymentDate'];
}?>' autocomplete="off" placeholder="Date of payment made"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="amount" class="control-label">Amount</label>
                                    <div class="input-group" style="width:98.5% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                        <input type="text" id="amount" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" value='<?php echo $_smarty_tpl->tpl_vars['totalWages']->value;?>
' disabled="disabled" />
                                    </div>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-primary" id='addLabourWage'  type="submit" name="add_labourWage" value="<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['payWageData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['payWageData']['id']>0) {?>Save<?php } else { ?>Add<?php }?>"/>&nbsp;&nbsp;&nbsp;
                                    <input type="hidden" name="addLabourWage" value="Add"/>
                                    <a class="btn btn-default resetFormData" type="reset" href="<?php echo smarty_function_actionurl(array('page'=>$_smarty_tpl->tpl_vars['actionPage']->value),$_smarty_tpl);?>
">Clear</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                       <h2><i class="glyphicon glyphicon-th-large"></i> Unpaid Labour Wages</h2>
                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="col-lg-12">
                            <div class="breadcrumb col-lg-12" style="text-align: center; ">
                                Wage(s) Total: <i class="fa fa-inr"></i> <span id="totalAmount">0</span>
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
                                                <input type="hidden" name="totalWages" value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['allLabourWages']['totalWages'];?>
"/>
                                                <?php continue 1;?>
                                            <?php }?>
                                            <tr style="background-color:#1794E1; color:#FFFFFF; font-weight:bold; font-size:14px;">
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
                                                <?php } elseif (intval($_smarty_tpl->tpl_vars['details']->value->paidStatus)===$_smarty_tpl->tpl_vars['a_TemplateData']->value['PAID']) {?>
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
                                               <td>
                                                   <?php if (intval($_smarty_tpl->tpl_vars['details']->value->paidStatus)===$_smarty_tpl->tpl_vars['a_TemplateData']->value['PAID']) {?>
                                                        <span class="label-default label label-success">
                                                            Paid
                                                        </span>
                                                    <?php } elseif (intval($_smarty_tpl->tpl_vars['details']->value->paidStatus)===$_smarty_tpl->tpl_vars['a_TemplateData']->value['UNPAID']) {?>
                                                        <span class="label-default label">
                                                            Unpaid
                                                        </span>
                                                    <?php } else { ?>
                                                        <span class="label-default label label-danger">
                                                         Unknown
                                                        </span>
                                                    <?php }?>
                                               </td>
                                             </tr>
                                          <?php } ?>
                                        <?php } ?>
                                        <?php }?>
                                    </tbody>
                                </table>
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
                


                loadDataTable('#tableData','', 0, tableOptions);
                
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
            
            selectSpecificDateData();
            $(".selectAll").trigger("click");
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
    <?php echo '</script'; ?>
>
    

</body>
</html><?php }} ?>
