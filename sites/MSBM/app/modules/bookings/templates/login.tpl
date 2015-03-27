{include file = "findInclude:common/templates/header.tpl"}
<h2 class="focal">Login</h2>
<div class="focal">
    <form action="index" method="post">
        <p>
            <label for="username">Username: </label>
            <input id="username" type="text" name="username">
        </p>

        <p>
            <label for="password">Password: </label>
            <input id="password" type="password" name="password">
        </p>

        <p>
            <label for="student-type">Program: </label>
            <input type="radio" name="student-type" id="student-type" value="U" checked="true">Undergrad
            <input type="radio" name="student-type" id="student-type" value="M">Masters
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