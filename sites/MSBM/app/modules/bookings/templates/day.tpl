{include file="findInclude:common/templates/header.tpl"}

{include file="findInclude:modules/calendar/templates/include/eventslist.tpl" title=$feedTitle date=$current}

<form action="{$create_url}" method="get">
    <input type="submit" value="Create Booking">
</form>

{include file="findInclude:common/templates/footer.tpl"}
