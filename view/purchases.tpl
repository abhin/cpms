{extends file="parent.tpl"}
{block  name="title" prepend}Purchases{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
    <form action="{actionurl page=$actionPage}" method="post" class="form-inline addForm">
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
                                {if isset($a_TemplateData['purchaseData']['id']) && $a_TemplateData['purchaseData']['id'] > 0}
                                    {assign var=purchaseId value={$a_TemplateData['purchaseData']['id']}}
                                {else}
                                    {assign var=purchaseId value=0}
                                {/if}
                                <input type="hidden" name="id" value="{$purchaseId}"/>
                              <div class="col-xs-12">  
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
                                            <input type="hidden" id="proUnitPrice_{$proDetails->id}" value="{$proDetails->unitPrice}"/>
                                            <input type="hidden" id="proMeasureUnit_{$proDetails->id}" value="{$proDetails->measuringUnitId}"/>
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
                                    {if isset ($a_TemplateData['purchaseData']['measuringUnitId'])}
                                        {assign var="measuringUnitId" value=$a_TemplateData['purchaseData']['measuringUnitId']}
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
                                    <label for="quantity">Quantity</label>
                                    <input type="text" id="quantity" name="quantity" class="form-control" data-validation="number" data-validation-error-msg="Invalid quantity" value='{if isset($a_TemplateData['purchaseData']['quantity'])}{$a_TemplateData['purchaseData']['quantity']}{else}1{/if}' autocomplete="off" placeholder="Quantity"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="unitPrice">Unit Price</label>
                                    <div class="input-group" style="width:100% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                        <input type="text" id="unitPrice" name="unitPrice" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid price" data-validation-optional="true" value='{if isset($a_TemplateData['purchaseData']['unitPrice'])}{$a_TemplateData['purchaseData']['unitPrice']}{/if}' autocomplete="off"  placeholder="Unit Price"/>
{*                                        <div class="input-group-addon">.00</div>*}
                                    </div>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="amount">Amount</label>
                                    <div class="input-group" style="width:100% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                        <input type="text" id="amount" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" value='{if isset($a_TemplateData['purchaseData']['amount'])}{$a_TemplateData['purchaseData']['amount']}{/if}' autocomplete="off" placeholder="Amount"/>
{*                                        <div class="input-group-addon">.00</div>*}
                                    </div>
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
                                    {if isset ($a_TemplateData['purchaseData']['paymentTermId'])}
                                        {assign var="paymentTermDuration" value=$a_TemplateData['purchaseData']['paymentTermDuration']}
                                    {else}
                                        {assign var="paymentTermDuration" value=""}
                                    {/if}
                                    <input type="text" id="paymentTermDuration" name="paymentTermDuration" class="form-control" data-validation="number" data-validation-error-msg="Invalid duration"placeholder="Payment Term Duration" data-validation-allowing="range[1;10000]" value="{$paymentTermDuration}"/>
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
                                    <select id="paymentMethodId" name="paymentMethodId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid method" data-validation-optional="true" data-placeholder="Choose a method...">
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
                                    <a class="btn btn-default resetFormData" type="reset" href="{actionurl page=$actionPage}">Clear</a>
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
                    {if isset($a_TemplateData['searchData']['search_purchase'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                        
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12 formContainer">
                            <div class="col-xs-12">
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
                                    {if isset ($a_TemplateData['searchData']['measuringUnitId'])}
                                        {assign var="measuringUnitId" value=$a_TemplateData['searchData']['measuringUnitId']}
                                    {else}
                                        {assign var="measuringUnitId" value=0}
                                    {/if}
                                    <label for="measuringUnitId">Measuring Unit</label>
                                    <select id="measuringUnitId" name="measuringUnitId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid unit" data-validation-optional="true"  data-placeholder="Choose a unit...">
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
                                    <label for="quantity">Quantity</label>
                                    <input type="text" name="quantity" class="form-control" data-validation="number" data-validation-error-msg="Invalid quantity" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['quantity'])}{$a_TemplateData['searchData']['quantity']}{/if}' autocomplete="off" placeholder="Quantity"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="unitPrice">Unit Price</label>
                                    <div class="input-group" style="width:100% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                    <input type="text" name="unitPrice" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid price" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['unitPrice'])}{$a_TemplateData['searchData']['unitPrice']}{/if}' autocomplete="off"  placeholder="Unit Price"/>
                                </div>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="amount">Amount</label>
                                    <div class="input-group" style="width:100% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                    <input type="text" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['amount'])}{$a_TemplateData['searchData']['amount']}{/if}' autocomplete="off" placeholder="Amount"/>
                                </div>
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
                                        {assign var="paymentTermId" value=0}
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
                                {if $a_TemplateData['allPurchase']}
                                    {foreach $a_TemplateData['allPurchase'] as $index=>$details}    
                                        {if !isset($details->id)}{continue}{/if}
                                        <tr>
                                           <td>
                                               <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                           </td>
                                           <td>{$index + 1}</td>
                                           <td>{$details->productName}</td>
                                           <td>{$details->quantity}</td>
                                           <td>{$details->measuringUnitName} {if $details->shortCode}({$details->shortCode}){/if}</td>
                                           <td>{$details->unitPrice}</td>
                                           <td>{$details->amount}</td>
                                           <td>{$details->invoiceNumber}</td>
                                           <td>
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
                                           <td>
                                               {$details->dueDate}
                                               {if ($details->dueDate != "") && 
                                                   $smarty.now|date_format:"%Y%m%d" > $details->dueDate|date_format:"%Y%m%d"}
                                                    <span class="label-default label label-warning">Over Due</span>
                                               {/if}
                                           </td>
                                           <td>{$details->purchaseDateFormated}</td>
                                           <td>{$details->notes}</td>
                                           <td>
                                               <a class="btn btn-success btn-small details-control" href="{actionurl page='purchasedetails' params=['id'=>$details->id]}" target="_blank">
                                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                                    View
                                                </a>
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
                                      </tbody>
                                    {/if}
                                </tbody>
                            </table>
                        {if $a_TemplateData['allPurchase']}
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
        function init() {
            validateFormWithOutServer();
            var options = {};
            options.maxDate = new Date();
            dateSelector(".datePicker",options);
            selectChosen();
            togglePaidUnpaid();
            
            resetFromData(".searchForm");
            var tableOptions = {};
            {/literal}
            {if isset($a_TemplateData['allPurchase']) && $a_TemplateData['allPurchase']}
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
            
            jQuery("#amount").keyup(function(){
                var qty = jQuery("#quantity").val();
                var amount = jQuery(this).val();
                
                if (isNaN(qty) || qty <= 0){
                    qty = 1;
                    jQuery("#quantity").val(qty);
                }
                
                jQuery("#unitPrice").val(amount/qty);      
            });
            
            jQuery("#quantity").keyup(function(){
                var amount = jQuery("#amount").val();
                var qty = jQuery(this).val();
                var unitPrice = jQuery("#unitPrice").val();
                
                if (isNaN(qty) || qty <= 0){
                    qty = 1;
                    jQuery("#quantity").val(qty);
                }
                
                if (isNaN(amount) || amount < 0){
                    amount = 0;
                    jQuery("#amount").val(amount);
                }
                
                if (isNaN(unitPrice) || unitPrice <= 0){
                    jQuery("#unitPrice").val(amount/qty); 
                }
                else{
                    jQuery("#amount").val(unitPrice*qty); 
                }
            });
            
            jQuery("#unitPrice").keyup(calcAmountOnTypeUnitPrice);
            jQuery("#productId").change(calcOnchangeAmount);
            
        }
    </script>
    {/literal}
{/block}


