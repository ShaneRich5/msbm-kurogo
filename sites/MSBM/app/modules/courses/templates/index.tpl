
{include file="findInclude:common/templates/header.tpl"}
{*<h1 class="focal">{$message}</h1>*}
{*<h2 class="focal">{$token}</h2>*}
<h3 class="focal">{$info}</h3>
<h1 class="focal">My Courses</h1>
{*<h2 class="focal">{$course[0]['id']}</h2>*}
{foreach $coursesList as $key => $course}
    {if $course}
        <p class="focal">{$course['url']} {$course['id']} {$course['shortname']} {$course['fullname']} {$course['usercount']} {$course['idnumber']} <a href="{$course['url']}">link</a></p>
    {/if}
{/foreach}
{include file="findInclude:common/templates/footer.tpl"}