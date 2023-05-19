{extends file="parent.tpl"}
{block  name="title" prepend}Return Items{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
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
                    {if isset($a_TemplateData['searchData']['search_salesInvoice'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                        
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12 formContainer">
                            <form action="{actionurl page='returnreport'}" method="post" class="form-inline searchForm" id="searchForm">
                                {if isset($a_TemplateData['searchData']['invoiceId']) && $a_TemplateData['searchData']['invoiceId'] > 0}
                                    {assign var=invoiceId value=$a_TemplateData['searchData']['invoiceId']}
                                {else}
                                    {assign var=invoiceId value=0}
                                {/if}
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-3">
                                    <label for="invoiceId">Invoice</label>
                                    <select id="invoiceId" name="invoiceId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid invoice" data-placeholder="Choose a invoice..." data-validation-optional="true">
                                        <option value="0"></option>
                                        {foreach $a_TemplateData['allInvoices'] as $details}
                                            <option value="{$details->id}" {if $invoiceId == $details->id}selected='selected'{/if}>
                                                {$details->invoiceNumber}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                    <div class="form-group col-xs-3">
                                        {if isset ($a_TemplateData['searchData']['invoiceItemId'])}
                                            {assign var="invoiceItemId" value=$a_TemplateData['searchData']['invoiceItemId']}
                                        {else}
                                            {assign var="invoiceItemId" value=""}
                                        {/if}
                                        <label for="invoiceItemId">Invoice Items</label>
                                        <select id="invoiceItemId" name="invoiceItemId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid Item" data-placeholder="Choose a item..." >
                                            <option value="0"></option>
                                            {foreach $a_TemplateData['products'] as $details}
                                                <option value="{$details->id}" {if $invoiceItemId == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>

                                            {/foreach}
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        {if isset ($a_TemplateData['searchData']['productId'])}
                                            {assign var="productId" value=$a_TemplateData['searchData']['productId']}
                                        {else}
                                            {assign var="productId" value=""}
                                        {/if}
                                        <label for="productId">Products</label>
                                        <select id="productId" name="productId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid product" data-placeholder="Choose a product..." >
                                            <option value="0"></option>
                                            {foreach $a_TemplateData['products'] as $details}
                                                <option value="{$details->id}" {if $productId == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>

                                            {/foreach}
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <label for="purchaseOrderNo">Quantity</label>
                                        <input type="text" id="quantity" name="quantity" class="form-control" data-validation="number" data-validation-error-msg="Invalid quantity" data-validation-optional="true" placeholder="Quantity" value="{if isset($a_TemplateData['searchData']['quantity'])}{$a_TemplateData['searchData']['quantity']}{/if}">
                                    </div>
                                </div>
                                        
                                <div class="col-xs-12" style="text-align: center;">
                                    <div class="form-group col-xs-3">
                                        <label for="notes">Notes</label>
                                        <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true">{if isset($a_TemplateData['searchData']['notes'])}{$a_TemplateData['searchData']['notes']}{/if}</textarea>
                                    </div>
                                    
                                    <div class="form-group col-xs-3">
                                        <label for="addedDate">Added Date</label>
                                        <input type="text" id="addedDate" name="addedDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" placeholder="Added Date" value='{if isset($a_TemplateData['searchData']['addedDate'])}{$a_TemplateData['searchData']['addedDate']}{/if}' autocomplete="off" data-validation-optional="true"/>
                                    </div>
                                </div>
                                
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-primary" type="submit" name="search_data" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <h2><i class="glyphicon glyphicon-th-large"></i> Return Items</h2>
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
                        <form method="post" class="bulkForm" action="{actionurl page='pricemarginsettings'}">
                            <div class="showHideColumns">
                                <div class="btn-group">
                                    {foreach $a_TemplateData['thead'] as $index=>$head}
                                        <a class="toggle-vis btn btn-default" data-column="{$index}" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                            {$head.name}&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                                        </a>
                                    {/foreach}
                                </div>
                                <input type="hidden" name="startIndex" id="startIndex" value="{$a_TemplateData['DATA_PER_PAGE']}"/>
                            </div>
                            <table id="tableData" class="display" cellspacing="0" width="100%">
                                <thead>
                                  <tr class="tablesorter-headerRow">
                                    {foreach $a_TemplateData['thead'] as $head}
                                        <th>{$head.name}</th>
                                    {/foreach}
                                  </tr>
                                </thead>
                                <tfoot>
                                  <tr class="tablesorter-headerRow">
                                    {foreach $a_TemplateData['thead'] as $head}
                                        <th>{$head.name}</th>
                                    {/foreach}
                                  </tr>
                                </tfoot>
                                <tbody>
                                {if $a_TemplateData['allReturnItem']}
                                    {assign var=i value=1}
                                    {foreach $a_TemplateData['allReturnItem'] as $index=>$details}    
                                        <tr>
                                           <td style="width:1%;">{$i}</td>
                                           <td style="width:13%;">{$details->invoiceNumber}</td>
                                           <td style="width:13%;">{$details->productName}</td>
                                           <td style="width:10%">{$details->quantity} {$details->measuringUnit}</td>
                                           <td style="width:10%">{$details->returnDate}</td>
                                           <td style="width:16%">{$details->notes}</td>
                                           <td style="width:5%">
                                               <a class="btn btn-danger btn-small details-control" href="{actionurl page='returnreport' params=['id'=>$details->id, 'do'=>$a_TemplateData['DELETE']]}">
                                                    <i class="glyphicon glyphicon-delete icon-white"></i>
                                                    Delete
                                                </a>
                                         </tr>
                                         {capture assign=i}{$i+1}{/capture}
                                    {/foreach}
                                {/if}
                                </tbody>
                            </table>
                        </form>
                        {if $a_TemplateData['allReturnItem']}
                        <div id="loadMore" class="breadcrumb">
                            Load More&nbsp;<i class="glyphicon glyphicon-download-alt"></i>
                        </div>
                        <div class="breadcrumb loading">Loading...</div>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
                        
        <div id="doPayForm" title="Receive Payment" class="jQModalForm" style="display:none;padding-bottom: 15px;">
            <form onsubmit="return false;" id="addPaymentForm">
                <fieldset>
                <tt id="errMsg" style="font-size: 12px; color: red;display: none;"></tt>
                  <label for="amountDue">Amount Due</label>
                  <input type="text" name="amountDue" id="amountDue" value="" class="text ui-widget-content ui-corner-all" readonly="readonly">
                  <input type="hidden" name="invoiceId" id="invoiceId">
                  <label for="paymentMethodId">Payment Method</label>
                    <select id="paymentMethodId" name="paymentMethodId" class="text ui-widget-content ui-corner-all chosen-select">
                        {foreach $a_TemplateData['allPaymentMethod'] as $details}
                            <option value="{$details->id}">
                                {$details->name}
                            </option>
                        {/foreach}
                    </select>
                  <label for="receivedAmount">Received Amount</label>
                  <input type="text" name="receivedAmount" id="receivedAmount" value="" class="text ui-widget-content ui-corner-all">
                  <label for="balanceAmount">Balance Amount</label>
                  <input type="text" name="balanceAmount" id="balanceAmount" value="" readonly="readonly" class="text ui-widget-content ui-corner-all">
                  <tt id="balanceAmountMsg" style="font-size: 12px; color: red;display: none;"></tt>
                  <label for="receivedDate">Received Date</label>
                  <input type="text" id="receivedDate" name="receivedDate" class="text ui-widget-content ui-corner-all datePicker" placeholder="Purchase Date" value='{$smarty.now|date_format:"%Y-%m-%d"}' autocomplete="off"  readonly="readonly"/>
                  <label for="notes">Notes</label>
                  <textarea name="notes" id="notes" class="text ui-widget-content ui-corner-all"></textarea>
                  <!-- Allow form submission with keyboard without duplicating the dialog button -->
                  <input type="submit" tabindex="-1" style="position:absolute;" name="add_payment" id="addPayment" value="Add Payment" class="btn">
                </fieldset>
            </form>
        </div>
{/block}
{block name="jsScriptBottoom"}
    {literal}
    <script>
    var groupColumn = 1;
    var columnSpan = 6;    
    function init()
    {
            validateFormWithServer();
            selectChosen();
            dateSelector("#addedDate",options);
            selectAllData(".selectAll", "selectedData");
            resetFromData(".resetFormData", ".searchForm");
            var options = {};
            {/literal}
            {if $a_TemplateData['allReturnItem']}
            {literal}
            options.columns = [
                            {/literal}
                            {foreach $a_TemplateData['thead'] as $head}
                                    {literal}{ className: "{/literal}{$head.class}{literal}",{/literal}
                                    {literal} orderable: "{/literal}{$head.orderable}{literal}"},{/literal}
                            {/foreach}
                            {literal}
                            ]; // Actions*/
            {/literal}
            {/if}
             {literal}
                 
            options.order = [[0, 'asc']];
            
            loadDataTable('#tableData', '{/literal}{actionurl page="returnreport" params=["do"=>"loadData"]}{literal}', {/literal}{$a_TemplateData['DATA_PER_PAGE']}{literal}, options);
        }
        
    </script>
    {/literal}
{/block}


