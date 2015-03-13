{include file="findInclude:common/templates/header.tpl"}

<h2>Cal Id {$cal}</h2>
<h3>Event Id {$event}</h3>


<form action="{$delete_url}" method="post">
    <input type="submit" value="Delete">
</form>

{include file="findInclude:common/templates/footer.tpl"}