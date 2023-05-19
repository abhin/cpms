{extends file="parent.tpl"}
{block  name="title" prepend}Materials{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
    {if isset($a_TemplateData['productData']['id']) && $a_TemplateData['productData']['id'] > 0}
        {assign var=productId value=$a_TemplateData['productData']['id']}
    {else}
        {assign var=productId value=0}
    {/if}
    
    {if isset ($a_TemplateData['productData']['parentId'])}
        {assign var="parentId" value=$a_TemplateData['productData']['parentId']}
    {else}
        {assign var="parentId" value=""}
    {/if}
        <!-- Add new form -->
        <form action="{actionurl page=$actionPage}" method="post" class="form-inline addForm">
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-plus-sign"></i> {if $productId > 0}Update{else}Add New{/if}</h2>

                        <div class="box-icon">
                            {*<a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>*}
                            <a href="#" class="btn-minimize"><i
                                    class="glyphicon glyphicon-chevron-down"></i></a>
                            {*<a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>*}
                        </div>
                    </div>
                        
                    {if isset($a_TemplateData['productData']['showForm']) && $a_TemplateData['productData']['showForm']}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                    
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12">
                            <div>
                                    <input type="hidden" name="id" value="{$productId}"/>
                                <div class="form-group col-xs-4">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" data-validation="alphanumeric server" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-url="{actionurl page=$ajaxFilePath params=["do"=>"1", "id"=>$productId]}" data-validation-error-msg="Alphanumeric values only" placeholder="Product name" value="{if isset($a_TemplateData['productData']['name'])}{$a_TemplateData['productData']['name']}{/if}"><br/>
                                    <input type="checkbox" name="addAsSub" id="addAsSub" class="form-control" {if isset($a_TemplateData['productData']['addAsSub']) || $parentId > 0}checked="checked"{/if}/><span class="label label-info" style="font-size: 11px; background-color: #033C73;">&nbsp;Add&nbsp;as&nbsp;sub</span>
                                </div>
                                    

                                <div class="form-group col-xs-4">
                                    <label for="parentId">Parent Product</label>
                                    <select id="parentCat" name="parentId" class="form-control {if isset($a_TemplateData['productData']['addAsSub']) || $parentId > 0}chosen-select{/if}" data-validation="number" data-validation-error-msg="Please select a Parent" data-placeholder="Choose a parent..." {if !isset($a_TemplateData['productData']['addAsSub']) && $parentId <= 0}disabled="disbaled"{/if} style="width:95% !important;">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['parent'] as $details}
                                            <option value="{$details->id}" {if $parentId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                            
                                        {/foreach}
                                    </select>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    <label for="unitPrice">Unit Price</label>
                                    <div class="input-group" style="width:100% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                        <input type="text" id="unitPrice" name="unitPrice" class="form-control" data-validation="number"  data-validation-error-msg="Invalid price" data-validation-allowing="float" data-validation-optional="true" value='{if isset($a_TemplateData['productData']['unitPrice'])}{$a_TemplateData['productData']['unitPrice']}{/if}' placeholder="Unit price" autocomplete="off"/>
                                    </div>
                                </div>
                                    
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['productData']['measuringUnitId'])}
                                        {assign var="measuringUnitId" value=$a_TemplateData['productData']['measuringUnitId']}
                                    {else}
                                        {assign var="measuringUnitId" value=0}
                                    {/if}
                                    <label for="measuringUnitId">Measuring Unit</label>
                                    <select id="measuringUnitId" name="measuringUnitId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid unit" data-validation-optional="true" data-placeholder="Choose a unit...">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['allUnit'] as $details}
                                            <option value="{$details->id}" {if $measuringUnitId == $details->id}selected='selected'{/if}>
                                                {$details->name} ({$details->shortCode})
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                    
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['productData']['taxId'])}
                                        {assign var="taxId" value=$a_TemplateData['productData']['taxId']}
                                    {else}
                                        {assign var="taxId" value=0}
                                    {/if}
                                    <label for="taxId">Tax</label>
                                    <select id="taxId" name="taxId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid tax" data-validation-optional="true" data-placeholder="Choose a tax...">
                                        <option value="0"></option>
                                        {foreach $a_TemplateData['allTax'] as $details}
                                            <option value="{$details->id}" {if $taxId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['productData']['status'])}
                                        {assign var="status" value=$a_TemplateData['productData']['status']}
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
                                </div>

                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    <label for="notes">Notes</label>
                                    <textarea id="notes" name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['productData']['notes'])}{$a_TemplateData['productData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center; padding-top: 35px;">
                                    <input class="btn btn-default btn" type="submit" name="add_product" value="{if $productId > 0}Update{else}Add{/if}"/>&nbsp;&nbsp;&nbsp;
                                    <a href="{actionurl page=$actionPage params=['do'=>500]}" class="btn btn-default btn resetFormData">
                                        Clear
                                    </a>
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
                    {if isset($a_TemplateData['searchData']['search_product'])}
                        {assign var=showForm value=true}
                    {else}
                        {assign var=showForm value=false}
                    {/if}
                        
                    <div class="box-content row" style="{if $showForm}display: block;{else}display: none;{/if}">
                        <div class="col-lg-12 col-md-12 formContainer">
                                <div class="form-group col-xs-4">
                                    <label for="name" >Name</label>
                                    <input type="text"  name="name" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric values only" placeholder="Product name" data-validation-optional="true" value="{if isset($a_TemplateData['searchData']['name'])}{$a_TemplateData['searchData']['name']}{/if}">
                                </div>

                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['searchData']['parentId'])}
                                        {assign var="parentId" value=$a_TemplateData['searchData']['parentId']}
                                    {else}
                                        {assign var="parentId" value="0"}
                                    {/if}
                                    <label for="parentId">Parent Product</label>
                                    <select  name="parentId" class="form-control chosen-select" data-validation="alphanumeric" data-validation-error-msg="Invalid Parent" data-validation-optional="true" data-placeholder="Choose a parent...">
                                        <option value=""></option>
                                        {foreach $a_TemplateData['parent'] as $details}
                                            <option value="{$details->name}" {if $parentId == $details->name}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    <label for="unitPrice">Unit Price</label>
                                    <div class="input-group" style="width:100% !important;">
                                        <div class="input-group-addon">Rs.</div>
                                        <input type="text"  name="unitPrice" class="form-control" data-validation="number"  data-validation-error-msg="Invalid price" data-validation-allowing="float" data-validation-optional="true" value='{if isset($a_TemplateData['searchData']['unitPrice'])}{$a_TemplateData['searchData']['unitPrice']}{/if}' placeholder="Unit price" autocomplete="off"/>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12">
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['searchData']['measuringUnitId'])}
                                        {assign var="measuringUnitId" value=$a_TemplateData['searchData']['measuringUnitId']}
                                    {else}
                                        {assign var="measuringUnitId" value=0}
                                    {/if}
                                    <label for="measuringUnitId">Measuring Unit</label>
                                    <select id="measuringUnitId" name="measuringUnitId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid tax" data-validation-optional="true"  data-placeholder="Choose a unit...">
                                        <option value="0"></option>
                                        {foreach $a_TemplateData['allUnit'] as $details}
                                            <option value="{$details->id}" {if $measuringUnitId == $details->id}selected='selected'{/if}>
                                                {$details->name} ({$details->shortCode})
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['searchData']['taxId'])}
                                        {assign var="taxId" value=$a_TemplateData['searchData']['taxId']}
                                    {else}
                                        {assign var="taxId" value=0}
                                    {/if}
                                    <label for="taxId">Tax</label>
                                    <select id="taxId" name="taxId" class="form-control chosen-select" data-validation="number" data-validation-error-msg="Invalid tax"  data-validation-optional="true" data-placeholder="Choose a tax...">
                                        <option value="0"></option>
                                        {foreach $a_TemplateData['allTax'] as $details}
                                            <option value="{$details->id}" {if $taxId == $details->id}selected='selected'{/if}>
                                                {$details->name}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                
                                <div class="form-group col-xs-4">
                                    {if isset ($a_TemplateData['searchData']['status'])}
                                        {assign var="status" value=$a_TemplateData['searchData']['status']}
                                    {else}
                                        {assign var="status" value=0}
                                    {/if}
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control" data-validation="number" data-validation-error-msg="Invalid status" data-validation-optional="true">
                                        <option value="0">
                                            Select
                                        </option>
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
                                    <textarea  name="notes" class="form-control" data-validation="alphanumeric" data-validation-allowing="{$a_TemplateData['formValidChars']}" data-validation-error-msg="Alphanumeric value only" data-validation-optional="true"> {if isset($a_TemplateData['searchData']['notes'])}{$a_TemplateData['searchData']['notes']}{/if}</textarea>
                                </div>
                                </div>
                                
                                <div class="form-group col-xs-12" style="border:0px solid red;text-align: center;">
                                    <input class="btn btn-default btn" type="submit" name="search_product" value="Search"/>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="btn btn-default btn resetFormData">
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
                        <h2><i class="glyphicon glyphicon-th-large"></i> Materials</h2>
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
                            <table id="tableData" class="display" cellspacing="0" width="100%" data-order='[[ 1, "asc" ]]'>
                                <thead>
                                  <tr class="tablesorter-headerRow">
                                      <th  class="selectAllTableHead">
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
                                {if $a_TemplateData['allProduct']}
                                    {foreach $a_TemplateData['allProduct'] as $index=>$details}    
                                        <tr class="{if $index % 2 == 0}odd{else}even{/if}">
                                           <td style="width:1%;">
                                               <input type="checkbox" name="selectedData[]" value="{$details->id}" />
                                           </td>
                                           <td style="width:1%;">{$index + 1}</td>
                                           <td style="width:11%">{$details->joinedName}</td>
                                           <td style="width:9%;">{$details->parentName}</td>
                                           <td style="width:13%;">{$details->unitPrice}</td>
                                           <td style="width:13%;">
                                                {if $details->measuringUnitName} 
                                                   {$details->measuringUnitName} ({$details->measuringUnitShortCode})
                                                {/if}
                                           </td>
                                           <td style="width:8%;">
                                               {$details->taxName}
                                               {if $details->taxPrecentage > 0}
                                                ({$details->taxPrecentage}%)
                                               {else}
                                                    (0%)
                                               {/if}
                                           </td>
                                           <td style="width:5%;">
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
                                           <td style="width:16%">{$details->notes}</td>
                                           <td style="width:8%">
                                                <a class="btn btn-info btn-small" href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>1]}">
                                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-small delete" href="{actionurl page=$actionPage params=['id'=>$details->id, 'do'=>2]}">
                                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                                    Delete
                                                </a>
                                           </td>
                                         </tr>
                                      {/foreach}
                                    {/if}
                                </tbody>
                            </table>
                            {if isset($a_TemplateData['allProduct']) && $a_TemplateData['allProduct']}
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
        function init(){
            validateFormWithServer();
            selectChosen();
            selectAllData(".selectAll", "selectedData");
            resetFromData(".searchForm");

            $("#addAsSub").click(function(){
                var isCheck  = $(this).is(":checked")
                var selectable = $('#parentCat');

                if(isCheck){
                    selectable.removeAttr("disabled");
                    $(".addForm #parentCat_chosen").removeClass("chosen-disabled");
                    $(".addForm #parentCat").chosen({width:"95%"});
                    $(".addForm .chosen-drop").css({display:"block"});
                }
                else{
                    selectable.attr("disabled", "disabled");
                    $(".addForm #parentCat_chosen").addClass("chosen-disabled");
                    $(".addForm .chosen-drop").css({display:"none"});
                }
            });
            
            var tableOptions = {};
            {/literal}
            {if isset($a_TemplateData['allProduct']) && $a_TemplateData['allProduct']}
            {literal}
                tableOptions.columns = [
                                { className: "columTextCenter", orderable: false, visible: true},
                                {/literal}
                                {foreach $a_TemplateData['thead'] as $index=>$head}
                                    {literal}{ className: "{/literal}{$head.class}{literal}", orderable: {/literal}{$head.orderable}{if isset($head.visible)}{literal}, visible: {/literal}{$head.visible}{/if}{literal} },{/literal}
                                {/foreach}
                                {literal}
                                ]; // Actions*/
                {/literal}
                {/if}
                {literal}

                tableOptions.order = [[1, 'asc']];

                loadDataTable('#tableData', '{/literal}{actionurl page=$ajaxFilePath}{literal}', {/literal}{$a_TemplateData['DATA_PER_PAGE']}{literal}, tableOptions);
        }
    </script>
    {/literal}
{/block}


