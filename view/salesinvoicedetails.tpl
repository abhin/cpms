{extends file="parent.tpl"}
{block  name="title" prepend}Sales Invoice Details{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
        <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-th-large"></i> Sales Invoice Details </h2>
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
                        <table class="table table-bordered table-striped table-condensed">
                            <tbody>
                                <tr> 
                                    <th style="width: 250px;">Buyer Name</th>  
                                    <td>{$a_TemplateData['salesInvoiceData']->buyerName}</td> 
                                </tr>
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Purchase Order Number</th>
                                  <td>{$a_TemplateData['salesInvoiceData']->purchaseOrderNo}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Invoice Number</th>
                                  <td>{$a_TemplateData['salesInvoiceData']->invoiceNumber}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Invoice Date</th>
                                  <td>{$a_TemplateData['salesInvoiceData']->invoiceDateFormated}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Paid Status</th>
                                  <td style="vertical-align: middle;">
                                        {if (int)$a_TemplateData['salesInvoiceData']->paidStatus === 1}
                                            <span class="label-default label label-success">
                                             Paid
                                            </span>
                                        {else if (int)$a_TemplateData['salesInvoiceData']->paidStatus === 2}
                                            <span class="label-default label label-danger">
                                            Unpaid
                                            </span>
                                        {else}
                                            <span class="label-default label">
                                             Unknown
                                            </span>
                                        {/if}
                                  </td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Payment Term</th>
                                  <td>
                                      {if $a_TemplateData['salesInvoiceData']->paymentTermDuration > 0}
                                        {$a_TemplateData['salesInvoiceData']->paymentTermDuration}&nbsp;
                                        {$a_TemplateData['salesInvoiceData']->paymentTermName}
                                      {/if}
                                  </td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Due Date</th>
                                  <td>
                                        {$a_TemplateData['salesInvoiceData']->dueDate}
                                        {if ($a_TemplateData['salesInvoiceData']->dueDate != "") && 
                                            $smarty.now|date_format:"%Y%m%d" > $a_TemplateData['salesInvoiceData']->dueDate|date_format:"%Y%m%d"}
                                             <span class="label-default label label-warning">Over Due</span>
                                        {/if}
                                  </td> 
                                </tr>
                                {assign var=invoiceTotal value={$a_TemplateData['salesInvoiceData']->grandTotalAmount - $a_TemplateData['salesInvoiceData']->totalReturnAmount}}
                                {assign var=dueAmount value={($invoiceTotal - $a_TemplateData['salesInvoiceData']->totalReceivedAmount)}}
                                <tr class="tablesorter-headerRow">
                                  <th>Received Amount</th>
                                  <td>Rs. {$a_TemplateData['salesInvoiceData']->totalReceivedAmount|number_format:2}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Due Amount</th>
                                  <td>
                                      Rs. 
                                      {if $dueAmount > 0}
                                        {$dueAmount|number_format:2}
                                      {else}
                                          0.00
                                      {/if}
                                  </td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Returned Amount</th>
                                  <td>
                                      Rs.
                                    {if $a_TemplateData['salesInvoiceData']->totalReturnAmount > 0} 
                                        {$a_TemplateData['salesInvoiceData']->totalReturnAmount|number_format:2}
                                    {else}
                                        0
                                    {/if}
                                  </td> 
                                </tr>
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Invoice Total</th>
                                  <td>Rs. {$invoiceTotal|number_format:2}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Billed Total</th>
                                  <td>Rs. {$a_TemplateData['salesInvoiceData']->grandTotalAmount|number_format:2}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Notes</th>
                                  <td>{$a_TemplateData['salesInvoiceData']->notes}</td> 
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                    <h2><i class="glyphicon glyphicon-th-large"></i> Sales Items Details</h2>
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
                    <div class="showHideColumns">
                        <div class="btn-group">
                            {foreach $a_TemplateData['theadItems'] as $index=>$head}
                                <a class="toggle-vis btn btn-default" data-column="{$index}" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                    {$head.name}&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                                </a>
                            {/foreach}
                        </div>
                        <input type="hidden" name="startIndex" id="startIndex" value="{$a_TemplateData['DATA_PER_PAGE']}"/>
                    </div>
                    <table id="tableDataItems" class="display" cellspacing="0" width="100%">
                        <thead>
                          <tr class="tablesorter-headerRow">
                            {foreach $a_TemplateData['theadItems'] as $head}
                                <th>{$head.name}</th>
                            {/foreach}
                          </tr>
                        </thead>
                        <tfoot>
                          <tr class="tablesorter-headerRow">
                            {foreach $a_TemplateData['theadItems'] as $head}
                                <th>{$head.name}</th>
                            {/foreach}
                          </tr>
                        </tfoot>
                        <tbody>
                        {assign var=grandTotal value=0}
                        {if $a_TemplateData['salesInvoiceData']->items}
                            {assign var=i value=1}
                            {foreach $a_TemplateData['salesInvoiceData']->items as $details}  
                                {assign var=balanceQuantity value={$details->quantity - $details->returnQuantity}}
                                <tr>
                                   <td style="width:1%;">{$i}</td>
                                   <td style="width:9%;">{$details->productName}</td>
                                   <td style="width:9%;">{$details->tax}</td>
                                   <td style="width:16%">
                                       <span id="billedQty_{$details->id}">
                                           {$details->quantity}
                                       </span>
                                       {if $details->quantity > 0} 
                                           {$details->measuringUnitName}
                                        {/if}
                                   </td>
                                   <td style="width:16%">
                                       <span id="returnQty_{$details->id}">
                                           {$details->returnQuantity}
                                       </span>
                                       {if $details->returnQuantity > 0} 
                                           {$details->measuringUnitName}
                                           <br/>
                                           <span class="label label-default label-danger">
                                             Returned
                                            </span>
                                        {/if}
                                   </td>
                                   <td style="width:16%">
                                       <span id="balanceQty_{$details->id}">
                                           {$balanceQuantity} 
                                       </span>
                                       {if $balanceQuantity > 0} 
                                           {$details->measuringUnitName}
                                        {/if}
                                       <input type="hidden" name="itemQuantity[{$details->id}]" id="itemQuantity_{$details->id}" value="{$balanceQuantity}"/>
                                   </td>
                                   <td style="width:16%">{$details->margin}</td>
                                   <td style="width:16%">{$details->unitPrice}</td>
                                   <td style="width:16%">
                                       <span id="mrp_{$details->id}">
                                           {$details->margin + $details->unitPrice}
                                       </span>
                                    </td>
                                   {assign var=total value=($details->margin + $details->unitPrice) * $balanceQuantity}
                                   {capture assign=grandTotal}{$grandTotal+$total}{/capture}
                                   <td style="width:16%">
                                       <span id="totalAmount_{$details->id}">{$total}</span>
                                   </td>
                                   <td style="width:16%">
                                       {if $balanceQuantity > 0}
                                       <a id="doReturn_{$details->id}" class="btn btn-success btn-small details-control doReturn" href="#" id="doReturn_{$details->id}">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            Do Return
                                        </a>
                                        {/if}
                                       {if $details->returnQuantity > 0} 
                                        <a class="btn btn-info btn-small details-control" href="{actionurl page='returnreport' params=['invoiceItemId'=>$details->id, 'do'=>$a_TemplateData['VIEW']]}" target="_blank">
                                            <i class="glyphicon glyphicon-search icon-white"></i>
                                            Details
                                        </a>
                                        {/if}
                                   </td>
                                 </tr>
                                 {capture assign=i}{$i+1}{/capture}
                            {/foreach}
                        {/if}
                        </tbody>
                    </table>

                    <div class="breadcrumb" style="text-align: right;">
                        Invoice Total:  {$grandTotal}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                <h2><i class="glyphicon glyphicon-th-large"></i> Payment Details</h2>
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
                <div class="showHideColumns">
                    <div class="btn-group">
                        {foreach $a_TemplateData['theadPayment'] as $index=>$head}
                            <a class="toggle-vis btn btn-default" data-column="{$index}" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                {$head.name}&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                            </a>
                        {/foreach}
                    </div>
                </div>
                <table id="tableDataPayments" class="display" cellspacing="0" width="100%">
                    <thead>
                      <tr class="tablesorter-headerRow">
                        {foreach $a_TemplateData['theadPayment'] as $head}
                            <th>{$head.name}</th>
                        {/foreach}
                      </tr>
                    </thead>
                    <tfoot>
                      <tr class="tablesorter-headerRow">
                        {foreach $a_TemplateData['theadPayment'] as $head}
                            <th>{$head.name}</th>
                        {/foreach}
                      </tr>
                    </tfoot>
                    <tbody>
                    {assign var=totalReceivedAmount value=0}
                    {if $a_TemplateData['salesInvoiceData']->payments}
                        {assign var=i value=1}
                        {foreach $a_TemplateData['salesInvoiceData']->payments as $details}    
                            <tr>
                               <td style="width:1%;">{$i}</td>
                               <td>{$details->paymentMethodName}</td>
                               <td>{$details->receivedAmount}</td>
                               <td>{$details->receivedDate}</td>
                               <td>{$details->notes}</td>
                               <td style="width:16%">
                                   <a id="doReturn_{$details->id}" class="btn btn-danger btn-small details-control" href="{actionurl page='salesinvoicedetails' params=['id'=>$a_TemplateData['salesInvoiceData']->id, 'paymentId'=>$details->id, 'do'=>$a_TemplateData['DELETE']]}">
                                        <i class="glyphicon glyphicon-delete icon-white"></i>
                                        Delete
                                    </a>
                               </td>
                             </tr>
                             {capture assign=totalReceivedAmount}{$totalReceivedAmount+$details->receivedAmount}{/capture}
                             {capture assign=i}{$i+1}{/capture}
                        {/foreach}
                    {/if}
                    </tbody>
                </table>

                <div class="breadcrumb" style="text-align: right;">
                    Total Received Amount: {$totalReceivedAmount}
                </div>
            </div>
            </div>
        </div>
    </div>
                    
    <div id="doReturnFormDIV" title="Receive Payment" class="jQModalForm" style="display:none;padding-bottom: 15px;">
            <form onsubmit="return false;" id="doReturnForm">
                <fieldset>
                 <tt id="errMsg" style="font-size: 12px; color: red;display: none;"></tt>
                  <input type="hidden" name="invoiceId" id="invoiceId" value="{$a_TemplateData['salesInvoiceData']->id}">
                  <input type="hidden" name="invoiceItemId" id="invoiceItemId">
                  <label for="receivedAmount">Returned Item Quantity</label>
                  <input type="text" name="quantity" id="quantity" value="" class="text ui-widget-content ui-corner-all" />
                  <tt id="returnCountMsg" style="font-size: 12px; color: red;display: none;"></tt>
                  <label for="returnDate">Returned Date</label>
                  <input type="text" id="returnDate" name="returnDate" class="text ui-widget-content ui-corner-all datePicker" placeholder="Returned Date" value='{$smarty.now|date_format:"%Y-%m-%d"}' autocomplete="off"  readonly="readonly"/>
                  <label for="notes">Notes</label>
                  <textarea name="notes" id="notes" class="text ui-widget-content ui-corner-all"></textarea>
                  <!-- Allow form submission with keyboard without duplicating the dialog button -->
                  <input type="submit" tabindex="-1" style="position:absolute;" name="do_item_return" id="doItemReturn" value="Return" class="btn">
                </fieldset>
            </form>
        </div>
{/block}
{block name="jsScriptBottoom"}
    {literal}
    <script>
        function init() 
        {
            var itemTableOptions = {};
            {/literal}
            {if $a_TemplateData['salesInvoiceData']->items}
            {literal}
            itemTableOptions.columns = [
                            {/literal}
                            {foreach $a_TemplateData['theadItems'] as $head}
                                    {literal}{ className: "{/literal}{$head.class}{literal}",{/literal}
                                    {literal} orderable: "{/literal}{$head.orderable}{literal}"},{/literal}
                            {/foreach}
                            {literal}
                            ]; // Actions*/
            {/literal}
            {/if}
             {literal}
                 
            itemTableOptions.order = [[0, 'asc']];
            
            loadDataTable('#tableDataItems', null, 0, itemTableOptions);
            
            var paymentTableOptions = {};
            {/literal}
            {if $a_TemplateData['salesInvoiceData']->payments}
            {literal}
            paymentTableOptions.columns = [
                            {/literal}
                            {foreach $a_TemplateData['theadPayment'] as $head}
                                    {literal}{ className: "{/literal}{$head.class}{literal}",{/literal}
                                    {literal} orderable: "{/literal}{$head.orderable}{literal}"},{/literal}
                            {/foreach}
                            {literal}
                            ]; // Actions*/
            {/literal}
            {/if}
             {literal}
                 
            paymentTableOptions.order = [[0, 'asc']];
            
            loadDataTable('#tableDataPayments', null, 0, paymentTableOptions);
            
            dialog = $("#doReturnFormDIV").dialog({
                autoOpen: false,
                height: 350,
                width: 350,
                modal: true,
                close: function() {
                    form[0].reset();
                  }
            });
            
            form = dialog.find( "form" ).on( "submit", function( event ) {
                event.preventDefault();
                doReturn();
              });
              
              bindModal();
              $("#quantity").keyup(validateReturnItemCount)
        }
        
        function bindModal()
        {
            $( ".doReturn" ).button().unbind();
            $( ".doReturn" ).button().on( "click", function(event) {
                event.preventDefault();
                var invoiceId = $(this).attr("id").split("_")[1];
                $("#invoiceItemId").val(invoiceId);
               dialog.dialog( "open" );
            });
        }
        
        function validateReturnItemCount()
        {
            var invoiceItemId = $("#invoiceItemId").val();
            var returnedCount =  parseInt($("#quantity").val());
            var itemQuantity = parseInt($("#itemQuantity_" + invoiceItemId).val());
            
            if (isNaN(itemQuantity) || itemQuantity <= 0){
                itemQuantity = 0;
            }
            
            if (isNaN(returnedCount) || returnedCount <= 0){
                returnedCount = 0;
                $("#returnCountMsg").text("Invalid quantity");
                $("#returnCountMsg").css("display", "inline-block");
                return false
            }
            else if (returnedCount > itemQuantity)
            {
                $("#returnCountMsg").text("Only " + itemQuantity + " item(s) will be available for return");
                $("#returnCountMsg").css("display", "inline-block");
                return false
            }
            else{
                $("#returnCountMsg").css("display", "none");
            }
        }
        
        function doReturn()
        {
            if (validateReturnItemCount() == false){
               return false;
            }

           jQuery.ajax({
                type: "POST",
                dataType :"json",
                data: $("#doReturnForm").serialize(),
                url: "{/literal}{actionurl page="salesinvoicedetails" params=["do"=>$a_TemplateData['SALES_RETURN']]}{literal}",
                success: function (data)
                {
                    if (data.errorMsg != ""){
                        $("#errMsg").text(data.errorMsg);
                        $("#errMsg").css("display", "inline-block");
                    }
                    else if (data.status === true)
                    {
                        dialog.dialog( "close" );
                        location.reload();
                        /*
                        var billedQty   = parseInt($("#billedQty_" + data.invoiceItemId).text());
                        var returnQty   = parseInt($("#returnQty_" + data.invoiceItemId).text());
                        var balanceQty  = parseInt($("#balanceQty_" + data.invoiceItemId).text());
                        var mrp         = parseFloat($("#mrp_" + data.invoiceItemId).text());
                        var totalAmount = parseFloat($("#totalAmount_" + data.invoiceItemId).text());

                        var currentBalanceQty  = balanceQty - parseInt(data.quantity);
                        var currentReturnQty   = returnQty + parseInt(data.quantity);
                        var currentTotalAmount = parseFloat(totalAmount - (mrp * data.quantity));
                        
                        $("#returnQty_" + data.invoiceItemId).text(currentReturnQty);
                        $("#balanceQty_" + data.invoiceItemId).text(currentBalanceQty);
                        $("#totalAmount_" + data.invoiceItemId).text(currentTotalAmount);
                        
                        if (currentBalanceQty <= 0){
                            $("#doReturn_" + data.invoiceItemId).remove();
                        }
                        dialog.dialog( "close" );
                        */
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


