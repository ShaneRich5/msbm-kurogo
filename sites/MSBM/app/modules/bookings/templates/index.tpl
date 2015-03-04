{include file="findInclude:common/templates/header.tpl"}
<<<<<<< HEAD
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
    <h1>
        {$logi}
    </h1>
</div>
=======

<h1 class="focal">Faculty Room Booking</h1>
{include file="findInclude:common/templates/navlist.tpl" navlistItems=$links}

>>>>>>> 25b343a13fc716e7260d91bef4a131e352775f1e
{include file="findInclude:common/templates/footer.tpl"}
