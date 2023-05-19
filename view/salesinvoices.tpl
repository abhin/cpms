{extends file="parent.tpl"}
{block  name="title" prepend}Sales Invoices{/block}
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
                            <form action="{actionurl page='pricemarginsettings'}" method="post" class="form-inline searchForm">
                                {if isset($a_TemplateData['salesInvoiceData']['productId']) && $a_TemplateData['salesInvoiceData']['productId'] > 0}
                                    {assign var=productId value=$a_TemplateData['salesInvoiceData']['productId']}
                                {else}
                                    {assign var=productId value=0}
                                {/if}
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4" style="margin-left: 32%;">
                                        {if isset ($a_TemplateData['searchData']['productId'])}
                                            {assign var="productId" value=$a_TemplateData['searchData']['productId']}
                                        {else}
                                            {assign var="productId" value=""}
                                        {/if}
                                        <label for="productId">Products</label>
                                        <select id="productId" name="productId" class="form-control" data-validation="number" data-validation-error-msg="Please select a Parent" data-placeholder="Choose a product..." >
                                            <option value=""></option>
                                            {foreach $a_TemplateData['products'] as $details}
                                                <option value="{$details->id}" {if $productId == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>

                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-primary" type="submit" name="search_salesInvoice" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <h2><i class="glyphicon glyphicon-th-large"></i> Sales Invoices</h2>
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
                                {if $a_TemplateData['allSalesInvoice']}
                                    {assign var=i value=1}
                                    {foreach $a_TemplateData['allSalesInvoice'] as $index=>$details}    
                                        <tr>
                                           <td style="width:1%;">{$i}</td>
                                           <td style="width:9%;">{$details->invoiceNumber}</td>
                                           <td style="width:9%;">{$details->invoiceDate}</td>
                                           <td style="vertical-align: middle;">
                                                {if (int)$details->paidStatus === 1}
                                                    <span class="label-default label label-success">
                                                     Paid
                                                    </span>
                                                {else if (int)$details->paidStatus === 2}
                                                    <span id="paidStatus_{$details->id}" class="label-default label label-danger">
                                                    Unpaid
                                                    </span>
                                                {else}
                                                    <span id="paidStatus_{$details->id}" class="label-default label">
                                                     Unknown
                                                    </span>
                                                {/if}
                                          </td>
                                           <td style="width:10%">
                                               {$details->dueDate}
                                               {if ($details->dueDate != "") && 
                                                   $smarty.now|date_format:"%Y%m%d" > $details->dueDate|date_format:"%Y%m%d"}
                                                   <br/><span class="label-default label label-warning">Over Due</span>
                                               {/if}
                                           </td>
                                           <td style="width:16%">{$details->grandTotalAmount}</td>
                                           <td style="width:10%">{$details->totalReturnQuantity}</td>
                                           {assign var=invoiceTotal value={$details->grandTotalAmount - $details->totalReturnAmount}}
                                           <td style="width:16%">
                                               {$invoiceTotal}
                                           </td>
                                           <td style="width:16%">
                                               <span id="currentTotalRecAmount_{$details->id}">{$details->totalReceivedAmount}</span>
                                           </td>
                                           <td style="width:10%">
                                               {assign var=amountDue value=($invoiceTotal - $details->totalReceivedAmount)|round:"2"}
                                               <span id="currentDue_{$details->id}">
                                                   {if $amountDue > 0}
                                                    {$amountDue}
                                                    {else}
                                                        0
                                                    {/if}
                                               </span>
                                               <input type="hidden" name="amountDue[{$details->id}]" id="amountDue_{$details->id}" value="{$amountDue}"/>
                                           </td>
                                           <td style="width:16%">{$details->notes}</td>
                                           <td style="width:16%">
                                               <a class="btn btn-success btn-small details-control" href="{actionurl page='salesinvoicedetails' params=['id'=>$details->id]}" target="_blank">
                                                    <i class="glyphicon glyphicon-search icon-white"></i>
                                                    View
                                                </a>
                                            {if (int)$details->paidStatus === 2}
                                                <a class="btn btn-info btn-small details-control dopay" href="#" target="_blank" id="dopay_{$details->id}">
                                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                                    Do pay
                                                </a>
                                            {/if}
                                           </td>
                                         </tr>
                                         {capture assign=i}{$i+1}{/capture}
                                    {/foreach}
                                {/if}
                                </tbody>
                            </table>
                        </form>
                        {if $a_TemplateData['allSalesInvoice']}
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
            dateSelector("#receivedDate",options);
            selectAllData(".selectAll", "selectedData");
            resetFromData(".resetFormData", ".searchForm");
            var options = {};
            {/literal}
            {if $a_TemplateData['allSalesInvoice']}
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
            
            loadDataTable('#tableData', '{/literal}{actionurl page="salesinvoices" params=["do"=>"loadData"]}{literal}', {/literal}{$a_TemplateData['DATA_PER_PAGE']}{literal}, options, bindPayModal);
            
            dialog = $("#doPayForm").dialog({
                autoOpen: false,
                height: 550,
                width: 350,
                modal: true,
                close: function() {
                    form[0].reset();
                  }
            });
            
            form = dialog.find( "form" ).on( "submit", function( event ) {
                event.preventDefault();
                addPayment();
              });
            bindPayModal();
        }
        
        function bindPayModal()
        {
            $( ".dopay" ).button().unbind();
            $( ".dopay" ).button().on( "click", function(event) {
                event.preventDefault();
                var invoiceId = $(this).attr("id").split("_")[1];
                var amountDue = $("#amountDue_" + invoiceId).val();
                
                if (amountDue > 0)
                {
                    $("#amountDue").val(amountDue);
                    $("#invoiceId").val(invoiceId);
                    $("#receivedAmount").keyup(calculateReceivedAmount);
                   dialog.dialog( "open" );
                }
            });
        }
        
        function calculateReceivedAmount()
        {
            var maxInvoiceDiscount = {/literal}{$a_TemplateData['MAX_INVOICE_DISCOUNT_AMOUNT']}{literal};
            var dueAmount = parseFloat($("#amountDue").val());
            var recAmount = parseFloat($("#receivedAmount").val());
            
            if (isNaN(dueAmount) || dueAmount <= 0){
                dueAmount = 0;
                alert("Invalid due amount");
                return false;
            }
            
            if (isNaN(recAmount) || recAmount <= 0){
                recAmount = 0;
                alert("Invalid received amount");
                return false;
            }
            
            var balAmount = parseFloat(dueAmount - recAmount).toFixed(2)/1;
            if (isNaN(balAmount) || balAmount <= 0){
                balAmount = 0;
            }
            
            $("#balanceAmount").val(balAmount);
            if (balAmount >  maxInvoiceDiscount){
                $("#balanceAmountMsg").text("Discount should be less than Rs." + maxInvoiceDiscount);
                $("#balanceAmountMsg").css("display", "inline-block");
            }
            else{
                $("#balanceAmountMsg").css("display", "none");
            }
            
            return true;
        }
        
        function addPayment()
        {
           if (calculateReceivedAmount() == false){
               return false;
           }
           
            jQuery.ajax({
                type: "POST",
                dataType :"json",
                data: $("#addPaymentForm").serialize(),
                url: "{/literal}{actionurl page="salesinvoices" params=["do"=>$a_TemplateData['PAYMENT']]}{literal}",
                success: function (data){
                    if (data.errorMsg != ""){
                        $("#errMsg").text(data.errorMsg);
                        $("#errMsg").css("display", "inline-block");
                    }
                    else if (data.status === true){
                        $("#currentTotalRecAmount_" + data.invoiceId).text(data.totalReceivedAmount);
                        $("#currentDue_" + data.invoiceId).text(data.currentDue);
                        $("#amountDue_" + data.invoiceId).val(data.currentDue);
                        
                        if (data.paidStatus === 1){
                            $("#paidStatus_" + data.invoiceId).text("Paid").removeClass("label-danger").addClass("label-success");
                            $("#dopay_" + data.invoiceId).remove();
                        }
                        dialog.dialog( "close" );
                    }
                },
                error: function( jqXHR, textStatus, errorThrown ){
                    alert('Error!! ' + textStatus);
                }
            });
        }
    </script>
    {/literal}
{/block}


