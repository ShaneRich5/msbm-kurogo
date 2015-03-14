{include file="findInclude:common/templates/header.tpl"}

<h1 class="focal">
    Room Booking
    <small>Click for more details</small>
</h1>

{include file="findInclude:common/templates/results.tpl" results=$eventsList}

<form action="{$create_url}" method="get">
    <input type="submit" value="Create Event">
</form>

{include file="findInclude:common/templates/footer.tpl"}