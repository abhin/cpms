{extends file="parent.tpl"}
{block  name="title" prepend}Price Margin Settings{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
        <!-- Add new form -->
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i> {if isset($a_TemplateData['priceMarginSettingData']['id']) && $a_TemplateData['priceMarginSettingData']['id'] > 0}Update{else}Add New{/if}</h2>

                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
                    {if isset($a_TemplateData['priceMarginSettingData']['showForm']) && $a_TemplateData['priceMarginSettingData']['showForm']}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                    
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                            <div>
                                <form action="{actionurl page='pricemarginsettings'}" method="post" class="form-inline addForm">
                                    {if isset($a_TemplateData['priceMarginSettingData']['productId']) && $a_TemplateData['priceMarginSettingData']['productId'] > 0}
                                        {assign var=productId value=$a_TemplateData['priceMarginSettingData']['productId']}
                                    {else}
                                        {assign var=productId value=0}
                                    {/if}
                                    <div class="col-xs-12">
                                        <div class="form-group col-xs-4" style="margin-left: 32%;">
                                            {if isset ($a_TemplateData['priceMarginSettingData']['productId'])}
                                                {assign var="productId" value=$a_TemplateData['priceMarginSettingData']['productId']}
                                            {else}
                                                {assign var="productId" value=""}
                                            {/if}
                                            <label for="productId">Products</label>
                                            <select id="productId" name="productId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Please select a Parent" data-placeholder="Choose a product..." >
                                                <option value=""></option>
                                                {foreach $a_TemplateData['products'] as $details}
                                                    <option value="{$details->id}" {if $productId == $details->id}selected='selected'{/if}>
                                                        {$details->name}
                                                    </option>

                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12">
                                        {foreach $a_TemplateData['priceMarginTypes'] as $details}
                                            {assign var="fieldName" value={$details->fieldName}}
                                            <div class="form-group col-xs-4">
                                                <label for="{$fieldName}">{$details->name}</label>
                                                <div class="input-group" style="width:100% !important;">
                                                    <div class="input-group-addon">Rs.</div>
                                                    <input type="text" id="{$fieldName}" name="{$fieldName}" class="form-control" data-validation="number"  data-validation-error-msg="Invalid price" data-validation-allowing="float" data-validation-optional="true" value='{if isset($a_TemplateData['priceMarginSettingData'][{$fieldName}])}{$a_TemplateData['priceMarginSettingData'][{$fieldName}]}{/if}' placeholder="{$details->name}" autocomplete="off"/>
                                                </div>
                                            </div>
                                        {/foreach}
                                    </div>
                                
                                    <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                        <label for="notes">Notes</label>
                                        <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['priceMarginSettingData']['notes'])}{$a_TemplateData['priceMarginSettingData']['notes']}{/if}</textarea>
                                    </div>
                                    </div>
                                    
                                    <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                        <input class="btn btn-primary" type="submit" name="add_priceSetting" value="{if isset($a_TemplateData['priceMarginSettingData']['id']) && $a_TemplateData['priceMarginSettingData']['id'] > 0}Update{else}Add{/if}"/>&nbsp;&nbsp;&nbsp;
                                        <a href="{actionurl page='pricemarginsettings' params=['do'=>500]}" class="btn btn-default btn resetFormData">
                                            Clear
                                        </a>
                                    </div>
                                </form>
                            </div>
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
                    {if isset($a_TemplateData['searchData']['search_priceSetting'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                        
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12 formContainer">
                            <form action="{actionurl page='pricemarginsettings'}" method="post" class="form-inline searchForm">
                                {if isset($a_TemplateData['priceMarginSettingData']['productId']) && $a_TemplateData['priceMarginSettingData']['productId'] > 0}
                                    {assign var=productId value=$a_TemplateData['priceMarginSettingData']['productId']}
                                {else}
                                    {assign var=productId value=0}
                                {/if}
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4" style="margin-left: 32%;">
                                        {if isset ($a_TemplateData['searchData']['productId'])}
                                            {assign var="productId" value=$a_TemplateData['searchData']['productId']}
                                        {else}
                                            {assign var="productId" value=""}
                                        {/if}
                                        <label for="productId">Products</label>
                                        <select id="productId" name="productId" class="form-control" data-validation="number" data-validation-error-msg="Please select a Parent" data-placeholder="Choose a product..." >
                                            <option value=""></option>
                                            {foreach $a_TemplateData['products'] as $details}
                                                <option value="{$details->id}" {if $productId == $details->id}selected='selected'{/if}>
                                                    {$details->name}
                                                </option>

                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-primary" type="submit" name="search_priceSetting" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="btn btn-default btn resetFormData">
                                        Clear
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-th-large"></i> Price Margin Settings</h2>
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
                        <form method="post" class="form-inline bulkForm" action="{actionurl page='pricemarginsettings'}">
                            <div class="breadcrumb">
                                <div id="bulk-action" class="actions" style="border:0px solid red;width: 220px;">
                                    Bulk Action:
                                    <select name="bulkAction" class="form-control" data-validation="number" data-validation-error-msg="Please select an action">
                                        <option value="">Choose...</option>
                                        <option value="100">Delete</option>
                                    </select>
                                    <input class="btn btn-default btn-bulk btn-small" type="submit" name="do_bulk_action" value="Go"/>
                                </div>
                            </div>
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
                                <input type="hidden" name="startIndex" id="startIndex" value="{$a_TemplateData['DATA_PER_PAGE']}"/>
                            </div>
                            <table id="tableData" class="display" cellspacing="0" width="100%">
                                <thead>
                                  <tr class="tablesorter-headerRow">
                                    <th style="background:none;">
                                        All
                                        <input type="checkbox" name="selectAll" class="selectAll"/>
                                    </th>
                                    {foreach $a_TemplateData['thead'] as $head}
                                        <th>{$head.name}</th>
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
                                {if $a_TemplateData['allPriceMarginSetting']}
                                    {assign var=i value=1}
                                    {foreach $a_TemplateData['allPriceMarginSetting'] as $index=>$details}    
                                        <tr>
                                           <td style="width:1%;">
                                               <input type="checkbox" name="selectedData[]" value="{$details['productId']}" />
                                           </td>
                                           <td style="width:1%;">{$i}</td>
                                           <td style="width:9%;">{$details['productName']}</td>
                                           
                                           {foreach $a_TemplateData['priceMarginTypes'] as $ptDetails}
                                                <td style="width:9%;">
                                                    {if isset($details[$ptDetails->id])}
                                                        {$details[$ptDetails->id]}
                                                    {else}
                                                        0
                                                    {/if}
                                                </td>
                                            {/foreach}
                                    
                                           <td style="width:16%">{$details['notes']}</td>
                                           
                                           <td style="width:8%">
                                                <a class="btn btn-info btn-small" href="{actionurl page='pricemarginsettings' params=['productId'=>$details['productId'], 'do'=>1]}">
                                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-small" href="{actionurl page='pricemarginsettings' params=['productId'=>$details['productId'], 'do'=>2]}">
                                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                                    Delete
                                                </a>
                                           </td>
                                         </tr>
                                         {capture assign=i}{$i+1}{/capture}
                                      {/foreach}
                                    {else}
                                        <tr>
                                            <td></td><td></td><td></td><td></td>
                                            <td style="font-size: 14px; font-weight: bold; text-align: center; padding: 10px;"> 
                                                No Data Found
                                            </td>
                                            {foreach $a_TemplateData['priceMarginTypes'] as $ptDetails}
                                                   <td></td>
                                            {/foreach}
                                        </tr>
                                    {/if}
                                </tbody>
                            </table>
                        </form>
                        {if $a_TemplateData['allPriceMarginSetting']}
                        <div id="loadMore" class="breadcrumb">
                            Load More&nbsp;<i class="glyphicon glyphicon-download-alt"></i>
                        </div>
                        <div class="breadcrumb loading">Loading...</div>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
{/block}
{block name="jsScriptBottoom"}
    {literal}
    <script>
        function init(){
            validateFormWithServer();
            selectChosen();
            selectAllData(".selectAll", "selectedData");
            resetFromData(".searchForm");
            var tableOptions = {};
            {/literal}
            {if $a_TemplateData['allUnit']}
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
            
            loadDataTable('#tableData', null, 0, tableOptions);
        }
    </script>
    {/literal}
{/block}


