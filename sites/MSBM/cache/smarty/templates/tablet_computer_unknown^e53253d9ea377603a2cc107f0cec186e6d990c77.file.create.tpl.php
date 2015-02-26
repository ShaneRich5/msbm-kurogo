<?php /* Smarty version Smarty-3.0.7, created on 2015-02-26 00:27:04
         compiled from "C:\\MAMP\\htdocs\\msbm\\sites\\MSBM\\app\\modules\\bookings\\templates\\create.tpl" */ ?>
<?php /*%%SmartyHeaderCode:535354eeaea887c6d9-17511095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e53253d9ea377603a2cc107f0cec186e6d990c77' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\sites\\\\MSBM\\\\app\\\\modules\\\\bookings\\\\templates\\\\create.tpl',
      1 => 1424928423,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '535354eeaea887c6d9-17511095',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<h1 class="focal">Book</h1>
<h1 class="focal"><?php $_template = new Smarty_Internal_Template("findInclude:common/templates/listItem.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('item',$_smarty_tpl->getVariable('nav')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?></h1>


<div class="focal">
    <form action="/all">
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

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
