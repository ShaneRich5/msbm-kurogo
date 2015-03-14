{include file="findInclude:common/templates/header.tpl"}

<div class="focal">
    <h1>
        Event Name: {$event_name} <small>by {$creator_name}, {$creator_email}</small>
    </h1>

    <div>
        <h2>Starts</h2>
        <p>at {$start_time} on {$start_date}</p>
    </div>
    <div>
        <h2>Ends</h2>
        <p>at {$end_time} on {$end_date}</p>
    </div>

</div>

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