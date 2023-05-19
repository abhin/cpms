{extends file="parent.tpl"}
{block  name="title" prepend}Projects{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
    {if isset($a_TemplateData['projectData']['id']) && $a_TemplateData['projectData']['id'] > 0}
        {assign var=projectId value=$a_TemplateData['projectData']['id']}
    {else}
        {assign var=projectId value=0}
    {/if}
    <form action="{actionurl page=$actionPage params=["id"=>$projectId]}" method="post" class="form-inline addForm">
        <!-- Add new form -->
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i> {if $projectId > 0}Update{else}Add New{/if}</h2>

                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
                    {if isset($a_TemplateData['projectData']['showForm'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
{*                        {$smarty.server.REQUEST_URI}*}
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                            <div>
                                <div class="col-xs-12">
                                    {if $a_TemplateData['allBranches']}
                                <div class="form-group col-xs-4">
                                    {if isset($a_TemplateData['employeeData']['branchId'])}
                                        {assign var="branchId" value=$a_TemplateData['employeeData']['branchId']}
                                    {else}
                                        {assign var="branchId" value=""}
                                    {/if}
                                    <label for="branchId" class="control-label">Branches</label>
                                    <select id="branchId" name="branchId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid branch" data-placeholder="Choose a branch...">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['allBranches'] as $details}
                                            <option value="{$details->id}" {if $branchId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                {/if}
                                    <div class="form-group col-xs-4">
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" data-validation="required server" data-validation-url="{actionurl page=$ajaxFilePath params=["do"=>$a_TemplateData['VALIDATE'], "id"=>$projectId]}" data-validation-error-msg="Name required" placeholder="Project name" value="{if isset($a_TemplateData['projectData']['name'])}{$a_TemplateData['projectData']['name']}{/if}">
                                </div>

                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['projectData']['progressId'])}
                                        {assign var="progressId" value=$a_TemplateData['projectData']['progressId']}
                                    {else}
                                        {assign var="progressId" value=1}
                                    {/if}
                                    <label for="progressId" class="control-label">Progress</label>
                                    <select id="progressId" name="progressId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid progress">
                                        {foreach $a_TemplateData['progressId'] as $details}
                                            <option value="{$details->id}" {if $progressId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="startedDate" class="control-label">Started Date</label>
                                    <input type="text" id="startedDate" name="startedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" {if $progressId <= 1}disabled="disabled"{/if} data-validation-error-msg="Invalid date" value='{if isset($a_TemplateData['projectData']['startedDate']) && $a_TemplateData['projectData']['startedDate'] neq "0000-00-00"}{$a_TemplateData['projectData']['startedDate']}{/if}' autocomplete="off"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="completedDate" class="control-label">Completed Date</label>
                                    <input type="text" id="completedDate" name="completedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" {if $progressId != 3 && $progressId != 5}disabled="disabled"{/if} data-validation-error-msg="Invaid date" value='{if isset($a_TemplateData['projectData']['completedDate']) && $a_TemplateData['projectData']['completedDate'] neq "0000-00-00"}{$a_TemplateData['projectData']['completedDate']}{/if}' autocomplete="off"/>
                                </div>

                                <div class="form-group col-xs-4">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['projectData']['notes'])}{$a_TemplateData['projectData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn"  type="submit" name="add_project" value="{if $projectId > 0}Update{else}Add{/if}"/>
                                    <input type="hidden" name="addProject" value="Add"/>
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
                    {if isset($a_TemplateData['searchData']['search_project'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                        
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12 formContainer">
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" id="searchName" name="name" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-error-msg="Name field has to be an alphanumeric value" data-validation-optional="true" value="{if isset($a_TemplateData['searchData']['name'])}{$a_TemplateData['searchData']['name']}{/if}">
                                </div>

                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['searchData']['progressId'])}
                                        {assign var="progressId" value=$a_TemplateData['searchData']['progressId']}
                                    {else}
                                        {assign var="progressId" value=""}
                                    {/if}
                                    <label for="progressId" class="control-label">Progress</label>
                                    <select id="searchProgressStatus" name="progressId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invaid progress"  data-validation-optional="true" data-placeholder="Choose a progress...">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['progressId'] as $details}
                                            <option value="{$details->id}" {if $progressId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>

                                <div class="form-group col-xs-4">
                                    <label for="startedDate" class="control-label">Started Date</label>
                                    <input type="text" name="startedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid started date" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['startedDate']) && $a_TemplateData['searchData']['startedDate'] neq "0000-00-00"}{$a_TemplateData['searchData']['startedDate']}{/if}' autocomplete="off"/>
                                </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="completedDate" class="control-label">Completed Date</label>
                                    <input type="text" name="completedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid completed date" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['completedDate']) && $a_TemplateData['searchData']['completedDate'] neq "0000-00-00"}{$a_TemplateData['searchData']['completedDate']}{/if}' autocomplete="off"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Notes field has to be an alphanumeric value" data-validation-optional="true"> {if isset($a_TemplateData['searchData']['notes'])}{$a_TemplateData['searchData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="search_project" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <h2><i class="glyphicon glyphicon-th-large"></i> Projects</h2>
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
                                {if $a_TemplateData['allProjects']}
                                    {foreach $a_TemplateData['allProjects'] as $index=>$details}    
                                        <tr class="{if $index % 2 == 0}odd{else}even{/if}">
                                           <td>
                                               <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                           </td>
                                           <td>{$index + 1}</td>
                                           <td>{$details->branchName}</td>
                                           <td>{$details->name}</td>
                                           <td>
                                               {if $details->progressId == 2}
                                                   <span class="label-default label label-success">
                                               {else if $details->progressId == 3}
                                                   <span class="label-default label" style="background-color:#2FA4E7;">
                                               {else if $details->progressId == 4}
                                                   <span class="label-default label  label-warning">
                                               {else if $details->progressId == 5}
                                                   <span class="label-default label label-danger">
                                               {else}
                                                   <span class="label-default label">
                                               {/if}
                                                   {$details->progressName}
                                               </span>
                                           </td>
                                           <td>{$details->startedDateF}</td>
                                           <td>{$details->completedDateF}</td>
                                           <td>{$details->addedDate}</td>
                                           <td>{$details->notes}</td>
                                           <td>
                                               <a class="btn btn-success btn-small" data-toggle="tooltip" data-original-title="View All Project Details." href="{actionurl page='projectdetails' params=['projectId'=>$details->id]}">
                                                   <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                   View
                                               </a>
                                               <a class="btn btn-info btn-small" data-toggle="tooltip" data-original-title="Edit project." href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>$a_TemplateData['EDIT']]}">
                                                   <i class="glyphicon glyphicon-edit icon-white"></i>
                                                   Edit
                                               </a>
                                               <a class="btn btn-danger btn-small delete" data-toggle="tooltip" data-original-title="Delete project." href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>$a_TemplateData['DELETE']]}">
                                                   <i class="glyphicon glyphicon-trash icon-white"></i>
                                                   Delete
                                               </a>
                                                   
                                               <a class="btn btn-info btn-addAdvance btn-small" data-toggle="tooltip" data-original-title="Advances." href="{actionurl page='advances' params=['projectId'=>$details->id, 'do'=>$a_TemplateData['SHOW_ADD_FORM']]}">
                                                   <i class="glyphicon glyphicon-plus icon-white"></i>
                                                   Revenue
                                               </a>
                                                   
                                               <a class="btn btn-info btn-addStages btn-small" data-toggle="tooltip" data-original-title="Stages." href="{actionurl page='stages' params=['projectId'=>$details->id, 'do'=>$a_TemplateData['SHOW_ADD_FORM']]}">
                                                   <i class="glyphicon glyphicon-plus icon-white"></i>
                                                   Stage
                                               </a>
                                               <a class="btn btn-info btn-addStages btn-small" data-toggle="tooltip" data-original-title="Expenses." href="{actionurl page='materialexpenses' params=['projectId'=>$details->id, 'do'=>$a_TemplateData['SHOW_ADD_FORM']]}">
                                                   <i class="glyphicon glyphicon-plus icon-white"></i>
                                                   Material Expense
                                               </a>
                                               <a class="btn btn-info btn-addStages btn-small" data-toggle="tooltip" data-original-title="Expenses." href="{actionurl page='labourwages' params=['projectId'=>$details->id, 'do'=>$a_TemplateData['SHOW_ADD_FORM']]}">
                                                   <i class="glyphicon glyphicon-plus icon-white"></i>
                                                   Labour Wages
                                               </a>
                                               
                                           </td>
                                         </tr>
                                      {/foreach}
                                    {/if}
                                </tbody>
                            </table>
                        {if $a_TemplateData['allProjects']}
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
                var options = {};
                options.maxDate = new Date();
                dateSelector(".datePicker",options);
                selectChosen();
                selectAllData(".selectAll", "selectedData");
                resetFromData(".searchForm");
                
                var tableOptions = {};
            {/literal}
            {if isset($a_TemplateData['allProjects']) && $a_TemplateData['allProjects']}
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

                jQuery("#progressId").change(function(){
                    var progressId = $(this).val();

                    if (progressId > 1){
                        $("#startedDate").removeAttr("disabled");
                    }else{
                        $("#startedDate").val("");
                        $("#startedDate").attr("disabled", "disabled");
                    }

                    if ((progressId == 3 || progressId == 5)){
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


