{extends file="parent.tpl"}
{block  name="title" prepend}Revenue{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
        <!-- Add new form -->
         <form method="post" action="{actionurl page=$actionPage}" id="selectProject">
         <div class="row">
            <div class="breadcrumb">
                {if isset ($a_TemplateData['advanceData']['projectId'])}
                    {assign var="projectId" value=$a_TemplateData['advanceData']['projectId']}
                {else}
                    {assign var="projectId" value="0"}
                {/if}
                    <select id="projectId" name="{'projectId'|md5}" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Please select a valid project"  data-placeholder="Choose a project..." style="width: 390px; display: none;" tabindex="-1">
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
                        <h2><i class="glyphicon glyphicon-plus-sign"></i> {if isset($a_TemplateData['advanceData']['id']) && $a_TemplateData['advanceData']['id'] > 0}Update{else}Add New{/if}</h2>

                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
                    {if isset($a_TemplateData['advanceData']['showForm'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                            <div>
                                    <input type="hidden" name="{'projectId'|md5}" value="{$projectId}"/>
                                {if isset($a_TemplateData['advanceData']['id']) && $a_TemplateData['advanceData']['id'] > 0}
                                    <input type="hidden" name="id" value="{$a_TemplateData['advanceData']['id']}"/>
                                {/if}
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="amount" class="control-label">Amount</label>
                                    <div class="input-group" style="width:100% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                    <input type="text" id="amount" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" value='{if isset($a_TemplateData['advanceData']['amount'])}{$a_TemplateData['advanceData']['amount']}{/if}' />
                                </div>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="receivedDate" class="control-label">Received Date</label>
                                    <input type="text" id="receivedDate" name="receivedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" value='{if isset($a_TemplateData['advanceData']['receivedDate'])}{$a_TemplateData['advanceData']['receivedDate']}{/if}' autocomplete="off"/>
                                </div>
                                    <div class="form-group col-xs-4">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['advanceData']['notes'])}{$a_TemplateData['advanceData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="add_advance" value="Add"/>
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
                    {if isset($a_TemplateData['searchData']['search_advance'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                        
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                         <div class="col-lg-12 col-md-12">
                            <div>
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                    <label for="amount" class="control-label">Amount</label>
                                    <div class="input-group" style="width:100% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                    <input type="text" id="amount" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" value='{if isset($a_TemplateData['searchData']['amount'])}{$a_TemplateData['searchData']['amount']}{/if}' data-validation-optional="true"/>
                                </div>
                                </div>
                                    <div class="form-group col-xs-4">
                                    <label for="receivedDate" class="control-label">Received Date</label>
                                    <input type="text" id="searchReceivedDate" name="receivedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" value='{if isset($a_TemplateData['searchData']['receivedDate'])}{$a_TemplateData['searchData']['receivedDate']}{/if}' autocomplete="off" data-validation-optional="true"/>
                                </div>
                                    <div class="form-group col-xs-4">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Notes field has to be an alphanumeric value" data-validation-optional="true"> {if isset($a_TemplateData['searchData']['notes'])}{$a_TemplateData['searchData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                    <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="search_advance" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <h2><i class="glyphicon glyphicon-th-large"></i> Revenue</h2>
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
                                <div id="bulk-action" class="actions">
                                    Bulk Action:
                                    <select name="bulkAction" class="form-control" data-validation="number" data-validation-error-msg="Please select an action">
                                        <option value="">Select</option>
                                        <option value="100">Delete</option>
                                    </select>
                                    <input class="btn btn-default btn-bulk btn-small" type="submit" name="bulk_action" value="Go"/>
                                </div>
                                <div class="totalAmount">
                                    Total Amount: 
                                    {if isset($a_TemplateData['allAdvance']['totalAmount'])}
                                        {$a_TemplateData['allAdvance']['totalAmount']}
                                    {else}
                                        0
                                    {/if}
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
                                {if $a_TemplateData['allAdvance']}
                                    {foreach $a_TemplateData['allAdvance'] as $index=>$details} 
                                        {if !isset($details->id)}{continue}{/if}
                                        <tr class="{if $index % 2 == 0}odd{else}even{/if}">
                                           <td>
                                               <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                           </td>
                                           <td>{$index + 1}</td>
                                           <td>{$details->projectName}</td>
                                           <td>{$details->amount}</td>
                                           <td>{$details->receivedDate}</td>
                                           <td>{$details->notes}</td>
                                           <td>
                                               <a class="btn btn-info btn-small" href="{actionurl page=$actionPage params=['id'=>$details->id,'projectId'=>$details->projectId, 'do'=>$a_TemplateData['EDIT']]}">
                                                   <i class="glyphicon glyphicon-edit icon-white"></i>
                                                   Edit
                                               </a>
                                               <a class="btn btn-danger btn-small delete" href="{actionurl page=$actionPage params=['id'=>$details->id, 'projectId'=>$details->projectId,'do'=>$a_TemplateData['DELETE']]}">
                                                   <i class="glyphicon glyphicon-trash icon-white"></i>
                                                   Delete
                                               </a>
                                           </td>
                                         </tr>
                                      {/foreach}
                                    {/if}
                                </tbody>
                            </table>
                                {if $a_TemplateData['allAdvance']}
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
            {if isset($a_TemplateData['allAdvance']) && $a_TemplateData['allAdvance']}
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


