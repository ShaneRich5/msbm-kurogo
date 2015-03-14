{include file="findInclude:common/templates/header.tpl"}

<h1 class="focal">Event deleted</h1>

<form action="{$index_url}" method="get">
    <input type="submit" value="All Bookings">
</form>

<form action="{$create_url}" method="get">
    <input type="submit" value="Create Event">
</form>


{include file="findInclude:common/templates/footer.tpl"}
