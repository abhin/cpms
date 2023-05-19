{extends file="parent.tpl"}
{block  name="title" prepend}Bank Details{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
    <form method="post" action="{actionurl page=$actionPage}" id="selectSupplierOrBuyer">
        <div class="row">
            <div class="breadcrumb">
                {if isset ($a_TemplateData['bankDetailsData']['isSupplierOrBuyer'])}
                    {assign var="isSupplierOrBuyer" value=$a_TemplateData['bankDetailsData']['isSupplierOrBuyer']}
                {else}
                    {assign var="isSupplierOrBuyer" value=1}
                {/if}
                
                    <select id="isSupplierOrBuyer" name="{'isSupplierOrBuyer'|md5}" class="form-control chosen-select" data-placeholder="Choose..." style="width: 390px; display: none;">
                        <option value="0"></option>
                        <option value="1" {if $isSupplierOrBuyer == 1} selected="selected" {/if}>Supplier</option>
{*                        <option value="2" {if $isSupplierOrBuyer == 2} selected="selected" {/if}>Buyer</option>*}
                    </select>
                </form>
            </div>
        </div>
        {if $isSupplierOrBuyer > 0}
        <!-- Add new form -->
        <form action="{actionurl page=$actionPage params=["isSupplierOrBuyer"=>$isSupplierOrBuyer]}" method="post" class="form-inline addForm"  style="text-align: center;">
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" onclick="return false;">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;{if isset($a_TemplateData['bankDetailsData']['id']) && $a_TemplateData['bankDetailsData']['id'] > 0}Edit{else}Add New{/if}</h2>

                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
                    {if isset($a_TemplateData['bankDetailsData']['showForm'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                                {if isset($a_TemplateData['bankDetailsData']['id']) &&  $a_TemplateData['bankDetailsData']['id'] > 0}
                                    {assign var=bankDetailsId value={$a_TemplateData['bankDetailsData']['id']}}
                                {else}
                                    {assign var=bankDetailsId value=0}
                                {/if}
                                <input type="hidden" name="id" value="{$bankDetailsId}"/>
                                
                                <input type="hidden" name="{'isSupplierOrBuyer'|md5}" value="{$isSupplierOrBuyer}"/>
                                
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['bankDetailsData']['supplierOrBuyerId'])}
                                        {assign var="supplierOrBuyerId" value=$a_TemplateData['bankDetailsData']['supplierOrBuyerId']}
                                    {else}
                                        {assign var="supplierOrBuyerId" value=0}
                                    {/if}
                                    <label for="supplierOrBuyerId">Name</label>
                                    <select id="supplierOrBuyerId" name="supplierOrBuyerId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Select name" data-placeholder="Choose...">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['supplierOrBuyerName'] as $details}
                                            <option value="{$details->id}" {if $supplierOrBuyerId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                    
                                <div class="form-group col-xs-4">
                                    <label for="bankName">
                                        Bank Name
                                        <a data-toggle="tooltip" title="Bank Name">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="bankName" name="bankName" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-error-msg="Invalid name" value='{if isset($a_TemplateData['bankDetailsData']['bankName'])}{$a_TemplateData['bankDetailsData']['bankName']}{/if}' autocomplete="off" placeholder="Bank Name"/>
                                </div>
                                    
                                <div class="form-group col-xs-4">
                                    <label for="accountNumber">
                                        Account Number
                                        <a data-toggle="tooltip" title="Account Number">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="accountNumber" name="accountNumber" class="form-control" data-validation="number server" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-url="{actionurl page=$ajaxFilePath params=["do"=>$a_TemplateData['VALIDATE'], "id"=>$bankDetailsId]}" data-validation-error-msg="Invalid Acc number" value='{if isset($a_TemplateData['bankDetailsData']['accountNumber'])}{$a_TemplateData['bankDetailsData']['accountNumber']}{/if}' autocomplete="off" placeholder="Account Number"/>
                                </div>
                                
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="branchName">
                                        Branch Name
                                        <a data-toggle="tooltip" title="Branch Name">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="branchName" name="branchName" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-error-msg="Invalid name" value='{if isset($a_TemplateData['bankDetailsData']['branchName'])}{$a_TemplateData['bankDetailsData']['branchName']}{/if}' autocomplete="off" placeholder="Branch"/>
                                </div>
                                                                
                                <div class="form-group col-xs-4">
                                    <label for="branchCode">
                                        Branch Code
                                        <a data-toggle="tooltip" title="Branch Code">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="branchCode" name="branchCode" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-error-msg="Invalid code" data-validation-optional="true" value='{if isset($a_TemplateData['bankDetailsData']['branchCode'])}{$a_TemplateData['bankDetailsData']['branchCode']}{/if}' autocomplete="off" placeholder="Branch Code"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="ifscCode">
                                        IFSC Code
                                        <a data-toggle="tooltip" title="Branch Code">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="ifscCode" name="ifscCode" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Invalid code" data-validation-optional="true" value='{if isset($a_TemplateData['bankDetailsData']['ifscCode'])}{$a_TemplateData['bankDetailsData']['ifscCode']}{/if}' autocomplete="off" placeholder="IFSC Code"/>
                                </div>
                                </div>
                                
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="branchAddress">Branch Address</label>
                                    <textarea id="branchAddress" name="branchAddress" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only">{if isset($a_TemplateData['bankDetailsData']['branchAddress'])}{$a_TemplateData['bankDetailsData']['branchAddress']}{/if}</textarea>
                                </div>
                                
                                
                                <div class="form-group col-xs-4">
                                    <label for="notes" >Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Invalid address" data-validation-optional="true">{if isset($a_TemplateData['bankDetailsData']['notes'])}{$a_TemplateData['bankDetailsData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-primary" id='addUnit'  type="submit" name="add_bankDetails" value="{if isset($a_TemplateData['bankDetailsData']['id']) && $a_TemplateData['bankDetailsData']['id'] > 0}Save{else}Add{/if}"/>&nbsp;&nbsp;&nbsp;
                                    <input type="hidden" name="addBankDetails" value="addBankDetails"/>
                                    <a class="btn btn-default resetFormData" type="reset" href="{actionurl page=$actionPage}">Clear</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                 </form>
                                <form action="{actionurl page=$actionPage params=["isSupplierOrBuyer"=>$isSupplierOrBuyer]}" method="post" class="form-inline searchForm"  style="text-align: center;">
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
                    {if isset($a_TemplateData['searchData']['search_bankDetails'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                        
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-7 col-md-12 formContainer">
                                <input type="hidden" name="{'isSupplierOrBuyer'|md5}" value="{$isSupplierOrBuyer}"/>
                                
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['searchData']['supplierOrBuyerId'])}
                                        {assign var="supplierOrBuyerId" value=$a_TemplateData['searchData']['supplierOrBuyerId']}
                                    {else}
                                        {assign var="supplierOrBuyerId" value=0}
                                    {/if}
                                    <label for="supplierOrBuyerId">Name</label>
                                    <select name="supplierOrBuyerId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Select name" data-validation-optional="true" data-placeholder="Choose...">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['supplierOrBuyerName'] as $details}
                                            <option value="{$details->id}" {if $supplierOrBuyerId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                    
                                <div class="form-group col-xs-4">
                                    <label for="bankName">
                                        Bank Name
                                        <a data-toggle="tooltip" title="Bank Name">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" name="bankName" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-error-msg="Invalid name" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['bankName'])}{$a_TemplateData['searchData']['bankName']}{/if}' autocomplete="off" placeholder="Bank Name"/>
                                </div>
                                    
                                <div class="form-group col-xs-4">
                                    <label for="accountNumber">
                                        Account Number
                                        <a data-toggle="tooltip" title="Account Number">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" name="accountNumber" class="form-control" data-validation="number server" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-url="{actionurl page='bankdetailsvalidate' params=["do"=>"1", "id"=>$bankDetailsId]}" data-validation-error-msg="Invalid Acc number" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['accountNumber'])}{$a_TemplateData['searchData']['accountNumber']}{/if}' autocomplete="off" placeholder="Account Number"/>
                                </div>
                                
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="branchName">
                                        Branch Name
                                        <a data-toggle="tooltip" title="Branch Name">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" name="branchName" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-error-msg="Invalid name" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['branchName'])}{$a_TemplateData['searchData']['branchName']}{/if}' autocomplete="off" placeholder="Branch"/>
                                </div>
                                                                
                                <div class="form-group col-xs-4">
                                    <label for="branchCode">
                                        Branch Code
                                        <a data-toggle="tooltip" title="Branch Code">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" name="branchCode" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-error-msg="Invalid code" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['branchCode'])}{$a_TemplateData['searchData']['branchCode']}{/if}' autocomplete="off" placeholder="Branch Code"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="ifscCode">
                                        IFSC Code
                                        <a data-toggle="tooltip" title="Branch Code">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" name="ifscCode" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Invalid code" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['ifscCode'])}{$a_TemplateData['searchData']['ifscCode']}{/if}' autocomplete="off" placeholder="IFSC Code"/>
                                </div>
                                </div>
                                
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="branchAddress" >Branch Address</label>
                                    <textarea name="branchAddress" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true">{if isset($a_TemplateData['searchData']['branchAddress'])}{$a_TemplateData['searchData']['branchAddress']}{/if}</textarea>
                                </div>
                                
                                
                                <div class="form-group col-xs-4">
                                    <label for="notes" >Notes</label>
                                    <textarea name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Invalid address" data-validation-optional="true">{if isset($a_TemplateData['searchData']['notes'])}{$a_TemplateData['searchData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-primary" type="submit" name="search_bankDetails" value="Search"/>&nbsp;&nbsp;&nbsp;
                                    <div class="btn btn-default resetFormData">Clear</div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </form>
    <form method="post" class="bulkForm" action="{actionurl page=$actionPage params=["isSupplierOrBuyer"=>$isSupplierOrBuyer]}">
                            <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-th-large"></i> Bank Details</h2>
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
                                    {if $a_TemplateData['allBankDetails']}
                                        {foreach $a_TemplateData['allBankDetails'] as $index=>$details}    
                                            <tr>
                                               <td>
                                                   <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                               </td>
                                               <td>{$index + 1}</td>
                                               <td>{$details->name}</td>
                                               <td>{$details->bankName}, {$details->branchName} Branch</td>
                                               <td>{$details->accountNumber}</td>
                                               <td>{$details->branchCode}</td>
                                               <td>{$details->ifscCode}</td>
                                               <td>{$details->branchAddress}</td>
                                               <td>{$details->notes}</td>
                                               <td>
                                                   <a class="btn btn-info btn-small" data-toggle="tooltip" data-original-title="Edit bankDetails." href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>$a_TemplateData['EDIT'], 'isSupplierOrBuyer'=>$details->isSupplierOrBuyer]}">
                                                       <i class="glyphicon glyphicon-edit icon-white"></i>
                                                       Edit
                                                   </a>
                                                   <a class="btn btn-danger btn-small" data-toggle="tooltip" data-original-title="Delete bankDetails." href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>$a_TemplateData['DELETE'], "isSupplierOrBuyer"=>$details->isSupplierOrBuyer]}">
                                                       <i class="glyphicon glyphicon-trash icon-white"></i>
                                                       Delete
                                                   </a>
                                               </td>
                                             </tr>
                                          {/foreach}
                                        {/if}
                                    </tbody>
                                </table>
                                    {if $a_TemplateData['allBankDetails']}
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
        {/if}
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
            {if isset($a_TemplateData['allBankDetails']) && $a_TemplateData['allBankDetails']}
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


