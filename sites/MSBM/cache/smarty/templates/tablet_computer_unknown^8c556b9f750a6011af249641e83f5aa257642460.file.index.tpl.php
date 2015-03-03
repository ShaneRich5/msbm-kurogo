<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 13:42:23
         compiled from "/home/fearon/msbm-kurogo/sites/MSBM/app/modules/bookings/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6003441354f6008fa002c4-52287138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c556b9f750a6011af249641e83f5aa257642460' => 
    array (
      0 => '/home/fearon/msbm-kurogo/sites/MSBM/app/modules/bookings/templates/index.tpl',
      1 => 1425408138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6003441354f6008fa002c4-52287138',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<h2>Login</h2>
<div class="focal">
    <form action="all" method="POST">
        <p>
            <label for="email">Email: </label>
            <input id="email" type="email" name="email">
        </p>
        <p>
            <label for="moodle_id">Moodle ID:</label>
            <input id="moodle_id" type="text" name="moodle_id">
        </p>
        <p>
            <label for="password">Password: </label>
            <input id="password" type="password" name="password">
        </p>
    </form>
</div>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
