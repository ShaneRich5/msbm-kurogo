
{include file="findInclude:common/templates/header.tpl"}
{foreach $contentList as $key => $section}
    {if $course}
        <p class="focal">{$section['id']} {$section['shortname']} {$section['fullname']} {$section['usercount']} {$section['idnumber']}</p>
    {/if}
{/foreach}
{include file="findInclude:common/templates/footer.tpl"}