{include file = "findInclude:common/templates/header.tpl"} 

<h1 class="focal">{$message}</h1> 

{*Here's the list*}
{include file="findInclude:common/templates/results.tpl" results=$helloArray}


{include file="findInclude:common/templates/footer.tpl"}

