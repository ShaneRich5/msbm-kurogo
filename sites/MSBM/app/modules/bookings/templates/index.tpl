{include file="findInclude:common/templates/header.tpl"}

<h1 class="focal">Room Booking</h1>

{include file="findInclude:common/templates/results.tpl" results=$eventsList}



<form method="get" id="advancedSearchForm" action="/{$configModule}/search">
    {include file="findInclude:common/templates/formList.tpl" advancedFields=$formFields}
    <div class="formbuttons">
        {include file="findInclude:common/templates/formButtonSubmit.tpl" buttonTitle="Login"}
    </div>
</form>

{include file="findInclude:common/templates/footer.tpl"}