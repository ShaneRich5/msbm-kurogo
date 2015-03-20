{include file="findInclude:common/templates/header.tpl"}

<div class="nonfocal">
    <h1>New Event</h1>
</div>


<form action="create" method="post">

    <div class="focal">
        <div class="focal">
            <label for="event-name">Name: </label>
            <input id="event-name" type="text" name="event-name">

            <br>

            <label for="moodle-email">Created by: </label>
            <input type="email" id="moodle-email" name="moodle-email" value="{$email}" readonly>
        </div>

        <h1>Date</h1>

        <div class="focal">
            <label for="start-date-day">On: </label>
            <input id="start-date-day" type="number" name="start-date-day" min="1" max="31"
                   placeholder="DD"><span> / </span>
            <input id="start-date-month" type="number" name="start-date-month" min="1" max="12"
                   placeholder="MM"><span> / </span>
            <input id="start-date-year" type="number" name="start-date-year" min="2000" max="3000"
                   placeholder="YYYY">
        </div>

        <h1>Start</h1>

        <div class="focal">
            <label for="start-date-hour">At: </label>
            <input id="start-date-hour" placeholder="HH" type="number" name="start-date-hour" min="1" max="12" width="20px" width="10px">
            <span> : </span>
            <input id="start-date-minute" placeholder="MM" type="number" name="start-date-minute" min="0" max="59" width="10px">

            <select id="start-date-am-pm" name="start-date-am-pm">
                <option value="AM">A.M.</option>
                <option value="PM">P.M.</option>
            </select>

        </div>

        <h1>End</h1>

        <div class="focal">
            <label for="end-date-hour">Hour: </label>
            <input id="end-date-hour" placeholder="HH" type="number" name="end-date-hour" min="1" max="12" width="10px">
            <span> : </span>
            <input id="end-date-minute" placeholder="MM" type="number" name="end-date-minute" min="0" max="59" width="10px">
            <select id="end-date-am-pm" name="end-date-am-pm">
                <option value="AM">A.M.</option>
                <option value="PM">P.M.</option>
            </select>
        </div>

        <p>
            <label for="moodle-email">Created by: </label>
            <input type="email" id="moodle-email" name="moodle-email" value="{$email}" readonly>
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

{include file="findInclude:common/templates/footer.tpl"}