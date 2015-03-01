{include file="findInclude:common/templates/header.tpl"}

{foreach $contentList as $content}
    <h1 class="focal">{$content['section_name']}</h1>

    <div class="focal">

    {include file="findInclude:common/templates/results.tpl" results=$content['section_details']}
        {*{foreach $content['section_details'] as $item}*}
            {*<li>*}
                {*{$item['name']}*}
                {*{$item['url'].$item['token']}*}
            {*</li>*}
        {*{/foreach}*}

    </div>
{/foreach}
<form action="logout" method="post">
    <input type="submit" value="Logout">
</form>
{include file="findInclude:common/templates/footer.tpl"}