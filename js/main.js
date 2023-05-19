//##############################################################################
// Functions
//##############################################################################
function dateSelector(elements, newOptions){
    var options = {
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        showButtonPanel: true,
    }
    
    $.extend(options, newOptions);
    
    $(elements).datepicker("destroy");
    return $(elements).datepicker(options);
}

function selectChosen()
{
    if (typeof(chosenOption) == "undefined" || typeof(chosenOption.width) == "undefined"){
        chosenOption = {width: "95%", allow_single_deselect: true};
    }
    $(".chosen-select").chosen(chosenOption);
    $(".searchForm .chosen-select").chosen({width: "95%", allow_single_deselect: true});
}

function validateFormWithServer()
{
     jQuery.validate({
              validateOnBlur : true,
              showHelpOnFocus : true,
              scrollToTopOnError : true,
              modules : 'security,file',
              validateHiddenInputs:true,
              ignore: 'input[type=hidden]',
              onModulesLoaded : function() {
                  var optionalConfig = {
                    fontSize: '12pt',
                    padding: '4px',
                    background:'none',
                    bad : 'Very bad',
                    weak : 'Weak',
                    good : 'Good',
                    strong : 'Strong'
                  };

                  $('input[name="password"]').displayPasswordStrength(optionalConfig);
              //onSuccess : function(){sendMail()}
            },
        });
}

function validateFormWithOutServer()
{
     jQuery.validate({
              validateOnBlur : true,
              showHelpOnFocus : true,
              scrollToTopOnError : true,
              validateHiddenInputs:true,
              ignore: 'input[type=hidden]'
//              showErrors: function(errorMap, errorList) {
//                  return false;
//              }
          });
}

function selectAllData(clickParentIdentifire, selectableName)
{
    jQuery(clickParentIdentifire).click(function(){
        var isCheck  = $(this).is(":checked")
        var selectable = $('input[name^="' + selectableName + '"]');
        
        if(isCheck){
            selectable.prop('checked', true);
        }
        else{
            selectable.prop('checked', false);
        }
    });
}

function resetFromData(formIdentifire)
{
    jQuery(".resetForm").click(function(){
        $(formIdentifire + ' input[type="text"], ' + formIdentifire + ' input[type="hidden"], ' + formIdentifire + ' textarea').val("");
        $(formIdentifire + ' select').val(0);
        $(formIdentifire  + ' select').trigger("chosen:updated");
        $(formIdentifire).submit();
//        $(formIdentifire + ' .chosen-select"').trigger("chosen:updated");
        
        // alert('foo');
        // $(formIdentifire)[1].reset();
        // $(formIdentifire  + ' select').trigger("chosen:updated");
    });
}

function setDefaultTax(url){
    jQuery("input[name='notDefaultTax']").unbind("click");
    jQuery("input[name='notDefaultTax']").click({url:url}, changeDefaultTax);
}

function changeDefaultTax(e){
        var currentItem = jQuery(this);
        var taxId = jQuery(this).val();
        var imageHtml = '<span id="defaultTax_' + taxId + '"><img src="../../images/icon-ok.png" border="0"/></span>';
        var parent = $(this).parent();
        var url = e.data.url;
        jQuery.ajax({
            type: "POST",
            data: {id:taxId, do:'setASDefault'},
            url: url,
            success: function (data){
                if (data == "true")
                {
                    var defaultTax = $("span[id^='defaultTax_']");
                    if (defaultTax.prop('id'))
                    {
                        var defaultTaxId = defaultTax.prop('id').split('_')[1];
                        var defaultTaxParent = defaultTax.parent();
                        var radioHtml = '<input type="radio" name="notDefaultTax" value="' + defaultTaxId + '" />';
                        parent.html(imageHtml);
                        defaultTaxParent.html(radioHtml)
                        setDefaultTax(url);
                    }else{
                        parent.html(imageHtml);
                    }
                }else{
                    currentItem.removeProp("checked");
                    parent.append('<br/><tt style="color:red;">Error!! could not set</tt>');
                }
            },
            error: function( jqXHR, textStatus, errorThrown ){
                alert('Error!! could not set');
            }
        });
    }

function calcAmountOnTypeUnitPrice(){
    var unitPrice = $(this).val();
    var quantity = $("#quantity").val();

    if(quantity == "" || quantity < 0){
        quantity = 1;
    }

    if(unitPrice == "" || unitPrice < 0){
        unitPrice = 0.00;
    }

    var totalAmount = (unitPrice * quantity);
    $("#amount").val(totalAmount);
}

function calcOnchangeAmount()
{
    var catId = $("#productId").val();
    var quantity = $("#quantity").val();

    if(catId > 0){
        var unitPrice = $("#proUnitPrice_" + catId).val();
        var measurUnit = $("#proMeasureUnit_" + catId).val();
    }
    else{
        unitPrice = 0.00;
    }

    if(isNaN(quantity) || quantity == "" || quantity < 0){
        quantity = 1;
    }

    $("#unitPrice").val(unitPrice);
    $("#measuringUnitId").val(measurUnit).trigger("chosen:updated");
    var totalAmount = (unitPrice * quantity);
    $("#amount").val(totalAmount);
}

function togglePaidUnpaid()
{
    jQuery("#paidStatus").click(function(){
        var isCheck  = $(this).is(":checked");
        if(isCheck)
        {
            $("#paymentMethodContainer").css("display", "inline-block");
            $("#paymentMethodId").removeAttr("data-validation-optional");

            $("#paymentTermId, #paymentTermDuration").attr("data-validation-optional", "true");
            $("#paymentTermDurationContainer").css("display", "none");
            //validateFormWithOutServer();
        }
        else
        {
            $("#paymentMethodContainer").css("display", "none");
            $("#paymentMethodId").attr("data-validation-optional", "true");

            $("#paymentTermId, #paymentTermDuration").removeAttr("data-validation-optional");
            $("#paymentTermDurationContainer").css("display", "inline-block");
            //validateFormWithOutServer();
        }
    });
}

// Data table Table
var table
function loadDataTable(tableIdentifier, url, dataPerPage, newOption, callback)
{
    var options = {
                    paging: false,
                    language: {"emptyTable": "No records found"},
                }
                   
    $.extend( options, newOption );
    
    table = $(tableIdentifier).DataTable(options);
    
    loadMoreData(url, dataPerPage, table, callback);
    toggleTableHeadView(table);
}

function searchOnTableColumClick()
{
    var api = this.api();
    api.$('td').click( function () {
        api.search( this.innerHTML ).draw();
    } );
}

function loadMoreData(url, dataPerPage, table, callback)
{
    $('#loadMore').on( 'click', function (event) {
        var startIndex =  $("#startIndex");
        var startIndexValue =  parseInt(startIndex.val());
        var startIndex =  $("#startIndex");
        var startIndexValue =  parseInt(startIndex.val());
        $(this).toggle();
        $(".loading").toggle();
        jQuery.ajax({
            type: "POST",
            dataType :"json",
            data: {loadDataAjax: 1, start:startIndexValue, searchData:$('.searchForm').serialize()},
            url: url,
            success: function (data){
//                alert(data);
                $.each(data, function(key, value) {
                    table.row.add(value.split(',')).draw();
                });

                startIndexValue += parseInt(dataPerPage);
                startIndex.val(startIndexValue);
                
                confirmDelete();
                unCheckSelectAll();
                // Uncheck bind select all checkbox
                
                if ($.isFunction(callback)){
                    callback();
                }
                $('#loadMore, .loading').toggle();
            },
            error: function( jqXHR, textStatus, errorThrown ){
//                alert(textStatus);
                jQuery("#loadMore, .loading").remove();
                //alert("failed");
            }
      });
    });
}

function toggleTableHeadView(table)
{
    $('a.toggle-vis').on( 'click', function(e){
        e.preventDefault();
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
        // Toggle the visibility
        column.visible( ! column.visible() );
        var iconChild = $(this).children( "i" );
        iconChild.toggleClass(function(){
            var open = $( this ).hasClass( "glyphicon-eye-open" );
            var close = $( this ).hasClass( "glyphicon-eye-close");
            var parent = $( this ).parent();
            
            if (open === true){
                $(this).removeClass('glyphicon-eye-open');
                parent.addClass('inactive')
                return 'glyphicon-eye-close';
            }
            else if (close === true){
                $(this).removeClass('glyphicon-eye-close');
                return 'glyphicon-eye-open';
            }
        });
    });
}

function confirmDelete()
{
    $('.delete').unbind('click');
    $('.delete').click(function(){
        return  confirm("Are you sure you want to permanently delete this?");
    });
}

function unCheckSelectAll(){
    $('input[name^="selectedData"]').click(function(){
        $(".selectAll").prop('checked', false);
    });
}

function getToalAmount(colNum)
{
    var items=[], totalMount=0;

    //Iterate all td's in second column
    $('#tableData tbody tr td:nth-child('+ colNum + ')').each( function(){
       //add item to array
       items.push( $(this).text() );       
    });

    //iterate unique array and build array of select options
    $.each( items, function(i, item){
        var amount = parseInt(item);
        
        if (amount > 0){
            totalMount += parseInt(item);
        }
    })

    //finally empty the select and append the items from the array
    $('#totalAmount').text(totalMount);
}

function validateBulkSelection()
{
    $("select[name='bulkAction'], input[name^='do_bulkAction']").click(function(){
        var selectedCount = $("input[name^='selectedData[']:checked").length;

        if (selectedCount <= 0){
            $("select[name='bulkAction']").val("");
            alert("Please select item(s) for bulk action");
            return false;
        }
    });
}

$(function(){
    $("input[type='text']").prop("autocomplete","off");
   $(".alert").fadeOut(15000);
   
   //highlight current / active link
    $('ul.main-menu li a').each(function () {
        if ($($(this))[0].href == String(window.location))
            $(this).parent().addClass('active');
    });
    
    $('#profileButton').click(function(){
        $("#profileMenu").slideToggle();
    });
        
    $('[data-toggle="tooltip"]').tooltip({
      position: {
        my: "center bottom-20",
        at: "center top",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      }
    });

    //auto grow textarea
    $('textarea.autogrow').autogrow();

    $('.box-header').click(function (e) {
        e.preventDefault();
        var $target = $(this).parent().children('.box-content');
        if ($target.is(':visible')) {
            $('a i', $(this)).removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        }else{                      
            $('a i', $(this)).removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        }
        $target.slideToggle();
    });
    
    validateBulkSelection();
    confirmDelete();
    unCheckSelectAll();
    // This function is creating on  every template page 
    init();
});