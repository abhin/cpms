{extends file="parent.tpl"}

{block name="title" prepend}Home{/block}
{block name="left"}{/block}
{block name="content"}
    {if isset($a_TemplateData['expiryMessage'])}
        <div class="alert-danger" style="text-align: center;padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;width: 100% !important;text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.2);
    box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.25) inset, 0px 1px 2px rgba(0, 0, 0, 0.05);">
            <button data-dismiss="alert" class="close" type="button">×</button>
            <h4 class="alert-heading">{$a_TemplateData['expiryMessage']}</h4>
        </div>
    {else}
    <div class=" row">
        <div class="col-xs-12">
            {if isset($a_TemplateData['IS_PMS_ENABELD']) && $a_TemplateData['IS_PMS_ENABELD'] === true}
            <div class="col-md-3 col-sm-3 col-xs-6">
                <a class="well top-block" href="{actionurl page='projects'}">
                    <img src="../../images/pm.jpg"/>
                    <div class="homeBlock">Project Management</div>
                </a>
            </div>
            {/if}
            {if isset($a_TemplateData['IS_HR_ENABELD']) && $a_TemplateData['IS_HR_ENABELD'] === true}
            <div class="col-md-3 col-sm-3 col-xs-6">
                <a class="well top-block" href="{actionurl page='employees'}">
                    <img src="../../images/hr.jpg"/>
                    <div class="homeBlock">Human Resource Management</div>
                </a>
            </div>
            {/if}
        </div>
    </div>
    {/if}
{/block}
{block name="jsScriptBottoom"}
    {literal}
    <script>
        function init(){}
    </script>
    {/literal}
{/block}


