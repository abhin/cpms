<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-14 10:53:24
         compiled from "D:/xampp/htdocs/products/CPMS/view/advances.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2866254db310d8ddc91-97584983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4005e64b8934f2bde8281245bc162e25801ecf5' => 
    array (
      0 => 'D:/xampp/htdocs/products/CPMS/view/advances.tpl',
      1 => 1423906305,
      2 => 'file',
    ),
    'a40cd3c80d8b2dea0e329420ab688f2002072872' => 
    array (
      0 => 'D:/xampp/htdocs/products/CPMS/view/parent.tpl',
      1 => 1423904424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2866254db310d8ddc91-97584983',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54db310dc0e1d1_55415226',
  'variables' => 
  array (
    'a_TemplateData' => 0,
    'errors' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54db310dc0e1d1_55415226')) {function content_54db310dc0e1d1_55415226($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include 'D:\\xampp\\htdocs\\products\\CPMS\\model\\lib\\smarty/plugins/modifier.capitalize.php';
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
    <title>CPMS :: Advances-<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['a_TemplateData']->value['clientName'],true);?>
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
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i> Add New</h2>

                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            
                        </div>
                    </div>
                        
                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['advanceData']['showForm'])) {?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(true, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(false, null, 0);?>
                    <?php }?>

                    <div class="box-content row" style="<?php if ($_smarty_tpl->tpl_vars['showForm']->value) {?>display: block;<?php } else { ?>display: none;<?php }?>">
                        <div class="col-lg-7 col-md-12">
                            <div>
                                <form action="<?php echo smarty_function_actionurl(array('page'=>'advances'),$_smarty_tpl);?>
" method="post" class="form-inline addForm">
                                <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['advanceData']['id'])&&$_smarty_tpl->tpl_vars['a_TemplateData']->value['advanceData']['id']>0) {?>
                                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['advanceData']['id'];?>
"/>
                                <?php }?>
                                <div class="form-group has-feedback">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['advanceData']['projectId'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["projectId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['advanceData']['projectId'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["projectId"] = new Smarty_variable('', null, 0);?>
                                    <?php }?>
                                    <label for="projectId" class="control-label">Project</label>
                                    <select id="projectId" name="projectId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Please select a valid project"  data-placeholder="Choose a project..."  style="display: none;" tabindex="-1">
                                        <option value=""></option>
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

                                <div class="form-group has-feedback">
                                    <label for="amount" class="control-label">Amount</label>
                                    <input type="text" id="amount" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['advanceData']['amount'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['advanceData']['amount'];
}?>' />
                                </div>
                                
                                <div class="form-group has-feedback">
                                    <label for="received_date" class="control-label">Received Date</label>
                                    <input type="text" id="received_date" name="received_date" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['advanceData']['received_date'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['advanceData']['received_date'];
}?>' autocomplete="off"/>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="-&@%_ " data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['advanceData']['notes'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['advanceData']['notes'];
}?></textarea>
                                </div>
                                <div class="form-group has-feedback" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="add_advance" value="Add"/>
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
                        
                    
                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['search_advance'])) {?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(true, null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars['showForm'] = new Smarty_variable(false, null, 0);?>
                    <?php }?>
                        
                    <div class="box-content row" style="<?php if ($_smarty_tpl->tpl_vars['showForm']->value) {?>display: block;<?php } else { ?>display: none;<?php }?>">
                        <div class="col-lg-7 col-md-12 formContainer">
                            <form action="<?php echo smarty_function_actionurl(array('page'=>'advances'),$_smarty_tpl);?>
" method="post" class="form-inline searchForm">
                                <div class="form-group has-feedback">
                                    <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['projectId'])) {?>
                                        <?php $_smarty_tpl->tpl_vars["projectId"] = new Smarty_variable($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['projectId'], null, 0);?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->tpl_vars["projectId"] = new Smarty_variable('', null, 0);?>
                                    <?php }?>
                                    <label for="projectId" class="control-label">Project</label>
                                    <select id="projectId" name="projectId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid project"  data-placeholder="Choose a project..." class="chosen-select" style="width: 390px; display: none !important;" tabindex="-1" data-validation-optional="true" >
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

                                <div class="form-group has-feedback">
                                    <label for="amount" class="control-label">Amount</label>
                                    <input type="text" id="amount" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['amount'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['amount'];
}?>' data-validation-optional="true"/>
                                </div>
                                <br/>
                                <div class="form-group has-feedback">
                                    <label for="received_date" class="control-label">Received Date</label>
                                    <input type="text" id="searchReceivedDate" name="received_date" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" value='<?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['received_date'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['received_date'];
}?>' autocomplete="off" data-validation-optional="true"/>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="-&@%_ " data-validation-error-msg="Notes field has to be an alphanumeric value" data-validation-optional="true"> <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['notes'])) {
echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['searchData']['notes'];
}?></textarea>
                                </div>
                                    <div class="form-group has-feedback" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="search_advance" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <h2><i class="glyphicon glyphicon-th-large"></i> Advances</h2>
                        <div class="box-icon">
                            
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            
                        </div>
                    </div>
                    <div class="box-content">
                        <form method="post" class="bulkForm" action="<?php echo smarty_function_actionurl(array('page'=>'advances'),$_smarty_tpl);?>
">
                            <div class="breadcrumb">
                                <div id="bulk-action" class="actions" style="border:0px solid red;width: 220px;">
                                    Bulk Action:
                                    <select name="bulkAction" class="form-control" data-validation="number" data-validation-error-msg="Please select an action">
                                        <option value="">Select</option>
                                        <option value="100">Delete</option>
                                    </select>
                                    <input class="btn btn-default btn-bulk btn-small" type="submit" name="bulk_action" value="Go"/>
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
                                    <th class="tablesorter-header" data-column="2"><div class="tablesorter-header-inner">Name</div></th>
                                    <th class="tablesorter-header" data-column="3"><div class="tablesorter-header-inner">Amount</div></th>      
                                    <th class="tablesorter-header" data-column="4"><div class="tablesorter-header-inner">Received Date</div></th>
                                    <th class="tablesorter-header" data-column="6"><div class="tablesorter-header-inner">Notes</div></th>
                                    <th class="tablesorter-header" data-column="7"><div class="tablesorter-header-inner">Actions</div></th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php if ($_smarty_tpl->tpl_vars['a_TemplateData']->value['allAdvance']) {?>
                                    <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['a_TemplateData']->value['allAdvance']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                                           <td style="width:11%"><?php echo $_smarty_tpl->tpl_vars['details']->value->Project_Name;?>
</td>
                                           <td style="width:10%"><?php echo $_smarty_tpl->tpl_vars['details']->value->amount;?>
</td>
                                           <td style="width:10%"><?php echo $_smarty_tpl->tpl_vars['details']->value->Received_Date;?>
</td>
                                           <td style="width:16.5%"><?php echo $_smarty_tpl->tpl_vars['details']->value->notes;?>
</td>
                                           <td style="width:13%">
                                               <a class="btn btn-info btn-small" href="<?php echo smarty_function_actionurl(array('page'=>'advances','params'=>array('id'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>1)),$_smarty_tpl);?>
">
                                                   <i class="glyphicon glyphicon-edit icon-white"></i>
                                                   Edit
                                               </a>
                                               <a class="btn btn-danger btn-small" href="<?php echo smarty_function_actionurl(array('page'=>'advances','params'=>array('id'=>$_smarty_tpl->tpl_vars['details']->value->id,'do'=>2)),$_smarty_tpl);?>
">
                                                   <i class="glyphicon glyphicon-trash icon-white"></i>
                                                   Delete
                                               </a>
                                           </td>
                                         </tr>
                                      <?php } ?>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="8" style="font-size: 14px; font-weight: bold; text-align: center; padding: 10px;"> 
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
            $(".tablesorter").tablesorter({headers: {0: { sorter: false}, 6: { sorter: false}}, cssHeader:{}});
            selectAllData(".selectAll", "selectedData");
            resetFromData(".resetFormData", ".searchForm");
        });
    <?php echo '</script'; ?>
>
    

</body>
</html><?php }} ?>
