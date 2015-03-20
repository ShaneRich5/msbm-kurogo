{include file="findInclude:common/templates/header.tpl"}

<div class="nonfocal">
    <h2>{$today|date_format:$dateFormat}</h2>
</div>

{include file="findInclude:common/templates/results.tpl" results=$eventsList}

{*{include file="findInclude:modules/calendar/templates/include/eventslist.tpl" title=$eventsList date=$current}*}

<form action="{$create_url}" method="get">
    <input type="submit" value="Create Event">
</form>

{include file="findInclude:common/templates/footer.tpl"}