<?php /* Smarty version Smarty-3.0.7, created on 2015-03-18 18:11:34
         compiled from "/home/fearon/msbm-kurogo/sites/MSBM/app/modules/courses/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9465988605509f8168d7166-03163888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0e6bc0e6cdf4f75c1f01350e802be1b46c91e4f' => 
    array (
      0 => '/home/fearon/msbm-kurogo/sites/MSBM/app/modules/courses/templates/index.tpl',
      1 => 1426359654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9465988605509f8168d7166-03163888',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<h2 class="focal">Login</h2>
<div class="focal">
    <form action="index" method="post">
        <p>
            <label for="username">Username: </label>
            <input id="username" type="text" name="username">
        </p>

        <p>
            <label for="password">Password: </label>
            <input id="password" type="password" name="password">
        </p>
        <p>
            <input type="submit" value="Login">
        </p>
    </form>

</div>
<?php if ($_smarty_tpl->getVariable('error')->value){?>
    <div class="focal"><?php echo $_smarty_tpl->getVariable('error')->value;?>
</div>
<?php }?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>