{include file="findInclude:common/templates/header.tpl"}

<div class="focal">
    <h1>Create an event</h1>

    <form action="create" method="post">
        <h2>ID: {$id}</h2>
        <p>
            <label for="event-name">Name: </label>
            <input id="event-name" type="text" name="event-name">
        </p>

        <div>
            <h2>Start</h2>
            {*<p>*}
                {*<label for="start-date">Date: </label>*}
                {*<input id="start-date" type="date" name="start-date">*}
            {*</p>*}
            {*<p>*}
                {*<label for="start-time">Time: </label>*}
                {*<input id="start-time" type="time" name="start-time">*}
            {*</p>*}
            <h3>Date</h3>
            <p>
                <label for="start-date-year">Year: </label>
                <input id="start-date-year" type="text" name="start-date-year">
                <label for="start-date-month">Month: </label>
                <input id="start-date-month" type="text" name="start-date-month">
                <label for="start-date-day">Day: </label>
                <input id="start-date-day" type="text" name="start-date-day">
            </p>
            <h3>Time</h3>
            <p>
                <label for="start-date-hour">Hour: </label>
                <input id="start-date-hour" type="text" name="start-date-hour">
                <label for="start-date-minute">Minutes: </label>
                <input id="start-date-minute" type="text" name="start-date-minute">
            </p>
        </div>

        <h2>End</h2>
        <div>
            <h3>Date</h3>
            <p>
                <label for="end-date-year">Year: </label>
                <input id="end-date-year" type="text" name="end-date-year">
                <label for="end-date-month">Month: </label>
                <input id="end-date-month" type="text" name="end-date-month">
                <label for="end-date-day">Day: </label>
                <input id="end-date-day" type="text" name="end-date-day">
            </p>
            <h3>Time</h3>
            <p>
                <label for="end-date-hour">Hour: </label>
                <input id="end-date-hour" type="text" name="end-date-hour">
                <label for="end-date-minute">Minutes: </label>
                <input id="end-date-minute" type="text" name="end-date-minute">
            </p>
        </div>

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