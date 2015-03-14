{include file="findInclude:common/templates/header.tpl"}

<h2>Cal Id {$cal}</h2>
<h3>Event Id {$event}</h3>


<form action="{$delete_url}" method="post">
    <input type="submit" value="Delete">
</form>
<form action="{$create_url}" method="get">
    <input type="submit" value="Create Event">
</form>
<form action="{$index_url}" method="get">
    <input type="submit" value="All Bookings">
</form>

{include file="findInclude:common/templates/footer.tpl"}