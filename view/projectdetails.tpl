{extends file="parent.tpl"}
{block  name="title" prepend}Project Details{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
        <!-- Add new form -->
         {if isset ($a_TemplateData['projectId'])}
                {assign var="projectId" value=$a_TemplateData['projectId']}
                {else}
                    {assign var="projectId" value="0"}
                {/if}
        {*<div class="row">
            <div class="breadcrumb">
                {if isset ($a_TemplateData['projectId'])}
                    {assign var="projectId" value=$a_TemplateData['projectId']}
                {else}
                    {assign var="projectId" value="0"}
                {/if}
                <form method="post" action="{actionurl page='projectdetails'}" id="selectProject">
                    <select id="projectId" name="{'projectId'|md5}" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Please select a valid stage"  data-placeholder="Choose a project..." tabindex="-1">
                        <option value="0"></option>
                        {foreach $a_TemplateData['projects'] as $details}
                            <option value="{$details->id}" {if $projectId == $details->id}selected='selected'{/if}>
                                {$details->name}
                            </option>
                        {/foreach}
                    </select>
                </form>
            </div>
        </div>*}
        {if $projectId > 0}
        <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-th-large"></i> Revenues</h2>
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
                        <div class="totalAmount">
                            Total Amount: 
                            {if isset($a_TemplateData['allAdvance']['totalAmount'])}
                                {$a_TemplateData['allAdvance']['totalAmount']}
                            {else}
                                0
                            {/if}
                        </div>
                        <table class="tablesorter tablesorter-default" border="0" cellpadding="0" cellspacing="1">
                            <thead>
                              <tr class="tablesorter-headerRow">
                               {* <th style="background:none; padding-left:8px;">
                                    All
                                    <input type="checkbox" name="selectAll" class="selectAll"/>
                                </th>*}
                                <th class="tablesorter-header" data-column="1"><div class="tablesorter-header-inner">Slno</div></th>
                                <th class="tablesorter-header" data-column="2"><div class="tablesorter-header-inner">Name</div></th>
                                <th class="tablesorter-header" data-column="3"><div class="tablesorter-header-inner">Amount</div></th>      
                                <th class="tablesorter-header" data-column="4"><div class="tablesorter-header-inner">Received Date</div></th>
                                <th class="tablesorter-header" data-column="6"><div class="tablesorter-header-inner">Notes</div></th>
                              </tr>
                            </thead>
                            <tbody>
                            {if $a_TemplateData['allAdvance']}
                                {foreach $a_TemplateData['allAdvance'] as $index=>$details}  
                                    {if !isset($details->id)}{continue}{/if}
                                    <tr class="{if $index % 2 == 0}odd{else}even{/if}">
                                       {*<td style="width:1%; text-align: center;">
                                           <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                       </td>*}
                                       <td style="width:1%; text-align: center;">{$index + 1}</td>
                                       <td style="width:11%">{$details->projectName}</td>
                                       <td style="width:10%; text-align: right;">{$details->amount}</td>
                                       <td style="width:10%; text-align: center;">{$details->receivedDate}</td>
                                       <td style="width:16.5%;">{$details->notes}</td>
                                     </tr>
                                  {/foreach}
                                {/if}
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
                        <h2><i class="glyphicon glyphicon-th-large"></i> Stages</h2>
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
                        <table class="tablesorter tablesorter-default" border="0" cellpadding="0" cellspacing="1">
                            <thead>
                              <tr class="tablesorter-headerRow">
                                {*<th style="background:none; padding-left:8px;">
                                    All
                                    <input type="checkbox" name="selectAll" class="selectAll"/>
                                </th>*}
                                <th class="tablesorter-header" data-column="1"><div class="tablesorter-header-inner">Slno</div></th>
                                <th class="tablesorter-header" data-column="2"><div class="tablesorter-header-inner">Name</div></th>
                                <th class="tablesorter-header" data-column="3"><div class="tablesorter-header-inner">Progress</div></th>      
                                <th class="tablesorter-header" data-column="4"><div class="tablesorter-header-inner">started Date</div></th>
                                <th class="tablesorter-header" data-column="5"><div class="tablesorter-header-inner">Completed Date</div></th>
                                <th class="tablesorter-header" data-column="6"><div class="tablesorter-header-inner">Notes</div></th>
                              </tr>
                            </thead>
                            <tbody>
                            {if $a_TemplateData['allStages']}
                                {foreach $a_TemplateData['allStages'] as $index=>$details}    
                                    <tr class="{if $index % 2 == 0}odd{else}even{/if}">
                                       {*<td style="width:1%; text-align: center;">
                                           <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                       </td>*}
                                       <td style="width:1%; text-align: center;">{$index + 1}</td>
                                       <td style="width:11%">{$details->name}</td>
                                       <td style="width:5%; text-align: center;">
                                           {if $details->progressId == 2}
                                               <span class="label-default label label-success">
                                           {else if $details->progressId == 3}
                                               <span class="label-default label" style="background-color:#2FA4E7;">
                                           {else if $details->progressId == 4}
                                               <span class="label-default label  label-warning">
                                           {else if $details->progressId == 5}
                                               <span class="label-default label label-danger">
                                           {else}
                                               <span class="label-default label">
                                           {/if}
                                               {$details->progressName}
                                           </span>
                                       </td>
                                       <td style="width:9%; text-align: center;">{$details->startedDate}</td>
                                       <td style="width:9%; text-align: center;">{$details->completedDate}</td>
                                       <td style="width:16%">{$details->notes}</td>
                                     </tr>
                                  {/foreach}
                                {/if}
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
                        <h2><i class="glyphicon glyphicon-th-large"></i> Expenses</h2>
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
                         <div class="totalAmount">
                            Total Amount: 
                            {if isset($a_TemplateData['allMaterialExpenses']['totalAmount'])}
                                {$a_TemplateData['allMaterialExpenses']['totalAmount']}
                            {else}
                                0
                            {/if}
                        </div>
                        <table class="tablesorter tablesorter-default" border="0" cellpadding="0" cellspacing="1">
                            <thead>
                              <tr class="tablesorter-headerRow">
                                {*<th style="background:none; padding-left:8px;">
                                    All
                                    <input type="checkbox" name="selectAll" class="selectAll"/>
                                </th>*}
                                <th class="tablesorter-header" data-column="1"><div class="tablesorter-header-inner">Slno</div></th>
                                <th class="tablesorter-header" data-column="3"><div class="tablesorter-header-inner">Stage</div></th>      
                                <th class="tablesorter-header" data-column="4"><div class="tablesorter-header-inner">Product/ Expense</div></th>
                                <th class="tablesorter-header" data-column="5"><div class="tablesorter-header-inner">Quantity</div></th>
                                <th class="tablesorter-header" data-column="5"><div class="tablesorter-header-inner">Unit Price</div></th>
                                <th class="tablesorter-header" data-column="5"><div class="tablesorter-header-inner">Amount</div></th>
                                <th class="tablesorter-header" data-column="5"><div class="tablesorter-header-inner">Purchase Date</div></th>
                                <th class="tablesorter-header" data-column="6"><div class="tablesorter-header-inner">Notes</div></th>
                              </tr>
                            </thead>
                            <tbody>
                            {if $a_TemplateData['allMaterialExpenses']}
                                {foreach $a_TemplateData['allMaterialExpenses'] as $index=>$details}  
                                    {if !isset($details->id)}{continue}{/if}
                                    <tr class="{if $index % 2 == 0}odd{else}even{/if}">
                                       {*<td style="width:1%; text-align: center;">
                                           <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                       </td>*}
                                       <td style="width:1%; text-align: center;">{$index + 1}</td>
                                       <td style="width:11%">{$details->stageName}</td>
                                       <td style="width:9%;text-align: center;">{$details->productName}</td>
                                       <td style="width:9%; text-align: right;">{$details->quantity}</td>
                                       <td style="width:9%; text-align: right;">{$details->unitPrice}</td>
                                       <td style="width:9%; text-align: right;">{$details->amount}</td>
                                       <td style="width:9%; text-align: center;">{$details->purchaseDate}</td>
                                       <td style="width:16%">{$details->notes}</td>
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
            $(".tablesorter").tablesorter({
                headers: {0: { sorter: false}, 7: { sorter: false}}, cssHeader:{}}, 
                paging: false,
                language: {"emptyTable": "No records found"});
                
            $('#tablesorter tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            } );

            // DataTable
            var table = $('#tablesorter').DataTable();

            // Apply the search
            table.columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );

            /*jQuery("#projectId").change(function(){
                $("#selectProject").submit();
            });*/
        }
    </script>
    {/literal}
{/block}


