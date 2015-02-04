{include file="findInclude:common/templates/header.tpl"}
<h1 class="focal">{$message}</h1>
{foreach $contacts as $info => $record}
    {if $record}
        <p class="focal">{$record["fname"]} {$record["lname"]} {$record['jobTitle']} {$record['unit']}</p>
    {/if}
{/foreach}
{include file="findInclude:common/templates/footer.tpl"}