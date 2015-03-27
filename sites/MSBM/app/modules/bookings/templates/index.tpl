{include file="findInclude:common/templates/header.tpl"}

<div class="nonfocal">
    <h2>{$today|date_format:$dateFormat}</h2>
</div>

{include file="findInclude:common/templates/results.tpl" results=$feeds}


<form action="{$create_url}" method="get">
    <input type="submit" value="Create Event">
</form>

<form action="logout" method="post">
    <input type="submit" value="Logout">
</form>

{include file="findInclude:common/templates/footer.tpl"}