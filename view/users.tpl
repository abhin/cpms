{extends file="parent.tpl"}
{block  name="title" prepend}{if $a_TemplateData['IS_SUPER_ADMIN'] === true}Users{else}Profile{/if}{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
        {if $a_TemplateData['IS_SUPER_ADMIN'] === true}
        <div class="row">
            <div class="breadcrumb" >
                <form action="{actionurl page=$actionPage}" method="post" id="client">
                        {if isset ($a_TemplateData['userData']['clientId'])}
                            {assign var="clientId" value=$a_TemplateData['userData']['clientId']}
                        {else}
                            {assign var="clientId" value=""}
                        {/if}
                        <select id="clientId" name="{"clientId"|md5}" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid client" data-placeholder="Choose a client...">
                            <option value=""></option>
                            {foreach $a_TemplateData['clients'] as $details}
                                <option value="{$details->id}" {if $clientId == $details->id}selected='selected'{/if}>
                                    {$details->name}
                                </option>
                            {/foreach}
                        </select>
                </form>
            </div>
        </div>
        {/if}
        {if ($a_TemplateData['IS_SUPER_ADMIN'] === true && isset ($a_TemplateData['userData']['clientId'])  && $a_TemplateData['userData']['clientId'] > 0) || ($a_TemplateData['IS_SUPER_ADMIN'] != true && $a_TemplateData['CLIENT_ID'] > 0)}
        <!-- Add new form -->
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" onclick="return false;">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;{if isset($a_TemplateData['userData']['id']) && $a_TemplateData['userData']['id'] > 0}Edit Profile{else}Add New{/if}</h2>

                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
                    {if isset($a_TemplateData['userData']['showForm']) || ($a_TemplateData['IS_SUPER_ADMIN'] !== true)}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
{*                        {$smarty.server.REQUEST_URI}*}
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                            <div>
                                <form action="{if $a_TemplateData['IS_SUPER_ADMIN'] === true}{actionurl page=$actionPage params=['clientId'=>$clientId]}{else}{actionurl page=$actionPage}{/if}" method="post" class="form-inline addForm">
                                {if isset($a_TemplateData['userData']['id']) &&  $a_TemplateData['userData']['id'] > 0}
                                    {assign var=userId value={$a_TemplateData['userData']['id']}}
                                    <input type="hidden" name="id" value="{$a_TemplateData['userData']['id']}"/>
                                {else}
                                    {assign var=userId value=0}
                                {/if}
                                
                                {if isset ($a_TemplateData['userData']['clientId'])}
                                     <input type="hidden" name="{"clientId"|md5}" value="{$a_TemplateData['userData']['clientId']}"/>       
                                {/if}
                                    
                                {if $a_TemplateData['IS_SUPER_ADMIN'] === true}
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                        {if isset ($a_TemplateData['userData']['userType'])}
                                            {assign var="userType" value=$a_TemplateData['userData']['userType']}
                                        {else}
                                            {assign var="userType" value=""}
                                        {/if}
                                        <label for="userType" class="control-label">User Type</label>
                                        <select id="userType" name="userType" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid user type" data-placeholder="Choose a type...">
                                            <option value=""></option>
                                            {foreach $a_TemplateData['userTypes'] as $details}
                                                <option value="{$details->id}" {if $userType == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                        
                                    <div class="form-group col-xs-4">
                                        {if isset ($a_TemplateData['userData']['status'])}
                                            {assign var="status" value=$a_TemplateData['userData']['status']}
                                        {else}
                                            {assign var="status" value=""}
                                        {/if}
                                        <label for="status" class="control-label">User Status</label>
                                        <select id="status" name="status" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid status" data-placeholder="Choose a status...">
                                            <option value=""></option>
                                            <option value="1" {if $status == 1}selected='selected'{/if}>
                                                Active
                                            </option>
                                            <option value="2" {if $status == 2}selected='selected'{/if}>
                                                Inactive
                                            </option>
                                        </select>
                                    </div>
                                {/if}
                                
                                <div class="form-group col-xs-4">
                                    <label for="username" class="control-label">
                                        Username&nbsp;
                                        <a data-toggle="tooltip" title="Used for login Only alphanumeric charcters and '_' allowed.">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="username" name="username" class="form-control" data-validation="alphanumeric server" data-validation-allowing="_"  data-validation-url="{actionurl  page=$ajaxFilePath params=["do"=>$a_TemplateData['VALIDATE'], "id"=>{$userId}, "clientId"=>$clientId]}" data-validation-error-msg="Alphanumeric values only" value="{if isset($a_TemplateData['userData']['username'])}{$a_TemplateData['userData']['username']}{/if}">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                {if $a_TemplateData['IS_SUPER_ADMIN'] === true}
                                <div class="form-group col-xs-4">
                                    <label for="password" class="control-label">Password</label>
                                    <input type="text" id="password" name="password" class="form-control" autocomplete="off" />
                                </div>
                                {/if}
                                {*<div class="form-group col-xs-4">
                                    <label for="confirmPassword" class="control-label">Confirm Password</label>
                                    <input type="password" id="confirmPassword" name="password" data-validation="confirmation length" data-validation-error-msg="Passwords are note match" class="form-control" data-validation-length="min5" data-validation-error-msg="Min 5 Chars requirred" autocomplete="off"/>
                                </div>*}

                                <div class="form-group col-xs-4">
                                    <label for="email" class="control-label">
                                        Email
                                        <a data-toggle="tooltip" title="Email using for password recovery and login">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="email" name="email" class="form-control" data-validation="email server" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-url="{actionurl  page=$ajaxFilePath params=["do"=>$a_TemplateData['VALIDATE'], "id"=>{$userId}, "clientId"=>$clientId]}" data-validation-error-msg="Invalid Email" data-validation-optional="true" value='{if isset($a_TemplateData['userData']['email'])}{$a_TemplateData['userData']['email']}{/if}' autocomplete="off"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="phoneNumber" class="control-label">
                                        Phone
                                        <a data-toggle="tooltip" title="Only number, +, - and space allowed">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" data-validation="alphanumeric length" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-length="min10" data-validation-error-msg="Invaid number" data-validation-optional="true" value='{if isset($a_TemplateData['userData']['phoneNumber'])}{$a_TemplateData['userData']['phoneNumber']}{/if}' autocomplete="off"/>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="firstName" class="control-label">
                                        First Name
                                    </label>
                                    <input type="text" id="firstName" name="firstName" class="form-control" data-validation="alphanumeric length" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-length="min2" data-validation-error-msg="Valid only alphanumeric, min 2 characters" value='{if isset($a_TemplateData['userData']['firstName'])}{$a_TemplateData['userData']['firstName']}{/if}' autocomplete="off"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="lastName" class="control-label">Last Name</label>
                                    <input type="text" id="lastName" name="lastName" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-optional="true" data-validation-optional="true" data-validation-error-msg="Valid only alphanumeric, min 2 characters" value='{if isset($a_TemplateData['userData']['lastName'])}{$a_TemplateData['userData']['lastName']}{/if}' autocomplete="off"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="displayName" class="control-label">
                                        Display Name
                                        <a data-toggle="tooltip" title="The name display in top right corner after login">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="displayName" name="displayName" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-optional="true" value='{if isset($a_TemplateData['userData']['displayName'])}{$a_TemplateData['userData']['displayName']}{/if}' autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" id='addUser' type="submit" name="add_user" value="{if isset($a_TemplateData['userData']['id']) && $a_TemplateData['userData']['id'] > 0}Save{else}Add{/if}"/>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {if ($a_TemplateData['IS_SUPER_ADMIN'] === true && isset($a_TemplateData['userData']['clientId'])  && $a_TemplateData['userData']['clientId'] > 0)}
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-search"></i> Search</h2>

                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
                    {*Search Form*}
                    {if isset($a_TemplateData['searchData']['search_user'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                        
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-7 col-md-12 formContainer">
                            <form action="{actionurl page=$actionPage}" method="post" class="form-inline searchForm">
                                {if isset ($a_TemplateData['userData']['clientId'])}
                                     <input type="hidden" name="{"clientId"|md5}" value="{$a_TemplateData['userData']['clientId']}"/>       
                                {/if}
                                <div class="form-group col-xs-4">
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" id="searchName" name="name" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-error-msg="Name field has to be an alphanumeric value" data-validation-optional="true" value="{if isset($a_TemplateData['searchData']['name'])}{$a_TemplateData['searchData']['name']}{/if}">
                                </div>

                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['searchData']['progressStatus'])}
                                        {assign var="progressStatus" value=$a_TemplateData['searchData']['progressStatus']}
                                    {else}
                                        {assign var="progressStatus" value="0"}
                                    {/if}
                                    <label for="progressStatus" class="control-label">Progress</label>
                                    <select id="searchProgressStatus" name="progressStatus" class="form-control" data-validation="number" data-validation-error-msg="Invaid progress"  data-validation-optional="true">
                                        <option value="0">Choose a progress...</option>
                                        {foreach $a_TemplateData['progressStatus'] as $details}
                                            <option value="{$details->id}" {if $progressStatus == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>

                                <div class="form-group col-xs-4">
                                    <label for="startedDate" class="control-label">Started Date</label>
                                    <input type="text" name="startedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid started date" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['startedDate'])}{$a_TemplateData['searchData']['startedDate']}{/if}' autocomplete="off"/>
                                </div>
                                <br/>
                                <div class="form-group col-xs-4">
                                    <label for="completedDate" class="control-label">Completed Date</label>
                                    <input type="text" name="completedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid completed date" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['completedDate'])}{$a_TemplateData['searchData']['completedDate']}{/if}' autocomplete="off"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Notes field has to be an alphanumeric value" data-validation-optional="true"> {if isset($a_TemplateData['searchData']['notes'])}{$a_TemplateData['searchData']['notes']}{/if}</textarea>
                                </div>
                                <div class="form-group col-xs-4" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="search_user" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <h2><i class="glyphicon glyphicon-th-large"></i> Users</h2>
                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                    <div class="box-content">
                        <form method="post" class="bulkForm"  action="{actionurl page=$actionPage}">
                            
                            {if isset ($a_TemplateData['userData']['clientId'])}
                                     <input type="hidden" name="{"clientId"|md5}" value="{$a_TemplateData['userData']['clientId']}"/>       
                                {/if}
                            <div class="breadcrumb">
                                <div id="bulk-action" class="actions" style="border:0px solid red;width: 220px;">
                                    Bulk Action:
                                    <select name="bulkAction" class="form-control" data-validation="number" data-validation-error-msg="Please select an action">
                                        <option value="">Choose...</option>
                                        <option value="100">Delete</option>
                                        {*<optgroup label="Progresses">
                                        {foreach $a_TemplateData['progressStatus'] as $details}
                                            <option value="{$details->id}">{$details->name}</option>
                                        {/foreach}
                                        </optgroup>*}
                                    </select>
                                    <input class="btn btn-default btn-bulk btn-small" type="submit" name="bulk_action" value="Go"/>
                                </div>
                            </div>
                            <div class="showHideColumns">
                                <div class="btn-group">
                                    <a class="toggle-vis btn btn-default" data-column="0" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                        All&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                                    </a>
                                    {foreach $a_TemplateData['thead'] as $index=>$head}
                                        <a class="toggle-vis btn btn-default" data-column="{$index}" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                            {$head.name}&nbsp;<i class='glyphicon {if $head.visible === false}glyphicon-eye-close{else}glyphicon-eye-open{/if}'></i>
                                        </a>
                                    {/foreach}
                                </div>
                                <input type="hidden" name="startIndex" id="startIndex" value="{$a_TemplateData['DATA_PER_PAGE']}"/>
                            </div>
                            <table id="tableData" class="display" cellspacing="0" width="100%" data-order='[[ 1, "asc" ]]'>
                                <thead>
                                  <tr class="tablesorter-headerRow">
                                    <th class="selectAllTableHead">
                                        All
                                        <input type="checkbox" name="selectAll" class="selectAll"/>
                                    </th>
                                    {foreach $a_TemplateData['thead'] as $head}
                                        <th>{$head.name}</th>
                                    {/foreach}
                                  </tr>
                                </thead>
                                <tfoot>
                                  <tr class="tablesorter-headerRow">
                                    <th>
                                    </th>
                                    {foreach $a_TemplateData['thead'] as $head}
                                        <th>{$head.name}</th>
                                    {/foreach}
                                  </tr>
                                </tfoot>
                                <tbody>
                                {if $a_TemplateData['allUsers']}
                                    {foreach $a_TemplateData['allUsers'] as $index=>$details}    
                                        <tr class="{if $index % 2 == 0}odd{else}even{/if}">
                                           <td style="width:1%; text-align: center;">
                                               {if $details->user_type != 1}
                                               <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                               {else}
                                                <a data-original-title="Cannot do bulk actions/ Delete for supper user" data-toggle="tooltip" title="">
                                                    <i class="glyphicon glyphicon-question-sign"></i>
                                                </a>
                                               {/if}
                                           </td>
                                           <td style="width:1%; text-align: center;">{$index + 1}</td>
                                           <td style="width:11%">{$details->clientName}</td>
                                           <td style="width:9%; text-align: center;">{$details->userTypeName}</td>
                                           <td style="width:5%" text-align: center;">
                                               {if $details->status == 1}
                                                   <span class="label-default label label-success">
                                                       Active
                                                   </span>
                                               {else if $details->status == 2}
                                                   <span class="label-default label">
                                                    Inactive
                                                   </span>
                                               {else}
                                                   <span class="label-default label label-danger">
                                                    Unknown
                                                   </span>
                                               {/if}
                                           </td>
                                           <td style="width:9%; text-align: center;">{$details->username}</td>
                                           <td style="width:6%">{$details->email}</td>
                                           <td style="width:6%">{$details->phone_number}</td>
                                           <td style="width:10%">{$details->first_name}</td>
                                           <td style="width:10%">{$details->last_name}</td>
                                           <td style="width:5%">{$details->display_name}</td>
                                           <td style="width:5%; text-align: center;">
                                               {if $details->is_logged_in == 1}
                                                   <img src="../../images/status-online.png"/>
                                               {else}
                                                   <img src="../../images/status-offline.png"/>
                                               {/if}
                                           </td>
                                           <td style="width:10%">{$details->lastAccessTime}</td>
                                           <td style="width:10%">{$details->addedDate}</td>
                                           <td style="width:15%">
                                               <a class="btn btn-success btn-small" data-toggle="tooltip" data-original-title="View All Project Details." href="{actionurl page=$actionPage params=['id'=>$details->id]}">
                                                   <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                   View
                                               </a>
                                               <a class="btn btn-info btn-small" data-toggle="tooltip" data-original-title="Edit user." href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>1, 'clientId'=>$clientId]}">
                                                   <i class="glyphicon glyphicon-edit icon-white"></i>
                                                   Edit
                                               </a>
                                               {if $details->user_type != 1}
                                               <a class="btn btn-danger btn-small delete" data-toggle="tooltip" data-original-title="Delete user." href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>2, 'clientId'=>$clientId]}">
                                                   <i class="glyphicon glyphicon-trash icon-white"></i>
                                                   Delete
                                               </a>
                                                {/if}
                                           </td>
                                         </tr>
                                      {/foreach}
                                    {/if}
                                </tbody>
                            </table>
                        </form>
                        <div id="loadMore" class="breadcrumb">
                            Load More&nbsp;<i class="glyphicon glyphicon-download-alt"></i>
                        </div>
                        <div class="breadcrumb loading">Loading...</div>
                    </div>
                </div>
            </div>
        </div>
        {/if}
    {/if}
{/block}
{block name="jsScriptBottoom"}
    {literal}
    <script>
        function init()
        {
            jQuery("#clientId").change(function(){
                    $("#client").submit();
                });
            validateFormWithServer();
            selectChosen();

            var tableOptions = {};
        {/literal}
        {if $a_TemplateData['allUsers']  && $a_TemplateData['IS_SUPER_ADMIN'] === true}
        {literal}
            tableOptions.columns = [
                            { className: "columTextCenter", orderable: false, visible: true},
                            {/literal}
                            {foreach $a_TemplateData['thead'] as $index=>$head}
                                {literal}{ className: "{/literal}{$head.class}{literal}", orderable: "{/literal}{$head.orderable}{literal}", visible: "{/literal}{$head.visible}{literal}" },{/literal}
                            {/foreach}
                            {literal}
                            ]; // Actions*/
            {/literal}
            {/if}
            {literal}
                 
            tableOptions.order = [[1, 'asc']];
            
            loadDataTable('#tableData', '{/literal}{actionurl page="users" params=["do"=>"loadData"]}{literal}', {/literal}{$a_TemplateData['DATA_PER_PAGE']}{literal}, tableOptions);
        }
    </script>
    {/literal}
{/block}


