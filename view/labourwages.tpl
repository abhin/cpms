{extends file="parent.tpl"}
{block  name="title" prepend}Labour Wages{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
    {$paidStatus = $a_TemplateData['searchData']['paidStatus']}
    {$tableLabourDate = $a_TemplateData['searchData']['tableLabourDate']}
    {$tableToDate = $a_TemplateData['searchData']['tableToDate']}
    {if isset($a_TemplateData['allLabourWages']['totalWages'])}
        {$totalWages = $a_TemplateData['allLabourWages']['totalWages']}
    {else}
        {$totalWages = 0}
    {/if}
    <form method="post" action="{actionurl page=$actionPage}" id="selectProject">
        <div class="row">
            <div class="breadcrumb">
                {if isset($a_TemplateData['labourWageData']['projectId'])}
                    {assign var="projectId" value=$a_TemplateData['labourWageData']['projectId']}
                {else}
                    {assign var="projectId" value="0"}
                {/if}
                <select id="projectId" name="{'projectId'|md5}" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Please select a valid projectTeam"  data-placeholder="Choose a project..." class="chosen-select" style="width: 390px; display: none;" tabindex="-1">
                    <option value="0"></option>
                    {foreach $a_TemplateData['projects'] as $details}
                        <option value="{$details->id}" {if $projectId == $details->id}selected='selected'{/if}>
                            {$details->name}
                        </option>
                    {/foreach}
                </select>
            </div>
        </div>
        </form>
        {if $projectId > 0}
        <!-- Add new form -->
        <form action="{actionurl page=$actionPage params=['projectId'=>$projectId]}" method="post" class="form-inline addForm"  style="text-align: center;">
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <input type="hidden" name="{'projectId'|md5}" value="{$projectId}"/>
                    {if isset($a_TemplateData['labourWageData']['id']) && $a_TemplateData['labourWageData']['id'] > 0}
                        {$labourWageId = $a_TemplateData['labourWageData']['id']}
                    {else}
                        {$labourWageId = 0}
                    {/if}
                    <div class="box-header well" onclick="return false;">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;{if isset($a_TemplateData['labourWageData']['id']) && $a_TemplateData['labourWageData']['id'] > 0}Edit{else}Add New{/if}</h2>
                        
                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
                    {if isset($a_TemplateData['labourWageData']['showForm'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                                {if isset($a_TemplateData['labourWageData']['id']) &&  $a_TemplateData['labourWageData']['id'] > 0}
                                    {assign var=labourWageId value={$a_TemplateData['labourWageData']['id']}}
                                    <input type="hidden" name="id" value="{$labourWageId}"/>
                                {else}
                                    {assign var=labourWageId value=0}
                                {/if}
                                <div class="col-xs-12">  
                                    <div class="form-group col-xs-4">
                                        {if isset($a_TemplateData['labourWageData']['supervisorId'])}
                                            {assign var="supervisorId" value=$a_TemplateData['labourWageData']['supervisorId']}
                                        {else}
                                            {assign var="supervisorId" value=""}
                                        {/if}
                                        <label for="supervisorId" class="control-label">
                                            Supervisor
                                        </label>
                                        <select id="supervisorId" name="supervisorId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid supervisor" data-placeholder="Choose a supervisor...">
                                            <option value=""></option>
                                            {foreach $a_TemplateData['allEmployees'] as $details}
                                                <option value="{$details->id}" {if $supervisorId == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        {if isset($a_TemplateData['labourWageData']['labourTypeId'])}
                                            {assign var="labourTypeId" value=$a_TemplateData['labourWageData']['labourTypeId']}
                                        {else}
                                            {assign var="labourTypeId" value=""}
                                        {/if}
                                        <label for="labourTypeId" class="control-label">
                                            Labour Type
                                            <a data-original-title="Eg: Mason/ Plumber/ Electrician" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select id="labourTypeId" name="labourTypeId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid type" data-placeholder="Choose a labour type...">
                                            <option value=""></option>
                                            {foreach $a_TemplateData['allLabourType'] as $details}
                                                <option value="{$details->id}" {if $labourTypeId == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        <label for="name">
                                            Labour's Name
                                            <a data-toggle="tooltip" title="Name of the labour">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <input type="text" id="name" name="name" class="form-control" data-validation="required" value='{if isset($a_TemplateData['labourWageData']['name'])}{$a_TemplateData['labourWageData']['name']}{/if}' autocomplete="off" placeholder="Name of the labour"/>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    {if isset($a_TemplateData['labourWageData']['totalHours'])}
                                        {assign var="totalHours" value=$a_TemplateData['labourWageData']['totalHours']}
                                    {else}
                                        {assign var="totalHours" value=8}
                                    {/if}
                                    <label for="totalHours" class="control-label">Total Hours</label>
                                    <select id="totalHours" name="totalHours" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid hour" data-placeholder="Choose hour...">
                                        <option></option>
                                        {section name=hour start=1 loop=24 step=1}

                                            <option value="{$smarty.section.hour.index}" {if $totalHours == $smarty.section.hour.index}selected='selected'{/if}>
                                                {$smarty.section.hour.index}
                                            </option>
                                        {/section}
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="amount" class="control-label">Amount</label>
                                    <div class="input-group" style="width:98.5% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                    <input type="text" id="amount" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" value='{if isset($a_TemplateData['labourWageData']['amount'])}{$a_TemplateData['labourWageData']['amount']}{/if}' />
                                    </div>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="labourDate" class="control-label">
                                        Labour Date
                                        <a data-toggle="tooltip" title="Date of labour">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="labourDate" name="labourDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" value='{if isset($a_TemplateData['labourWageData']['labourDate']) && $a_TemplateData['labourWageData']['labourDate'] != "0000-00-00"}{$a_TemplateData['labourWageData']['labourDate']}{/if}' autocomplete="off" placeholder="Date of labour"/>
                                </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="notes" >Notes</label>
                                    <textarea id="notes" name="notes" class="form-control"> {if isset($a_TemplateData['labourWageData']['notes'])}{$a_TemplateData['labourWageData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-primary" id='addLabourWage'  type="submit" name="add_labourWage" value="{if isset($a_TemplateData['labourWageData']['id']) && $a_TemplateData['labourWageData']['id'] > 0}Save{else}Add{/if}"/>&nbsp;&nbsp;&nbsp;
                                    <input type="hidden" name="addLabourWage" value="Add"/>
                                    <a class="btn btn-default resetFormData" type="reset" href="{actionurl page=$actionPage}">Clear</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <form action="{actionurl page=$actionPage params=['projectId'=>$projectId]}" method="post" class="form-inline searchForm"  style="text-align: center;">
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
                    {if isset($a_TemplateData['searchData']['search_labourWage'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                    <input type="hidden" name="{'projectId'|md5}" value="{$projectId}"/>
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-7 col-md-12 formContainer">
                            {if isset($a_TemplateData['searchData']['id']) &&  $a_TemplateData['searchData']['id'] > 0}
                               {assign var=labourWageId value={$a_TemplateData['searchData']['id']}}
                               <input type="hidden" name="id" value="{$labourWageId}"/>
                           {else}
                               {assign var=labourWageId value=0}
                           {/if}
                           <div class="col-xs-12">  
                               <div class="form-group col-xs-4">
                                   {if isset($a_TemplateData['searchData']['supervisorId'])}
                                       {assign var="supervisorId" value=$a_TemplateData['searchData']['supervisorId']}
                                   {else}
                                       {assign var="supervisorId" value=""}
                                   {/if}
                                   <label for="supervisorId" class="control-label">
                                       Supervisor
                                   </label>
                                   <select id="supervisorId" name="supervisorId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid supervisor" data-validation-optional="true" data-placeholder="Choose a supervisor...">
                                       <option value=""></option>
                                       {foreach $a_TemplateData['allEmployees'] as $details}
                                           <option value="{$details->id}" {if $supervisorId == $details->id}selected='selected'{/if}>
                                               {$details->name}
                                           </option>
                                       {/foreach}
                                   </select>
                               </div>
                               <div class="form-group col-xs-4">
                                   {if isset($a_TemplateData['searchData']['labourTypeId'])}
                                       {assign var="labourTypeId" value=$a_TemplateData['searchData']['labourTypeId']}
                                   {else}
                                       {assign var="labourTypeId" value=""}
                                   {/if}
                                   <label for="labourTypeId" class="control-label">
                                       Labour Type
                                       <a data-original-title="Eg: Mason/ Plumber/ Electrician" data-toggle="tooltip" title="">
                                           <i class="glyphicon glyphicon-question-sign"></i>
                                       </a>
                                   </label>
                                   <select id="labourTypeId" name="labourTypeId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid type" data-validation-optional="true" data-placeholder="Choose a labour type...">
                                       <option value=""></option>
                                       {foreach $a_TemplateData['allLabourType'] as $details}
                                           <option value="{$details->id}" {if $labourTypeId == $details->id}selected='selected'{/if}>
                                               {$details->name}
                                           </option>
                                       {/foreach}
                                   </select>
                               </div>
                               <div class="form-group col-xs-4">
                                   <label for="name">
                                       Labour's Name
                                       <a data-toggle="tooltip" title="Name of the labour">
                                           <i class="glyphicon glyphicon-question-sign"></i>
                                       </a>
                                   </label>
                                   <input type="text" id="name" name="name" class="form-control" value='{if isset($a_TemplateData['searchData']['name'])}{$a_TemplateData['searchData']['name']}{/if}' autocomplete="off" placeholder="Name of the labour"/>
                               </div>
                           </div>
                           <div class="col-xs-12">
                           <div class="form-group col-xs-4">
                               {if isset($a_TemplateData['searchData']['totalHours'])}
                                   {assign var="totalHours" value=$a_TemplateData['searchData']['totalHours']}
                               {else}
                                   {assign var="totalHours" value=0}
                               {/if}
                               <label for="totalHours" class="control-label">Total Hours</label>
                               <select id="totalHours" name="totalHours" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid hour" data-validation-optional="true" data-placeholder="Choose hour...">
                                   <option></option>
                                   {section name=hour start=1 loop=24 step=1}

                                       <option value="{$smarty.section.hour.index}" {if $totalHours == $smarty.section.hour.index}selected='selected'{/if}>
                                           {$smarty.section.hour.index}
                                       </option>
                                   {/section}
                               </select>
                           </div>
                           <div class="form-group col-xs-4">
                               <label for="amount" class="control-label">Amount</label>
                               <div class="input-group" style="width:98.5% !important;">
                                   <div class="input-group-addon">Rs.</div>
                               <input type="text" id="amount" name="amount" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid amount" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['amount'])}{$a_TemplateData['searchData']['amount']}{/if}' />
                               </div>
                           </div>
                           <div class="form-group col-xs-4">
                               <label for="labourDate" class="control-label">
                                   Labour Date
                                   <a data-toggle="tooltip" title="Date of labour">
                                       <i class="glyphicon glyphicon-question-sign"></i>
                                   </a>
                               </label>
                               <input type="text" name="labourDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" value='{if isset($a_TemplateData['searchData']['labourDate']) && $a_TemplateData['searchData']['labourDate'] != "0000-00-00"}{$a_TemplateData['searchData']['labourDate']}{/if}'  data-validation-optional="true" autocomplete="off" placeholder="Date of labour"/>
                           </div>
                           </div>
                           <div class="col-xs-12">
                           <div class="form-group col-xs-4">
                               <label for="notes" >Notes</label>
                               <textarea id="notes" name="notes" class="form-control"> {if isset($a_TemplateData['searchData']['notes'])}{$a_TemplateData['searchData']['notes']}{/if}</textarea>
                           </div>
                           <input type="hidden" name="paidStatus" value="{$paidStatus}"/>
                            {if !isset($a_TemplateData['searchData']['labourDate'])}
                                <input type="hidden" name="tableLabourDate" value="{$tableLabourDate}"/>
                                <input type="hidden" name="tableToDate" value="{$tableToDate}"/>
                            {/if}
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
        <form method="post" class="form-inline bulkForm" id="bulkForm" action="{actionurl page=$actionPage params=['projectId'=>$projectId]}">
                            <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                       <h2><i class="glyphicon glyphicon-th-large"></i> Labour Wages</h2>
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
                            <div class="breadcrumb col-lg-12">
                            {*<div class="actions" style="border:0px solid red;width: 220px; float: right;">
                                Export As:
                                <select name="exportAction" class="form-control">
                                    <option value="1">Excel</option>
                                    <option value="2">CSV</option>
                                    <option value="3">PDF</option>
                                </select>
                                <input class="btn btn-default btn-bulk btn-small" type="submit" name="export_action" value="Export"/>
                            </div>*}
                            <div class="col-lg-6">
                                <div id="bulk-action" class="actions">
                                    Bulk Action:
                                    <select name="bulkAction" id="bulkAction" class="form-control" data-validation="number" data-validation-error-msg="Please select an action">
                                        <option value="">Choose an action</option>
                                        <option value="{$a_TemplateData['DELETE']}">Delete</option>
                                        <option value="{$a_TemplateData['DO_PAY']}">Pay Wage(s)</option>
                                    </select>
                                    <input class="btn btn-default btn-bulk btn-small" type="submit" name="do_bulkAction" value="Go"/>
                                </div>
                            </div>
                            <div class="col-lg-6" style="text-align: right; ">
                                        Wage(s) Total: <i class="fa fa-inr"></i> <span id="totalAmount">{*$totalWages*}0</span>
                            </div>
                        </div>
                        <div  class="breadcrumb col-lg-12">
                            <div class="col-lg-8" style="text-align:left;">
                                Date from
                                <input type="text" name="tableLabourDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" data-validation-optional="true" value='{$tableLabourDate}' autocomplete="off" placeholder="wages start"/>
                               To <input type="text" name="tableToDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" value='{$tableToDate}' data-validation-optional="true" autocomplete="off" placeholder="wages end"/>
                               
                               <input class="btn btn-default btn-bulk btn-small" type="submit" name="do_payWages" id="do_payWages" value="Go"/>
                               <input class="btn btn-default btn-bulk btn-small" type="reset" id="resetTableFilter" value="Clear"/>
                            </div>
                            <div class="col-lg-4" style="text-align:right;">
                                All&nbsp;<input type="radio" name="paidStatus" value='0' {if $paidStatus === 0}checked="checked"{/if}/>&nbsp;
                                Paid&nbsp;<input type="radio" name="paidStatus" value='1' {if $paidStatus === 1}checked="checked"{/if}/>&nbsp;
                                Unpaid&nbsp;<input type="radio" name="paidStatus" value='2' {if $paidStatus === 2}checked="checked"{/if}/>
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
                                                {continue}
                                            {/if}
                                            <tr>
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
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                            </tr>
                                            {foreach $wageData as $index=>$details} 
                                                {if $labourDate != $details->labourDateF}
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
                                               <td>{$details->receiptNo}</td>
                                               <td>{$details->paymentDateF}</td>
                                               <td>
                                                   {if $details->paidStatus == $a_TemplateData['PAID']}
                                                        <span class="label-default label label-success">
                                                            Paid
                                                        </span>
                                                    {else if $details->paidStatus == $a_TemplateData['UNPAID']}
                                                        <span class="label-default label">
                                                            Unpaid
                                                        </span>
                                                    {else}
                                                        <span class="label-default label label-danger">
                                                         Unknown
                                                        </span>
                                                    {/if}
                                               </td>
                                               <td>{$details->notes}</td>
                                               <td>
                                                   <a class="btn btn-info btn-small" href="{actionurl page=$actionPage params=['projectId'=>$projectId, 'id'=>$details->id, 'do'=>$a_TemplateData['EDIT']]}">
                                                       <i class="glyphicon glyphicon-edit icon-white"></i>
                                                       Edit
                                                   </a>
                                                   <a class="btn btn-danger btn-small delete" href="{actionurl page=$actionPage params=['projectId'=>$projectId, 'id'=>$details->id, 'do'=>$a_TemplateData['DELETE']]}">
                                                       <i class="glyphicon glyphicon-trash icon-white"></i>
                                                       Delete
                                                   </a>
                                                   <a class="btn btn-success btn-small" href="{actionurl page="paylabourwages" params=['projectId'=>$projectId, 'wageId'=>$details->id, 'do'=>$a_TemplateData['SHOW_ADD_FORM']]}">
                                                       <i class="fa fa-inr"></i>
                                                       Pay Wage
                                                   </a>
                                               </td>
                                             </tr>
                                          {/foreach}
                                        {/foreach}
                                        {/if}
                                    </tbody>
                                </table>
                                {if isset($a_TemplateData['allLabourWages']) && $a_TemplateData['allLabourWages']}
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


                loadDataTable('#tableData', '{/literal}{actionurl page=$ajaxFilePath params=['projectId'=>$projectId]}{literal}', {/literal}{$a_TemplateData['DATA_PER_PAGE']}{literal}, tableOptions, bind);
                
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
            
            $("input[name^='do_bulkAction']").click(function(){
                var doPay = {/literal}{$a_TemplateData['DO_PAY']}{literal};
                var action = parseInt($("select[name='bulkAction']").val());
                if (action === doPay){
                    $("#bulkForm").attr("action", "{/literal}{actionurl page="paylabourwages" params=['projectId'=>$projectId]}{literal}");
                }
            });
            
            selectSpecificDateData();
            getRepeatedElement();
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
        
        function getRepeatedElement()
        {
            jQuery('input[name^="selectedData_"]').each(function( index ) {
                var eleId = $(this).val() ;
                //console.log( index + ": " + eleId );
                var element = $('[name="selectedData_' + eleId + '"');
                for (var i=1; i < element.length; i++){
                    //var par = $(element[i]).parent().parent().remove();
                    var par = $(element[i]).closest("tr").remove();
                    
                    //alert(par);
                }
                $(element[0]).closest("tr").css({"background-color":"#1794E1", "color":"#FFFFFF", "font-weight":"bold", "font-size":"14px"});
            });
        }
        
        function bind(){
            selectSpecificDateData();
            getRepeatedElement();
            getToalAmount(7);
        }
    </script>
    {/literal}
{/block}


