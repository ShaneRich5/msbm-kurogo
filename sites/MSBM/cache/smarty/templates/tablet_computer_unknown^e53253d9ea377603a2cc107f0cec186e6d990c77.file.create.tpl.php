<?php /* Smarty version Smarty-3.0.7, created on 2015-03-20 15:32:53
         compiled from "C:\\MAMP\\htdocs\\msbm\\sites\\MSBM\\app\\modules\\bookings\\templates\\create.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5552550c75e56c83e7-59644211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e53253d9ea377603a2cc107f0cec186e6d990c77' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\sites\\\\MSBM\\\\app\\\\modules\\\\bookings\\\\templates\\\\create.tpl',
      1 => 1426879970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5552550c75e56c83e7-59644211',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<div class="nonfocal">
    <h1>New Event</h1>
</div>


<form action="create" method="post">

    <div class="focal">
        <div class="focal">
            <label for="event-name">Name: </label>
            <input id="event-name" type="text" name="event-name">

            <br>

            <label for="moodle-email">Created by: </label>
            <input type="email" id="moodle-email" name="moodle-email" value="<?php echo $_smarty_tpl->getVariable('email')->value;?>
" readonly>
        </div>

        <h1>Date</h1>

        <div class="focal">
            <label for="start-date-day">On: </label>
            <input id="start-date-day" type="number" name="start-date-day" min="1" max="31"
                   placeholder="DD"><span> / </span>
            <input id="start-date-month" type="number" name="start-date-month" min="1" max="12"
                   placeholder="MM"><span> / </span>
            <input id="start-date-year" type="number" name="start-date-year" min="2000" max="3000"
                   placeholder="YYYY">
        </div>

        <h1>Start</h1>

        <div class="focal">
            <label for="start-date-hour">At: </label>
            <input id="start-date-hour" placeholder="HH" type="number" name="start-date-hour" min="1" max="12" width="20px" width="10px">
            <span> : </span>
            <input id="start-date-minute" placeholder="MM" type="number" name="start-date-minute" min="0" max="59" width="10px">

            <select id="start-date-am-pm" name="start-date-am-pm">
                <option value="AM">A.M.</option>
                <option value="PM">P.M.</option>
            </select>

        </div>

        <h1>End</h1>

        <div class="focal">
            <label for="end-date-hour">Hour: </label>
            <input id="end-date-hour" placeholder="HH" type="number" name="end-date-hour" min="1" max="12" width="10px">
            <span> : </span>
            <input id="end-date-minute" placeholder="MM" type="number" name="end-date-minute" min="0" max="59" width="10px">
            <select id="end-date-am-pm" name="end-date-am-pm">
                <option value="AM">A.M.</option>
                <option value="PM">P.M.</option>
            </select>
        </div>

        <p>
            <label for="moodle-email">Created by: </label>
            <input type="email" id="moodle-email" name="moodle-email" value="<?php echo $_smarty_tpl->getVariable('email')->value;?>
" readonly>
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