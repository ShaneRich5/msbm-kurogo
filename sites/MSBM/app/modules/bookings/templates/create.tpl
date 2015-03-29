{include file="findInclude:common/templates/header.tpl"}

<div class="nonfocal">
    <h1>Submit Booking Request</h1>
</div>


<form action="create" method="post">

    <div class="focal">
        {if $error}
            <div class="focal">{$error}</div>
        {/if}
        <div class="focal">
            <label for="event-name">Booking Title: </label>
            <input id="event-name" type="text" name="event-name">
        </div>

        <h1>Date</h1>

        <div class="focal">
            <label for="start-date-day">On: </label>
            <input id="start-date-day" type="number" name="start-date-day" min="1" max="31"
                   value="{$day}"><span> / </span>
            <input id="start-date-month" type="number" name="start-date-month" min="1" max="12"
                   value="{$month}"><span> / </span>
            <input id="start-date-year" type="number" name="start-date-year" min="2000" max="3000"
                   value="{$year}">
        </div>

        <h1>Start</h1>

        <div class="focal">
            <label for="start-date-hour">At: </label>
            <input id="start-date-hour" placeholder="HH" type="number" name="start-date-hour" min="1" max="12" width="20px" width="10px">
            <span> : </span>
            <input id="start-date-minute" value="00" type="number" name="start-date-minute" step="30" min="0" max="30" width="10px">

            <input type="radio" name="start-date-am-pm" value="AM" checked="true">AM
            <input type="radio" name="start-date-am-pm" value="PM">PM
        </div>

        <h1>Duration</h1>

        <div class="focal">
            <input type="radio" name="event-duration" value="1" checked="true">1 hour    
            <input type="radio" name="event-duration" value="2">2 hours    
            <input type="radio" name="event-duration" value="4">4 hours
        </div>

        <p>
            Created by: {$email}
            {*<label for="moodle-email">Created by: </label>*}
            {*<input type="email" id="moodle-email" name="moodle-email" value="{$email}" readonly>*}
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
    </div>

</form>

<form action="logout" method="post">
    <input type="submit" value="Logout">
</form>

{include file="findInclude:common/templates/footer.tpl"}