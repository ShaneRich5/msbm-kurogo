{include file="findInclude:common/templates/header.tpl"}

{include file="findInclude:common/templates/results.tpl" results=$coursesList}
<form action="logout" method="post">
    <input type="submit" value="Logout">
</form>
{include file="findInclude:common/templates/footer.tpl"}