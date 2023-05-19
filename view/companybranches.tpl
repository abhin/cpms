{extends file="parent.tpl"}
{block  name="title" prepend}Branches{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
    {if isset($a_TemplateData['branchData']['id']) && $a_TemplateData['branchData']['id'] > 0}
        {assign var=branchId value=$a_TemplateData['branchData']['id']}
    {else}
        {assign var=branchId value=0}
    {/if}
    <form action="{actionurl page=$actionPage}" method="post" class="form-inline addForm">
        <!-- Add new form -->
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i> {if $branchId > 0}Update{else}Add New{/if}</h2>

                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
                    {if isset($a_TemplateData['branchData']['showForm'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
{*                        {$smarty.server.REQUEST_URI}*}
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                            <div>
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                    {if isset($a_TemplateData['branchData']['id']) && $a_TemplateData['branchData']['id'] > 0}
                                        {$branchId = $a_TemplateData['branchData']['id']}
                                    {else}
                                        {$branchId = 0}
                                    {/if}
                                    <input type="hidden" name="id" value="{$branchId}"/>
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" data-validation="alphanumeric server" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-url="{actionurl page=$ajaxFilePath params=["do"=>$a_TemplateData['VALIDATE'], "id"=>$branchId]}" data-validation-error-msg="Alphanumeric values only" placeholder="Branch name" value="{if isset($a_TemplateData['branchData']['name'])}{$a_TemplateData['branchData']['name']}{/if}">
                                </div>

                                <div class="form-group col-xs-4">
                                    <label for="address" class="control-label">Address</label>
                                    <textarea id="address" name="address" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['branchData']['address'])}{$a_TemplateData['branchData']['address']}{/if}</textarea>
                                </div>

                                <div class="form-group col-xs-4">
                                    <label for="email" class="control-label">
                                        Email
                                    </label>
                                    <input type="text" id="email" name="email" class="form-control" data-validation="email" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-optional="true" data-validation-error-msg="Invalid Email" value='{if isset($a_TemplateData['branchData']['email'])}{$a_TemplateData['branchData']['email']}{/if}' autocomplete="off"/>
                                </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="phone" class="control-label">
                                        Phone
                                    </label>
                                    <input type="text" id="phone" name="phone" class="form-control" data-validation="alphanumeric length" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-length="min10" data-validation-error-msg="Invaid number" data-validation-optional="true" value='{if isset($a_TemplateData['branchData']['phone'])}{$a_TemplateData['branchData']['phone']}{/if}' data-validation-optional="true" autocomplete="off"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                        {if isset ($a_TemplateData['branchData']['status'])}
                                            {assign var="status" value=$a_TemplateData['branchData']['status']}
                                        {else}
                                            {assign var="status" value=1}
                                        {/if}
                                        <label for="status" class="control-label">Status</label>
                                        <select id="status" name="status" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid status" data-placeholder="Choose a status...">
                                            <option value=""></option>
                                            {foreach $a_TemplateData["dataStatus"] as $id=>$name}
                                                {if $id !== 1 && $id === 2}
                                                    {continue}
                                                {/if}
                                            <option value="{$id}" {if $status == $id}selected='selected'{/if}>
                                                {$name}
                                            </option>
                                            {/foreach}
                                        </select>
                                    </div>

                                <div class="form-group col-xs-4">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['branchData']['notes'])}{$a_TemplateData['branchData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn"  type="submit" name="add_branch" value="{if $branchId > 0}Update{else}Add{/if}"/>
                                    <input type="hidden" name="addBranch" value="Add"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <form action="{actionurl page=$actionPage}" method="post" class="form-inline searchForm">
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
                    {if isset($a_TemplateData['searchData']['search_branch'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                        
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12 formContainer">
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                    {if $branchId > 0}
                                        <input type="hidden" name="id" value="{$branchId}"/>
                                    {/if}
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" id="searchName" name="name" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric values only" placeholder="Branch name" value="{if isset($a_TemplateData['searchData']['name'])}{$a_TemplateData['searchData']['name']}{/if}">
                                </div>

                                <div class="form-group col-xs-4">
                                    <label for="address" class="control-label">Address</label>
                                    <textarea id="searchAddress" name="address" class="form-control" data-validation="address" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['searchData']['address'])}{$a_TemplateData['searchData']['address']}{/if}</textarea>
                                </div>

                                <div class="form-group col-xs-4">
                                    <label for="email" class="control-label">
                                        Email
                                    </label>
                                    <input type="text" id="searchEmail" name="email" class="form-control" data-validation="email" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-optional="true" data-validation-error-msg="Invalid Email" value='{if isset($a_TemplateData['searchData']['email'])}{$a_TemplateData['searchData']['email']}{/if}' autocomplete="off"/>
                                </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="phone" class="control-label">
                                        Phone
                                    </label>
                                    <input type="text" id="searchPhone" name="phone" class="form-control" data-validation="alphanumeric length" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-length="min10" data-validation-error-msg="Invaid number" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['phone'])}{$a_TemplateData['searchData']['phone']}{/if}' data-validation-optional="true" autocomplete="off"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                        {if isset ($a_TemplateData['searchData']['status'])}
                                            {assign var="status" value=$a_TemplateData['searchData']['status']}
                                        {else}
                                            {assign var="status" value=""}
                                        {/if}
                                        <label for="status" class="control-label">Status</label>
                                        <select id="searchStatus" name="status" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid status" data-placeholder="Choose a status...">
                                            <option value=""></option>
                                            <option value="1" {if $status == 1}selected='selected'{/if}>
                                                Active
                                            </option>
                                            <option value="2" {if $status == 2}selected='selected'{/if}>
                                                Inactive
                                            </option>
                                        </select>
                                    </div>

                                <div class="form-group col-xs-4">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea id="searchNotes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['searchData']['notes'])}{$a_TemplateData['searchData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="search_branch" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
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
        <form method="post" class="bulkForm" action="{actionurl page=$actionPage}">
        <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-th-large"></i> Branches</h2>
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
                        <div class="breadcrumb">
                        {*<div class="actions" style="border:0px solid red;width: 220px; float: right;">
                            Export As:
                            <select name="exportAction" class="form-control">
                                <option value="1">Excel</option>
                                <option value="2">CSV</option>
                                <option value="3">PDF</option>
                            </select>
                            <input class="btn btn-default btn-bulk btn-small" type="submit" name="export_action" value="Export"/>
                        </div>*}
                        <div class="breadcrumb">
                            <div id="bulk-action" class="actions" style="border:0px solid red;width: 220px;">
                                Bulk Action:
                                <select name="bulkAction" class="form-control" data-validation="number" data-validation-error-msg="Please select an action">
                                    <option value="">Choose...</option>
                                    <option value="{$a_TemplateData['DELETE']}">Delete</option>
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
                                    {foreach $a_TemplateData['thead'] as $index=>$head}
                                        <a class="toggle-vis btn btn-default" data-column="{$index}" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                           {$head.name}&nbsp;<i class='glyphicon {if $head.visible === "false"}glyphicon-eye-close{else}glyphicon-eye-open{/if}'></i>
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
                                        <th {if isset($head.width)}width="{$head.width}"{/if}>{$head.name}</th>
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
                                {if $a_TemplateData['allBranches']}
                                    {foreach $a_TemplateData['allBranches'] as $index=>$details}    
                                        <tr class="{if $index % 2 == 0}odd{else}even{/if}">
                                           <td>
                                               <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                           </td>
                                           <td>{$index + 1}</td>
                                           <td>{$details->name}</td>
                                           <td>{$details->address}</td>
                                           <td>{$details->email}</td>
                                           <td>{$details->phone}</td>
                                           <td>
                                               {if $details->status == 1}
                                                   <span class="label-default label label-success">
                                                       {$a_TemplateData["dataStatus"][$details->status]}
                                                   </span>
                                               {else if $details->status == 2}
                                                   <span class="label-default label">
                                                    {$a_TemplateData["dataStatus"][$details->status]}
                                                   </span>
                                               {else}
                                                   <span class="label-default label label-danger">
                                                    {$a_TemplateData["dataStatus"][0]}
                                                   </span>
                                               {/if}
                                           </td>
                                           <td>{$details->notes}</td>
                                           <td>{$details->addedDate}</td>
                                           <td>
                                               </a>
                                               <a class="btn btn-info btn-small" data-toggle="tooltip" data-original-title="Edit branch." href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>$a_TemplateData['EDIT']]}">
                                                   <i class="glyphicon glyphicon-edit icon-white"></i>
                                                   Edit
                                               </a>
                                               <a class="btn btn-danger btn-small delete" data-toggle="tooltip" data-original-title="Delete branch." href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>$a_TemplateData['DELETE']]}">
                                                   <i class="glyphicon glyphicon-trash icon-white"></i>
                                                   Delete
                                               </a>
                                           </td>
                                         </tr>
                                      {/foreach}
                                    {/if}
                                </tbody>
                            </table>
                        {if $a_TemplateData['allBranches']}
                        <div id="loadMore" class="breadcrumb">
                            Load More&nbsp;<i class="glyphicon glyphicon-download-alt"></i>
                        </div>
                        <div class="breadcrumb loading">Loading...</div>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </form>
{/block}
{block name="jsScriptBottoom"}
    {literal}
    <script>
            function init()
            {
                validateFormWithServer();
                selectChosen();
                selectAllData(".selectAll", "selectedData");
                resetFromData(".searchForm");
                
                var tableOptions = {};
            {/literal}
            {if isset($a_TemplateData['allBranches']) && $a_TemplateData['allBranches']}
            {literal}
                tableOptions.columns = [
                                { className: "columTextCenter", orderable: false, visible: true},
                                {/literal}
                                {foreach $a_TemplateData['thead'] as $index=>$head}
                                    {literal}{ className: "{/literal}{$head.class}{literal}", orderable: {/literal}{$head.orderable}{literal}, visible: {/literal}{$head.visible}{literal} },{/literal}
                                {/foreach}
                                {literal}
                                ]; // Actions*/
                {/literal}
                {/if}
                {literal}

                tableOptions.order = [[1, 'asc']];

                loadDataTable('#tableData', '{/literal}{actionurl page=$ajaxFilePath}{literal}', {/literal}{$a_TemplateData['DATA_PER_PAGE']}{literal}, tableOptions);

                jQuery("#progressStatus").change(function(){
                    var progressStatus = $(this).val();

                    if (progressStatus > 1){
                        $("#startedDate").removeAttr("disabled");
                    }else{
                        $("#startedDate").val("");
                        $("#startedDate").attr("disabled", "disabled");
                    }

                    if ((progressStatus == 3 || progressStatus == 5)){
                        $("#completedDate").removeAttr("disabled");
                    }else{
                        $("#completedDate").val("");
                        $("#completedDate").attr("disabled", "disabled");
                    }
                });
            
            }
    </script>
    {/literal}
{/block}


