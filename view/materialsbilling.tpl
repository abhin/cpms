{extends file="parent.tpl"}
{block  name="title" prepend}Purchases{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i> {if isset($a_TemplateData['purchaseData']['id']) && $a_TemplateData['purchaseData']['id'] > 0}Update{else}Add New{/if}</h2>

                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
{*                    {if isset($a_TemplateData['purchaseData']['id']) || (isset($a_TemplateData['purchaseData']['add_purchase']) && $a_TemplateData['errorMessage'])}*}
                    {if isset($a_TemplateData['purchaseData']['showForm'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                            <form action="{actionurl page='purchases'}" method="post" class="form-inline addForm">
                                {if isset($a_TemplateData['purchaseData']['id']) && $a_TemplateData['purchaseData']['id'] > 0}
                                    {assign var=purchaseId value={$a_TemplateData['purchaseData']['id']}}
                                {else}
                                    {assign var=purchaseId value=0}
                                {/if}
                                <input type="hidden" name="id" value="{$purchaseId}"/>
                                
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['purchaseData']['supplierId'])}
                                        {assign var="supplierId" value=$a_TemplateData['purchaseData']['supplierId']}
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
                                    {if isset ($a_TemplateData['purchaseData']['productId'])}
                                        {assign var="productId" value=$a_TemplateData['purchaseData']['productId']}
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
                                    {if isset ($a_TemplateData['purchaseData']['taxId'])}
                                        {assign var="taxId" value=$a_TemplateData['purchaseData']['taxId']}
                                    {else}
                                        {assign var="taxId" value=0}
                                    {/if}
                                    <label for="taxId">Tax</label>
                                    <select id="taxId" name="taxId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid tax" data-validation-optional="true" data-placeholder="Choose a tax...">
                                        <option value="0"></option>
                                        {foreach $a_TemplateData['allTax'] as $details}
                                            <option value="{$details->id}" {if $taxId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>

                                <div class="form-group col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" id="quantity" name="quantity" class="form-control" data-validation="number" data-validation-error-msg="Invalid quantity" value='{if isset($a_TemplateData['purchaseData']['quantity'])}{$a_TemplateData['purchaseData']['quantity']}{/if}' autocomplete="off" placeholder="Quantity"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="unitPrice">Unit Price</label>
                                    <input type="text" id="unitPrice" name="unitPrice" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid price" data-validation-optional="true" value='{if isset($a_TemplateData['purchaseData']['unitPrice'])}{$a_TemplateData['purchaseData']['unitPrice']}{/if}' autocomplete="off"  placeholder="Unit Price"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="amount">Amount</label>
                                    <input type="text" id="amount" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" value='{if isset($a_TemplateData['purchaseData']['amount'])}{$a_TemplateData['purchaseData']['amount']}{/if}' autocomplete="off" placeholder="Amount"/>
                                </div>
                                </div>
                                
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="invoiceNumber">Invoice Number</label>
                                    <input type="text" id="invoiceNumber" name="invoiceNumber" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric values only" placeholder="Invoice Number" value="{if isset($a_TemplateData['purchaseData']['invoiceNumber'])}{$a_TemplateData['purchaseData']['invoiceNumber']}{/if}" autocomplete="on">
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="purchaseOrderNo">Purchase Order No</label>
                                    <input type="text" id="purchaseOrderNo" name="purchaseOrderNo" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric values only" data-validation-optional="true" placeholder="Purchase Order Number" value="{if isset($a_TemplateData['purchaseData']['purchaseOrderNo'])}{$a_TemplateData['purchaseData']['purchaseOrderNo']}{/if}" autocomplete="on">
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="purchaseDate">Purchase Date</label>
                                    <input type="text" id="purchaseDate" name="purchaseDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" placeholder="Purchase Date" value='{if isset($a_TemplateData['purchaseData']['purchaseDate'])}{$a_TemplateData['purchaseData']['purchaseDate']}{/if}' autocomplete="off"/>
                                </div>
                                </div>
                                
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="notes">Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['purchaseData']['notes'])}{$a_TemplateData['purchaseData']['notes']}{/if}</textarea>
                                </div>
                                <div class="form-group col-xs-4">
                                    <input type="checkbox" name="paidStatus" id="paidStatus" class="form-control" {if isset($a_TemplateData['purchaseData']['paidStatus']) && $a_TemplateData['purchaseData']['paidStatus'] == 1}checked="checked"{/if} value="1"/>
                                    <span class="label label-info" style="font-size: 12px; background-color: #033C73;">Paid</span>
                                </div>
                                    
                                <div class="form-group col-xs-4" id="paymentTermDurationContainer" {if isset($a_TemplateData['purchaseData']['paidStatus']) && $a_TemplateData['purchaseData']['paidStatus'] == 1}style="display: none;"{else}style="display: inline-block;"{/if}>
                                    <label for="paymentTermDuration">Payment Term Duration</label>
                                    <input type="text" id="paymentTermDuration" name="paymentTermDuration" class="form-control" data-validation="number" data-validation-error-msg="Invalid duration"placeholder="Payment Term Duration" data-validation-allowing="range[1;10000] value="{if isset($a_TemplateData['purchaseData']['paymentTermDuration'])}{$a_TemplateData['purchaseData']['paymentTermDuration']}{/if}"/>
                                    
                                    {if isset ($a_TemplateData['purchaseData']['paymentTermId'])}
                                        {assign var="paymentTermId" value=$a_TemplateData['purchaseData']['paymentTermId']}
                                    {else}
                                        {assign var="paymentTermId" value=""}
                                    {/if}
                                    <select id="paymentTermId" name="paymentTermId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid term" data-placeholder="Choose a term...">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['allPaymentTerm'] as $details}
                                            <option value="{$details->id}" {if $paymentTermId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="form-group col-xs-4" {if isset($a_TemplateData['purchaseData']['paidStatus']) && $a_TemplateData['purchaseData']['paidStatus'] == 1}style="display: inline-block;"{else}style="display: none;"{/if} id="paymentMethodContainer">
                                    {if isset ($a_TemplateData['purchaseData']['paymentMethodId'])}
                                        {assign var="paymentMethodId" value=$a_TemplateData['purchaseData']['paymentMethodId']}
                                    {else}
                                        {assign var="paymentMethodId" value=0}
                                    {/if}
                                    <label for="paymentMethodId">Payment Method</label>
                                    <select id="paymentMethodId" name="paymentMethodId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid tax" data-validation-optional="true" data-placeholder="Choose a method...">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['allPaymentMethod'] as $details}
                                            <option value="{$details->id}" {if $paymentMethodId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-primary" type="submit" name="add_purchase" value="{if isset($a_TemplateData['purchaseData']['id']) && $a_TemplateData['purchaseData']['id'] > 0}Update{else}Add{/if}"/>
                                    <a class="btn btn-default resetFormData" type="reset" href="{actionurl page='purchases'}">Clear</a>
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
                    {if isset($a_TemplateData['searchData']['search_purchase'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                        
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-7 col-md-12 formContainer">
                            <form action="{actionurl page='purchases'}" method="post" class="form-inline searchForm">
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['searchData']['supplierId'])}
                                        {assign var="supplierId" value=$a_TemplateData['searchData']['supplierId']}
                                    {else}
                                        {assign var="supplierId" value=0}
                                    {/if}
                                    <label for="supplierId">Supplier</label>
                                    <select name="supplierId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid supplier" data-placeholder="Choose a supplier..." data-validation-optional="true">
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
                                        {assign var="productId" value=""}
                                    {/if}
                                    <label for="productId">Products</label>
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
                                    {if isset ($a_TemplateData['searchData']['taxId'])}
                                        {assign var="taxId" value=$a_TemplateData['searchData']['taxId']}
                                    {else}
                                        {assign var="taxId" value=0}
                                    {/if}
                                    <label for="taxId">Tax</label>
                                    <select name="taxId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid tax" data-validation-optional="true" data-placeholder="Choose a tax...">
                                        <option value="0"></option>
                                        {foreach $a_TemplateData['allTax'] as $details}
                                            <option value="{$details->id}" {if $taxId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>

                                <div class="form-group col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" name="quantity" class="form-control" data-validation="number" data-validation-error-msg="Invalid quantity" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['quantity'])}{$a_TemplateData['searchData']['quantity']}{/if}' autocomplete="off" placeholder="Quantity"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="unitPrice">Unit Price</label>
                                    <input type="text" name="unitPrice" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid price" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['unitPrice'])}{$a_TemplateData['searchData']['unitPrice']}{/if}' autocomplete="off"  placeholder="Unit Price"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="amount">Amount</label>
                                    <input type="text" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['amount'])}{$a_TemplateData['searchData']['amount']}{/if}' autocomplete="off" placeholder="Amount"/>
                                </div>
                                </div>
                                
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="invoiceNumber">Invoice Number</label>
                                    <input type="text" name="invoiceNumber" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric values only" data-validation-optional="true" placeholder="Invoice Number" value="{if isset($a_TemplateData['searchData']['invoiceNumber'])}{$a_TemplateData['searchData']['invoiceNumber']}{/if}" autocomplete="on">
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="purchaseOrderNo">Purchase Order No</label>
                                    <input type="text" name="purchaseOrderNo" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric values only" data-validation-optional="true" placeholder="Purchase Order Number" value="{if isset($a_TemplateData['searchData']['purchaseOrderNo'])}{$a_TemplateData['searchData']['purchaseOrderNo']}{/if}" autocomplete="on">
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="purchaseDate">Purchase Date</label>
                                    <input type="text" name="purchaseDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" data-validation-optional="true" placeholder="Purchase Date" value='{if isset($a_TemplateData['searchData']['purchaseDate'])}{$a_TemplateData['searchData']['purchaseDate']}{/if}' autocomplete="off"/>
                                </div>
                                </div>
                                
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="notes">Notes</label>
                                    <textarea name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['searchData']['notes'])}{$a_TemplateData['searchData']['notes']}{/if}</textarea>
                                </div>
                                <div class="form-group col-xs-4">
                                    <input type="checkbox" name="paidStatus" class="form-control" {if isset($a_TemplateData['searchData']['paidStatus']) && $a_TemplateData['searchData']['paidStatus'] == 1}checked="checked"{/if} value="1"/>
                                    <span class="label label-success" style="font-size: 12px; background-color: #033C73;">Paid</span>
                                    <input type="checkbox" name="paidStatus" class="form-control" {if isset($a_TemplateData['searchData']['paidStatus']) && $a_TemplateData['searchData']['paidStatus'] == 2}checked="checked"{/if} value="2"/>
                                    <span class="label label-danger" style="font-size: 12px; background-color: #033C73;">Unpaid</span>
                                </div>
                                    
                                <div class="form-group col-xs-4">
                                    <label for="paymentTermDuration">Payment Term Duration</label>
                                    <input type="text" name="paymentTermDuration" class="form-control" data-validation="number" data-validation-error-msg="Invalid duration" data-validation-optional="true" data-validation-allowing="range[1;10000]" placeholder="Payment Term Duration" value="{if isset($a_TemplateData['searchData']['paymentTermDuration'])}{$a_TemplateData['searchData']['paymentTermDuration']}{/if}"/>
                                    
                                    {if isset ($a_TemplateData['searchData']['paymentTermId'])}
                                        {assign var="paymentTermId" value=$a_TemplateData['searchData']['paymentTermId']}
                                    {else}
                                        {assign var="paymentTermId" value=""}
                                    {/if}
                                    <select name="paymentTermId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid term" data-placeholder="Choose a term..." data-validation-optional="true">
                                        <option value="0"></option>
                                        {foreach $a_TemplateData['allPaymentTerm'] as $details}
                                            <option value="{$details->id}" {if $paymentTermId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                </div>
                                    
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['searchData']['paymentMethodId'])}
                                        {assign var="paymentMethodId" value=$a_TemplateData['searchData']['paymentMethodId']}
                                    {else}
                                        {assign var="paymentMethodId" value=0}
                                    {/if}
                                    <label for="paymentMethodId">Payment Method</label>
                                    <select name="paymentMethodId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid method" data-placeholder="Choose a method..." data-validation-optional="true">
                                        <option value="0"></option>
                                        {foreach $a_TemplateData['allPaymentMethod'] as $details}
                                            <option value="{$details->id}" {if $paymentMethodId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-primary" type="submit" name="search_purchase" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <h2><i class="glyphicon glyphicon-th-large"></i> Purchases </h2>
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
                        <form method="post" class="bulkForm" action="{actionurl page='purchases'}">
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
                                    {if isset($a_TemplateData['allPurchase']['totalAmount'])}
                                        {$a_TemplateData['allPurchase']['totalAmount']}
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
                                    <a class="toggle-vis btn btn-default" data-column="1" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                        Slno&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                                    </a>
                                    <a class="toggle-vis btn btn-default" data-column="2"  data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                        Product&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                                    </a>
                                    <a class="toggle-vis btn btn-default" data-column="3" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                        Quantity&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                                    </a>
                                    <a class="toggle-vis btn btn-default" data-column="4" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                        Unit Price&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                                    </a>
                                    <a class="toggle-vis btn btn-default" data-column="5" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                        Amount&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                                    </a>
                                    <a class="toggle-vis btn btn-default" data-column="6" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                        Invoice Number&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                                    </a>
                                    <a class="toggle-vis btn btn-default" data-column="7" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                        Paid Status&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                                    </a>
                                    <a class="toggle-vis btn btn-default" data-column="8" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                        Due Date&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                                    </a>
                                    <a class="toggle-vis btn btn-default" data-column="9" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                        Purchase Date&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                                    </a>
                                    <a class="toggle-vis btn btn-default" data-column="10" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                        Notes&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                                    </a>
                                    <a class="toggle-vis btn btn-default" data-column="11" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                        Actions&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                                    </a>
                                </div>
                                <input type="hidden" name="startIndex" id="startIndex" value="{$a_TemplateData['DATA_PER_PAGE']}"/>
                            </div>
                            <table id="tableData" class="display" cellspacing="0" width="100%" data-order='[[ 1, "asc" ]]'>
                                <thead>
                                  <tr class="tablesorter-headerRow">
                                    <th style="background:none; padding-left:8px;">
                                        All
                                        <input type="checkbox" name="selectAll" class="selectAll"/>
                                    </th>
                                    <th>Slno</th>
                                    <th>Product</th>      
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Amount</th>
                                    <th>Invoice Number</th>
                                    <th>Paid Status</th>
                                    <th>Due Date</th>
                                    <th>Purchase Date</th>
                                    <th>Notes</th>
                                    <th>Actions</th>
                                  </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="background:none; padding-left:8px;">
                                        </th>
                                        <th>Slno</th>
                                        <th class="columTextCenter">Product</th>      
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Amount</th>
                                        <th>Invoice Number</th>
                                        <th>Paid Status</th>
                                        <th>Due Date</th>
                                        <th>Purchase Date</th>
                                        <th>Notes</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                {if $a_TemplateData['allPurchase']}
                                    {foreach $a_TemplateData['allPurchase'] as $index=>$details}    
                                        {if !isset($details->id)}{continue}{/if}
{*                                        <tr class="{if $index % 2 == 0}odd{else}even{/if}">*}
                                        <tr>
                                           <td style="width:1%;">
                                               <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                           </td>
                                           <td style="width:1%;">{$index + 1}</td>
                                           <td style="width:11%">{$details->productName}</td>
                                           <td style="width:9%;">{$details->quantity}</td>
                                           <td style="width:9%;">{$details->unitPrice}</td>
                                           <td style="width:9%;">{$details->amount}</td>
                                           <td style="width:12%;">{$details->invoiceNumber}</td>
                                           <td style="width:5%;">
                                               {if (int)$details->paidStatus === 1}
                                                   <span class="label-default label label-success">
                                                    Paid
                                                   </span>
                                               {else if (int)$details->paidStatus === 2}
                                                   <span class="label-default label label-danger">
                                                   Unpaid
                                                   </span>
                                               {else}
                                                   <span class="label-default label">
                                                    Unknown
                                                   </span>
                                               {/if}
                                           </td>
                                           <td style="width:12%;">
                                               {$details->dueDate}
                                               {if ($details->dueDate != "") && 
                                                   $smarty.now|date_format:"%Y%m%d" > $details->dueDate|date_format:"%Y%m%d"}
                                                    <span class="label-default label label-warning">Over Due</span>
                                               {/if}
                                           </td>
                                           <td style="width:12%;">{$details->purchaseDateFormated}</td>
                                           <td style="width:16%">{$details->notes}</td>
                                           <td style="width:10%">
                                               <a class="btn btn-success btn-small details-control" href="{actionurl page='purchasedetails' params=['id'=>$details->id]}" target="_blank">
                                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                                    View
                                                </a>
                                                <a class="btn btn-info btn-small" href="{actionurl page='purchases' params=['id'=>$details->id, 'do'=>1]}">
                                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-small" href="{actionurl page='purchases' params=['id'=>$details->id, 'do'=>2]}">
                                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                                    Delete
                                                </a>
                                           </td>
                                         </tr>
                                      {/foreach}
                                      </tbody>
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
                        <div id="loadMore" class="breadcrumb">
                            Load More&nbsp;<i class="glyphicon glyphicon-download-alt"></i>
                        </div>
                        <div class="breadcrumb loading">Loading...</div>
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
            togglePaidUnpaid();
            
            var columns = [{ className: "columTextCenter"}, { className: "columTextCenter"}, null, null, null, null, null, null, null, null,null, null];
                    /*[{ className: "columTextCenter"}, // All
                            { className: "columTextCenter"}, // Slno
                            { className: "columTextRight"}, // Product
                            { className: "columTextRight"}, // Qty
                            { className: "columTextRight"}, // Unit price
                            { className: "columTextRight"}, // Amount
                            { className: "columTextCenter"}, // Invoice number
                            { className: "columTextCenter"}, // paid Status
                            { className: "columTextCenter"}, // Due Date
                            { className: "columTextCenter"}, // Purchase Date
                            { className: "columTextleft"}, // notes
                            { className: "columTextRight"}]; // Actions*/
                          
            loadDataTable('{/literal}{actionurl page="purchaseajax"}{literal}', {/literal}{$a_TemplateData['DATA_PER_PAGE']}{literal}, columns);
            
            //$(".tablesorter").tablesorter({headers: {0: { sorter: false}, 9: { sorter: false}}, cssHeader:{}});

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
            
            jQuery("#unitPrice").keyup(calcAmountOnTypeUnitPrice);
            
        }
    </script>
    {/literal}
{/block}


