{extends file="parent.tpl"}
{block  name="title" prepend}Payments{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
        <!-- Add new form -->
        <form action="{actionurl page=$actionPage}" method="post" class="form-inline addForm"  style="text-align: center;">
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" onclick="return false;">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;{if isset($a_TemplateData['paymentData']['id']) && $a_TemplateData['paymentData']['id'] > 0}Edit{else}Add New{/if}</h2>

                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
                    {if isset($a_TemplateData['paymentData']['showForm'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                                {if isset($a_TemplateData['paymentData']['id']) &&  $a_TemplateData['paymentData']['id'] > 0}
                                    {assign var=paymentId value={$a_TemplateData['paymentData']['id']}}
                                    <input type="hidden" name="id" value="{$paymentId}"/>
                                {else}
                                    {assign var=paymentId value=0}
                                {/if}
                                <div class="col-xs-12">  
                                    <div class="form-group col-xs-4">
                                        {if isset($a_TemplateData['paymentData']['employeeId'])}
                                            {assign var="employeeId" value=$a_TemplateData['paymentData']['employeeId']}
                                        {else}
                                            {assign var="employeeId" value=""}
                                        {/if}
                                        <label for="employeeId" class="control-label">
                                            Employee
                                            <a data-original-title="Eg: Salary/ Bonus/ Insentive" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select id="employeeId" name="employeeId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid employee" data-placeholder="Choose a employee...">
                                            <option value=""></option>
                                            {foreach $a_TemplateData['allEmployees'] as $details}
                                                <option value="{$details->id}" {if $employeeId == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        <label for="amount" class="control-label">Amount</label>
                                        <div class="input-group" style="width:98.5% !important;">
                                            <div class="input-group-addon">Rs.</div>
                                        <input type="text" id="amount" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" value='{if isset($a_TemplateData['paymentData']['amount'])}{$a_TemplateData['paymentData']['amount']}{/if}' />
                                        </div>
                                        <br/>
                                        
                                        {if isset($a_TemplateData['paymentData']['isItSalary'])}
                                            {assign var="isItSalary" value=(int)$a_TemplateData['paymentData']['isItSalary']}
                                        {else}
                                            {assign var="isItSalary" value=""}
                                        {/if}
                                        <input type="checkbox" name="isItSalary" id="isItSalary" class="form-control" {if $isItSalary === $a_TemplateData['YES']}checked="checked"{/if} value="1"/><span class="label label-info" style="font-size: 11px; background-color: #033C73;">&nbsp;Is&nbsp;it&nbsp;salary&nbsp;?</span>
                                    </div>
                                    <div class="form-group col-xs-4" id="paymentTermIdDiv" {if $isItSalary !== 1}style="display:none;"{/if}>
                                        {if isset($a_TemplateData['paymentData']['paymentTermId'])}
                                            {assign var="paymentTermId" value=(int)$a_TemplateData['paymentData']['paymentTermId']}
                                        {else}
                                            {assign var="paymentTermId" value=""}
                                        {/if}
                                        <label for="paymentTermId" class="control-label">
                                            Payment Term
                                            <a data-original-title="Pay by Hour/ Day/ Week/ Month" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select id="paymentTermId" name="paymentTermId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid term" data-placeholder="Choose a term..." {if $isItSalary !== 1}data-validation-optional="true"{/if} >
                                            <option value=""></option>
                                            {foreach $a_TemplateData['allPaymentTerms'] as $details}
                                                <option value="{$details->id}" {if $paymentTermId == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-xs-4" id="paymentTypeIdDiv" {if $isItSalary === 1}style="display:none;"{/if}>
                                        {if isset($a_TemplateData['paymentData']['paymentTypeId'])}
                                            {assign var="paymentTypeId" value=(int)$a_TemplateData['paymentData']['paymentTypeId']}
                                        {else}
                                            {assign var="paymentTypeId" value=""}
                                        {/if}
                                        <label for="paymentTypeId" class="control-label">
                                            Payment Type
                                            <a data-original-title="Eg: Salary/ Bonus/ Insentive" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select id="paymentTypeId" name="paymentTypeId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid payment type" data-placeholder="Choose a payment type..." {if $isItSalary === 1}data-validation-optional="true"{/if}>
                                            <option value=""></option>
                                            {foreach $a_TemplateData['allPaymentTypes'] as $details}
                                                <option value="{$details->id}" {if $paymentTypeId == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12" id="salaryDetailsDiv" {if $isItSalary !== 1}style="display:none;"{/if}>
                                    
                                    <div class="form-group col-xs-4"  id="salaryMonthDiv" {if $isItSalary !== 1 || $paymentTermId !== 4}style="display:none;"{/if}>
                                        <label for="salaryMonth" class="control-label">Salary Month</label>
                                        <input type="text" id="salaryMonth" name="salaryMonth" class="form-control datePickerMonth" data-validation="date" data-validation-format="yyyy-mm" data-validation-error-msg="Invalid date" {if $isItSalary !== 1 || $paymentTermId !== 4}data-validation-optional="true"{/if} value='{if isset($a_TemplateData['paymentData']['salaryMonth']) && $a_TemplateData['paymentData']['salaryMonth'] != "0000-00"}{$a_TemplateData['paymentData']['salaryMonth']}{/if}' autocomplete="off"/>
                                    </div>
                                    
                                    <div class="form-group col-xs-4" id="totalHoursDiv" {if $isItSalary !== 1 || $paymentTermId !== 1}style="display:none;"{/if}>
                                        {if isset($a_TemplateData['paymentData']['totalHours'])}
                                            {assign var="totalHours" value=$a_TemplateData['paymentData']['totalHours']}
                                        {else}
                                            {assign var="totalHours" value=""}
                                        {/if}
                                        <label for="totalHours" class="control-label">Total Hours</label>
                                        <select id="totalHours" name="totalHours" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid hour" data-placeholder="Choose hour..." {if $isItSalary !== 1 || $paymentTermId !== 1}data-validation-optional="true"{/if} >
                                            <option></option>
                                            {section name=hour start=1 loop=24 step=1}

                                                <option value="{$smarty.section.hour.index}" {if $totalHours == $smarty.section.hour.index}selected='selected'{/if}>
                                                    {$smarty.section.hour.index}
                                                </option>
                                            {/section}
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-xs-4">
                                        <label for="salaryDateStart" class="control-label">Salary Date Start</label>
                                        <input type="text" id="salaryDateStart" name="salaryDateStart" class="form-control datePickerSalary" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" data-validation-optional="true" value='{if isset($a_TemplateData['paymentData']['salaryDateStart']) && $a_TemplateData['paymentData']['salaryDateStart'] != "0000-00-00"}{$a_TemplateData['paymentData']['salaryDateStart']}{/if}' autocomplete="off"/>
                                    </div>

                                    <div class="form-group col-xs-4" id="salaryDateEndDiv">
                                        <label for="salaryDateEnd" class="control-label">Salary Date End</label>
                                        <input type="text" id="salaryDateEnd" name="salaryDateEnd" class="form-control datePickerSalary" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invaid date" data-validation-optional="true" value='{if isset($a_TemplateData['paymentData']['salaryDateEnd']) && $a_TemplateData['paymentData']['salaryDateEnd'] != "0000-00-00"}{$a_TemplateData['paymentData']['salaryDateEnd']}{/if}' autocomplete="off"/>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    {if isset($a_TemplateData['paymentData']['paymentMethodId'])}
                                        {assign var="paymentMethodId" value=(int)$a_TemplateData['paymentData']['paymentMethodId']}
                                    {else}
                                        {assign var="paymentMethodId" value=""}
                                    {/if}
                                    <label for="paymentMethodId" class="control-label">
                                        Payment Method
                                        <a data-original-title="Eg: Voucher/ Cheque/ Account Transfer" data-toggle="tooltip" title="">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <select id="paymentMethodId" name="paymentMethodId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid payment method" data-placeholder="Choose a payment method...">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['allPaymentMethods'] as $details}
                                            <option value="{$details->id}" {if $paymentMethodId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="receiptNo">
                                        Receipt Number
                                        <a data-toggle="tooltip" title="Eg: Voucher/ Cheque/ Transaction Number">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" name="receiptNo" class="form-control" data-validation="alphanumeric server" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-url="{actionurl page=$ajaxFilePath params=["do"=>$a_TemplateData['VALIDATE'], "id"=>$paymentId]}" data-validation-error-msg="Alphanumeric values only"  data-validation-optional="true" value='{if isset($a_TemplateData['paymentData']['receiptNo'])}{$a_TemplateData['paymentData']['receiptNo']}{/if}' autocomplete="off" placeholder="Voucher/ Cheque/ Transaction Number"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="paymentDate" class="control-label">
                                        Payment/ Receipt Date
                                        <a data-toggle="tooltip" title="Date of payment made">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="paymentDate" name="paymentDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invaid date" value='{if isset($a_TemplateData['paymentData']['paymentDate']) && $a_TemplateData['paymentData']['paymentDate'] != "0000-00-00"}{$a_TemplateData['paymentData']['paymentDate']}{/if}' autocomplete="off" placeholder="Date of payment made"/>
                                </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="notes" >Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['paymentData']['notes'])}{$a_TemplateData['paymentData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-primary" id='add_payment'  type="submit" name="add_payment" value="{if isset($a_TemplateData['paymentData']['id']) && $a_TemplateData['paymentData']['id'] > 0}Save{else}Add{/if}"/>&nbsp;&nbsp;&nbsp;
                                    <input type="hidden" name="addPayment" value="Add"/>
                                    <a class="btn btn-default resetFormData" type="reset" href="{actionurl page=$actionPage}">Clear</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <form action="{actionurl page=$actionPage}" method="post" class="form-inline searchForm"  style="text-align: center;">
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
                    {if isset($a_TemplateData['searchData']['search_payment'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                        
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-7 col-md-12 formContainer">
                                 <div class="col-xs-12">  
                                    <div class="form-group col-xs-4">
                                        {if isset($a_TemplateData['searchData']['employeeId'])}
                                            {assign var="employeeId" value=$a_TemplateData['searchData']['employeeId']}
                                        {else}
                                            {assign var="employeeId" value=""}
                                        {/if}
                                        <label for="employeeId" class="control-label">
                                            Employee
                                            <a data-original-title="Eg: Salary/ Bonus/ Insentive" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select name="employeeId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid employee" data-placeholder="Choose a employee..." data-validation-optional="true">
                                            <option value=""></option>
                                            {foreach $a_TemplateData['allEmployees'] as $details}
                                                <option value="{$details->id}" {if $employeeId == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        <label for="amount" class="control-label">Amount</label>
                                        <div class="input-group" style="width:98.5% !important;">
                                            <div class="input-group-addon">Rs.</div>
                                        <input type="text" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" value='{if isset($a_TemplateData['searchData']['amount'])}{$a_TemplateData['searchData']['amount']}{/if}' data-validation-optional="true"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        <label for="amount" class="control-label">Select salary payments</label><br/>
                                         <input type="checkbox" name="isItSalary" class="form-control" {if isset($a_TemplateData['searchData']['isItSalary']) && (int)$a_TemplateData['searchData']['isItSalary'] === 1}checked="checked"{/if} value="1"/>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        {if isset($a_TemplateData['searchData']['paymentTermId'])}
                                            {assign var="paymentTermId" value=(int)$a_TemplateData['searchData']['paymentTermId']}
                                        {else}
                                            {assign var="paymentTermId" value=""}
                                        {/if}
                                        <label for="paymentTermId" class="control-label">
                                            Payment Term
                                            <a data-original-title="Pay by Hour/ Day/ Week/ Month" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select name="paymentTermId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid term" data-placeholder="Choose a term..." data-validation-optional="true">
                                            <option value=""></option>
                                            {foreach $a_TemplateData['allPaymentTerms'] as $details}
                                                <option value="{$details->id}" {if $paymentTermId == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        {if isset($a_TemplateData['searchData']['paymentTypeId'])}
                                            {assign var="paymentTypeId" value=(int)$a_TemplateData['searchData']['paymentTypeId']}
                                        {else}
                                            {assign var="paymentTypeId" value=""}
                                        {/if}
                                        <label for="paymentTypeId" class="control-label">
                                            Payment Type
                                            <a data-original-title="Eg: Salary/ Bonus/ Insentive" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select name="paymentTypeId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid payment type" data-placeholder="Choose a payment type..." data-validation-optional="true">
                                            <option value=""></option>
                                            {foreach $a_TemplateData['allPaymentTypes'] as $details}
                                                <option value="{$details->id}" {if $paymentTypeId == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-xs-4" >
                                        <label for="salaryMonth" class="control-label">Salary Month</label>
                                        <input type="text" name="salaryMonth" class="form-control datePickerMonth" data-validation="date" data-validation-format="yyyy-mm" data-validation-error-msg="Invalid date" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['salaryMonth']) && $a_TemplateData['searchData']['salaryMonth'] != "0000-00"}{$a_TemplateData['searchData']['salaryMonth']}{/if}' autocomplete="off"/>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                        {if isset($a_TemplateData['searchData']['totalHours'])}
                                            {assign var="totalHours" value=$a_TemplateData['searchData']['totalHours']}
                                        {else}
                                            {assign var="totalHours" value=""}
                                        {/if}
                                        <label for="totalHours" class="control-label">Total Hours</label>
                                        <select name="totalHours" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid hour" data-placeholder="Choose hour..." data-validation-optional="true">
                                            <option></option>
                                            {section name=hour start=1 loop=24 step=1}

                                                <option value="{$smarty.section.hour.index}" {if $totalHours == $smarty.section.hour.index}selected='selected'{/if}>
                                                    {$smarty.section.hour.index}
                                                </option>
                                            {/section}
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        <label for="salaryDateStart" class="control-label">Salary Date Start</label>
                                        <input type="text" name="salaryDateStart" class="form-control datePickerSalary" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['salaryDateStart']) && $a_TemplateData['searchData']['salaryDateStart'] != "0000-00-00"}{$a_TemplateData['searchData']['salaryDateStart']}{/if}' autocomplete="off"/>
                                    </div>

                                    <div class="form-group col-xs-4">
                                        <label for="salaryDateEnd" class="control-label">Salary Date End</label>
                                        <input type="text" name="salaryDateEnd" class="form-control datePickerSalary" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invaid date" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['salaryDateEnd']) && $a_TemplateData['searchData']['salaryDateEnd'] != "0000-00-00"}{$a_TemplateData['searchData']['salaryDateEnd']}{/if}' autocomplete="off"/>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    {if isset($a_TemplateData['searchData']['paymentMethodId'])}
                                        {assign var="paymentMethodId" value=(int)$a_TemplateData['searchData']['paymentMethodId']}
                                    {else}
                                        {assign var="paymentMethodId" value=""}
                                    {/if}
                                    <label for="paymentMethodId" class="control-label">
                                        Payment Method
                                        <a data-original-title="Eg: Voucher/ Cheque/ Account Transfer" data-toggle="tooltip" title="">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <select name="paymentMethodId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid payment method" data-placeholder="Choose a payment method..." data-validation-optional="true">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['allPaymentMethods'] as $details}
                                            <option value="{$details->id}" {if $paymentMethodId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="receiptNo">
                                        Receipt Number
                                        <a data-toggle="tooltip" title="Eg: Voucher/ Cheque/ Transaction Number">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" name="receiptNo" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-error-msg="Alphanumeric values only"  data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['receiptNo'])}{$a_TemplateData['searchData']['receiptNo']}{/if}' autocomplete="off" placeholder="Voucher/ Cheque/ Transaction Number"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="paymentDate" class="control-label">
                                        Payment/ Receipt Date
                                        <a data-toggle="tooltip" title="Date of payment made">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" name="paymentDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invaid date" value='{if isset($a_TemplateData['searchData']['paymentDate']) && $a_TemplateData['searchData']['paymentDate'] != "0000-00-00"}{$a_TemplateData['searchData']['paymentDate']}{/if}' data-validation-optional="true" autocomplete="off" placeholder="Date of payment made"/>
                                </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="notes" >Notes</label>
                                    <textarea name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['searchData']['notes'])}{$a_TemplateData['searchData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-primary" type="submit" name="search_payment" value="Search"/>&nbsp;&nbsp;&nbsp;
                                    <div class="btn btn-default resetForm">Clear</div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <form method="post" class="form-inline bulkForm" action="{actionurl page=$actionPage}">
                            <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                       <h2><i class="glyphicon glyphicon-th-large"></i> Payments</h2>
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
                        {*<div class="actions" style="border:0px solid red;width: 220px; float: right;">
                            Export As:
                            <select name="exportAction" class="form-control">
                                <option value="1">Excel</option>
                                <option value="2">CSV</option>
                                <option value="3">PDF</option>
                            </select>
                            <input class="btn btn-default btn-bulk btn-small" type="submit" name="export_action" value="Export"/>
                        </div>*}
                        <div class="breadcrumb">
                            <div id="bulk-action" class="actions" style="border:0px solid red;width: 220px;">
                                Bulk Action:
                                <select name="bulkAction" class="form-control" data-validation="number" data-validation-error-msg="Please select an action">
                                    <option value="">Choose...</option>
                                    <option value="{$a_TemplateData['DELETE']}">Delete</option>
                                </select>
                                <input class="btn btn-default btn-bulk btn-small" type="submit" name="do_do_bulkAction" value="Go"/>
                            </div>
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
                                    {if $a_TemplateData['allPayments']}
                                        {foreach $a_TemplateData['allPayments'] as $index=>$details}    
                                            <tr class="{if $index % 2 == 0}odd{else}even{/if}">
                                               <td>
                                                   <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                               </td>
                                               <td>{$index + 1}</td>
                                               <td>{$details->employeeName}</td>
                                               <td>{$details->amount}</td>
                                               <td>
                                                   {if $details->salaryMonth && $details->salaryMonth != "0000-00"}
                                                   {$details->salaryMonthF}
                                                   {/if}
                                               </td>
                                               <td>
                                                    {if (int)$details->isItSalary === 1}
                                                       Salary
                                                    {else}
                                                        {$details->paymentType}
                                                    {/if}
                                               </td>
                                               <td>{$details->paymentMethod}</td>
                                               <td>{$details->paymentTerm}</td>
                                               <td>{$details->totalHours}</td>
                                               <td>
                                                   {if $details->salaryDateStartF && $details->salaryDateStartF != "0000-00-00"}
                                                       {$details->salaryDateStartF}
                                                    {/if}
                                               </td>
                                               <td>
                                                   {if $details->salaryDateEndF && $details->salaryDateEndF != "0000-00-00"}
                                                    {$details->salaryDateEndF}
                                                   {/if}
                                                </td>
                                               <td>{$details->receiptNo}</td>
                                               <td>{$details->paymentDateF}</td>
                                               <td>{$details->notes}</td>
                                               <td>
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
                                        {/if}
                                    </tbody>
                                </table>
                                {if isset($a_TemplateData['allPayments']) && $a_TemplateData['allPayments']}
                                <div id="loadMore" class="breadcrumb">
                                    Load More&nbsp;<i class="glyphicon glyphicon-download-alt"></i>
                                </div>
                                <div class="breadcrumb loading">Loading...</div>
                                {/if}
                         </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
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
            
            options.defaultDate = '-1m';
            dateSelector(".datePickerSalary",options);
             
            options.dateFormat = "yy-mm";
            options.onClose=function(dateText, inst) {
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).val($.datepicker.formatDate(options.dateFormat, new Date(year, month, 1)));
            }
            dateSelector(".datePickerMonth",options);
            
            $(".datePickerMonth").focus(function () {
                $(".ui-datepicker-calendar").hide();
                $("#ui-datepicker-div").position({
                    my: "center top",
                    at: "center bottom",
                    of: $(this)
                });
            });
            
            selectAllData(".selectAll", "selectedData");
            resetFromData(".searchForm");

           var tableOptions = {};
            {/literal}
            {if isset($a_TemplateData['allPayments']) && $a_TemplateData['allPayments']}
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
                
                
            $("#isItSalary").click(function(){
               var isChecked =  $(this).is(":checked");
               if (isChecked === true){
                   $("#paymentTermIdDiv, #salaryDetailsDiv").css("display", "block");
                   $("#paymentTermId, #totalHours, #salaryDateStart, #salaryDateEnd").removeAttr("data-validation-optional");
                   
                   if (parseInt($("#paymentTermId").val()) === 4){
                       $('#salaryMonthDiv').css("display","block")
                       $('#salaryMonth').removeAttr("data-validation-optional");
                   }
                   
                   $("#paymentTypeIdDiv").css("display", "none");
                   $("#paymentTypeId").attr("data-validation-optional","true");
               }
               else{
                   $("#paymentTermIdDiv, #salaryDetailsDiv").css("display", "none");
                   $("#salaryMonth, #paymentTermId, #totalHours, #salaryDateStart, #salaryDateEnd").attr("data-validation-optional","true");
                   $("#paymentTypeIdDiv").css("display", "block");
                   $("#paymentTypeId").removeAttr("data-validation-optional");
               }
            });
            
            $("#paymentTermId").change(function(){
                var termId = parseInt($(this).val().trim());

                if(termId === 1){
                    $("#totalHoursDiv").css("display", "block");
                    $("#totalHours").removeAttr("data-validation-optional");
                    $("#salaryMonthDiv, #salaryDateEndDiv").css("display", "none");
                    $("#salaryMonth, #salaryDateEnd").attr("data-validation-optional","true");
                }
                else if(termId === 4){
                    $("#salaryMonthDiv, #salaryDateEndDiv").css("display", "block");
                    $("#salaryMonth, #salaryDateEnd").removeAttr("data-validation-optional");
                    $("#totalHoursDiv").css("display", "none");
                    $("#totalHours").attr("data-validation-optional","true");
                }
                else{
                    $("#totalHoursDiv, #salaryMonthDiv").css("display", "none");
                    $("#totalHours,#salaryMonth").attr("data-validation-optional","true");
                    $("#salaryDateEndDiv").css("display", "block");
                    $("#salaryDateEnd").removeAttr("data-validation-optional");
                }
            });
        }
    </script>
    {/literal}
{/block}


