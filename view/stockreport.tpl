{extends file="parent.tpl"}
{block  name="title" prepend}Stock Report{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i> {if isset($a_TemplateData['stockData']['id']) && $a_TemplateData['stockData']['id'] > 0}Update{else}Add New{/if}</h2>

                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
{*                    {if isset($a_TemplateData['stockData']['id']) || (isset($a_TemplateData['stockData']['add_stock']) && $a_TemplateData['errorMessage'])}*}
                    {if isset($a_TemplateData['stockData']['showForm'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                            <form action="{actionurl page='stockreport'}" method="post" class="form-inline addForm">
                                {if isset($a_TemplateData['stockData']['id']) && $a_TemplateData['stockData']['id'] > 0}
                                    {assign var=stockId value={$a_TemplateData['stockData']['id']}}
                                {else}
                                    {assign var=stockId value=0}
                                {/if}
                                <input type="hidden" name="id" value="{$stockId}"/>
                                
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['stockData']['supplierId'])}
                                        {assign var="supplierId" value=$a_TemplateData['stockData']['supplierId']}
                                    {else}
                                        {assign var="supplierId" value=0}
                                    {/if}
                                    <label for="supplierId">Supplier</label>
                                    <select id="supplierId" name="supplierId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid supplier" data-placeholder="Choose a supplier..." data-validation-optional="true">
                                        <option value="0"></option>
                                        {foreach $a_TemplateData['allSuppliers'] as $details}
                                            <option value="{$details->id}" {if $supplierId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>

                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['stockData']['productId'])}
                                        {assign var="productId" value=$a_TemplateData['stockData']['productId']}
                                    {else}
                                        {assign var="productId" value=""}
                                    {/if}
                                    <label for="productId">Products</label>
                                    {foreach $a_TemplateData['allProducts'] as $proDataArray}
                                        {foreach $proDataArray as $proDetails}
                                            <input type="hidden" id="proUnitPrice_{$proDetails->id}" value="{$proDetails->unit_price}"/>
                                        {/foreach}
                                    {/foreach}
                                    <select id="productId" name="productId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid product" data-placeholder="Choose a product...">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['allProducts'] as $groupName=>$proDataArray}
                                            {if {$groupName} == ""}
                                                {foreach $proDataArray as $proDetails}
                                                <option value="{$proDetails->id}" {if $productId == $proDetails->id}selected='selected'{/if}>
                                                    {$proDetails->name}
                                                </option>
                                                {/foreach}
                                            {else}
                                                <optgroup label="{$groupName}">
                                                    {foreach $proDataArray as $proDetails}
                                                    <option value="{$proDetails->id}" {if $productId == $proDetails->id}selected='selected'{/if}>
                                                        {$proDetails->name}
                                                    </option>
                                                    {/foreach}
                                                </optgroup>
                                            {/if}
                                        {/foreach}
                                    </select>
                                </div>

                                <div class="form-group col-xs-4">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" id="quantity" name="quantity" class="form-control" data-validation="number" data-validation-error-msg="Invalid quantity" data-validation-optional="true" value='{if isset($a_TemplateData['stockData']['quantity'])}{$a_TemplateData['stockData']['quantity']}{/if}' autocomplete="off"/>
                                </div>
                                
                                <div class="form-group col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="unitPrice">Unit Price</label>
                                    <input type="text" id="unitPrice" name="unitPrice" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid price" data-validation-optional="true" value='{if isset($a_TemplateData['stockData']['unitPrice'])}{$a_TemplateData['stockData']['unitPrice']}{/if}' autocomplete="off"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="amount">Amount</label>
                                    <input type="text" id="amount" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" value='{if isset($a_TemplateData['stockData']['amount'])}{$a_TemplateData['stockData']['amount']}{/if}' autocomplete="off"/>
                                </div>

                                <div class="form-group col-xs-4">
                                    <label for="purchaseDate">Purchase Date</label>
                                    <input type="text" id="purchaseDate" name="purchaseDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" value='{if isset($a_TemplateData['stockData']['purchaseDate'])}{$a_TemplateData['stockData']['purchaseDate']}{/if}' autocomplete="off"/>
                                </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="notes">Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="-&@%_ " data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['stockData']['notes'])}{$a_TemplateData['stockData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="add_stock" value="{if isset($a_TemplateData['stockData']['id']) && $a_TemplateData['stockData']['id'] > 0}Update{else}Add{/if}"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    {if isset($a_TemplateData['searchData']['search_stock'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                        
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-7 col-md-12 formContainer">
                            <form action="{actionurl page='stockreport'}" method="post" class="form-inline searchForm">
                                {if isset($a_TemplateData['searchData']['id']) && $a_TemplateData['searchData']['id'] > 0}
                                    {assign var=stockId value={$a_TemplateData['searchData']['id']}}
                                {else}
                                    {assign var=stockId value=0}
                                {/if}
                                <input type="hidden" name="id" value="{$stockId}"/>
                                
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['searchData']['supplierId'])}
                                        {assign var="supplierId" value=$a_TemplateData['searchData']['supplierId']}
                                    {else}
                                        {assign var="supplierId" value=0}
                                    {/if}
                                    <label for="supplierId">Supplier</label>
                                    <select id="supplierId" name="supplierId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid supplier" data-placeholder="Choose a supplier..." data-validation-optional="true">
                                        <option value="0"></option>
                                        {foreach $a_TemplateData['allSuppliers'] as $details}
                                            <option value="{$details->id}" {if $supplierId == $details->id}selected='selected'{/if}>
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
                                    <label for="productId">Products</label>
                                    {foreach $a_TemplateData['allProducts'] as $proDataArray}
                                        {foreach $proDataArray as $proDetails}
                                            <input type="hidden" id="proUnitPrice_{$proDetails->id}" value="{$proDetails->unit_price}"/>
                                        {/foreach}
                                    {/foreach}
                                    <select name="productId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid product" data-placeholder="Choose a product..." data-validation-optional="true">
                                        <option value="0"></option>
                                        {foreach $a_TemplateData['allProducts'] as $groupName=>$proDataArray}
                                            {if {$groupName} == ""}
                                                {foreach $proDataArray as $proDetails}
                                                <option value="{$proDetails->id}" {if $productId == $proDetails->id}selected='selected'{/if}>
                                                    {$proDetails->name}
                                                </option>
                                                {/foreach}
                                            {else}
                                                <optgroup label="{$groupName}">
                                                    {foreach $proDataArray as $proDetails}
                                                    <option value="{$proDetails->id}" {if $productId == $proDetails->id}selected='selected'{/if}>
                                                        {$proDetails->name}
                                                    </option>
                                                    {/foreach}
                                                </optgroup>
                                            {/if}
                                        {/foreach}
                                    </select>
                                </div>

                                <div class="form-group col-xs-4">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" name="quantity" class="form-control" data-validation="number" data-validation-error-msg="Invalid quantity" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['quantity'])}{$a_TemplateData['searchData']['quantity']}{/if}' autocomplete="off"/>
                                </div>
                                
                                <div class="form-group col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="unitPrice">Unit Price</label>
                                    <input type="text" name="unitPrice" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid price" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['unitPrice'])}{$a_TemplateData['searchData']['unitPrice']}{/if}' autocomplete="off"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="amount">Amount</label>
                                    <input type="text" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['amount'])}{$a_TemplateData['searchData']['amount']}{/if}' autocomplete="off"/>
                                </div>

                                <div class="form-group col-xs-4">
                                    <label for="purchaseDate">Purchase Date</label>
                                    <input type="text" name="purchaseDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['purchaseDate'])}{$a_TemplateData['searchData']['purchaseDate']}{/if}' autocomplete="off"/>
                                </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="notes">Notes</label>
                                    <textarea name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="-&@%_ " data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['searchData']['notes'])}{$a_TemplateData['searchData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="search_stock" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <h2><i class="glyphicon glyphicon-th-large"></i> Stock Report</h2>
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
                        <form method="post" class="bulkForm" action="{actionurl page='stockreport'}">
                            <div class="breadcrumb">
                                <div id="bulk-action" class="actions" style="border:0px solid red;width: 220px;">
                                    Bulk Action:
                                    <select name="bulkAction" class="form-control" data-validation="number" data-validation-error-msg="Please select an action">
                                        <option value="">Choose...</option>
                                        <option value="100">Delete</option>
                                        {*<optgroup label="Progresses">
                                        {foreach $a_TemplateData['productId'] as $details}
                                            <option value="{$details->id}">{$details->name}</option>
                                        {/foreach}
                                        </optgroup>*}
                                    </select>
                                    <input class="btn btn-default btn-bulk btn-small" type="submit" name="do_bulk_action" value="Go"/>
                                </div>
                                <div class="totalAmount">
                                    Total Amount: 
                                    {if isset($a_TemplateData['allStock']['totalAmount'])}
                                        {$a_TemplateData['allStock']['totalAmount']}
                                    {else}
                                        0
                                    {/if}
                                </div>
                            </div>
                            <table class="tablesorter tablesorter-default" border="0" cellpadding="0" cellspacing="1">
                                <thead>
                                  <tr class="tablesorter-headerRow">
                                    <th style="background:none; padding-left:8px;">
                                        All
                                        <input type="checkbox" name="selectAll" class="selectAll"/>
                                    </th>
                                    <th class="tablesorter-header" data-column="1"><div class="tablesorter-header-inner">Slno</div></th>
                                    <th class="tablesorter-header" data-column="3"><div class="tablesorter-header-inner">Product</div></th>      
                                    <th class="tablesorter-header" data-column="4"><div class="tablesorter-header-inner">Supplier</div></th>
                                    <th class="tablesorter-header" data-column="5"><div class="tablesorter-header-inner">Quantity</div></th>
                                    <th class="tablesorter-header" data-column="5"><div class="tablesorter-header-inner">Unit Price</div></th>
                                    <th class="tablesorter-header" data-column="5"><div class="tablesorter-header-inner">Amount</div></th>
                                    <th class="tablesorter-header" data-column="5"><div class="tablesorter-header-inner">Purchase Date</div></th>
                                    <th class="tablesorter-header" data-column="6"><div class="tablesorter-header-inner">Notes</div></th>
                                    <th class="tablesorter-header" data-column="7"><div class="tablesorter-header-inner">Actions</div></th>
                                  </tr>
                                </thead>
                                <tbody>
                                {if $a_TemplateData['allStock']}
                                    {foreach $a_TemplateData['allStock'] as $index=>$details}    
                                        {if !isset($details->id)}{continue}{/if}
                                        <tr class="{if $index % 2 == 0}odd{else}even{/if}">
                                           <td style="width:1%; text-align: center;">
                                               <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                           </td>
                                           <td style="width:1%; text-align: center;">{$index + 1}</td>
                                           <td style="width:11%">{$details->productName}</td>
                                           <td style="width:9%;">{$details->supplierName}</td>
                                           <td style="width:9%; text-align: right;">{$details->quantity}</td>
                                           <td style="width:9%; text-align: right;">{$details->unitPrice}</td>
                                           <td style="width:9%; text-align: right;">{$details->amount}</td>
                                           <td style="width:12%; text-align: center;">{$details->purchaseDate}</td>
                                           <td style="width:16%">{$details->notes}</td>
                                           <td style="width:10%">
                                                <a class="btn btn-info btn-small" href="{actionurl page='stockreport' params=['id'=>$details->id, 'do'=>1]}">
                                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-small" href="{actionurl page='stockreport' params=['id'=>$details->id, 'do'=>2]}">
                                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                                    Delete
                                                </a>
                                           </td>
                                         </tr>
                                      {/foreach}
                                    {else}
                                        <tr>
                                            <td colspan="10" style="font-size: 14px; font-weight: bold; text-align: center; padding: 10px;"> 
                                                No Data Found
                                            </td>
                                        </tr>
                                    {/if}
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
{/block}
{block name="jsScriptBottoom"}
    {literal}
    <script>
        function init() {
            validateFormWithOutServer();
            dateSelector(new Date());
            selectChosen();
            $(".tablesorter").tablesorter({headers: {0: { sorter: false}, 9: { sorter: false}}, cssHeader:{}});

            selectAllData(".selectAll", "selectedData");
            resetFromData(".resetFormData", ".searchForm");
            
            jQuery("#amount").keyup(function(){
                var qty = jQuery("#quantity").val();
                var amount = jQuery(this).val();
                
                if (qty <= 0){
                    qty = 1;
                    jQuery("#quantity").val(qty);
                }
                
                jQuery("#unitPrice").val(amount/qty);      
            });
            
            jQuery("#quantity").keyup(function(){
                var amount = jQuery("#amount").val();
                var qty = jQuery(this).val();
                var up = jQuery("#unitPrice").val();
                
                if (qty <= 0){
                    qty = 1;
                    jQuery("#quantity").val(qty);
                }
                
                if (amount < 0){
                    amount = 0;
                    jQuery("#amount").val(amount);
                }
                
                if (up <= 0){
                    jQuery("#unitPrice").val(amount/qty); 
                }
                else{
                    jQuery("#amount").val(up*qty); 
                }
            });
            
            jQuery("#unitPrice").keyup(calcOnTypeAmount);
        }
    </script>
    {/literal}
{/block}


