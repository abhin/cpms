<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-06-28 18:34:45
         compiled from "C:/xampp/htdocs/products/CPMS/view/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182605b34dceda65b01-36372457%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb910b93d8fa1c684fd6fad0b61d5651d2416507' => 
    array (
      0 => 'C:/xampp/htdocs/products/CPMS/view/login.tpl',
      1 => 1424344943,
      2 => 'file',
    ),
    'e2164140b0c3f91bc8d45bc235d32f3e6c6561e8' => 
    array (
      0 => 'C:/xampp/htdocs/products/CPMS/view/parent.tpl',
      1 => 1454725606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182605b34dceda65b01-36372457',
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
  'unifunc' => 'content_5b34dcedc44943_66525711',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b34dcedc44943_66525711')) {function content_5b34dcedc44943_66525711($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'C:\\xampp\\htdocs\\products\\CPMS\\model\\lib\\smarty/plugins/modifier.replace.php';
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
 :: Login-<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['a_TemplateData']->value['clientName'],true);?>
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
    
    
    
    
    <style>
    span.form-error {display:none !important;}
    </style> 
    

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
 src="js/jquery-ui.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/jquery.form-validator.min.js"><?php echo '</script'; ?>
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
            
            
                   
    <div>
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to IMS</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['message']['error'])) {?>alert-danger<?php } else { ?>alert-info<?php }?>">
                <?php if (isset($_smarty_tpl->tpl_vars['a_TemplateData']->value['message']['error'])) {?>
                    <?php echo $_smarty_tpl->tpl_vars['a_TemplateData']->value['message']['error'];?>

                <?php } else { ?>
                    Please login with your Username and Password.
                <?php }?>
            </div>
                <form class="form-horizontal" action="<?php echo smarty_function_actionurl(array('page'=>"login"),$_smarty_tpl);?>
" method="post" id="loginForm">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Username" data-validation="alphanumeric" data-validation-error-msg="Invalid username" data-validation-allowing="@.">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password" data-validation="required" data-validation-error-msg="Invalid password">
                    </div>
                    <div class="clearfix"></div>

                    <div class="input-prepend">
                        <label class="remember" for="remember"><input type="checkbox" id="remember"> Remember me</label>
                        &nbsp;&nbsp;&nbsp;
                        <label class="remember" for="remember">
                            <a  data-toggle="tooltip" data-original-title="Delete project." href="<?php echo smarty_function_actionurl(array('page'=>'resetpassword'),$_smarty_tpl);?>
">    
                                Reset password
                            </a>
                        </label>
                    </div>
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->

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
            validateFormWithOutServer();
        }
        <?php echo '</script'; ?>
>
    

</body>
</html><?php }} ?>
