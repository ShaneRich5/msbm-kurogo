<?php /* Smarty version Smarty-3.0.7, created on 2015-03-19 19:18:25
         compiled from "/home/fearon/msbm-kurogo/sites/MSBM/app/modules/bookings/templates/details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1316358820550b5941f10333-84265121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd35a50daf49bc188909374f01aa6eafc1264e2b6' => 
    array (
      0 => '/home/fearon/msbm-kurogo/sites/MSBM/app/modules/bookings/templates/details.tpl',
      1 => 1426718727,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1316358820550b5941f10333-84265121',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<div class="focal">
    <h1>
        Event Name: <?php echo $_smarty_tpl->getVariable('event_name')->value;?>
 <small>by <?php echo $_smarty_tpl->getVariable('creator_name')->value;?>
, <?php echo $_smarty_tpl->getVariable('creator_email')->value;?>
</small>
    </h1>

    <div>
        <h2>
            Location: <?php echo $_smarty_tpl->getVariable('event_location')->value;?>

        </h2>
    </div>
    <div>
        <h2>Starts</h2>
        <p>at <?php echo $_smarty_tpl->getVariable('start_time')->value;?>
 on <?php echo $_smarty_tpl->getVariable('start_date')->value;?>
</p>
    </div>
    <div>
        <h2>Ends</h2>
        <p>at <?php echo $_smarty_tpl->getVariable('end_time')->value;?>
 on <?php echo $_smarty_tpl->getVariable('end_date')->value;?>
</p>
    </div>

</div>

<form action="<?php echo $_smarty_tpl->getVariable('delete_url')->value;?>
" method="post">
    <input type="submit" value="Delete">
</form>
<form action="<?php echo $_smarty_tpl->getVariable('create_url')->value;?>
" method="get">
    <input type="submit" value="Create Event">
</form>
<form action="<?php echo $_smarty_tpl->getVariable('index_url')->value;?>
" method="get">
    <input type="submit" value="All Bookings">
</form>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>