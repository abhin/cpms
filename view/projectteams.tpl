{extends file="parent.tpl"}
{block  name="title" prepend}Project Teams{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
        <!-- Add new form -->
        <form method="post" action="{actionurl page=$actionPage}" id="selectProject">
        <div class="row">
            <div class="breadcrumb">
                {if isset($a_TemplateData['projectTeamData']['projectId'])}
                    {assign var="projectId" value=$a_TemplateData['projectTeamData']['projectId']}
                {else}
                    {assign var="projectId" value="0"}
                {/if}
                    <select id="projectId" name="{'projectId'|md5}" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Please select a valid projectTeam"  data-placeholder="Choose a project..." class="chosen-select" style="width: 390px; display: none;" tabindex="-1">
                        <option value="0"></option>
                        {foreach $a_TemplateData['projects'] as $details}
                            <option value="{$details->id}" {if $projectId == $details->id}selected='selected'{/if}>
                                {$details->name}
                            </option>
                        {/foreach}
                    </select>
            </div>
        </div>
        </form>
        {if $projectId > 0}
            <form action="{actionurl page=$actionPage params=['projectId'=>$projectId]}" method="post" class="form-inline addForm">
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i> {if isset($a_TemplateData['projectTeamData']['id']) && $a_TemplateData['projectTeamData']['id'] > 0}Update{else}Add New{/if}</h2>

                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
{*                    {if isset($a_TemplateData['projectTeamData']['id']) || (isset($a_TemplateData['projectTeamData']['add_projectTeam']) && $a_TemplateData['errorMessage'])}*}
                    {if isset($a_TemplateData['projectTeamData']['showForm'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                            <div>
                                {if isset($a_TemplateData['projectTeamData']['id']) && $a_TemplateData['projectTeamData']['id'] > 0}
                                    <input type="hidden" name="id" value="{$a_TemplateData['projectTeamData']['id']}"/>
                                {/if}
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['projectTeamData']['stageId'])}
                                        {assign var="stageId" value=$a_TemplateData['projectTeamData']['projectStageId']}
                                    {else}
                                        {assign var="projectStageId" value=0}
                                    {/if}
                                    <label for="projectStageId" class="control-label">Stages</label>
                                    <select id="projectStageId" name="projectStageId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid stage" data-placeholder="Choose a stage..."  data-validation-optional="true">
                                        <option value="0"></option>
                                        {foreach $a_TemplateData['allStages'] as $details}
                                            <option value="{$details->id}" {if $projectStageId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    {if isset($a_TemplateData['paymentData']['employeeIds'])}
                                        {assign var="employeeIds" value=$a_TemplateData['paymentData']['employeeIds']}
                                    {else}
                                        {assign var="employeeIds" value=""}
                                    {/if}
                                    <label for="employeeIds" class="control-label">
                                        Employee
                                        <a data-original-title="Eg: Salary/ Bonus/ Insentive" data-toggle="tooltip" title="">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <select id="employeeIds" name="employeeIds[]" class="form-control chosen-select" data-validation="required" data-validation-error-msg="Invalid employee(s)" data-placeholder="Choose employee(s)..."  multiple="multiple" style="height:500px;">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['allEmployees'] as $details}
                                            <option value="{$details->id}" {if $employeeIds == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                    <div class="form-group col-xs-4">
                                        <label for="assignedDate" class="control-label">Assigned Date</label>
                                        <input type="text" id="assignedDate" name="assignedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" value='{if isset($a_TemplateData['projectTeamData']['assignedDate']) && $a_TemplateData['projectTeamData']['assignedDate'] == "0000-00-00"}{$a_TemplateData['projectTeamData']['assignedDate']}{/if}' autocomplete="off"/>
                                    </div>
                                </div>
                                
                        <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="releasedDate" class="control-label">Released Date</label>
                                    <input type="text" id="releasedDate" name="releasedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" value='{if isset($a_TemplateData['projectTeamData']['releasedDate']) && $a_TemplateData['projectTeamData']['releasedDate'] == "0000-00-00"}{$a_TemplateData['projectTeamData']['releasedDate']}{/if}' autocomplete="off" data-validation-optional="true"/>
                                </div>

                            <div class="form-group col-xs-4">
                                <label for="notes" class="control-label">Notes</label>
                                <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['projectTeamData']['notes'])}{$a_TemplateData['projectTeamData']['notes']}{/if}</textarea>
                            </div>
                        </div>
                                    <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="add_projectTeam" value="{if isset($a_TemplateData['projectTeamData']['id']) && $a_TemplateData['projectTeamData']['id'] > 0}Update{else}Add{/if}"/>
                                    <input type="hidden" name="addProjectTeam"  value="Add"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
         </form>
        <form action="{actionurl page=$actionPage params=['projectId'=>$projectId]}" method="post" class="form-inline searchForm">
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
                    {if isset($a_TemplateData['searchData']['search_projectTeam'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                        
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                            <div>
                                <input type="hidden" name="{'projectId'|md5}" value="{$projectId}"/>
                                 <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['searchData']['projectStageId'])}
                                        {assign var="projectStageId" value=$a_TemplateData['searchData']['projectStageId']}
                                    {else}
                                        {assign var="projectStageId" value=0}
                                    {/if}
                                    <label for="projectStageId" class="control-label">Stages</label>
                                    <select  name="projectStageId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid stage" data-placeholder="Choose a stage..."  data-validation-optional="true">
                                        <option value="0"></option>
                                        {foreach $a_TemplateData['allStages'] as $details}
                                            <option value="{$details->id}" {if $projectStageId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                    <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['searchData']['productId'])}
                                        {assign var="productId" value=$a_TemplateData['searchData']['productId']}
                                    {else}
                                        {assign var="productId" value=0}
                                    {/if}
                                    <label for="productId" class="control-label">Product/ ProjectTeam Category</label>
                                    <select  name="productId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid product/projectTeam" data-placeholder="Choose a product/projectTeam..." data-validation-optional="true">
                                        <option value="0"></option>
                                        {foreach $a_TemplateData['allProducts'] as $groupName=>$catDataArray}
                                            <optgroup label="{$groupName}">
                                                {foreach $catDataArray as $catDetails}
                                                <option value="{$catDetails->id}" {if $productId == $catDetails->id}selected='selected'{/if}>
                                                    {$catDetails->name}
                                                </option>
                                                {/foreach}
                                            </optgroup>
                                        {/foreach}
                                    </select>
                                </div>
                                    <div class="form-group col-xs-4">
                                        {if isset($a_TemplateData['paymentData']['employeeId'])}
                                            {assign var="employeeId" value=$a_TemplateData['paymentData']['employeeId']}
                                        {else}
                                            {assign var="employeeId" value=""}
                                        {/if}
                                        <label for="employeeId" class="control-label">
                                            Employee
                                            <a data-original-title="Eg: Salary/ Bonus/ Insentive" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select id="employeeId" name="employeeId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid employee" data-placeholder="Choose a employee...">
                                            <option value=""></option>
                                            {foreach $a_TemplateData['allEmployees'] as $details}
                                                <option value="{$details->id}" {if $employeeId == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4">
                                    <label for="quantity" class="control-label">Quantity</label>
                                    <input type="text" name="quantity" class="form-control" data-validation="number" data-validation-error-msg="Invalid quantity" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['quantity'])}{$a_TemplateData['searchData']['quantity']}{/if}' autocomplete="off"/>
                                </div>
                                </div>
                                
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                    <label for="unitPrice" class="control-label">Unit Price</label>
                                    <div class="input-group" style="width:100% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                    <input type="text" name="unitPrice" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid price" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['unitPrice'])}{$a_TemplateData['searchData']['unitPrice']}{/if}' autocomplete="off"/>
                                </div>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="amount" class="control-label">Amount</label>
                                    <div class="input-group" style="width:100% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                    <input type="text" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['amount'])}{$a_TemplateData['searchData']['amount']}{/if}' autocomplete="off"/>
                                </div>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="assignedDate" class="control-label">Purchase/  ProjectTeam Date</label>
                                    <input type="text" name="assignedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['assignedDate'])}{$a_TemplateData['searchData']['assignedDate']}{/if}' autocomplete="off"/>
                                </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['searchData']['notes'])}{$a_TemplateData['searchData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                <div class="form-group has-feedback" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="search_projectTeam" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="btn btn-default btn resetForm">
                                        Clear
                                    </div>
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <form method="post" class="bulkForm" action="{actionurl page=$actionPage params=['projectId'=>$projectId]}">
        <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-th-large"></i> Project Teams</h2>
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
                            <input type="hidden" name="{'projectId'|md5}" value="{$projectId}"/>
                            <div class="breadcrumb">
                                <div id="bulk-action" class="actions" style="border:0px solid red;width: 220px;">
                                    Bulk Action:
                                    <select name="bulkAction" class="form-control" data-validation="number" data-validation-error-msg="Please select an action">
                                        <option value="">Choose...</option>
                                        <option value="{$a_TemplateData['DELETE']}">Delete</option>
                                        {*<optgroup label="Progresses">
                                        {foreach $a_TemplateData['projectStageId'] as $details}
                                            <option value="{$details->id}">{$details->name}</option>
                                        {/foreach}
                                        </optgroup>*}
                                    </select>
                                    <input class="btn btn-default btn-bulk btn-small" type="submit" name="do_bulk_action" value="Go"/>
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
                                {if $a_TemplateData['allProjectTeams']}
                                    {foreach $a_TemplateData['allProjectTeams'] as $index=>$details}    
                                        {if !isset($details->id)}{continue}{/if}
                                        <tr class="{if $index % 2 == 0}odd{else}even{/if}">
                                           <td>
                                               <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                           </td>
                                           <td>{$index + 1}</td>
                                           <td>{$details->stageName}</td>
                                           <td>{$details->employeeName}</td>
                                           <td>{$details->assignedDateF}</td>
                                           <td>{$details->releasedDateF}</td>
                                           <td>{$details->notes}</td>
                                           <td>
                                                <a class="btn btn-info btn-small" href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>$a_TemplateData['EDIT'], 'projectId'=>$details->projectId]}">
                                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-small delete" href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>$a_TemplateData['DELETE'], 'projectId'=>$details->projectId]}">
                                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                                    Delete
                                                </a>
                                           </td>
                                         </tr>
                                      {/foreach}
                                    {/if}
                                </tbody>
                            </table>
                        {if $a_TemplateData['allProjectTeams']}
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
        {/if}
{/block}
{block name="jsScriptBottoom"}
    {literal}
    <script>
        function init()
            {
                validateFormWithOutServer();
                var options = {};
                options.maxDate = new Date();
                dateSelector(".datePicker",options);
                selectChosen();
                selectAllData(".selectAll", "selectedData");
                resetFromData(".searchForm");

                 var tableOptions = {};
            {/literal}
            {if isset($a_TemplateData['allProjectTeams']) && $a_TemplateData['allProjectTeams']}
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

                loadDataTable('#tableData', '{/literal}{actionurl page=$ajaxFilePath params=['projectId'=>$projectId]}{literal}', {/literal}{$a_TemplateData['DATA_PER_PAGE']}{literal}, tableOptions);
            
            jQuery("#projectId").change(function(){
                $("#selectProject").submit();
            });
        }
    </script>
    {/literal}
{/block}


