/**
 * @version 1.0
 * @package Email Reminders
 * @subpackage JS Variables
 * @category Scripts
 * 
 * @author wpdevelop
 * @link http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2014.05.20
 */

////////////////////////////////////////////////////////////////////////////////
// Eval specific variable value (integer, bool, arrays, etc...)
////////////////////////////////////////////////////////////////////////////////

function oper_define_var( oper_global_var ) {
    if (oper_global_var === undefined) { return null; }
    else { return JSON.parse(oper_global_var); }                          //FixIn:6.1       //FixIn:1.0.3.1
}

////////////////////////////////////////////////////////////////////////////////
// Define global Email Reminders Varibales based on Localization
////////////////////////////////////////////////////////////////////////////////
// var oper_today = oper_define_var( oper_global1.oper_today );