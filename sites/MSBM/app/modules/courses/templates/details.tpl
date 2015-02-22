{include file="findInclude:common/templates/header.tpl"}

{foreach $contentList as $content}
    <h1 class="focal">{$content['section_name']}</h1>

    <ul class="results">
        {foreach $content['section_details'] as $item}
            <li>
                {$item['name']}
            </li>
        {/foreach}
    </ul>
{/foreach}





{include file="findInclude:common/templates/results.tpl" results=$contentList}
{include file="findInclude:common/templates/footer.tpl"}