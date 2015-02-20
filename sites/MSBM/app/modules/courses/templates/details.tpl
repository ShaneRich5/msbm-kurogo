
{include file="findInclude:common/templates/header.tpl"}
{*<h1 class="focal">{$message}</h1>*}
{*<h2 class="focal">{$token}</h2>*}

<h1 class="focal">Hello World</h1>
<h2 class="focal">{$wstoken} {$func} {$id} </h2>
{include file="findInclude:common/templates/results.tpl" results=$contentList}
{include file="findInclude:common/templates/footer.tpl"}