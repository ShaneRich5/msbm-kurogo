{*{include file="findInclude:common/templates/header.tpl"}*}

{*<h1 class="focal">Room Booking</h1>*}

{*<div class="nonfocal">*}
  {*<h3>Login</h3>*}
{*</div>*}
{*<form method="get" id="advancedSearchForm" action="/{$configModule}/search">*}
  {*{include file="findInclude:common/templates/formList.tpl" advancedFields=$formFields}*}
  {*<div class="formbuttons">*}
    {*{include file="findInclude:common/templates/formButtonSubmit.tpl" buttonTitle="Login"}*}
  {*</div>*}
{*</form>*}
{*{include file="findInclude:common/templates/footer.tpl"}*}

{include file = "findInclude:common/templates/header.tpl"}
<h2 class="focal">Login</h2>
<div class="focal">
    <form action="login" method="post">
        <p>
            <label for="username">Username: </label>
            <input id="username" type="text" name="username">
        </p>

        <p>
            <label for="password">Password: </label>
            <input id="password" type="password" name="password">
        </p>
        <p>
            <input type="submit" value="Login">
        </p>
    </form>

</div>
{if $error}
    <div class="focal">{$error}</div>
{/if}
{include file="findInclude:common/templates/footer.tpl"}