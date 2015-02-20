{include file = "findInclude:common/templates/header.tpl"}
<h1 class="focal">Book</h1>
<a href="{$item['url']}">{$message}</a>
<h1 class="focal">{include file="findInclude:common/templates/listItem.tpl" item=$nav}</h1>

{include file="findInclude:common/templates/formList.tpl" formlistID=$formId advancedFields=$formFields}


{include file="findInclude:common/templates/footer.tpl"}
