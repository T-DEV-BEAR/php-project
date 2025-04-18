<?php
/**
 * Smarty plugin
 *
 *    Smarty
 * @subpackage PluginsModifierCompiler
 */
/**
 * Smarty count_characters modifier plugin
 * Type:     modifier
 * Name:     count_characters
 * Purpose:  count the number of characters in a text
 *
 * @link   https://www.smarty.net/manual/en/language.modifier.count.characters.php count_characters (Smarty online
 *         manual)
 * @author Uwe Tews
 *
 * @param array $params parameters
 *
 * @return string with compiled code
 */
function smarty_modifiercompiler_count_characters($params)
{
    if (!isset($params[ 1 ]) || $params[ 1 ] !== 'true') {
        return 'preg_match_all(\'/[^\s]/' . Smarty::$_UTF8_MODIFIER . '\',' . $params[ 0 ] . ', $tmp)';
    }
    if (Smarty::$_MBSTRING) {
        return 'mb_strlen((string) ' . $params[ 0 ] . ', \'' . addslashes(Smarty::$_CHARSET) . '\')';
    }
    // no MBString fallback
    return 'strlen((string) ' . $params[ 0 ] . ')';
}
