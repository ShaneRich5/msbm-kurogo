<?php /* Smarty version Smarty-3.0.7, created on 2015-02-05 22:09:57
         compiled from "C:\\MAMP\\htdocs\\msbm\\Kurogo-Mobile-Web\\app\\modules\\social\\templates\\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1502954d430856e17c0-22538048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '154b30e5e56dc9bdb5c8cee6a9945e8f6095242c' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\Kurogo-Mobile-Web\\\\app\\\\modules\\\\social\\\\templates\\\\index.tpl',
      1 => 1364684946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1502954d430856e17c0-22538048',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php if ($_smarty_tpl->getVariable('needToAuth')->value){?>
<p class="nonfocal">Some services require authorization before viewing posts</p>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('needToAuth')->value);$_template->assign('subTitleNewline',true); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php }?>


  <?php if (count($_smarty_tpl->getVariable('serviceLinks')->value)>0){?>
      <div class="nonfocal feedlinks">
        <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("FIND_US");?>
</span>
        <?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['service'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('serviceLinks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
 $_smarty_tpl->tpl_vars['service']->value = $_smarty_tpl->tpl_vars['link']->key;
?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['service']->value;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString(strtoupper($_smarty_tpl->tpl_vars['service']->value));?>
</a>
        <?php }} ?>
      </div>
  <?php }?>



    <?php ob_start(); ?>
        <?php if ($_smarty_tpl->getVariable('firstPost')->value['author']){?><span class="author"><?php echo $_smarty_tpl->getVariable('firstPost')->value['author'];?>
</span><?php }?>
        <?php if ($_smarty_tpl->getVariable('firstPost')->value['author']&&$_smarty_tpl->getVariable('firstPost')->value['created']){?> | <?php }?>
        <?php if ($_smarty_tpl->getVariable('firstPost')->value['created']){?><span class="post-date"><?php echo $_smarty_tpl->getVariable('firstPost')->value['created'];?>
</span><?php }?>
    <?php  $_smarty_tpl->assign("listitemSubTitle", ob_get_contents()); Smarty::$_smarty_vars['capture']["listitemSubTitle"]=ob_get_clean();?>
    <?php if (!isset($_smarty_tpl->tpl_vars['firstPost']) || !is_array($_smarty_tpl->tpl_vars['firstPost']->value)) $_smarty_tpl->createLocalArrayVariable('firstPost', null, null);
$_smarty_tpl->tpl_vars['firstPost']->value['title'] = $_smarty_tpl->getVariable('firstPost')->value['body'];?>
    <?php if (!isset($_smarty_tpl->tpl_vars['firstPost']) || !is_array($_smarty_tpl->tpl_vars['firstPost']->value)) $_smarty_tpl->createLocalArrayVariable('firstPost', null, null);
$_smarty_tpl->tpl_vars['firstPost']->value['subtitle'] = $_smarty_tpl->getVariable('listitemSubTitle')->value;?>

    <div class="focal featured <?php echo $_smarty_tpl->getVariable('firstPost')->value['class'];?>
">
        <h3><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("FEATURED_LABEL");?>
</h3>
        <?php $_template = new Smarty_Internal_Template("findInclude:modules/".($_smarty_tpl->getVariable('moduleID')->value)."/templates/postlistItem.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('item',$_smarty_tpl->getVariable('firstPost')->value);$_template->assign('titleTruncate',$_smarty_tpl->getVariable('firstPostTitleTruncate')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    </div>



    <?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('posts')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['post']->key;
?>
        <?php ob_start(); ?>
            <?php if ($_smarty_tpl->tpl_vars['post']->value['author']){?><span class="author"><?php echo $_smarty_tpl->tpl_vars['post']->value['author'];?>
</span><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['post']->value['author']&&$_smarty_tpl->tpl_vars['post']->value['created']){?> | <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['post']->value['created']){?><span class="post-date"><?php echo $_smarty_tpl->tpl_vars['post']->value['created'];?>
</span><?php }?>
        <?php  $_smarty_tpl->assign("listitemSubTitle", ob_get_contents()); Smarty::$_smarty_vars['capture']["listitemSubTitle"]=ob_get_clean();?>
        <?php if (!isset($_smarty_tpl->tpl_vars['posts']) || !is_array($_smarty_tpl->tpl_vars['posts']->value)) $_smarty_tpl->createLocalArrayVariable('posts', null, null);
$_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['index']->value]['title'] = $_smarty_tpl->tpl_vars['post']->value['body'];?>
        <?php if (!isset($_smarty_tpl->tpl_vars['posts']) || !is_array($_smarty_tpl->tpl_vars['posts']->value)) $_smarty_tpl->createLocalArrayVariable('posts', null, null);
$_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['index']->value]['subtitle'] = $_smarty_tpl->getVariable('listitemSubTitle')->value;?>
    <?php }} ?>

    <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/results.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('listitemTemplateFile',"findInclude:modules/".($_smarty_tpl->getVariable('moduleID')->value)."/templates/postlistItem.tpl");$_template->assign('results',$_smarty_tpl->getVariable('posts')->value);$_template->assign('subTitleNewline',true);$_template->assign('titleTruncate',$_smarty_tpl->getVariable('titleTruncate')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>


<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
