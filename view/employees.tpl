{extends file="parent.tpl"}
{block  name="title" prepend}Employees{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
    {if isset($a_TemplateData['employeeData']['id']) && $a_TemplateData['employeeData']['id'] > 0}
        {assign var=employeeId value=$a_TemplateData['employeeData']['id']}
    {else}
        {assign var=employeeId value=0}
    {/if}
    <form action="{actionurl page=$actionPage params=["id"=>$employeeId]}" method="post" class="form-inline addForm" enctype="multipart/form-data">
        <!-- Add new form -->
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i> {if $employeeId > 0}Update{else}Add New{/if}</h2>

                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
                    {if isset($a_TemplateData['employeeData']['showForm'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
{*                        {$smarty.server.REQUEST_URI}*}
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                            <div>
                                <div class="col-xs-12">
                                    <h3>Personal Details</h3>
                                </div>
                                <div class="col-xs-12">
                                {if $a_TemplateData['allBranches']}
                                <div class="form-group col-xs-4">
                                    {if isset($a_TemplateData['employeeData']['branchId'])}
                                        {assign var="branchId" value=$a_TemplateData['employeeData']['branchId']}
                                    {else}
                                        {assign var="branchId" value=""}
                                    {/if}
                                    <label for="branchId" class="control-label">Branches</label>
                                    <select id="branchId" name="branchId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid branch" data-placeholder="Choose a branch...">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['allBranches'] as $details}
                                            <option value="{$details->id}" {if $branchId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                {/if}
                                <div class="form-group col-xs-4">
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" data-validation="alphanumeric server" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-url="{actionurl page=$ajaxFilePath params=["do"=>$a_TemplateData['VALIDATE'], "id"=>$employeeId]}" data-validation-error-msg="Alphanumeric values only" placeholder="Employee name" value="{if isset($a_TemplateData['employeeData']['name'])}{$a_TemplateData['employeeData']['name']}{/if}">
                                </div>

                                <div class="form-group col-xs-4">
                                    <label for="address" class="control-label">Address</label>
                                    <textarea id="address" name="address" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['employeeData']['address'])}{$a_TemplateData['employeeData']['address']}{/if}</textarea>
                                </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="email" class="control-label">
                                        Email
                                    </label>
                                    <input type="text" id="email" name="email" class="form-control" data-validation="email server" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-url="{actionurl page=$ajaxFilePath params=["do"=>$a_TemplateData['VALIDATE'], "id"=>$employeeId]}" data-validation-optional="true" data-validation-error-msg="Invalid Email" value='{if isset($a_TemplateData['employeeData']['email'])}{$a_TemplateData['employeeData']['email']}{/if}' placeholder="Email" autocomplete="off"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="phone" class="control-label">
                                        Phone
                                    </label>
                                    <input type="text" id="phone" name="phone" class="form-control" data-validation="number length" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-length="min10" data-validation-error-msg="Invaid number" value='{if isset($a_TemplateData['employeeData']['phone'])}{$a_TemplateData['employeeData']['phone']}{/if}' placeholder="Phone" autocomplete="off"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="alternatePhone" class="control-label">
                                        Alternate Phone
                                    </label>
                                    <input type="text" id="alternatePhone" name="alternatePhone" class="form-control" data-validation="number length" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-length="min10" data-validation-error-msg="Invaid number"  value='{if isset($a_TemplateData['employeeData']['alternatePhone'])}{$a_TemplateData['employeeData']['alternatePhone']}{/if}' placeholder="Alternate Phone" autocomplete="off"/>
                                </div>
                                </div>
                            <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="fatherName" class="control-label">Father Name</label>
                                    <input type="text" id="fatherName" name="fatherName" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric values only" placeholder="Father's Name" value="{if isset($a_TemplateData['employeeData']['fatherName'])}{$a_TemplateData['employeeData']['fatherName']}{/if}">
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="motherName" class="control-label">Mother Name</label>
                                    <input type="text" id="motherName" name="motherName" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric values only" placeholder="Mother's Name" value="{if isset($a_TemplateData['employeeData']['motherName'])}{$a_TemplateData['employeeData']['motherName']}{/if}">
                                </div>
                                <div class="form-group col-xs-4">
                                    {if isset($a_TemplateData['employeeData']['gender'])}
                                        {assign var="gender" value=$a_TemplateData['employeeData']['gender']}
                                    {else}
                                        {assign var="gender" value=""}
                                    {/if}
                                    <label for="gender" class="control-label">Gender</label>
                                <select id="gender" name="gender" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid gender" data-placeholder="Choose a gender...">
                                    <option></option>
                                    <option value="{$a_TemplateData['MALE']}" {if $gender == $a_TemplateData['MALE']}selected='selected'{/if}>
                                        Male
                                    </option>
                                    <option value="{$a_TemplateData['FEMALE']}" {if $gender == $a_TemplateData['FEMALE']}selected='selected'{/if}>
                                        Female
                                    </option>
                                </select>
                                </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    {if isset($a_TemplateData['employeeData']['maritalStatus'])}
                                        {assign var="maritalStatus" value=$a_TemplateData['employeeData']['maritalStatus']}
                                    {else}
                                        {assign var="maritalStatus" value=""}
                                    {/if}
                                    <label for="maritalStatus" class="control-label">Marital Status</label>
                                <select id="maritalStatus" name="maritalStatus" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid marital status" data-placeholder="Choose a marital status...">
                                    <option></option>
                                    <option value="{$a_TemplateData['MARRIED']}" {if $maritalStatus == $a_TemplateData['MARRIED']}selected='selected'{/if}>
                                        Married
                                    </option>
                                    <option value="{$a_TemplateData['UNMARRIED']}" {if $maritalStatus == $a_TemplateData['UNMARRIED']}selected='selected'{/if}>
                                        Unmarried
                                    </option>
                                </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['employeeData']['notes'])}{$a_TemplateData['employeeData']['notes']}{/if}</textarea>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="photoLink" class="control-label">Upload Photo</label>
                                    <input type="file" name="photoLink" class="form-control" data-validation="mime size" data-validation-allowing="jpg, png, gif"  data-validation-max-size="2M" style="padding:0;">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                        {if isset ($a_TemplateData['employeeData']['status'])}
                                            {assign var="status" value=$a_TemplateData['employeeData']['status']}
                                        {else}
                                            {assign var="status" value=1}
                                        {/if}
                                        <label for="status" class="control-label">Status</label>
                                        <select id="status" name="status" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid status" data-placeholder="Choose a status...">
                                            <option value=""></option>
                                            {foreach $a_TemplateData["dataStatus"] as $id=>$name}
                                                {if $id !== 1 && $id !== 2}
                                                    {continue}
                                                {/if}
                                            <option value="{$id}" {if $status == $id}selected='selected'{/if}>
                                                {$name}
                                            </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <h3>Employment Details</h3>
                                </div>
                                <div class="col-xs-12">        
                                    <div class="form-group col-xs-4">
                                        <label for="salaryAmount" class="control-label">Salary Amount</label>
                                        <div class="input-group" style="width:98.5% !important;">
                                            <div class="input-group-addon">Rs.</div>
                                        <input type="text" id="	salaryAmount" name="salaryAmount" data-validation-optional="true" class="form-control" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Invalid Amount" value='{if isset($a_TemplateData['employeeData']['salaryAmount'])}{$a_TemplateData['employeeData']['salaryAmount']}{/if}' />
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        {if isset($a_TemplateData['employeeData']['paymentTermId'])}
                                            {assign var="paymentTermId" value=$a_TemplateData['employeeData']['paymentTermId']}
                                        {else}
                                            {assign var="paymentTermId" value=""}
                                        {/if}
                                        <label for="paymentTermId" class="control-label">
                                            Payment Terms
                                            <a data-original-title="Pay by Hour/ Day/ Week/ Month" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select id="paymentTermId" name="paymentTermId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid term" data-placeholder="Choose a term..." data-validation-optional="true" >
                                            <option value=""></option>
                                            {foreach $a_TemplateData['allpaymentTerms'] as $details}
                                                <option value="{$details->id}" {if $paymentTermId == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        {if isset($a_TemplateData['employeeData']['departmentId'])}
                                            {assign var="departmentId" value=$a_TemplateData['employeeData']['departmentId']}
                                        {else}
                                            {assign var="departmentId" value=""}
                                        {/if}
                                        <label for="departmentId" class="control-label">
                                            Department
                                            <a data-original-title="Eg: Accounts/ IT/ Reception" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select id="departmentId" name="departmentId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid department" data-placeholder="Choose a department..." data-validation-optional="true" >
                                            <option value=""></option>
                                            {foreach $a_TemplateData['allDepartment'] as $details}
                                                <option value="{$details->id}" {if $departmentId == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                        {if isset($a_TemplateData['employeeData']['designationId'])}
                                            {assign var="designationId" value=$a_TemplateData['employeeData']['designationId']}
                                        {else}
                                            {assign var="designationId" value=""}
                                        {/if}
                                        <label for="designationId" class="control-label" data-validation-optional="true" >
                                            Designation
                                            <a data-original-title="Eg: Accountant/ Designer/ Plumber" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select id="designationId" name="designationId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid designation" data-placeholder="Choose a designation..." data-validation-optional="true" >
                                            <option value=""></option>
                                            {foreach $a_TemplateData['allDesignation'] as $details}
                                                <option value="{$details->id}" {if $designationId == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        {if isset($a_TemplateData['employeeData']['employmentTypeId'])}
                                            {assign var="employmentTypeId" value=$a_TemplateData['employeeData']['employmentTypeId']}
                                        {else}
                                            {assign var="employmentTypeId" value=""}
                                        {/if}
                                        <label for="employmentTypeId" class="control-label" data-validation-optional="true" >
                                            Employment Type
                                            <a data-original-title="Eg: Accountant/ Designer/ Plumber" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select id="employmentTypeId" name="employmentTypeId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid designation" data-placeholder="Choose a designation..." data-validation-optional="true" >
                                            <option value=""></option>
                                            {foreach $a_TemplateData['allEmploymentTypes'] as $details}
                                                <option value="{$details->id}" {if $employmentTypeId == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4">
                                        {if isset($a_TemplateData['employeeData']['qualificationIds'])}
                                            {assign var="qualificationIds" value=$a_TemplateData['employeeData']['qualificationIds']}
                                        {else}
                                            {assign var="qualificationIds" value=""}
                                        {/if}
                                        <label for="qualificationIds" class="control-label" data-validation-optional="true" >
                                            Educational Qualification(s)
                                            <a data-original-title="Eg: Accountant/ Designer/ Plumber" data-toggle="tooltip" title="">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </label>
                                        <select id="qualificationIds" name="qualificationIds[]" class="form-control chosen-select" data-validation="required" data-validation-error-msg="Invalid qualification(s)" data-placeholder="Choose qualification(s)..." data-validation-optional="true" multiple="multiple" style="height:500px;">
                                            <option value="0"></option>
                                            {foreach $a_TemplateData['allEducationCourse'] as $details}
                                                {foreach $qualificationIds as $qId}
                                                    <option value="{$details->id}" {if $qId == $details->id}selected='selected'{/if}>
                                                        {$details->name}
                                                    </option>
                                                {/foreach}
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="joinDate" class="control-label">Join Date</label>
                                    <input type="text" id="joinDate" name="joinDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invalid date" data-validation-optional="true" value='{if isset($a_TemplateData['employeeData']['joinDate']) && $a_TemplateData['employeeData']['joinDate'] != "0000-00-00"}{$a_TemplateData['employeeData']['joinDate']}{/if}' autocomplete="off"/>
                                </div>
                                    <div class="form-group col-xs-4">
                                    <label for="releaveDate" class="control-label">Releave Date</label>
                                    <input type="text" id="releaveDate" name="releaveDate" class="form-control datePicker" data-validation="date" data-validation-format="yyyy-mm-dd" data-validation-error-msg="Invaid date" data-validation-optional="true" {if $employeeId <= 0}disabled="disabled"{/if} value='{if isset($a_TemplateData['employeeData']['releaveDate']) && $a_TemplateData['employeeData']['releaveDate'] != "0000-00-00"}{$a_TemplateData['employeeData']['releaveDate']}{/if}' autocomplete="off"/>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn"  type="submit" name="add_employee" id="addEmployee" value="{if $employeeId > 0}Update{else}Add{/if}"/>
                                    <input type="hidden" name="addEmployee" value="Add"/>
                                    <div class="btn btn-default btn resetForm">
                                        Clear
                                    </div>
                                </div>
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
                    {if isset($a_TemplateData['searchData']['search_employee'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                        
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12 formContainer">
                                <div class="col-xs-12">
                                {if $a_TemplateData['allBranches']}
                                <div class="form-group col-xs-4">
                                    {if isset($a_TemplateData['searchData']['branchId'])}
                                        {assign var="branchId" value=$a_TemplateData['searchData']['branchId']}
                                    {else}
                                        {assign var="branchId" value=""}
                                    {/if}
                                    <label for="branchId" class="control-label">Branches</label>
                                    <select name="branchId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid branch" data-placeholder="Choose a branch..." data-validation-optional="true">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['allBranches'] as $details}
                                            <option value="{$details->id}" {if $branchId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                {/if}
                                <div class="form-group col-xs-4">
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" name="name" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-optional="true" data-validation-error-msg="Alphanumeric values only" placeholder="Employee name" value="{if isset($a_TemplateData['searchData']['name'])}{$a_TemplateData['searchData']['name']}{/if}">
                                </div>

                                <div class="form-group col-xs-4">
                                    <label for="address" class="control-label">Address</label>
                                    <textarea name="address" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['searchData']['address'])}{$a_TemplateData['searchData']['address']}{/if}</textarea>
                                </div>
                                </div>
                                
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="email" class="control-label">
                                        Email
                                    </label>
                                    <input type="text"  name="email" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-optional="true" data-validation-error-msg="Invalid Email" value='{if isset($a_TemplateData['searchData']['email'])}{$a_TemplateData['searchData']['email']}{/if}' placeholder="Email" autocomplete="off"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="phone" class="control-label">
                                        Phone
                                    </label>
                                    <input type="text" name="phone" class="form-control" data-validation="number" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-length="min10" data-validation-optional="true" data-validation-error-msg="Invaid number" value='{if isset($a_TemplateData['searchData']['phone'])}{$a_TemplateData['searchData']['phone']}{/if}' placeholder="Phone" autocomplete="off"/>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="alternatePhone" class="control-label">
                                        Alternate Phone
                                    </label>
                                    <input type="text" name="alternatePhone" class="form-control" data-validation="number" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-optional="true" data-validation-length="min10" data-validation-error-msg="Invaid number"  value='{if isset($a_TemplateData['searchData']['alternatePhone'])}{$a_TemplateData['searchData']['alternatePhone']}{/if}' placeholder="Alternate Phone" autocomplete="off"/>
                                </div>
                                </div>
                            <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="fatherName" class="control-label">Father Name</label>
                                    <input type="text" name="fatherName" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-optional="true" data-validation-error-msg="Alphanumeric values only" placeholder="Father's Name" value="{if isset($a_TemplateData['searchData']['fatherName'])}{$a_TemplateData['searchData']['fatherName']}{/if}">
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="motherName" class="control-label">Mother Name</label>
                                    <input type="text"  name="motherName" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-optional="true" data-validation-error-msg="Alphanumeric values only" placeholder="Mother's Name" value="{if isset($a_TemplateData['searchData']['motherName'])}{$a_TemplateData['searchData']['motherName']}{/if}">
                                </div>
                                <div class="form-group col-xs-4">
                                    {if isset($a_TemplateData['searchData']['gender'])}
                                        {assign var="gender" value=$a_TemplateData['searchData']['gender']}
                                    {else}
                                        {assign var="gender" value=""}
                                    {/if}
                                    <label for="gender" class="control-label">Gender</label>
                                <select name="gender" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid gender" data-placeholder="Choose a gender..." data-validation-optional="true">
                                    <option value=""></option>
                                    <option value="{$a_TemplateData['MALE']}" {if $gender == $a_TemplateData['MALE']}selected='selected'{/if}>
                                        Male
                                    </option>
                                    <option value="{$a_TemplateData['FEMALE']}" {if $gender == $a_TemplateData['FEMALE']}selected='selected'{/if}>
                                        Female
                                    </option>
                                </select>
                                </div>
                                        </div>
                                    <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                        {if isset ($a_TemplateData['searchData']['status'])}
                                            {assign var="status" value=$a_TemplateData['searchData']['status']}
                                        {else}
                                            {assign var="status" value=""}
                                        {/if}
                                        <label for="status" class="control-label">Status</label>
                                        <select id="status" name="status" class="form-control chosen-select" data-validation="required number" data-validation-error-msg="Invalid status" data-validation-optional="true" data-placeholder="Choose a status...">
                                            <option value=""></option>
                                            {foreach $a_TemplateData["dataStatus"] as $id=>$name}
                                                {if $id !== 1 && $id !== 2}
                                                    {continue}
                                                {/if}
                                            <option value="{$id}" {if $status == $id}selected='selected'{/if}>
                                                {$name}
                                            </option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    
                                <div class="form-group col-xs-4">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['searchData']['notes'])}{$a_TemplateData['searchData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="search_employee" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <h2><i class="glyphicon glyphicon-th-large"></i> Employees</h2>
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
                                <input class="btn btn-default btn-bulk btn-small" type="submit" name="do_bulk_action" value="Go"/>
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
                                {if $a_TemplateData['allEmployees']}
                                    {foreach $a_TemplateData['allEmployees'] as $index=>$details}    
                                        <tr class="{if $index % 2 == 0}odd{else}even{/if}">
                                           <td>
                                               <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                           </td>
                                           <td>{$index + 1}</td>
                                           <td>{$details->branchName}</td>
                                           <td>{$details->name}</td>
                                           <td>{$details->address}</td>
                                           <td>{$details->email}</td>
                                           <td>{$details->phone}</td>
                                           <td>{$details->alternatePhone}</td>
                                           <td>{$details->fatherName}</td>
                                           <td>{$details->motherName}</td>
                                           <td>
                                               {if $details->gender == $a_TemplateData['MALE']}
                                                   Male
                                               {else if $details->gender == $a_TemplateData['FEMALE']}
                                                   Female
                                               {else}
                                                   Unknown
                                               {/if}
                                           </td>
                                           <td>
                                               {if $details->maritalStatus == $a_TemplateData['MARRIED']}
                                                   Married
                                                {else if $details->maritalStatus == $a_TemplateData['UNMARRIED']}
                                                   Unmarried
                                               {else}
                                                   Unknown
                                               {/if}
                                           </td>
                                           <td>
                                               {if $details->status == $a_TemplateData['ACTIVE']}
                                                   <span class="label-default label label-success">
                                                       {$a_TemplateData["dataStatus"][$details->status]}
                                                   </span>
                                               {else if $details->status == $a_TemplateData['INACTIVE']}
                                                   <span class="label-default label">
                                                    {$a_TemplateData["dataStatus"][$details->status]}
                                                   </span>
                                               {else}
                                                   <span class="label-default label label-danger">
                                                    {$a_TemplateData["dataStatus"][0]}
                                                   </span>
                                               {/if}
                                           </td>
                                           <td>{$details->notes}</td>
                                           <td>{$details->addedDate}</td>
                                           <td>
                                               <a class="btn btn-success btn-small" data-toggle="tooltip" data-original-title="View All Employee Details." href="{actionurl page='employeedetails' params=['employeeId'=>$details->id]}" target="_blank">
                                                   <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                   View
                                               </a>
                                               <a class="btn btn-info btn-small" data-toggle="tooltip" data-original-title="Edit employee." href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>$a_TemplateData['EDIT']]}">
                                                   <i class="glyphicon glyphicon-edit icon-white"></i>
                                                   Edit
                                               </a>
                                               <a class="btn btn-danger btn-small delete" data-toggle="tooltip" data-original-title="Delete employee." href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>$a_TemplateData['DELETE']]}">
                                                   <i class="glyphicon glyphicon-trash icon-white"></i>
                                                   Delete
                                               </a>
                                           </td>
                                         </tr>
                                      {/foreach}
                                    {/if}
                                </tbody>
                            </table>
                        {if $a_TemplateData['allEmployees']}
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
            {if isset($a_TemplateData['allEmployees']) && $a_TemplateData['allEmployees']}
            {literal}
                tableOptions.columns = [
                                {className: "columTextCenter", orderable: false, visible: true},
                                {/literal}
                                {foreach $a_TemplateData['thead'] as $index=>$head}
                                    {literal}{className: "{/literal}{$head.class}{literal}", orderable: {/literal}{$head.orderable}{literal}, visible: {/literal}{$head.visible}{literal}},{/literal}
                                {/foreach}
                                {literal}
                                ]; // Actions
                {/literal}
                {/if}
                {literal}

                tableOptions.order = [[1, 'asc']];

                loadDataTable('#tableData', '{/literal}{actionurl page=$ajaxFilePath}{literal}', {/literal}{$a_TemplateData['DATA_PER_PAGE']}{literal}, tableOptions);
               jQuery("#branchId").change(function(){
                    var branchId = $(this).val();

                    if (branchId > 1){
                        $("#joinDate").removeAttr("disabled");
                    }else{
                        $("#joinDate").val("");
                        $("#joinDate").attr("disabled", "disabled");
                    }

                    if ((branchId == 3 || branchId == 5)){
                        $("#releaveDate").removeAttr("disabled");
                    }else{
                        $("#releaveDate").val("");
                        $("#releaveDate").attr("disabled", "disabled");
                    }
                });
            
           /* $("#addEmployee").click(function(){
                alert(typeof $("#gender").val());
            });*/
            }
    </script>
    {/literal}
{/block}


