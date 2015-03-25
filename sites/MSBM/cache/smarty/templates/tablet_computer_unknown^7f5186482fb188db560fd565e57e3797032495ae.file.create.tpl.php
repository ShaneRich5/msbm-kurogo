<?php /* Smarty version Smarty-3.0.7, created on 2015-03-25 00:09:21
         compiled from "/home/fearon/msbm-kurogo/sites/MSBM/app/modules/bookings/templates/create.tpl" */ ?>
<?php /*%%SmartyHeaderCode:954346541551234f1e62478-09442834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f5186482fb188db560fd565e57e3797032495ae' => 
    array (
      0 => '/home/fearon/msbm-kurogo/sites/MSBM/app/modules/bookings/templates/create.tpl',
      1 => 1427254924,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '954346541551234f1e62478-09442834',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<div class="nonfocal">
    <h1>Submit Booking Request</h1>
</div>


<form action="create" method="post">

    <div class="focal">
        <?php if ($_smarty_tpl->getVariable('error')->value){?>
            <div class="focal"><?php echo $_smarty_tpl->getVariable('error')->value;?>
</div>
        <?php }?>
        <div class="focal">
            <label for="event-name">Booking Title: </label>
            <input id="event-name" type="text" name="event-name">
        </div>

        <h1>Date</h1>

        <div class="focal">
            <label for="start-date-day">On: </label>
            <input id="start-date-day" type="number" name="start-date-day" min="1" max="31"
                   value="<?php echo $_smarty_tpl->getVariable('day')->value;?>
"><span> / </span>
            <input id="start-date-month" type="number" name="start-date-month" min="1" max="12"
                   value="<?php echo $_smarty_tpl->getVariable('month')->value;?>
"><span> / </span>
            <input id="start-date-year" type="number" name="start-date-year" min="2000" max="3000"
                   value="<?php echo $_smarty_tpl->getVariable('year')->value;?>
">
        </div>

        <h1>Start</h1>

        <div class="focal">
            <label for="start-date-hour">At: </label>
            <input id="start-date-hour" placeholder="HH" type="number" name="start-date-hour" min="1" max="12" width="20px" width="10px">
            <span> : </span>
            <input id="start-date-minute" value="00" type="number" name="start-date-minute" step="30" min="0" max="30" width="10px">

            <input type="radio" name="start-date-am-pm" value="AM" checked="true">AM
            <input type="radio" name="start-date-am-pm" value="PM">PM
        </div>

        <h1>Duration</h1>

        <div class="focal">
            <input type="radio" name="event-duration" value="2" checked="true">2 hours
            <input type="radio" name="event-duration" value="4">4 hours
        </div>

        <p>
            Created by: <?php echo $_smarty_tpl->getVariable('email')->value;?>

        </p>

        <p>
            <label for="event-location">Location: </label>
            <select id="event-location" name="event-location">
                <?php  $_smarty_tpl->tpl_vars['location'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('locations')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['location']->key => $_smarty_tpl->tpl_vars['location']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['location']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['location']->value['name'];?>
</option>
                <?php }} ?>
            </select>
        </p>
        <p>
            <input type="submit" value="Book">
            <input type="reset" value="Clear">
        </p>
    </div>

</form>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>