<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3c.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black" /> 
    <meta name="robots" content="noindex, nofollow,  noarchive">
    <meta id="extViewportMeta" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="imges/favicon.ico">
    <title>{$a_TemplateData['PRODUCT_NAME']} :: {block name="title"}-{$a_TemplateData['clientName']|capitalize:true}{/block}</title>
    <link id="bs-css" href="../../css/jquery-ui.css" rel="stylesheet">
{*        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">*}
{*        <link id="bs-css" href="../../css/theme/default.css" rel="stylesheet">*}
        <link id="bs-css" href="../../css/bootstrap.min.css" rel="stylesheet">
        <link id="bs-css" href="../../css/bootstrap-theme.min.css" rel="stylesheet">
        <link id="bs-css" href="../../css/jquery.dataTables.css" rel="stylesheet">
    {block name="css"}
        <link href='../../js/chosen/chosen.min.css' rel='stylesheet'>
        <link href="../../css/main1.css" rel="stylesheet">
{*        <link href="../../css/tooltip.css" rel="stylesheet">*}
        <link href='../../css/tbs.css' rel='stylesheet'>
        <link href="../../css/main.css" rel="stylesheet">
    {/block}
    
    {block name="cssScript"}
    {/block}
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/jquery-ui.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.dataTables.min.js"></script>
    {block name="jsFileTop"}
        <script src="../../js/jquery.form-validator.min.js"></script>
        <script src="../../js/jquery.autogrow-textarea.js"></script>
        <script src="../../js/chosen/chosen.jquery.min.js"></script>
        <script src="../../js/TableSorter.js"></script>
        <script src="../../js/main.js"></script>
    {/block}
    {block name="jsScriptTop"}
    {/block}
</head>
<body>
    {block name="header"}
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-inner">
            {block name="topmenu"}
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <a class="navbar-brand" href="{actionurl page=$a_TemplateData['HOME_PAGE']}"> 
                {*                <img alt="IMS" src="img/logo20.png" class="hidden-xs"/>*}
                <span style="color:#177EE5">{$a_TemplateData['PRODUCT_NAME']}-{$a_TemplateData['clientName']|capitalize:true}</span>
            </a>
            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" id="profileButton">
                     Hi!&nbsp;
                    <i class="glyphicon glyphicon-user"></i>
                    <span class="hidden-sm hidden-xs">
                       {$a_TemplateData['SESSION']['userDisplayName']}&nbsp;({$a_TemplateData['SESSION']['userTypeName']})
                    </span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="profileMenu">
                    <li><a href="{actionurl page='users'}">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="{actionurl page='logout'}">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            {*<div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>*}
            <!-- theme selector ends -->

            {*<ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="#"><i class="glyphicon glyphicon-globe"></i> Visit Web Site</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Dropdown <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                <li>
                    <form class="navbar-search pull-left">
                        <input placeholder="Search" class="search-query form-control col-md-10" name="query"
                               type="text">
                    </form>
                </li>
            </ul> *} 
        <!-- topbar ends -->
        {/block}
        </div>
    </div>
    {/block}
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
            {block name="left"}
            <!-- left menu starts -->
            <div class="col-sm-2 col-lg-2" >
                <div class="sidebar-nav">
                    <div class="nav-canvas">
                        <div class="nav-sm nav nav-stacked">
                        </div>
                        <ul class="nav nav-pills nav-stacked main-menu">
{*                            <li class="nav-header">Menu</li>*}
                            {if $a_TemplateData['HOME_PAGE'] == "home"}
                            <li>
                                <a href="{actionurl page='home'}">
                                    <i class="glyphicon glyphicon-home"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            {/if}
                        </ul>
                        {if $a_TemplateData['SESSION']['userType'] == 1}
                            <ul class="nav nav-pills nav-stacked main-menu">
                                <li class="nav-header">Super Admin Menu</li>
                                <li>
                                    <a href="{actionurl page='users'}">
                                        <i class="glyphicon glyphicon-user"></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                                <li>
                                <a href="{actionurl page='paymentterms'}">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Payment Terms</span>
                                </a>
                            </li>
                            </ul>
                        {/if}
                        {block name="leftMenu"}
                        <ul class="nav nav-pills nav-stacked main-menu">
                            <li class="nav-header">Project Mangement</li>
                            <li>
                                <a href="{actionurl page='projects'}">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Projects</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='advances'}">
                                    <i class="glyphicon glyphicon-calendar"></i>
                                    <span>Advances</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='stages'}">
                                    <i class="glyphicon glyphicon-signal"></i>
                                    <span>Project Stages</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='expenses'}">
                                    <i class="glyphicon glyphicon-globe"></i>
                                    <span>Project Expenses</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='products'}">
                                    <i class="glyphicon glyphicon-star"></i>
                                    <span>Products/ Expense  Categories</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-pills nav-stacked main-menu">
                            <li class="nav-header">Transcations</li>
                            <li>
                                <a href="{actionurl page='addsales'}">
                                    <i class="glyphicon glyphicon-tag"></i>
                                    <span>Add Sales</span>
                                </a>
                            </li>
                            {*<li>
                                <a href="{actionurl page='materialsbilling'}">
                                    <i class="glyphicon glyphicon-tags"></i>
                                    <span>Materials Billing</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='salesreturns'}">
                                    <i class="glyphicon glyphicon-backward"></i>
                                    <span>Sales Returns</span>
                                </a>
                            </li>*}
                            <li>
                                <a href="{actionurl page='damageditem'}">
                                    <i class="glyphicon glyphicon-fire"></i>
                                    <span>Damaged Item</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='salesinvoices'}">
                                    <i class="glyphicon glyphicon-filter"></i>
                                    <span>Sales Invoices</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-pills nav-stacked main-menu">
                            <li class="nav-header">Reports</li>
                            <li>
                                <a href="{actionurl page='purchases'}">
                                    <i class="glyphicon glyphicon-signal"></i>
                                    <span>Purchase Report</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='salesreport'}">
                                    <i class="glyphicon glyphicon-signal"></i>
                                    <span>Sales Report</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='stockreport'}">
                                    <i class="glyphicon glyphicon-signal"></i>
                                    <span>Stock Report</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='returnreport'}">
                                    <i class="glyphicon glyphicon-signal"></i>
                                    <span>Return Report</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-pills nav-stacked main-menu">
                            <li class="nav-header  accordion">Admin Settings</li>
                            <li>
                                <a href="{actionurl page='accountheads'}">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Account Heads</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='accounttypes'}">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Account Types</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='pricemargintypes'}">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Price Margin Types</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='bankdetails'}">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Bank Details</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='buyers'}">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Buyers</span>
                                </a>
                            </li>
                            {*<li>
                                <a href="{actionurl page='databasebackup'}">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Database Backup</span>
                                </a>
                            </li>*}
                            <li>
                                <a href="{actionurl page='financialyears'}">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Financial Years</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='measuringunits'}">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Measuring Units</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='paymentmethods'}">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Payment Methods</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='pricemarginsettings'}">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Price Margin Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='products'}">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Products</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='purchases'}">
                                    <i class="glyphicon glyphicon-signal"></i>
                                    <span>Purchase </span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='stocks'}">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Stocks</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='suppliers'}">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Suppliers</span>
                                </a>
                            </li>
                            <li>
                                <a href="{actionurl page='taxes'}">
                                    <i class="glyphicon glyphicon-th"></i>
                                    <span>Taxes</span>
                                </a>
                            </li>
                        </ul>
                        {/block}
                    </div>
                </div>
            </div>
            
            <div id="content" class="col-lg-10 col-sm-10">
            <!--/span-->
            {* Error messages *}
            {if $a_TemplateData['errorMessage']}
                <div class="alert alert-danger" style="text-align: center;">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <h4 class="alert-heading">Warning!</h4>
                    <p>
                        {foreach $a_TemplateData['errorMessage'] as $errors}
                            * {$errors}<br/>
                        {/foreach}
                    </p>
                </div>
            {else if $a_TemplateData['message'] && isset($a_TemplateData['message']['error'])}
                <div class="alert alert-danger" style="text-align: center;">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <h4 class="alert-heading">Error!! {$a_TemplateData['message']['error']}</h4>
                </div>
            {else if $a_TemplateData['message'] && $a_TemplateData['message']['success']}
                <div class="alert alert-success" style="text-align: center;">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <h4 class="alert-heading">{$a_TemplateData['message']['success']}</h4>
                </div>
            {/if}
            </div>
            <!-- left menu ends -->
            <div id="content" class="col-lg-10 col-sm-10">
            {/block}
            
                {block name="content"}
                {/block}
            <!-- content ends -->
            </div><!--/#content.col-md-0-->
        </div><!--/fluid-row-->

        {block name="footer"}
        <hr>
        <footer class="row">
            <p class="col-md-9 col-sm-9 col-xs-12 copyright">
                &copy; <a href="http://www.es4em.com">ES4EM Technologies</a> 2014 - {'Y'|date}
            </p>

            <p class="col-md-3 col-sm-3 col-xs-12 powered-by">
                An <a href="http://www.es4em.com">ES4EM Technologies</a> Product
            </p>
        </footer>
        {/block}
    </div><!--/.fluid-container-->
    {block name="jsFilesBottoom"}

    {/block }
    {block name="jsScriptBottoom"}

    {/block}
</body>
</html>