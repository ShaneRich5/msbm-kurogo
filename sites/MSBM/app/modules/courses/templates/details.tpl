{include file="findInclude:common/templates/header.tpl"}

{foreach $contentList as $content}
    <h1 class="focal">{$content['section_name']}</h1>

    <div class="focal">
    <ul class="results">
        {foreach $content['section_details'] as $item}
            <li>
                {$item['name']}
                {$item['contents']}
            </li>
        {/foreach}
    </ul>
    </div>
{/foreach}

{include file="findInclude:common/templates/footer.tpl"}