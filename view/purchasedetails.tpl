{extends file="parent.tpl"}
{block  name="title" prepend}Purchase Details{/block}
{block  name="css" prepend}
{/block}
{block  name="jsFileTop" prepend}
{/block}

{block name="content"}
        <div class='row'>
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="glyphicon glyphicon-th-large"></i> Purchase Details </h2>
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
                                    <th style="width: 250px;">Supplier Name</th>  
                                    <td>{$a_TemplateData['purchaseData']->supplierName}</td> 
                                </tr>
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Product Name</th>
                                  <td>{$a_TemplateData['purchaseData']->productName}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Tax</th>
                                  <td>{$a_TemplateData['purchaseData']->taxName}&nbsp;({$a_TemplateData['purchaseData']->taxPrecentage} %)</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Quantity</th>
                                  <td>{$a_TemplateData['purchaseData']->quantity}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Unit Price</th>
                                  <td>{$a_TemplateData['purchaseData']->unitPrice}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Amount</th>
                                  <td>{$a_TemplateData['purchaseData']->amount}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Invoice Number</th>
                                  <td>{$a_TemplateData['purchaseData']->invoiceNumber}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Paid Status</th>
                                  <td style="vertical-align: middle;">
                                        {if (int)$a_TemplateData['purchaseData']->paidStatus === 1}
                                            <span class="label-default label label-success">
                                             Paid
                                            </span>
                                        {else if (int)$a_TemplateData['purchaseData']->paidStatus === 2}
                                            <span class="label-default label label-danger">
                                            Unpaid
                                            </span>
                                        {else}
                                            <span class="label-default label">
                                             Unknown
                                            </span>
                                        {/if}
                                  </td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Payment Method</th>
                                  <td>{$a_TemplateData['purchaseData']->paymentMethodName}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Payment Term</th>
                                  <td>
                                      {if $a_TemplateData['purchaseData']->paymentTermDuration > 0}
                                        {$a_TemplateData['purchaseData']->paymentTermDuration}&nbsp;
                                        {$a_TemplateData['purchaseData']->paymentTermName}
                                      {/if}
                                  </td> 
                                </tr>
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Due Date</th>
                                  <td>
                                        {$a_TemplateData['purchaseData']->dueDate}
                                        {if ($a_TemplateData['purchaseData']->dueDate != "") && 
                                            $smarty.now|date_format:"%Y%m%d" > $a_TemplateData['purchaseData']->dueDate|date_format:"%Y%m%d"}
                                             <span class="label-default label label-warning">Over Due</span>
                                        {/if}
                                  </td> 
                                </tr>
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Purchase Date</th>
                                  <td>{$a_TemplateData['purchaseData']->purchaseDate}</td> 
                                </tr> 
                                
                                <tr class="tablesorter-headerRow">
                                  <th>Notes</th>
                                  <td>{$a_TemplateData['purchaseData']->notes}</td> 
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
{/block}
{block name="jsScriptBottoom"}
    {literal}
    <script>
        function init() {
            
        }
    </script>
    {/literal}
{/block}


