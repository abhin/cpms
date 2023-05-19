var groupColumn = 1;
    var columnSpan = 6;    
    function init()
    {
            validateFormWithServer();
            selectChosen();
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
                height: 500,
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
                $("#amountDue").val(amountDue);
                $("#invoiceId").val(invoiceId);
                $("#receivedAmount").keyup(calculateReceivedAmount);
               dialog.dialog( "open" );
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
                //dataType :"json",
                data: $("#addPaymentForm").serialize(),
                url: "{/literal}{actionurl page="salesinvoices" params=["do"=>100]}{literal}",
                success: function (data){
                    alert(data);
                    return;
                    if (data.status === true){
                        $("#currentRecAmount_" + data.invoiceId).text(data.receivedAmount);
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
                    alert('Error!!' . textStatus);
                }
            });
        }