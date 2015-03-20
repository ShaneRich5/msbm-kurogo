{include file="findInclude:common/templates/header.tpl"}

<div class="nonfocal">
    <h2>{$today|date_format:$dateFormat}</h2>
</div>

{*{include file="findInclude:common/templates/results.tpl" results=$eventsList}*}

{if $upcomingEvents}
    {include file="findInclude:common/templates/navlist.tpl" navlistItems=$upcomingEvents subTitleNewline=true}
{/if}

{if count($userCalendars)}
    {include file="findInclude:common/templates/navlist.tpl" navlistItems=$userCalendars}
{/if}

{if count($resources)}
    {include file="findInclude:common/templates/navlist.tpl" navlistItems=$resources}
{/if}


<form action="{$create_url}" method="get">
    <input type="submit" value="Create Event">
</form>

{include file="findInclude:common/templates/footer.tpl"}