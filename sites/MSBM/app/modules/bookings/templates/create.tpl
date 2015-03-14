{include file="findInclude:common/templates/header.tpl"}

<div class="focal">
    <h1>Create an event</h1>

    <form action="create" method="post">
        <h2>ID: {$id}</h2>
        <p>
            <label for="event-name">Name: </label>
            <input id="event-name" type="text" name="event-name">
        </p>
        <h2>Start</h2>
        <p>
            <label for="start-date">Date: </label>
            <input id="start-date" type="date" name="start-date">
        </p>
        <p>
            <label for="start-time">Time: </label>
            <input id="start-time" type="time" name="start-time">
        </p>
        <h2>End</h2>
        <p>
            <label for="end-date">Date: </label>
            <input id="end-date" type="date" name="end-date">
        </p>
        <p>
            <label for="end-time">Time: </label>
            <input id="end-time" type="time" name="end-time">
        </p>
        <p>
            <label for="event-creator">Created by: </label>
            <input id="event-creator" type="text" name="event-creator">
        </p>
        <p>
            <label for="event-location">Location: </label>
            <select id="event-location" name="event-location">
                {foreach $locations as $location}
                    <option value="{$location['name']}">{$location['name']}</option>
                {/foreach}
            </select>
        </p>
        <p>
            <input type="submit" value="Book">
            <input type="reset" value="Clear">
        </p>

    </form>

</div>

{include file="findInclude:common/templates/footer.tpl"}