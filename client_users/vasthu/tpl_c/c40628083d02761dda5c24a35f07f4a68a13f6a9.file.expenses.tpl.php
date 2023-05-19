<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-14 10:53:28
         compiled from "D:/xampp/htdocs/products/CPMS/view/expenses.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2730154db29a0707553-45144455%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c40628083d02761dda5c24a35f07f4a68a13f6a9' => 
    array (
      0 => 'D:/xampp/htdocs/products/CPMS/view/expenses.tpl',
      1 => 1423906532,
      2 => 'file',
    ),
    'a40cd3c80d8b2dea0e329420ab688f2002072872' => 
    array (
      0 => 'D:/xampp/htdocs/products/CPMS/view/parent.tpl',
      1 => 1423904424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2730154db29a0707553-45144455',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54db29a0ba02f8_92805270',
  'variables' => 
  array (
    'a_TemplateData' => 0,
    'errors' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54db29a0ba02f8_92805270')) {function content_54db29a0ba02f8_92805270($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include 'D:\\xampp\\htdocs\\products\\CPMS\\model\\lib\\smarty/plugins/modifier.capitalize.php';
if (!is_callable('smarty_function_actionurl')) include 'D:/xampp/htdocs/products/CPMS/client_users/vasthu/../../plugin/function.actionurl.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3c.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black" /> 
    <meta name="robots" content="noindex, nofollow,  noarchive">
    <meta id="extViewportMeta" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="imges/favicon.ico">
    <title>CPMS :: Expenses-<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['a_TemplateData']->value['clientName'],true);?>
</title>
    <link id="bs-css" href="../../css/jquery-ui.css" rel="stylesheet">

        <link id="bs-css" href="../../css/theme/default.css" rel="stylesheet">
    

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
                
                <span style="color:#177EE5">CPMS-<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['a_TemplateData']->value['clientName'],true);?>
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
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            
            <!-- theme selector ends -->

             
        <!-- topbar ends -->
        
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
                        <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['SESSION']['userType']==1) {?>
                            <ul class="nav nav-pills nav-stacked main-menu">
                                <li class="nav-header">Super Admin Menu</li>
                                <li>
                                    <a href="<?php echo smarty_function_actionurl(array('page'=>'users'),$_smarty_tpl);?>
">
                                        <i class="glyphicon glyphicon-star"></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                            </ul>
                        <?php }?>
                        
                        <ul class="nav nav-pills nav-stacked main-menu">
                            <li class="nav-header">Menu</li>
                            <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['HOME_PAGE']=="home") {?>
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'home'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-home"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            <?php }?>
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
                            <li>
                                <a href="<?php echo smarty_function_actionurl(array('page'=>'expensecategories'),$_smarty_tpl);?>
">
                                    <i class="glyphicon glyphicon-star"></i>
                                    <span>Expense  Categories</span>
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
        <div class="row">
            <div class="breadcrumb">
                <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['projectId'])) {?>
                    <?php $_smarty_tpl->tpl_vars["projectId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['projectId'], null, 0);?>
                <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars["projectId"] = new Smarty_variable("0", null, 0);?>
                <?php }?>
                <form method="post" action="<?php echo smarty_function_actionurl(array('page'=>'expenses'),$_smarty_tpl);?>
" id="selectProject">
                    <select id="projectId" name="<?php echo md5('projectId');?>
" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Please select a valid expense"  data-placeholder="Choose a project..." class="chosen-select" style="width: 390px; display: none;" tabindex="-1">
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
                </form>
            </div>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['projectId']->value>0) {?>
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['id']>0) {?>Update<?php } else { ?>Add New<?php }?></h2>

                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            
                        </div>
                    </div>
                        

                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['showForm'])) {?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(true, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(false, null, 0);?>
                    <?php }?>
                    <div class="box-content row" style="<?php if ($_smarty_tpl->tpl_vars['showForm']->value) {?>display: block;<?php } else { ?>display: none;<?php }?>">
                        <div class="col-lg-7 col-md-12">
                            <div>
                                <form action="<?php echo smarty_function_actionurl(array('page'=>'expenses','params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
" method="post" class="form-inline addForm">

                                <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['id']>0) {?>
                                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['id'];?>
"/>
                                <?php }?>
                                <div class="form-group has-feedback">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['stageId'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["stageId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['stageId'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["stageId"] = new Smarty_variable(0, null, 0);?>
                                    <?php }?>
                                    <label for="stageId" class="control-label">Stages</label>
                                    <select id="stageId" name="stageId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid stage" data-placeholder="Choose a stage..."  data-validation-optional="true">
                                        <option value="0"></option>
                                        <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allStages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['stageId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['categoryId'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["categoryId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['categoryId'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["categoryId"] = new Smarty_variable(0, null, 0);?>
                                    <?php }?>
                                    <label for="categoryId" class="control-label">Expense Category</label>
                                    <?php  $_smarty_tpl->tpl_vars['catDataArray'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['catDataArray']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allExpenseCategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['catDataArray']->key => $_smarty_tpl->tpl_vars['catDataArray']->value) {
$_smarty_tpl->tpl_vars['catDataArray']->_loop = true;
?>
                                        <?php  $_smarty_tpl->tpl_vars['catDetails'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['catDetails']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['catDataArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['catDetails']->key => $_smarty_tpl->tpl_vars['catDetails']->value) {
$_smarty_tpl->tpl_vars['catDetails']->_loop = true;
?>
                                            <input type="hidden" id="catUnitPrice_<?php echo $_smarty_tpl->tpl_vars['catDetails']->value->id;?>
" value="<?php echo $_smarty_tpl->tpl_vars['catDetails']->value->unit_price;?>
"/>
                                        <?php } ?>
                                    <?php } ?>
                                    <select id="categoryId" name="categoryId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid category" data-placeholder="Choose a category...">
                                        <option value=""></option>
                                        <?php  $_smarty_tpl->tpl_vars['catDataArray'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['catDataArray']->_loop = false;
 $_smarty_tpl->tpl_vars['groupName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allExpenseCategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['catDataArray']->key => $_smarty_tpl->tpl_vars['catDataArray']->value) {
$_smarty_tpl->tpl_vars['catDataArray']->_loop = true;
 $_smarty_tpl->tpl_vars['groupName']->value = $_smarty_tpl->tpl_vars['catDataArray']->key;
?>
                                            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['groupName']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1=='') {?>
                                                <?php  $_smarty_tpl->tpl_vars['catDetails'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['catDetails']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['catDataArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['catDetails']->key => $_smarty_tpl->tpl_vars['catDetails']->value) {
$_smarty_tpl->tpl_vars['catDetails']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['catDetails']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['categoryId']->value==$_smarty_tpl->tpl_vars['catDetails']->value->id) {?>selected='selected'<?php }?>>
                                                    <?php echo $_smarty_tpl->tpl_vars['catDetails']->value->name;?>

                                                </option>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <optgroup label="<?php echo $_smarty_tpl->tpl_vars['groupName']->value;?>
">
                                                    <?php  $_smarty_tpl->tpl_vars['catDetails'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['catDetails']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['catDataArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['catDetails']->key => $_smarty_tpl->tpl_vars['catDetails']->value) {
$_smarty_tpl->tpl_vars['catDetails']->_loop = true;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['catDetails']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['categoryId']->value==$_smarty_tpl->tpl_vars['catDetails']->value->id) {?>selected='selected'<?php }?>>
                                                        <?php echo $_smarty_tpl->tpl_vars['catDetails']->value->name;?>

                                                    </option>
                                                    <?php } ?>
                                                </optgroup>
                                            <?php }?>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="quantity" class="control-label">Quantity</label>
                                    <input type="text" id="quantity" name="quantity" class="form-control" data-validation="number" data-validation-error-msg="Invalid quantity" data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['quantity'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['quantity'];
}?>' autocomplete="off"/>
                                </div>
                                
                                <div class="form-group has-feedback">
                                    <label for="unitPrice" class="control-label">Unit Price</label>
                                    <input type="text" id="unitPrice" name="unitPrice" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid price" data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['unitPrice'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['unitPrice'];
}?>' autocomplete="off"/>
                                </div>
                                
                                <div class="form-group has-feedback">
                                    <label for="amount" class="control-label">Amount</label>
                                    <input type="text" id="amount" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['amount'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['amount'];
}?>' autocomplete="off"/>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="purchaseDate" class="control-label">Purchase Date</label>
                                    <input type="text" id="purchaseDate" name="purchaseDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['purchaseDate'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['purchaseDate'];
}?>' autocomplete="off"/>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="-&@%_ " data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['notes'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['notes'];
}?></textarea>
                                </div>
                                    <div class="form-group has-feedback" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="add_expense" value="<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['expenseData']['id']>0) {?>Update<?php } else { ?>Add<?php }?>"/>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        
                    
                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['search_expense'])) {?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(true, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(false, null, 0);?>
                    <?php }?>
                        
                    <div class="box-content row" style="<?php if ($_smarty_tpl->tpl_vars['showForm']->value) {?>display: block;<?php } else { ?>display: none;<?php }?>">
                        <div class="col-lg-7 col-md-12 formContainer">
                            <form action="<?php echo smarty_function_actionurl(array('page'=>'expenses','params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
" method="post" class="form-inline searchForm">
                                <input type="hidden" name="<?php echo md5('projectId');?>
" value="<?php echo $_smarty_tpl->tpl_vars['projectId']->value;?>
"/>
                                <div class="form-group has-feedback">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['stageId'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["stageId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['stageId'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["stageId"] = new Smarty_variable(0, null, 0);?>
                                    <?php }?>
                                    <label for="stageId" class="control-label">Stages</label>
                                    <select  name="stageId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid stage" data-placeholder="Choose a stage..."  data-validation-optional="true">
                                        <option value="0"></option>
                                        <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allStages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['stageId']->value==$_smarty_tpl->tpl_vars['details']->value->id) {?>selected='selected'<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['details']->value->name;?>

                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['categoryId'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["categoryId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['categoryId'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["categoryId"] = new Smarty_variable(0, null, 0);?>
                                    <?php }?>
                                    <label for="categoryId" class="control-label">Expense Category</label>
                                    <select  name="categoryId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid category" data-placeholder="Choose a category..." data-validation-optional="true">
                                        <option value="0"></option>
                                        <?php  $_smarty_tpl->tpl_vars['catDataArray'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['catDataArray']->_loop = false;
 $_smarty_tpl->tpl_vars['groupName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allExpenseCategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
" <?php if ($_smarty_tpl->tpl_vars['categoryId']->value==$_smarty_tpl->tpl_vars['catDetails']->value->id) {?>selected='selected'<?php }?>>
                                                    <?php echo $_smarty_tpl->tpl_vars['catDetails']->value->name;?>

                                                </option>
                                                <?php } ?>
                                            </optgroup>
                                        <?php } ?>
                                    </select>
                                </div>
                                    <br/>
                                    <br/>
                                <div class="form-group has-feedback">
                                    <label for="quantity" class="control-label">Quantity</label>
                                    <input type="text" name="quantity" class="form-control" data-validation="number" data-validation-error-msg="Invalid quantity" data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['quantity'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['quantity'];
}?>' autocomplete="off"/>
                                </div>
                                
                                <div class="form-group has-feedback">
                                    <label for="unitPrice" class="control-label">Unit Price</label>
                                    <input type="text" name="unitPrice" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid price" data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['unitPrice'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['unitPrice'];
}?>' autocomplete="off"/>
                                </div>
                                
                                <div class="form-group has-feedback">
                                    <label for="amount" class="control-label">Amount</label>
                                    <input type="text" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['amount'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['amount'];
}?>' autocomplete="off"/>
                                </div>
                                <br/>
                                <div class="form-group has-feedback">
                                    <label for="purchaseDate" class="control-label">Purchase Date</label>
                                    <input type="text" name="purchaseDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" data-validation-optional="true" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['purchaseDate'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['purchaseDate'];
}?>' autocomplete="off"/>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="-&@%_ " data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['notes'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['notes'];
}?></textarea>
                                </div>
                                <div class="form-group has-feedback" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="search_expense" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <h2><i class="glyphicon glyphicon-th-large"></i> Expenses</h2>
                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            
                        </div>
                    </div>
                    <div class="box-content">
                        <form method="post" class="bulkForm" action="<?php echo smarty_function_actionurl(array('page'=>'expenses','params'=>array('projectId'=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
">
                            <input type="hidden" name="<?php echo md5('projectId');?>
" value="<?php echo $_smarty_tpl->tpl_vars['projectId']->value;?>
"/>
                            <div class="breadcrumb">
                                <div id="bulk-action" class="actions" style="border:0px solid red;width: 220px;">
                                    Bulk Action:
                                    <select name="bulkAction" class="form-control" data-validation="number" data-validation-error-msg="Please select an action">
                                        <option value="">Choose...</option>
                                        <option value="100">Delete</option>
                                        
                                    </select>
                                    <input class="btn btn-default btn-bulk btn-small" type="submit" name="do_bulk_action" value="Go"/>
                                </div>
                            </div>
                            <table class="tablesorter tablesorter-default" border="0" cellpadding="0" cellspacing="1">
                                <thead>
                                  <tr class="tablesorter-headerRow">
                                    <th style="background:none; padding-left:8px;">
                                        All
                                        <input type="checkbox" name="selectAll" class="selectAll"/>
                                    </th>
                                    <th class="tablesorter-header" data-column="1"><div class="tablesorter-header-inner">Slno</div></th>
                                    <th class="tablesorter-header" data-column="3"><div class="tablesorter-header-inner">Stage</div></th>      
                                    <th class="tablesorter-header" data-column="4"><div class="tablesorter-header-inner">Category</div></th>
                                    <th class="tablesorter-header" data-column="5"><div class="tablesorter-header-inner">Quantity</div></th>
                                    <th class="tablesorter-header" data-column="5"><div class="tablesorter-header-inner">Unit Price</div></th>
                                    <th class="tablesorter-header" data-column="5"><div class="tablesorter-header-inner">Amount</div></th>
                                    <th class="tablesorter-header" data-column="5"><div class="tablesorter-header-inner">Purchase Date</div></th>
                                    <th class="tablesorter-header" data-column="6"><div class="tablesorter-header-inner">Notes</div></th>
                                    <th class="tablesorter-header" data-column="7"><div class="tablesorter-header-inner">Actions</div></th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['allExpenses']) {?>
                                    <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allExpenses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value) {
$_smarty_tpl->tpl_vars['details']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['details']->key;
?>    
                                        <tr class="<?php if ($_smarty_tpl->tpl_vars['index']->value%2==0) {?>odd<?php } else { ?>even<?php }?>">
                                           <td style="width:1%; text-align: center;">
                                               <input type="checkbox" name="selectedData[]" value="<?php echo $_smarty_tpl->tpl_vars['details']->value->id;?>
" />
                                           </td>
                                           <td style="width:1%; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</td>
                                           <td style="width:11%"><?php echo $_smarty_tpl->tpl_vars['details']->value->stageName;?>
</td>
                                           <td style="width:9%;"><?php echo $_smarty_tpl->tpl_vars['details']->value->categoryName;?>
</td>
                                           <td style="width:9%; text-align: right;"><?php echo $_smarty_tpl->tpl_vars['details']->value->quantity;?>
</td>
                                           <td style="width:9%; text-align: right;"><?php echo $_smarty_tpl->tpl_vars['details']->value->unitPrice;?>
</td>
                                           <td style="width:9%; text-align: right;"><?php echo $_smarty_tpl->tpl_vars['details']->value->amount;?>
</td>
                                           <td style="width:12%; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['details']->value->purchaseDate;?>
</td>
                                           <td style="width:16%"><?php echo $_smarty_tpl->tpl_vars['details']->value->notes;?>
</td>
                                           <td style="width:10%">
                                                <a class="btn btn-info btn-small" href="<?php echo smarty_function_actionurl(array('page'=>'expenses','params'=>array('id'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>1,'projectId'=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
">
                                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-small" href="<?php echo smarty_function_actionurl(array('page'=>'expenses','params'=>array('id'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>2,'projectId'=>$_smarty_tpl->tpl_vars['projectId']->value)),$_smarty_tpl);?>
">
                                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                                    Delete
                                                </a>
                                           </td>
                                         </tr>
                                      <?php } ?>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="10" style="font-size: 14px; font-weight: bold; text-align: center; padding: 10px;"> 
                                                No Data Found
                                            </td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </form>
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
        $(function() {
            $(".tablesorter").tablesorter({headers: {0: { sorter: false}, 9: { sorter: false}}, cssHeader:{}});

            selectAllData(".selectAll", "selectedData");
            resetFromData(".resetFormData", ".searchForm");
            
            jQuery("#projectId").change(function(){
                $("#selectProject").submit();
            });
            
            jQuery("#categoryId").change(calcOnchangeAmount);
            jQuery("#quantity, #unitPrice").keyup(calcOnTypeAmount);
            
            function calcOnTypeAmount(){
                var unitPrice = $("#unitPrice").val();
                var quantity = $("#quantity").val();
                
                if(quantity == "" || quantity < 0){
                    quantity = 1;
                }
                
                if(unitPrice == "" || unitPrice < 0){
                    unitPrice = 0.00;
                }
                
                var totalAmount = (unitPrice * quantity);
                $("#amount").val(totalAmount);
            }
            
            function calcOnchangeAmount()
            {
                var catId = $("#categoryId").val();
                var quantity = $("#quantity").val();
                
                if(catId > 0){
                    var unitPrice = $("#catUnitPrice_" + catId).val();
                }
                else{
                    unitPrice = 0.00;
                }
                
                if(quantity == "" || quantity < 0){
                    quantity = 1;
                }
                
                $("#unitPrice").val(unitPrice);
                var totalAmount = (unitPrice * quantity);
                $("#amount").val(totalAmount);
            }
        });
    <?php echo '</script'; ?>
>
    

</body>
</html><?php }} ?>
