{*{include file = "findInclude:common/templates/header.tpl"}*}
{*<h1 class="focal">Book</h1>*}

{*{include file="findInclude:common/templates/formList.tpl" formlistID=$formId advancedFields=$formFields}*}


{*<div class="focal">*}
{*<h1>From</h1>*}
{*<form action="/create">*}
{*<p>*}
{*<label for="time_from">From: </label>*}
{*<input id="time_from" type="time" name="from">*}
{*</p>*}

{*<p>*}
{*<label for="time_to">To: </label>*}
{*<input id="time_to" type="time" name="to">*}
{*</p>*}

{*<p>*}
{*<label for="date">Date: </label>*}
{*<input id="date" type="date" name="date">*}
{*</p>*}

{*<p>*}
{*<label for="name">Name: </label>*}
{*<input id="name" type="text" name="name">*}
{*</p>*}

{*<p>*}
{*<input value="Submit" type="submit">*}
{*</p>*}
{*</form>*}
{*</div>*}

{*{include file="findInclude:common/templates/footer.tpl"}*}
{include file="findInclude:common/templates/header.tpl"}

<h1 class="focal">Creating New Reservation</h1>

<div class="nonfocal">
    <h3>Process Form:</h3>
</div>
<form method="get" id="advancedSearchForm" action="/{$configModule}/search">
    {include file="findInclude:common/templates/formList.tpl" advancedFields=$formFields}
    <div class="formbuttons">
        {include file="findInclude:common/templates/formButtonSubmit.tpl" buttonTitle="Search"}
    </div>
</form>

{include file="findInclude:common/templates/footer.tpl"}
