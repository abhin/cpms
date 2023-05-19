{extends file="parent.tpl"}
{block  name="title" prepend}Employee Details{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
        {if isset ($a_TemplateData['employeeId'])}
            {assign var="employeeId" value=$a_TemplateData['employeeId']}
        {else}
            {assign var="employeeId" value="0"}
        {/if}
        <!-- Add new form -->
        {if $employeeId > 0}
       <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-th-large"></i> Employee Details </h2>
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
                                    <th style="width: 250px;">Name</th>  
                                    <td>{$a_TemplateData['employeeData']->name}</td> 
                                </tr>
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Address</th>
                                  <td>{$a_TemplateData['employeeData']->address}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Email</th>
                                  <td>{$a_TemplateData['employeeData']->email}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Phone</th>
                                  <td>{$a_TemplateData['employeeData']->phone}</td> 
                                </tr> 
                                <tr class="tablesorter-headerRow">
                                  <th>Alternative Phone</th>
                                  <td>{$a_TemplateData['employeeData']->alternatePhone}</td> 
                                </tr> 
                                <tr class="tablesorter-headerRow">
                                  <th>Father's Name</th>
                                  <td>{$a_TemplateData['employeeData']->phone}</td> 
                                </tr> 
                                <tr class="tablesorter-headerRow">
                                  <th>Mother's Name</th>
                                  <td>{$a_TemplateData['employeeData']->phone}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th style="vertical-align: middle;">Gender</th>
                                  <td >
                                        {if (int)$a_TemplateData['employeeData']->gender === $a_TemplateData['MALE']}
                                                Male
                                        {else if (int)$a_TemplateData['employeeData']->gender === $a_TemplateData['FEMALE']}
                                            Female
                                        {else}
                                            <span class="label-default label">
                                             Unknown
                                            </span>
                                        {/if}
                                  </td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Marital Status</th>
                                  <td>
                                      {if (int)$a_TemplateData['employeeData']->maritalStatus === $a_TemplateData['MARRIED']}
                                        Married
                                      {else if (int)$a_TemplateData['employeeData']->maritalStatus === $a_TemplateData['UNMARRIED']}
                                        unmarried
                                      {/if}
                                  </td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Salary</th>
                                  <td>
                                        {$a_TemplateData['employeeData']->salaryAmount}
                                  </td> 
                                </tr>
                                <tr class="tablesorter-headerRow">
                                  <th>Payment Term</th>
                                  <td>{$a_TemplateData['employeeData']->paymentTermName}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Department</th>
                                  <td>
                                      {$a_TemplateData['employeeData']->departmentName}
                                  </td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Designation</th>
                                  <td>
                                    {$a_TemplateData['employeeData']->designationName}
                                  </td> 
                                </tr>
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Employment Type</th>
                                  <td>{$a_TemplateData['employeeData']->employmentTypeName}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Qualification</th>
                                  <td>{$a_TemplateData['employeeData']->qualificationNames}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Join Date</th>
                                  <td>
                                      {if isset($a_TemplateData['employeeData']->joinDateFormatted)}
                                          {$a_TemplateData['employeeData']->joinDateFormatted}
                                     {/if}
                                  </td> 
                                </tr> 
                                <tr class="tablesorter-headerRow">
                                  <th>Releave Date</th>
                                  <td>
                                      {if isset($a_TemplateData['employeeData']->releaveDateFormatted) && $a_TemplateData['employeeData']->releaveDateFormatted}
                                          {$a_TemplateData['employeeData']->releaveDateFormatted}
                                     {/if}
                                  </td> 
                                </tr> 
                                <tr class="tablesorter-headerRow">
                                  <th>Notes</th>
                                  <td>{$a_TemplateData['employeeData']->notes}</td> 
                                </tr> 
                                <tr class="tablesorter-headerRow">
                                  <th>Status</th>
                                  <td>
                                      {if $a_TemplateData['employeeData']->status == $a_TemplateData['ACTIVE']}
                                            <span class="label-default label label-success">
                                                {$a_TemplateData["dataStatus"][$a_TemplateData['employeeData']->status]}
                                            </span>
                                        {else if $a_TemplateData['employeeData']->status == $a_TemplateData['INACTIVE']}
                                            <span class="label-default label">
                                             {$a_TemplateData["dataStatus"][$a_TemplateData['employeeData']->status]}
                                            </span>
                                        {else}
                                            <span class="label-default label label-danger">
                                             {$a_TemplateData["dataStatus"][0]}
                                            </span>
                                        {/if}
                                  </td> 
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
                        <div class="showHideColumns">
                            <div class="btn-group">
                                {foreach $a_TemplateData['thead']['payment'] as $index=>$head}
                                    <a class="toggle-vis btn btn-default" data-column="{$index}" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                       {$head.name}&nbsp;<i class='glyphicon {if $head.visible === "false"}glyphicon-eye-close{else}glyphicon-eye-open{/if}'></i>
                                    </a>
                                {/foreach}
                            </div>
                            <input type="hidden" name="startIndex" id="startIndex" value="{$a_TemplateData['DATA_PER_PAGE']}"/>
                        </div>
                        <table id="paymentTableData" class="display" cellspacing="0" width="100%" data-order='[[ 1, "asc" ]]'>
                            <thead>
                              <tr class="tablesorter-headerRow">
                                {foreach $a_TemplateData['thead']['payment'] as $head}
                                    <th {if isset($head.width)}width="{$head.width}"{/if}>{$head.name}</th>
                                {/foreach}
                              </tr>
                            </thead>
                            <tfoot>
                              <tr class="tablesorter-headerRow">
                                {foreach $a_TemplateData['thead']['payment'] as $head}
                                    <th>{$head.name}</th>
                                {/foreach}
                              </tr>
                            </tfoot>
                                <tbody>
                                {if $a_TemplateData['allPayments']}
                                    {foreach $a_TemplateData['allPayments'] as $index=>$details}    
                                        <tr class="{if $index % 2 == 0}odd{else}even{/if}">
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
                                          </tr>
                                      {/foreach}
                                    {/if}
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
        {/if}
{/block}
{block name="jsScriptBottoom"}
    {literal}
    <script>
       function init() {
            var paymentTableOptions = {};
            {/literal}
            {if isset($a_TemplateData['allPayments']) && $a_TemplateData['allPayments']}
            {literal}
                paymentTableOptions.columns = [{/literal}{foreach $a_TemplateData['thead']['payment'] as $index=>$head}
                                    {literal}{className: "{/literal}{$head.class}{literal}", orderable: {/literal}{$head.orderable}{literal}, visible: {/literal}{$head.visible}{literal}},{/literal}
                                {/foreach}
                                {literal}
                                ]; // Actions
                {/literal}
                {/if}
                {literal}

                paymentTableOptions.order = [[0, 'asc']];

                loadDataTable('#paymentTableData', "", 0, paymentTableOptions);
        }
    </script>
    {/literal}
{/block}


