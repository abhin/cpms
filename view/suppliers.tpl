{extends file="parent.tpl"}
{block  name="title" prepend}Suppliers{/block}
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
                        <h2><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;{if isset($a_TemplateData['supplierData']['id']) && $a_TemplateData['supplierData']['id'] > 0}Edit{else}Add New{/if}</h2>

                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
                    {if isset($a_TemplateData['supplierData']['showForm'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                                {if isset($a_TemplateData['supplierData']['id']) &&  $a_TemplateData['supplierData']['id'] > 0}
                                    {assign var=supplierId value={$a_TemplateData['supplierData']['id']}}
                                {else}
                                    {assign var=supplierId value=0}
                                {/if}
                                <input type="hidden" name="id" value="{$supplierId}"/>
                                    
                                <div class="form-group col-xs-4">
                                    <label for="name">
                                        Name
                                        <a data-toggle="tooltip" title="Name of the supplier">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="name" name="name" class="form-control" data-validation="alphanumeric server" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-url="{actionurl page=$ajaxFilePath params=["do"=>$a_TemplateData['VALIDATE'], "id"=>$supplierId]}" data-validation-error-msg="Alphanumeric values only" value='{if isset($a_TemplateData['supplierData']['name'])}{$a_TemplateData['supplierData']['name']}{/if}' autocomplete="off" placeholder="Name"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="contactName" >
                                        Contact Name 
                                        <a data-toggle="tooltip" title="Name of the contact person">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="contactName" name="contactName" class="form-control" data-validation="alphanumeric" data-validation-allowing=" "  data-validation-error-msg="Alphanumeric values only" data-validation-optional="true" value='{if isset($a_TemplateData['supplierData']['contactName'])}{$a_TemplateData['supplierData']['contactName']}{/if}' autocomplete="off" placeholder="Contact person name"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="email" >
                                        Email
                                    </label>
                                    <input type="text" id="email" name="email" class="form-control" data-validation="email server" data-validation-url="{actionurl page=$ajaxFilePath params=["do"=>$a_TemplateData['VALIDATE'], "id"=>$supplierId]}" data-validation-error-msg="Invalid Email" data-validation-optional="true"  value='{if isset($a_TemplateData['supplierData']['email'])}{$a_TemplateData['supplierData']['email']}{/if}' autocomplete="off" placeholder="Email"/>
                                </div>
                                
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="phone" >
                                        Phone
                                    </label>
                                    <input type="text" id="phone" name="phone" class="form-control" data-validation="alphanumeric length" data-validation-allowing=" +-" data-validation-length="min10" data-validation-error-msg="Invaid number" data-validation-optional="true"  value='{if isset($a_TemplateData['supplierData']['phone'])}{$a_TemplateData['supplierData']['phone']}{/if}' autocomplete="off" placeholder="Phone"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['supplierData']['status'])}
                                        {assign var="status" value=$a_TemplateData['supplierData']['status']}
                                    {else}
                                        {assign var="status" value=1}
                                    {/if}
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid status" >
                                        <option value="1" {if $status == 1}selected='selected'{/if}>
                                            Active
                                        </option>
                                        <option value="2" {if $status == 2}selected='selected'{/if}>
                                            Inactive
                                        </option>
                                    </select>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="address" >Address
                                    <a data-original-title="Use ';' instead of '," data-toggle="tooltip" title="">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <textarea id="address" name="address" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only">{if isset($a_TemplateData['supplierData']['address'])}{$a_TemplateData['supplierData']['address']}{/if}</textarea>
                                </div>
                                </div>
                                
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="notes" >Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['supplierData']['notes'])}{$a_TemplateData['supplierData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-primary" id='addSupplier'  type="submit" name="add_supplier" value="{if isset($a_TemplateData['supplierData']['id']) && $a_TemplateData['supplierData']['id'] > 0}Save{else}Add{/if}"/>&nbsp;&nbsp;&nbsp;
                                    <input type="hidden" name="addSupplier" value="addSupplier"/>
                                    <a class="btn btn-default resetForm" type="reset" href="{actionurl page=$actionPage}">Clear</a>
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
                    {if isset($a_TemplateData['searchData']['search_supplier'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                        
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-7 col-md-12 formContainer">
                                {if isset($a_TemplateData['searchData']['id']) &&  $a_TemplateData['searchData']['id'] > 0}
                                    {assign var=supplierId value={$a_TemplateData['searchData']['id']}}
                                {else}
                                    {assign var=supplierId value=0}
                                {/if}
                                <input type="hidden" name="id" value="{$supplierId}"/>
                                    
                                <div class="form-group col-xs-4">
                                    <label for="name">
                                        Name
                                        <a data-toggle="tooltip" title="Name of the supplier">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" name="name" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric values only" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['name'])}{$a_TemplateData['searchData']['name']}{/if}' autocomplete="off" placeholder="Name"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="contactName" >
                                        Contact Name 
                                        <a data-toggle="tooltip" title="Name of the contact person">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" name="contactName" class="form-control" data-validation="alphanumeric" data-validation-allowing=" "  data-validation-error-msg="Alphanumeric values only" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['contactName'])}{$a_TemplateData['searchData']['contactName']}{/if}' autocomplete="off" placeholder="Contact person name"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="email" >
                                        Email
                                    </label>
                                    <input type="text" name="email" class="form-control" data-validation="email" data-validation-error-msg="Invalid Email" data-validation-optional="true"  value='{if isset($a_TemplateData['searchData']['email'])}{$a_TemplateData['searchData']['email']}{/if}' autocomplete="off" placeholder="Email"/>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="phone" >
                                        Phone
                                    </label>
                                    <input type="text" name="phone" class="form-control" data-validation="alphanumeric length" data-validation-allowing=" +-" data-validation-length="min10" data-validation-error-msg="Invaid number" data-validation-optional="true"  value='{if isset($a_TemplateData['searchData']['phone'])}{$a_TemplateData['searchData']['phone']}{/if}' autocomplete="off" placeholder="Phone"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['searchData']['status'])}
                                        {assign var="status" value=$a_TemplateData['searchData']['status']}
                                    {else}
                                        {assign var="status" value=""}
                                    {/if}
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid status" data-validation-optional="true">
                                        <option value="">
                                            Select
                                        </option>
                                        <option value="1" {if $status == 1}selected='selected'{/if}>
                                            Active
                                        </option>
                                        <option value="2" {if $status == 2}selected='selected'{/if}>
                                            Inactive
                                        </option>
                                    </select>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="address" >Address</label>
                                    <input type="text" name="address" class="form-control" data-validation="alphanumeric" data-validation-allowing="-&@%_ " data-validation-error-msg="Alphanumeric value only" data-validation-optional="true" value="{if isset($a_TemplateData['searchData']['address'])}{$a_TemplateData['searchData']['address']}{/if}" />
                                </div>
                                </div>
                               
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="notes" >Notes</label>
                                    <textarea name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="-&@%_ " data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['searchData']['notes'])}{$a_TemplateData['searchData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-primary"  type="submit" name="search_supplier" value="Search"/>&nbsp;&nbsp;&nbsp;
                                    <div class="btn btn-default resetForm">Clear</div>
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
                        <h2><i class="glyphicon glyphicon-th-large"></i> Account Types</h2>
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
                                        <option value="">Choose...</option>
                                        <option value="100">Delete</option>
                                        {*<optgroup label="Progresses">
                                        {foreach $a_TemplateData['progressStatus'] as $details}
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
                                    {if $a_TemplateData['allSuppliers']}
                                        {foreach $a_TemplateData['allSuppliers'] as $index=>$details}    
                                            <tr class="{if $index % 2 == 0}odd{else}even{/if}">
                                               <td>
                                                   <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                               </td>
                                               <td>{$index + 1}</td>
                                               <td>{$details->name}</td>
                                               <td>{$details->contactName}</td>
                                               <td>{$details->email}</td>
                                               <td>{$details->phone}</td>
                                               <td>{$details->address}</td>
                                               <td>
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
                                               <td>{$details->notes}</td>
                                               <td>
                                                   <a class="btn btn-info btn-small" href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>$a_TemplateData['EDIT']]}">
                                                       <i class="glyphicon glyphicon-edit icon-white"></i>
                                                       Edit
                                                   </a>
                                                   <a class="btn btn-danger btn-small" href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>$a_TemplateData['DELETE']]}">
                                                       <i class="glyphicon glyphicon-trash icon-white"></i>
                                                       Delete
                                                   </a>
                                               </td>
                                             </tr>
                                          {/foreach}
                                        {/if}
                                    </tbody>
                                </table>
                                    {if $a_TemplateData['allSuppliers']}
                        <div id="loadMore" class="breadcrumb">
                            Load More&nbsp;<i class="glyphicon glyphicon-download-alt"></i>
                        </div>
                        <div class="breadcrumb loading">Loading...</div>
                                {/if}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
{/block}
{block name="jsScriptBottoom"}
    {literal}
    <script>
        function init(){
            validateFormWithServer();
            selectChosen();
            selectAllData(".selectAll", "selectedData");
            resetFromData(".searchForm");
            
            var tableOptions = {};
            {/literal}
            {if isset($a_TemplateData['allSuppliers']) && $a_TemplateData['allSuppliers']}
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


