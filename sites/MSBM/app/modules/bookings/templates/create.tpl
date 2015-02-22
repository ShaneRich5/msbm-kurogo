{include file = "findInclude:common/templates/header.tpl"}
<h1 class="focal">Book</h1>
<a href="{$item['url']}">{$message}</a>
<h1 class="focal">{include file="findInclude:common/templates/listItem.tpl" item=$nav}</h1>

{*{include file="findInclude:common/templates/formList.tpl" formlistID=$formId advancedFields=$formFields}*}


<div class="focal">
    <form action="/book">
        <p>
            <label for="time_from">From: </label>
            <input id="time_from" type="time" name="from">
        </p>

        <p>
            <label for="time_to">To: </label>
            <input id="time_to" type="time" name="to">
        </p>

        <p>
            <label for="date">Date: </label>
            <input id="date" type="date" name="date">
        </p>

        <p>
            <label for="name">Name: </label>
            <input id="name" type="text" name="name">
        </p>

        <p>
            <input value="Submit" type="submit">
        </p>
    </form>
</div>

{include file="findInclude:common/templates/footer.tpl"}
