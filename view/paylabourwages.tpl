{extends file="parent.tpl"}
{block  name="title" prepend}Labour Wages{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
        {if isset($a_TemplateData['payWageData']['projectId'])}
            {assign var="projectId" value=$a_TemplateData['payWageData']['projectId']}
        {else}
            {assign var="projectId" value="0"}
        {/if}
        
        {if  isset($a_TemplateData['allLabourWages']['totalWages'])}
           {$totalWages = $a_TemplateData['allLabourWages']['totalWages']}
        {else}
            {$totalWages = 0};
        {/if}
        {if $projectId > 0}
        <!-- Add new form -->
        <form action="{actionurl page=$actionPage params=['projectId'=>$projectId, 'totalWages'=>$totalWages]}" method="post" class="form-inline addForm"  style="text-align: center;">
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    {if isset($a_TemplateData['payWageData']['id']) && $a_TemplateData['payWageData']['id'] > 0}
                        {$labourWageId = $a_TemplateData['payWageData']['id']}
                    {else}
                        {$labourWageId = 0}
                    {/if}
                    <div class="box-header well" onclick="return false;">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;{if isset($a_TemplateData['payWageData']['id']) && $a_TemplateData['payWageData']['id'] > 0}Edit{else}Add New{/if}</h2>
                        
                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
                    {if isset($a_TemplateData['payWageData']['showForm'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                            <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="receiptNo">
                                        Receipt Number
                                        <a data-toggle="tooltip" title="Eg: Voucher/ Cheque/ Transaction Number">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" name="receiptNo" class="form-control" data-validation="required" data-validation-error-msg="Receipt number required" value='{if isset($a_TemplateData['payWageData']['receiptNo'])}{$a_TemplateData['payWageData']['receiptNo']}{/if}' autocomplete="off" placeholder="Voucher/ Cheque/ Transaction Number"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="paymentDate" class="control-label">
                                        Payment/ Receipt Date
                                        <a data-toggle="tooltip" title="Date of payment made">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="paymentDate" name="paymentDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invaid date" value='{if isset($a_TemplateData['payWageData']['paymentDate']) && $a_TemplateData['payWageData']['paymentDate'] != "0000-00-00"}{$a_TemplateData['payWageData']['paymentDate']}{/if}' autocomplete="off" placeholder="Date of payment made"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="amount" class="control-label">Amount</label>
                                    <div class="input-group" style="width:98.5% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                        <input type="text" id="amount" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" value='{$totalWages}' disabled="disabled" />
                                    </div>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-primary" id='addLabourWage'  type="submit" name="add_labourWage" value="{if isset($a_TemplateData['payWageData']['id']) && $a_TemplateData['payWageData']['id'] > 0}Save{else}Add{/if}"/>&nbsp;&nbsp;&nbsp;
                                    <input type="hidden" name="addLabourWage" value="Add"/>
                                    <a class="btn btn-default resetFormData" type="reset" href="{actionurl page=$actionPage}">Clear</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                       <h2><i class="glyphicon glyphicon-th-large"></i> Unpaid Labour Wages</h2>
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
                        <div class="col-lg-12">
                            <div class="breadcrumb col-lg-12" style="text-align: center; ">
                                Wage(s) Total: <i class="fa fa-inr"></i> <span id="totalAmount">{*$totalWages*}0</span>
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
                            <table id="tableData" class="display" cellspacing="0" width="100%">
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
                                    {if $a_TemplateData['allLabourWages']}
                                        {foreach $a_TemplateData['allLabourWages'] as $labourDate=>$wageData}
                                            {if  $labourDate == 'totalWages'}
                                                <input type="hidden" name="totalWages" value="{$a_TemplateData['allLabourWages']['totalWages']}"/>
                                                {continue}
                                            {/if}
                                            <tr style="background-color:#1794E1; color:#FFFFFF; font-weight:bold; font-size:14px;">
                                               <td>
                                                   <input type="checkbox" name="selectedData_{$labourDate}" value="{$labourDate}" />
                                               </td>
                                               <td>Labour Date - {$labourDate}</td>
{*                                               <td></td>*}
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                            </tr>
                                            {foreach $wageData as $index=>$details} 
                                                {if $labourDate != $details->labourDateF}
                                                    {continue}
                                                {else if $details->paidStatus|intval === $a_TemplateData['PAID']}
                                                {continue}
                                                {/if}
                                            <tr>
                                               <td>
                                                   <input type="checkbox" id="{$labourDate}-{$index}" name="selectedData[]" value="{$details->id}" />
                                               </td>
{*                                               <td>{$index + 1}</td>*}
                                               <td>{$details->supervisorName}</td>
                                               <td>{$details->labourTypeName}</td>
                                               <td>{$details->labourDateF}</td>
                                               <td>{$details->name}</td>
                                               <td>{$details->totalHours}</td>
                                               <td>{$details->amount}</td>
                                               <td>
                                                   {if $details->paidStatus|intval === $a_TemplateData['PAID']}
                                                        <span class="label-default label label-success">
                                                            Paid
                                                        </span>
                                                    {else if $details->paidStatus|intval === $a_TemplateData['UNPAID']}
                                                        <span class="label-default label">
                                                            Unpaid
                                                        </span>
                                                    {else}
                                                        <span class="label-default label label-danger">
                                                         Unknown
                                                        </span>
                                                    {/if}
                                               </td>
                                             </tr>
                                          {/foreach}
                                        {/foreach}
                                        {/if}
                                    </tbody>
                                </table>
                         </div>
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
            validateFormWithServer();
            selectChosen();
            var options = {};
            options.maxDate = new Date();
            dateSelector(".datePicker",options);
            
            selectAllData(".selectAll", "selectedData");
            resetFromData(".searchForm");

           var tableOptions = {};
            {/literal}
            {if isset($a_TemplateData['allLabourWages']) && $a_TemplateData['allLabourWages']}
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


                loadDataTable('#tableData','', 0, tableOptions);
                
           jQuery("#projectId").change(function(){
                $("#selectProject").submit();
            });  
            
           jQuery("#resetTableFilter").click(function(){
               $("input[name^='tableLabourDate']").val("");
               $("input[name^='tableToDate']").val("");
               $('#bulkAction').attr("data-validation-optional", "true");
               $("#bulkForm").submit();
           });
           jQuery("input[name^='paidStatus'], #do_payWages").click(function(){
               $('#bulkAction').attr("data-validation-optional", "true");
               $("#bulkForm").submit();
            }); 
            
            selectSpecificDateData();
            $(".selectAll").trigger("click");
            getToalAmount(7);
        }
        
        function selectSpecificDateData()
        {
            jQuery('input[name^="selectedData_"]').click(function(){
                var selectedDate = $(this).attr("name").split('_')[1];
                var isCheck  = $(this).is(":checked")
                var selectable = $('input[id^="' + selectedDate + '"]');
                $("input[name='selectAll']").prop('checked', false);

                if(isCheck){
                    selectable.prop('checked', true);
                }
                else{
                    selectable.prop('checked', false);
                }
            });
            
            $('input[name^="selectedData["]').click(function(){
        
                var thisId = $(this).attr("id").split("-")[0];
                $('input[name^="selectedData_' + thisId + '"]').prop('checked', false);
            });
        }
    </script>
    {/literal}
{/block}


