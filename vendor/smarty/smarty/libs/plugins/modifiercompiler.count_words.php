<?php
/**
 * Smarty plugin
 *
 *    Smarty
 * @subpackage PluginsModifierCompiler
 */
/**
 * Smarty count_words modifier plugin
 * Type:     modifier
 * Name:     count_words
 * Purpose:  count the number of words in a text
 *
 * @link   https://www.smarty.net/manual/en/language.modifier.count.words.php count_words (Smarty online manual)
 * @author Uwe Tews
 *
 * @param array $params parameters
 *
 * @return string with compiled code
 */
function smarty_modifiercompiler_count_words($params)
{
    if (Smarty::$_MBSTRING) {
        // return 'preg_match_all(\'#[\w\pL]+#' . Smarty::$_UTF8_MODIFIER . '\', ' . $params[0] . ', $tmp)';
        // expression taken from http://de.php.net/manual/en/function.str-word-count.php#85592
        return 'preg_match_all(\'/\p{L}[\p{L}\p{Mn}\p{Pd}\\\'\x{2019}]*/' . Smarty::$_UTF8_MODIFIER . '\', ' .
               $params[ 0 ] . ', $tmp)';
    }
    // no MBString fallback
    return 'str_word_count((string) ' . $params[ 0 ] . ')';
}
