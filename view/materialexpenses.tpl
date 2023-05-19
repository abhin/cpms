{extends file="parent.tpl"}
{block  name="title" prepend}Material Expenses{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
        <!-- Add new form -->
        <form method="post" action="{actionurl page=$actionPage}" id="selectProject">
        <div class="row">
            <div class="breadcrumb">
                {if isset ($a_TemplateData['materialExpenseData']['projectId'])}
                    {assign var="projectId" value=$a_TemplateData['materialExpenseData']['projectId']}
                {else}
                    {assign var="projectId" value="0"}
                {/if}
                    <select id="projectId" name="{'projectId'|md5}" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Please select a valid project"  data-placeholder="Choose a project..." class="chosen-select" style="width: 390px; display: none;" tabindex="-1">
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
                        <h2><i class="glyphicon glyphicon-plus-sign"></i> {if isset($a_TemplateData['materialExpenseData']['id']) && $a_TemplateData['materialExpenseData']['id'] > 0}Update{else}Add New{/if}</h2>

                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
{*                    {if isset($a_TemplateData['materialExpenseData']['id']) || (isset($a_TemplateData['materialExpenseData']['add_materialExpense']) && $a_TemplateData['errorMessage'])}*}
                    {if isset($a_TemplateData['materialExpenseData']['showForm'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                            <div>
                                {if isset($a_TemplateData['materialExpenseData']['id']) && $a_TemplateData['materialExpenseData']['id'] > 0}
                                    <input type="hidden" name="id" value="{$a_TemplateData['materialExpenseData']['id']}"/>
                                {/if}
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['materialExpenseData']['stageId'])}
                                        {assign var="stageId" value=$a_TemplateData['materialExpenseData']['stageId']}
                                    {else}
                                        {assign var="stageId" value=0}
                                    {/if}
                                    <label for="stageId" class="control-label">Stages</label>
                                    <select id="stageId" name="stageId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid stage" data-placeholder="Choose a stage..."  data-validation-optional="true">
                                        <option value="0"></option>
                                        {foreach $a_TemplateData['allStages'] as $details}
                                            <option value="{$details->id}" {if $stageId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                    <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['materialExpenseData']['productId'])}
                                        {assign var="productId" value=$a_TemplateData['materialExpenseData']['productId']}
                                    {else}
                                        {assign var="productId" value=0}
                                    {/if}
                                    <label for="productId" class="control-label">Product/  Materail Category</label>
                                    {foreach $a_TemplateData['allProducts'] as $catDataArray}
                                        {foreach $catDataArray as $catDetails}
                                            <input type="hidden" id="proUnitPrice__{$catDetails->id}" value="{$catDetails->unitPrice}"/>
                                            <input type="hidden" id="proMeasureUnit_{$catDetails->id}" value="{$catDetails->measuringUnitId}"/>
                                        {/foreach}
                                    {/foreach}
                                    <select id="productId" name="productId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid product/ materialExpense" data-placeholder="Choose a product/ materialExpense...">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['allProducts'] as $groupName=>$catDataArray}
                                            {if {$groupName} == ""}
                                                {foreach $catDataArray as $catDetails}
                                                <option value="{$catDetails->id}" {if $productId == $catDetails->id}selected='selected'{/if}>
                                                    {$catDetails->name}
                                                </option>
                                                {/foreach}
                                            {else}
                                                <optgroup label="{$groupName}">
                                                    {foreach $catDataArray as $catDetails}
                                                    <option value="{$catDetails->id}" {if $productId == $catDetails->id}selected='selected'{/if}>
                                                        {$catDetails->name}
                                                    </option>
                                                    {/foreach}
                                                </optgroup>
                                            {/if}
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="purchaseDate" class="control-label">Purchase/  Expense Date</label>
                                    <input type="text" id="purchaseDate" name="purchaseDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" value='{if isset($a_TemplateData['materialExpenseData']['purchaseDate'])}{$a_TemplateData['materialExpenseData']['purchaseDate']}{/if}' autocomplete="off"/>
                                </div>
                                </div>
                                
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                    <label for="unitPrice" class="control-label">Unit Price</label>
                                    <div class="input-group" style="width:100% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                    <input type="text" id="unitPrice" name="unitPrice" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid price" data-validation-optional="true" value='{if isset($a_TemplateData['materialExpenseData']['unitPrice'])}{$a_TemplateData['materialExpenseData']['unitPrice']}{/if}' autocomplete="off"/>
                                </div>
                                </div>
                                    <div class="form-group col-xs-4">
                                    <label for="quantity" class="control-label">Quantity</label>
                                    <input type="text" id="quantity" name="quantity" class="form-control" data-validation="number" data-validation-error-msg="Invalid quantity" data-validation-optional="true" value='{if isset($a_TemplateData['materialExpenseData']['quantity'])}{$a_TemplateData['materialExpenseData']['quantity']}{else}1{/if}' autocomplete="off"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['materialExpenseData']['measuringUnitId'])}
                                        {assign var="measuringUnitId" value=$a_TemplateData['materialExpenseData']['measuringUnitId']}
                                    {else}
                                        {assign var="measuringUnitId" value=0}
                                    {/if}
                                    <label for="measuringUnitId">Measuring Unit</label>
                                    <select id="measuringUnitId" name="measuringUnitId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid unit" data-placeholder="Choose a unit...">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['allUnit'] as $details}
                                            <option value="{$details->id}" {if $measuringUnitId == $details->id}selected='selected'{/if}>
                                                {$details->name} ({$details->shortCode})
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                    <label for="amount" class="control-label">Amount</label>
                                    <div class="input-group" style="width:100% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                    <input type="text" id="amount" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" value='{if isset($a_TemplateData['materialExpenseData']['amount'])}{$a_TemplateData['materialExpenseData']['amount']}{/if}' autocomplete="off"/>
                                </div>
                                </div>

                                    <div class="form-group col-xs-4">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['materialExpenseData']['notes'])}{$a_TemplateData['materialExpenseData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                    <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="add_materialExpense" value="{if isset($a_TemplateData['materialExpenseData']['id']) && $a_TemplateData['materialExpenseData']['id'] > 0}Update{else}Add{/if}"/>
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
                    {if isset($a_TemplateData['searchData']['search_materialExpense'])}
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
                                    {if isset ($a_TemplateData['searchData']['stageId'])}
                                        {assign var="stageId" value=$a_TemplateData['searchData']['stageId']}
                                    {else}
                                        {assign var="stageId" value=0}
                                    {/if}
                                    <label for="stageId" class="control-label">Stages</label>
                                    <select  name="stageId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid stage" data-placeholder="Choose a stage..."  data-validation-optional="true">
                                        <option value="0"></option>
                                        {foreach $a_TemplateData['allStages'] as $details}
                                            <option value="{$details->id}" {if $stageId == $details->id}selected='selected'{/if}>
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
                                    <label for="productId" class="control-label">Product/ Expense Category</label>
                                    <select  name="productId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid product/materialExpense" data-placeholder="Choose a product/materialExpense..." data-validation-optional="true">
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
                                    <label for="purchaseDate" class="control-label">Purchase/  Expense Date</label>
                                    <input type="text" name="purchaseDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['purchaseDate'])}{$a_TemplateData['searchData']['purchaseDate']}{/if}' autocomplete="off"/>
                                </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['searchData']['notes'])}{$a_TemplateData['searchData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                <div class="form-group has-feedback" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="search_materialExpense" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <h2><i class="glyphicon glyphicon-th-large"></i> Material Expense</h2>
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
                            <div class="col-lg-12">
                                <div class="breadcrumb col-lg-12">
                                    {*<div class="actions" style="border:0px solid red;width: 220px; float: right;">
                                        Export As:
                                        <select name="exportAction" class="form-control">
                                            <option value="1">Excel</option>
                                            <option value="2">CSV</option>
                                            <option value="3">PDF</option>
                                        </select>
                                        <input class="btn btn-default btn-bulk btn-small" type="submit" name="export_action" value="Export"/>
                                    </div>*}
                                    <div class="col-lg-6">
                                        <div id="bulk-action" class="actions">
                                            Bulk Action:
                                            <select name="bulkAction" id="bulkAction" class="form-control" data-validation="number" data-validation-error-msg="Please select an action">
                                                <option value="">Choose...</option>
                                                <option value="{$a_TemplateData['DELETE']}">Delete</option>
                                            </select>
                                            <input class="btn btn-default btn-bulk btn-small" type="submit" name="do_bulkAction" value="Go"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="text-align: right; ">
                                        Wage(s) Total: <i class="fa fa-inr"></i> <span id="totalAmount">{*$totalWages*}0</span>
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
                                {if $a_TemplateData['allMaterialExpense']}
                                    {foreach $a_TemplateData['allMaterialExpense'] as $index=>$details}    
                                        {if !isset($details->id)}{continue}{/if}
                                        <tr class="{if $index % 2 == 0}odd{else}even{/if}">
                                           <td>
                                               <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                           </td>
                                           <td>{$index + 1}</td>
                                           <td>{$details->stageName}</td>
                                           <td>{$details->productName}</td>
                                           <td>{$details->quantity}</td>
                                           <td>{$details->measuringUnitName} {if $details->shortCode}({$details->shortCode}){/if}</td>
                                           <td>{$details->unitPrice}</td>
                                           <td>{$details->amount}</td>
                                           <td>{$details->purchaseDate}</td>
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
                        {if $a_TemplateData['allMaterialExpense']}
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
            {if isset($a_TemplateData['allMaterialExpense']) && $a_TemplateData['allMaterialExpense']}
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

                loadDataTable('#tableData', '{/literal}{actionurl page=$ajaxFilePath params=['projectId'=>$projectId]}{literal}', {/literal}{$a_TemplateData['DATA_PER_PAGE']}{literal}, tableOptions, bind);
            
            jQuery("#projectId").change(function(){
                $("#selectProject").submit();
            });
            
            jQuery("#productId").change(calcOnchangeAmount);
            jQuery("#quantity, #unitPrice").keyup(calcOnTypeAmount);
            
            function calcOnTypeAmount(){
                var unitPrice = $("#unitPrice").val();
                var quantity = $("#quantity").val();
                
                if(isNaN(quantity) || quantity == "" || quantity < 0){
                    quantity = 1;
                }
                
                if(isNaN(unitPrice) || unitPrice == "" || unitPrice < 0){
                    unitPrice = 0.00;
                }
                
                var totalAmount = (unitPrice * quantity);
                
                if (isNaN(totalAmount) || totalAmount <=0){
                    totalAmount = '';
                }
                
                $("#amount").val(totalAmount);
            }
            
            function calcOnchangeAmount()
            {
                var catId = $("#productId").val();
                var quantity = $("#quantity").val();
                
                if(catId > 0){
                    var unitPrice = $("#proUnitPrice__" + catId).val();
                    var measurUnit = $("#proMeasureUnit_" + catId).val();
                }
                else{
                    unitPrice = 0.00;
                }
                
                if(isNaN(quantity) ||  quantity == "" || quantity < 0){
                    quantity = 1;
                }
                $("#unitPrice").val(unitPrice);
                $("#measuringUnitId").val(measurUnit).trigger("chosen:updated");
                var totalAmount = (unitPrice * quantity);
                
                if (isNaN(totalAmount) || totalAmount <=0){
                    totalAmount = 0;
                }
                
                $("#amount").val(totalAmount);
            }
            
            getToalAmount(8);
        }
        
        function bind(){
            getToalAmount(8);
        }
    </script>
    {/literal}
{/block}


