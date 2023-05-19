{extends file="parent.tpl"}
{block  name="title" prepend}Login{/block}
{block  name="css" prepend}
{/block}
{block name="cssScript"}
    {literal}
    <style>
    span.form-error {display:none !important;}
    </style> 
    {/literal}
{/block}
{block  name="jsFileTop" prepend}
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.form-validator.min.js"></script>
{/block}
{block name="header"}{/block}
{block name="left"}{/block}
{block name="content"}   
    <div>
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to IMS</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert {if isset($a_TemplateData['message']['error'])}alert-danger{else}alert-info{/if}">
                {if isset($a_TemplateData['message']['error'])}
                    {$a_TemplateData['message']['error']}
                {else}
                    Please login with your Username and Password.
                {/if}
            </div>
                <form class="form-horizontal" action="{actionurl page="login"}" method="post" id="loginForm">
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
                            <a  data-toggle="tooltip" data-original-title="Delete project." href="{actionurl page='resetpassword'}">    
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
{/block}
{block name="jsScriptBottoom"}
    {literal}
        <script>
        function init(){
            validateFormWithOutServer();
        }
        </script>
    {/literal}
{/block}
