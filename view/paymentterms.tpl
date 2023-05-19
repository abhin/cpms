{extends file="parent.tpl"}
{block  name="title" prepend}Payement Terms{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
        <!-- Add new form -->
        <form action="{actionurl page=$actionPage}" method="post" class="form-inline addForm"  style="text-align: center;">
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" onclick="return false;">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;{if isset($a_TemplateData['paymentTermData']['id']) && $a_TemplateData['paymentTermData']['id'] > 0}Edit{else}Add New{/if}</h2>

                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
                    {if isset($a_TemplateData['paymentTermData']['showForm'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                                {if isset($a_TemplateData['paymentTermData']['id']) &&  $a_TemplateData['paymentTermData']['id'] > 0}
                                    {assign var=paymentTermId value={$a_TemplateData['paymentTermData']['id']}}
                                {else}
                                    {assign var=paymentTermId value=0}
                                {/if}
                                <input type="hidden" name="id" value="{$paymentTermId}"/>
                                    
                                <div class="form-group col-xs-4">
                                    <label for="name">
                                        Name
                                        <a data-toggle="tooltip" title="Term name">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="name" name="name" class="form-control" data-validation="alphanumeric server" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-url="{actionurl page=$ajaxFilePath params=["do"=>$a_TemplateData['VALIDATE'],  "id"=>$paymentTermId]}" data-validation-error-msg="Alphanumeric values only" value='{if isset($a_TemplateData['paymentTermData']['name'])}{$a_TemplateData['paymentTermData']['name']}{/if}' autocomplete="off" placeholder="Term name"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['paymentTermData']['status'])}
                                        {assign var="status" value=$a_TemplateData['paymentTermData']['status']}
                                    {else}
                                        {assign var="status" value=1}
                                    {/if}
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control chosen-select" data-validation="required number" data-validation-error-msg="Invalid status"  data-placeholder="Choose a status...">
                                            <option value=""></option>
                                            {foreach $a_TemplateData["dataStatus"] as $id=>$name}
                                                {if $id !== 1 && $id !== 2}
                                                    {continue}
                                                {/if}
                                            <option value="{$id}" {if $status == $id}selected='selected'{/if}>
                                                {$name}
                                            </option>
                                            {/foreach}
                                        </select>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="notes" >Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['paymentTermData']['notes'])}{$a_TemplateData['paymentTermData']['notes']}{/if}</textarea>
                                </div>
                                
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-primary" id='addPaymentTerm'  type="submit" name="add_paymentTerm" value="{if isset($a_TemplateData['paymentTermData']['id']) && $a_TemplateData['paymentTermData']['id'] > 0}Save{else}Add{/if}"/>&nbsp;&nbsp;&nbsp;
                                    <input type="hidden" name="addPaymentTerm" value="Add"/>
                                    <a class="btn btn-default resetFormData" type="reset" href="{actionurl page=$actionPage}">Clear</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <form action="{actionurl page=$actionPage}" method="post" class="form-inline searchForm"  style="text-align: center;">
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
                    {if isset($a_TemplateData['searchData']['search_paymentTerm'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                        
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-7 col-md-12 formContainer">
                                <div class="form-group col-xs-4">
                                    <label for="name">
                                        Name
                                        <a data-toggle="tooltip" title="Term name">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" name="name" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-error-msg="Alphanumeric values only"  data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['name'])}{$a_TemplateData['searchData']['name']}{/if}' autocomplete="off" placeholder="Term name"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['searchData']['status'])}
                                        {assign var="status" value=$a_TemplateData['searchData']['status']}
                                    {else}
                                        {assign var="status" value=""}
                                    {/if}
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid status" data-validation-optional="true" data-placeholder="Choose a status...">
                                        <option value=""></option>
                                        {foreach $a_TemplateData["dataStatus"] as $id=>$name}
                                            {if $id !== 1 && $id !== 2}
                                                {continue}
                                            {/if}
                                        <option value="{$id}" {if $status == $id}selected='selected'{/if}>
                                            {$name}
                                        </option>
                                        {/foreach}
                                    </select>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="notes" >Notes</label>
                                    <textarea name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['searchData']['notes'])}{$a_TemplateData['searchData']['notes']}{/if}</textarea>
                                </div>
                                
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-primary" type="submit" name="search_paymentTerm" value="Search"/>&nbsp;&nbsp;&nbsp;
                                    <div class="btn btn-default resetForm">Clear</div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <form method="post" class="form-inline bulkForm" action="{actionurl page=$actionPage}">
                            <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                       <h2><i class="glyphicon glyphicon-th-large"></i> Payement Terms</h2>
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
                                <input class="btn btn-default btn-bulk btn-small" type="submit" name="do_bulkAction" value="Go"/>
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
                                    {if $a_TemplateData['allPaymentTerms']}
                                        {foreach $a_TemplateData['allPaymentTerms'] as $index=>$details}    
                                            <tr class="{if $index % 2 == 0}odd{else}even{/if}">
                                               <td>
                                                   <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                               </td>
                                               <td>{$index + 1}</td>
                                               <td>{$details->name}</td>
                                               <td>
                                                   {if $details->status == $a_TemplateData['ACTIVE']}
                                                        <span class="label-default label label-success">
                                                            {$a_TemplateData["dataStatus"][$details->status]}
                                                        </span>
                                                    {else if $details->status == $a_TemplateData['INACTIVE']}
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
                                               <td>
                                                   <a class="btn btn-info btn-small" href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>$a_TemplateData['EDIT']]}">
                                                       <i class="glyphicon glyphicon-edit icon-white"></i>
                                                       Edit
                                                   </a>
                                                   <a class="btn btn-danger btn-small delete" href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>$a_TemplateData['DELETE']]}">
                                                       <i class="glyphicon glyphicon-trash icon-white"></i>
                                                       Delete
                                                   </a>
                                               </td>
                                             </tr>
                                          {/foreach}
                                        {/if}
                                    </tbody>
                                </table>
                            </div>
                        {if isset($a_TemplateData['allPaymentTerms']) && $a_TemplateData['allPaymentTerms']}
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
            {if isset($a_TemplateData['allPaymentTerms']) && $a_TemplateData['allPaymentTerms']}
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
        }
    </script>
    {/literal}
{/block}


