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
