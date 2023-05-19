{extends file="parent.tpl"}
{block  name="title" prepend}Price Types{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
        <!-- Add new form -->
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" onclick="return false;">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;{if isset($a_TemplateData['priceMarginTypeData']['id']) && $a_TemplateData['priceMarginTypeData']['id'] > 0}Edit{else}Add New{/if}</h2>

                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
                    {if isset($a_TemplateData['priceMarginTypeData']['showForm'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                            <form action="{actionurl page='pricemargintypes'}" method="post" class="form-inline addForm"  style="text-align: center;">
                                {if isset($a_TemplateData['priceMarginTypeData']['id']) &&  $a_TemplateData['priceMarginTypeData']['id'] > 0}
                                    {assign var=priceMarginTypesId value={$a_TemplateData['priceMarginTypeData']['id']}}
                                {else}
                                    {assign var=priceMarginTypesId value=0}
                                {/if}
                                <input type="hidden" name="id" value="{$priceMarginTypesId}"/>
                                    
                                <div class="form-group col-xs-4">
                                    <label for="name">
                                        Name
                                        <a data-toggle="tooltip" title="Price margin Type name">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" id="name" name="name" class="form-control" data-validation="alphanumeric server" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-url="{actionurl page='pricetypevalidate' params=["do"=>"1", "id"=>$priceMarginTypesId]}" data-validation-error-msg="Alphanumeric values only" value='{if isset($a_TemplateData['priceMarginTypeData']['name'])}{$a_TemplateData['priceMarginTypeData']['name']}{/if}' autocomplete="off" placeholder="Price Type name"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['priceMarginTypeData']['status'])}
                                        {assign var="status" value=$a_TemplateData['priceMarginTypeData']['status']}
                                    {else}
                                        {assign var="status" value=1}
                                    {/if}
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control" data-validation="number" data-validation-error-msg="Invalid status" >
                                        <option value="1" {if $status == 1}selected='selected'{/if}>
                                            Active
                                        </option>
                                        <option value="2" {if $status == 2}selected='selected'{/if}>
                                            Inactive
                                        </option>
                                    </select>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="notes" >Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['priceMarginTypeData']['notes'])}{$a_TemplateData['priceMarginTypeData']['notes']}{/if}</textarea>
                                </div>
                                
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-primary" id='addUnit'  type="submit" name="add_pricetype" value="{if isset($a_TemplateData['priceMarginTypeData']['id']) && $a_TemplateData['priceMarginTypeData']['id'] > 0}Save{else}Add{/if}"/>&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-default resetFormData" type="reset" href="{actionurl page='pricemargintypes'}">Clear</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    {if isset($a_TemplateData['searchData']['search_pricemargintypes'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                        
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-7 col-md-12 formContainer">
                            <form action="{actionurl page='pricemargintypes'}" method="post" class="form-inline searchForm"  style="text-align: center;">
                                <div class="form-group col-xs-4">
                                    <label for="name">
                                        Name
                                        <a data-toggle="tooltip" title="Price Type name Eg: Kilogram">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </label>
                                    <input type="text" name="name" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}"  data-validation-error-msg="Alphanumeric values only"  data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['name'])}{$a_TemplateData['searchData']['name']}{/if}' autocomplete="off" placeholder="Price Type name"/>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['searchData']['status'])}
                                        {assign var="status" value=$a_TemplateData['searchData']['status']}
                                    {else}
                                        {assign var="status" value="0"}
                                    {/if}
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid status" data-validation-optional="true">
                                        <option value="0">Select</option>
                                        <option value="1" {if $status == 1}selected='selected'{/if}>
                                            Active
                                        </option>
                                        <option value="2" {if $status == 2}selected='selected'{/if}>
                                            Inactive
                                        </option>
                                    </select>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="notes" >Notes</label>
                                    <textarea name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['searchData']['notes'])}{$a_TemplateData['searchData']['notes']}{/if}</textarea>
                                </div>
                                
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-primary" type="submit" name="search_pricetype" value="Search"/>&nbsp;&nbsp;&nbsp;
                                    <div class="btn btn-default resetForm">Clear</div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class="box">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-th-large"></i> Price Margin Types</h2>
                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        <div class="box-content row">
                        <form method="post" class="form-inline bulkForm" action="{actionurl page='pricemargintypes'}">
                            <div class="form-group col-sm-4" style="border:0px solid black; min-height: auto !important;">
                                <label for="bulkAction">Bulk Action:</label>
                                <select name="bulkAction" class="form-control input-sm" data-validation="number" data-validation-error-msg="Please select an action" style="width:auto !important;">
                                    <option value="">Choose an action...</option>
                                    <option value="100">Delete</option>
                                </select>
                                <input class="btn btn-default btn-bulk" type="submit" name="bulk_action" value="Go"/>
                            </div>
                            <div class="table-responsive col-xs-12">
                                <div class="showHideColumns">
                                    <div class="btn-group">
                                        <a class="toggle-vis btn btn-default" data-column="0" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                            All&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                                        </a>
                                        {foreach $a_TemplateData['thead'] as $index=>$head}
                                            <a class="toggle-vis btn btn-default" data-column="{$index}" data-toggle="tooltip" data-original-title="Click to Show/Hide">
                                                {$head.name}&nbsp;<i class='glyphicon glyphicon-eye-open'></i>
                                            </a>
                                        {/foreach}
                                    </div>
                                </div>
                                <table id="tableDataItems" class="display" cellspacing="0" width="100%">
                                    <thead>
                                      <tr class="tablesorter-headerRow">
                                        <th>
                                            All
                                            <input type="checkbox" name="selectedData[]" value="{$details->id}" class="selectAll"/>
                                        </th>
                                        {foreach $a_TemplateData['thead'] as $head}
                                            <th>{$head.name}</th>
                                        {/foreach}
                                      </tr>
                                    </thead>
                                    <tfoot>
                                      <tr class="tablesorter-headerRow">
                                          <th>
                                              All
                                          </th>
                                        {foreach $a_TemplateData['thead'] as $head}
                                            <th>{$head.name}</th>
                                        {/foreach}
                                      </tr>
                                    </tfoot>
                                    <tbody>
                                    {if $a_TemplateData['allPriceMarginTypes']}
                                        {foreach $a_TemplateData['allPriceMarginTypes'] as $index=>$details}    
                                            <tr class="{if $index % 2 == 0}odd{else}even{/if}">
                                               <td style="width:1%; text-align: center;">
                                                   <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                               </td>
                                               <td style="width:1%; text-align: center;">{$index + 1}</td>
                                               <td style="width:10%">{$details->name}</td>
                                               <td style="width:5%; text-align: center;">
                                                   {if $details->status == 1}
                                                       <span class="label-default label label-success">
                                                           Active
                                                       </span>
                                                   {else if $details->status == 2}
                                                       <span class="label-default label">
                                                        Inactive
                                                       </span>
                                                   {else}
                                                       <span class="label-default label label-danger">
                                                        Unknown
                                                       </span>
                                                   {/if}
                                               </td>
                                               <td style="width:15%">{$details->notes}</td>
                                               <td style="width:5%">
                                                   <a class="btn btn-info btn-small" data-toggle="tooltip" data-original-title="Edit pricemargintypes." href="{actionurl page='pricemargintypes' params=['id'=>$details->id, 'do'=>1]}">
                                                       <i class="glyphicon glyphicon-edit icon-white"></i>
                                                       Edit
                                                   </a>
                                                   <a class="btn btn-danger btn-small" data-toggle="tooltip" data-original-title="Delete pricemargintypes." href="{actionurl page='pricemargintypes' params=['id'=>$details->id, 'do'=>2]}">
                                                       <i class="glyphicon glyphicon-trash icon-white"></i>
                                                       Delete
                                                   </a>
                                               </td>
                                             </tr>
                                          {/foreach}
                                        {else}
                                            <tr>
                                                <td colspan="10" style="font-size: 14px; font-weight: bold; text-align: center; padding: 10px;"> 
                                                    No Data Found
                                                </td>
                                            </tr>
                                        {/if}
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
{/block}
{block name="jsScriptBottoom"}
    {literal}
    <script>
        function init(){
            selectAllData(".selectAll", "selectedData");
            resetFromData(".searchForm");
            selectChosen();
            validateFormWithServer();
            
            var tableOptions = {};
            {/literal}
            {if $a_TemplateData['allPriceMarginTypes']}
            {literal}
            tableOptions.columns = [
                            { className: "columTextCenter", orderable: false},
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
                 
            tableOptions.order = [[1, 'asc']];
            
            loadDataTable('#tableDataItems', null, 0, tableOptions);
        }
    </script>
    {/literal}
{/block}


