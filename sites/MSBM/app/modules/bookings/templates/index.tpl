{include file="findInclude:common/templates/header.tpl"}
<h2>Login</h2>
<div class="focal">
    <form action="all" method="POST">
        <p>
            <label for="email">Email: </label>
            <input id="email" type="email" name="email">
        </p>
        <p>
            <label for="moodle_id">Moodle ID:</label>
            <input id="moodle_id" type="text" name="moodle_id">
        </p>
        <p>
            <label for="password">Password: </label>
            <input id="password" type="password" name="password">
        </p>
    </form>
</div>
{include file="findInclude:common/templates/footer.tpl"}
