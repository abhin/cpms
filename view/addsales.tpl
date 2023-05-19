{extends file="parent.tpl"}
{block  name="title" prepend}Add Sales{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2>
                            <i class="glyphicon glyphicon-tag"></i> 
                            Add Sales
                        </h2>
                    </div>
                        
                    <div class="row" style="display: block;">
                        <div class="col-lg-12 col-md-12">
                            <form action="{actionurl page=$actionPage}" method="post" class="form-inline invoices">
                                
                                <div class="col-xs-12" style="border-bottom:1px solid #BBBBBB; margin-bottom: 5px;padding-top:5px;">
                                <div class="form-group col-xs-3">
                                    <label for="buyerId">Buyer</label>
                                    <select id="buyerId" name="buyerId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid buyer" data-placeholder="Choose a buyer..." data-validation-optional="true">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['allBuyers'] as $details}
                                            <option value="{$details->id}">
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="form-group col-xs-3">
                                    <label for="purchaseOrderNo">Purchase Order No</label>
                                    <input type="text" id="purchaseOrderNo" name="purchaseOrderNo" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric values only" data-validation-optional="true" placeholder="Purchase Order Number" value="" autocomplete="on">
                                </div>  
                                <div class="form-group col-xs-3">
                                    <label for="invoiceNumber">Invoice Number</label>
                                    <input type="text" id="invoiceNumber" name="invoiceNumber" class="form-control" data-validation="alphanumeric server" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-url="{actionurl page=$actionPage params=['isNumberExist'=>1]}" data-validation-error-msg="Invalid invoice number" placeholder="Invoice Number" value="{$a_TemplateData['invoiceNumber']}" autocomplete="off" style="height:30px;">
                                </div>
                                <div class="form-group col-xs-3">
                                    <label for="invoiceDate">Invoice Date</label>
                                    <input type="text" id="invoiceDate" name="invoiceDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" placeholder="Purchase Date" value='{if isset($a_TemplateData['invoicesData']['invoiceDate'])}{$a_TemplateData['invoicesData']['invoiceDate']}{else}{$smarty.now|date_format:"%Y-%m-%d"}{/if}' autocomplete="off"/>
                                </div>
                                </div>
                                <div class="col-xs-12">
                                    <select id="productId" name="productId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid product" data-placeholder="Choose a product..." data-validation-optional="true">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['allProducts'] as $groupName=>$proDataArray}
                                            {if {$groupName} == ""}
                                                {foreach $proDataArray as $proDetails}
                                                <option value="{$proDetails->id}">
                                                    {$proDetails->name}
                                                </option>
                                                {/foreach}
                                            {else}
                                                <optgroup label="{$groupName}">
                                                    {foreach $proDataArray as $proDetails}
                                                    <option value="{$proDetails->id}">
                                                        {$proDetails->name}
                                                    </option>
                                                    {/foreach}
                                                </optgroup>
                                            {/if}
                                        {/foreach}
                                    </select>
                                </div>
                                    
                                <div class="col-xs-12" style="border-bottom:1px solid #BBBBBB;border-top:1px solid #BBBBBB; margin: 5px 0 5px 0;  padding: 10px 5px 10px 5px;">
                                    <input type="hidden" name="itemCount" id="itemCount" value="0"/>
                                    <table id="invoice"  class="display" cellspacing="0" width="100%" data-order='[[ 0, "asc" ]]' tabindex="0">
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
                                                <th width="{$head.width}">{$head.name}</th>
                                            {/foreach}
                                          </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-xs-12" style="border-bottom:1px solid #BBBBBB;border-top:0px solid #BBBBBB; margin-top: 0px; margin-bottom: 5px;  padding: 5px 5px 5px 5px;">
                                    <div style="float: right;margin-right: 10px; font-size: 16px; font-weight: bold; color: #285F8F;">
                                       Grand Total: Rs
                                        <span id="grandTotal">0.00</span>
                                        <input type="hidden" name="grandTotalAmount" id="grandTotalAmount" value="0"/>
                                    </div>
                                    <div class="form-group col-xs-2" style="text-align:center; border: 0px solid red;">
                                        <input type="checkbox" name="paidStatus" id="unpaid" {if isset($a_TemplateData['invoiceData']['paidStatus']) && $a_TemplateData['invoiceData']['paidStatus'] == 2}checked="checked"{/if} value="2" />
                                        <br/>
                                        <span class="label label-info" style="font-size: 12px;  margin-top:-20px !important;margin-bottom:-200px !important;">Mark invoice unpaid</span>
                                    </div>
                                    
                                    <div class="form-group col-xs-2" id="paymentTermDurationContainer" {if isset($a_TemplateData['invoiceData']['paidStatus']) && $a_TemplateData['invoiceData']['paidStatus'] == 2}style="display: inline-block;"{else}style="display: none;"{/if}>
                                        <label for="paymentTermDuration">Payment Term Duration</label>
                                        <input type="text" id="paymentTermDuration" name="paymentTermDuration" class="form-control" data-validation="number" data-validation-error-msg="Invalid duration" placeholder="Payment duration" data-validation-optional="true" data-validation-allowing="range[1;31]" value="" style="margin-bottom: 2px;"/>

                                        <select id="paymentTermId" name="paymentTermId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid term" data-validation-optional="true"  data-placeholder="Payment term...">
                                            <option value=""></option>
                                            {foreach $a_TemplateData['allPaymentTerm'] as $details}
                                                <option value="{$details->id}">
                                                    {$details->name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-2" id="paymentMethodContainer">
                                    <label for="paymentMethodId">Payment Method</label>
                                    <select id="paymentMethodId" name="paymentMethodId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid method" data-placeholder="Choose method...">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['allPaymentMethod'] as $details}
                                            <option value="{$details->id}">
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                    </div>
                                    <div class="form-group col-xs-2"
                                        <label for="receivedAmount">Received Amount</label>
                                        <input type="text" id="receivedAmount" name="receivedAmount" class="form-control" data-validation="number" data-validation-error-msg="Invalid amount" data-validation-allowing="float" placeholder="0.00"/>
                                    </div>
                                    <div class="form-group col-xs-2" id="discountedAmountDiv"> 
                                        <label for="discountedAmount">Discounted Amount</label>
                                        <input type="text" id="discountedAmount" name="discountedAmount" class="form-control" data-validation="number" data-validation-error-msg="Discount should be less than Rs.{$a_TemplateData['MAX_INVOICE_DISCOUNT_AMOUNT']}" data-validation-allowing="range[0;{$a_TemplateData['MAX_INVOICE_DISCOUNT_AMOUNT']}],float"  data-validation-optional="true" placeholder="0.00"/>
                                        <span id="discountedAmountMsg" style="color:red; font-size: 9px; display: none;"></span>
                                    </div>
                                </div>
                                    
                                <div class="form-group col-xs-12" style="margin-bottom: 15px;">
                                    <div class="form-group col-xs-3">
                                        <label for="notes">Notes</label>
                                        <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"></textarea>
                                    </div>
                                    
                                    <div class="form-group col-xs-4" style="border:0px solid red;text-align: right; float: right;">
                                        <input class="btn btn-primary" type="submit" name="add_and_print_invoice" value="Save & Print"/>
                                        <input class="btn btn-primary" type="submit" name="add_invoice" value="Save"/>
                                        <a class="btn btn-default resetFormData" type="reset" href="{actionurl page=$actionPage}">Clear</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{/block}
{block name="jsScriptBottoom"}
    {literal}
    <script>
        function init() {
            validateFormWithServer();
            
            var options = {};
            options.maxDate = new Date();
            dateSelector("#invoiceDate",options);
            
            selectChosen();
            togglePaidUnpaid();
            
            var options = {
                    paging: false,
                    columns:[
                            {/literal}
                            {foreach $a_TemplateData['thead'] as $head}
                                {if $head.class == 'null'}
                                    {$head.class},
                                {else}
                                    {literal}{ className: "{/literal}{$head.class}{literal}"},{/literal}
                                {/if}
                            {/foreach}
                            {literal}
                            ],
                    language: {
                                "emptyTable": "Please select product(s)"
                            }
                }
            var table = $("#invoice").DataTable(options);
            
            $("#productId").change(function(){
                var pid = $(this).val();
                var itemCountFeild = $("#itemCount");
                var itemCount = itemCountFeild.val();
                $(this).val('').trigger("chosen:updated");
                
                if (pid <= 0){
                    return false;
                }
                if ($("#product_" + pid).length > 0){
                    var currentQty = $("#quantity_" + pid).val();
                    $("#quantity_" + pid).val(parseInt(currentQty) + 1);
                    calculateMrp(pid);
                    return false;
                }
                
                jQuery.ajax({
                    type: "POST",
                    dataType :"json",
                    data: {cajdPdvtIwsqapxajatcudorpdda: 1, eQpzlardthoyAldkwcBtmidtcudorp:pid, dfgYRFVVghhgcfdrfg:itemCount},
                    url: {/literal}"{actionurl page="addsales"}"{literal},
                    success: function (data){
                        $.each(data, function(key, value) {
                            table.row.add(value.split(',')).draw();
                        });
                        
                        claculateGrandTotal();
                        
                        $("select[name^='priceMarginTypeId']").unbind("change");
                        $("select[name^='priceMarginTypeId']").change(calculateMrp);
                        
                        $("input[name^='quantity']").unbind("keyup");
                        $("input[name^='quantity']").keyup(calculateMrp);
                        itemCountFeild.val(parseInt(itemCount) + 1);
                        
                    },
                    error: function( jqXHR, textStatus, errorThrown ){
                        alert(textStatus);
                        jQuery("#loadMore, .loading").remove();
                        //alert("failed");
                    }
                });
            });
            
            $('#invoice tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
                
                
            });
            
            /*$("#invoice").bind('keydown', function(event) {
                if (event.keyCode === 46){
                    table.row('.selected').remove().draw( false );
                }
            });*/

            jQuery("#unpaid").click(function(){
                var isCheck  = $(this).is(":checked");
                if(isCheck)
                {
                    $("#discountedAmountDiv").css("display", "none");
                    $("#receivedAmount, #discountedAmount").attr("data-validation-optional", "true");
                    
                    if ($("#receivedAmount").val() <= 0){
                        $("#paymentMethodContainer").css("display", "none");
                        $("#paymentMethodId").attr("data-validation-optional", "true");
                    }
                    
                    $("#discountedAmount").val(0);

                    $("#paymentTermId, #paymentTermDuration, #buyerId").removeAttr("data-validation-optional");
                    $("#paymentTermDurationContainer").css("display", "inline-block");
                    
                    var buyerId = jQuery("#buyerId").val();
                    if (buyerId <= 0){
                        alert("Please select buyer for unpaid invoice");
                    }
                }
                else
                {
                    $("#paymentMethodContainer, #discountedAmountDiv").css("display", "inline-block");
                    $("#paymentMethodId, #receivedAmount, #discountedAmount").removeAttr("data-validation-optional");

                    $("#paymentTermId, #paymentTermDuration, #buyerId").attr("data-validation-optional", "true");
                    $("#paymentTermDurationContainer").css("display", "none");
                    verifyReceivedAmount();
                }
            });
            
            jQuery("#invoiceNumber").blur(function(){
                var defaultNumber = "{/literal}{$a_TemplateData['invoiceNumber']}{literal}";
                if ($(this).val() === ""){
                    $(this).val(defaultNumber);
                    $(this).trigger('blur');
                }
            });
            
            jQuery("#receivedAmount").keyup(verifyReceivedAmount); 
            jQuery("input[name='add_and_print_invoice'], input[name='add_invoice']").click(function(){
                var proCount = parseInt($("#itemCount").val());
                
                if (isNaN(proCount) || proCount <= 0){
                    alert("Please select product(s)");
                    return false;
                }
            }); 
        }
        
        function calculateMrp(productId)
        {
            if (isNaN(productId) || productId <= 0){
              productId = ($(this).attr("id")).split("_")[1];
            }
            var qtyField = $("#quantity_" + productId);
            var unitPriceField = $("#unitPriceValue_" + productId);
            var taxField = $("#tax_" + productId);
            
            var quantity  = parseInt(qtyField.val());
            if (isNaN(quantity) || quantity < 0){
                quantity = 1;
            }
            
            var unitPriceWithTax = parseFloat(unitPriceField.val()).toFixed(2)/1;
            if (isNaN(unitPrice) || unitPrice < 0){
                unitPrice = 0;
            }
            
            var tax = parseFloat(taxField.val());
            if (isNaN(tax) || tax < 0){
                tax = 0;
            }
            
            var margin = 0;
            var priceMarginTypeId = $("#priceMarginTypeId_" + productId).val();
            var priceMarginTypeField = $("#margin_" + productId + "_" + priceMarginTypeId);
            var marginValue   = parseFloat(priceMarginTypeField.val()).toFixed(2)/1;
            if (!isNaN(marginValue) && marginValue > 0){
                margin = marginValue;
            }
            
            unitPriceWithTax +=  margin;
            
            var taxAmount = parseFloat((unitPriceWithTax * tax)/100).toFixed(2)/1;
            if (isNaN(taxAmount) || taxAmount <= 0){
                taxAmount = 0;
            }
            $("#taxAmount_" + productId).text(taxAmount);
            
            var unitPrice = parseFloat(unitPriceWithTax - taxAmount).toFixed(2)/1;
            
            var mrp = parseFloat(unitPriceWithTax).toFixed(2)/1;
            if (isNaN(mrp) || mrp <= 0){
                mrp = 0;
            }
            
            var total = parseFloat((unitPriceWithTax * quantity)).toFixed(2)/1;
            if (isNaN(total) || total <= 0){
                total = 0;
            }
            
            $("#unitPrice_" + productId).text(unitPrice);
            $("#mrp_" + productId).text(mrp);
            $("#mrpValue_" + productId).val(mrp);
            $("#total_" + productId).text(total);
            $("#totalValue_" + productId).val(total);
            claculateGrandTotal();
        }
        
        function claculateGrandTotal()
        {
            var totalFields  = $("input[id^='totalValue_']");
            var grandTotal = 0.00;
            
            totalFields.each(function( index ) {
                grandTotal += parseFloat($(this).val());
            });
            
            var grandTotalAmount = parseFloat(grandTotal).toFixed(2)/1;
            $("#grandTotal").text(grandTotalAmount);
            $("#grandTotalAmount").val(grandTotalAmount);
            $("#invoiceNumber").trigger('blur');
        }
        
        function verifyReceivedAmount()
        {
            var receivedAmount   = parseFloat($("#receivedAmount").val());
            var grandTotal       = parseFloat($("#grandTotalAmount").val());
            var maxInvoiceDiscount = {/literal}{$a_TemplateData['MAX_INVOICE_DISCOUNT_AMOUNT']}{literal};
            var discountedAmount = parseFloat(grandTotal - receivedAmount).toFixed(2)/1;
            
            if (isNaN(discountedAmount) || discountedAmount <= 0){
                discountedAmount = 0;
            }
            
            if (jQuery("#unpaid").is(":checked")){
                if(receivedAmount > 0){
                    $("#paymentMethodContainer").css("display", "inline-block");
                    $("#paymentMethodId").removeAttr("data-validation-optional");
                    
                    if (discountedAmount <=  maxInvoiceDiscount){
                        jQuery("#unpaid").trigger("click");
                    }
                }
                else{
                    $("#paymentMethodContainer").css("display", "none");
                    $("#paymentMethodId").attr("data-validation-optional", "true");
                }
                return true;
            }
            
            $("#discountedAmount").val(discountedAmount)
            if (discountedAmount >  maxInvoiceDiscount){
                $("#discountedAmountMsg").text("Discount should be less than Rs.{/literal}{$a_TemplateData['MAX_INVOICE_DISCOUNT_AMOUNT']}{literal}");
                $("#discountedAmountMsg").css("display", "inline-block");
                return false;
            }
            else{
                $("#discountedAmountMsg").css("display", "none");
            }
        }
        
    </script>
    {/literal}
{/block}


