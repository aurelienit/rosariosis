<?php
/*
    Copyright (c) 2005 Steven Armstrong <sa at c-area dot ch>
    Copyright (c) 2009 Danilo Segan <danilo@kvota.net>
    Copyright (c) 2016 Michal Čihař <michal@cihar.com>

    This file is part of MoTranslator.

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along
    with this program; if not, write to the Free Software Foundation, Inc.,
    51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/

use PhpMyAdmin\MoTranslator\Loader;

if ( ! function_exists( 'setlocale' ) )
{
	/**
	 * Sets a requested locale.
	 *
	 * @param int    $category Locale category, ignored
	 * @param string $locale   Locale name
	 *
	 * @return string Set or current locale
	 */
	function setlocale($category, $locale)
	{
		return Loader::getInstance()->setlocale($locale);
	}
}

if ( ! function_exists( 'bindtextdomain' ) )
{
	/**
	 * Sets the path for a domain.
	 *
	 * @param string $domain Domain name
	 * @param string $path   Path where to find locales
	 */
	function bindtextdomain($domain, $path)
	{
		Loader::getInstance()->bindtextdomain($domain, $path);
	}
}

/**
 * Sets the path for a domain.
 *
 * @param string $domain Domain name
 * @param string $path   Path where to find locales
 */
function _bindtextdomain($domain, $path)
{
	Loader::getInstance()->bindtextdomain($domain, $path);
}

if ( ! function_exists( 'bind_textdomain_codeset' ) )
{
	/**
	 * Dummy compatibility function, MoTranslator assumes
	 * everything is using same character set on input and
	 * output.
	 *
	 * Generally it is wise to output in UTF-8 and have
	 * mo files in UTF-8.
	 *
	 * @param mixed $domain  Domain where to set character set
	 * @param mixed $codeset Character set to set
	 */
	function bind_textdomain_codeset($domain, $codeset)
	{
	}
}

if ( ! function_exists( 'textdomain' ) )
{
	/**
	 * Sets the default domain.
	 *
	 * @param string $domain Domain name
	 */
	function textdomain($domain)
	{
		Loader::getInstance()->textdomain($domain);
	}
}

if ( ! function_exists( 'gettext' ) )
{
	/**
	 * Translates a string.
	 *
	 * @param string $msgid String to be translated
	 *
	 * @return string translated string (or original, if not found)
	 */
	function gettext($msgid)
	{
		return Loader::getInstance()->getTranslator()->gettext(
			$msgid
		);
	}
}

if ( ! function_exists( '_' ) )
{
	/**
	 * Translates a string, alias for _gettext.
	 *
	 * @param string $msgid String to be translated
	 *
	 * @return string translated string (or original, if not found)
	 */
	function _($msgid)
	{
		return Loader::getInstance()->getTranslator()->gettext(
			$msgid
		);
	}
}

if ( ! function_exists( 'ngettext' ) )
{
	/**
	 * Plural version of gettext.
	 *
	 * @param string $msgid       Single form
	 * @param string $msgidPlural Plural form
	 * @param int    $number      Number of objects
	 *
	 * @return string translated plural form
	 */
	function ngettext($msgid, $msgidPlural, $number)
	{
		return Loader::getInstance()->getTranslator()->ngettext(
			$msgid, $msgidPlural, $number
		);
	}
}

if ( ! function_exists( 'pgettext' ) )
{
	/**
	 * Translate with context.
	 *
	 * @param string $msgctxt Context
	 * @param string $msgid   String to be translated
	 *
	 * @return string translated plural form
	 */
	function pgettext($msgctxt, $msgid)
	{
		return Loader::getInstance()->getTranslator()->pgettext(
			$msgctxt, $msgid
		);
	}
}

if ( ! function_exists( 'npgettext' ) )
{
	/**
	 * Plural version of pgettext.
	 *
	 * @param string $msgctxt     Context
	 * @param string $msgid       Single form
	 * @param string $msgidPlural Plural form
	 * @param int    $number      Number of objects
	 *
	 * @return string translated plural form
	 */
	function npgettext($msgctxt, $msgid, $msgidPlural, $number)
	{
		return Loader::getInstance()->getTranslator()->npgettext(
			$msgctxt, $msgid, $msgidPlural, $number
		);
	}
}

if ( ! function_exists( 'dgettext' ) )
{
	/**
	 * Translates a string.
	 *
	 * @param string $domain Domain to use
	 * @param string $msgid  String to be translated
	 *
	 * @return string translated string (or original, if not found)
	 */
	function dgettext($domain, $msgid)
	{
		return Loader::getInstance()->getTranslator($domain)->gettext(
			$msgid
		);
	}
}


if ( ! function_exists( 'dngettext' ) )
{
	/**
	 * Plural version of gettext.
	 *
	 * @param string $domain      Domain to use
	 * @param string $msgid       Single form
	 * @param string $msgidPlural Plural form
	 * @param int    $number      Number of objects
	 *
	 * @return string translated plural form
	 */
	function dngettext($domain, $msgid, $msgidPlural, $number)
	{
		return Loader::getInstance()->getTranslator($domain)->ngettext(
			$msgid, $msgidPlural, $number
		);
	}
}

if ( ! function_exists( 'dpgettext' ) )
{
	/**
	 * Translate with context.
	 *
	 * @param string $domain  Domain to use
	 * @param string $msgctxt Context
	 * @param string $msgid   String to be translated
	 *
	 * @return string translated plural form
	 */
	function dpgettext($domain, $msgctxt, $msgid)
	{
		return Loader::getInstance()->getTranslator($domain)->pgettext(
			$msgctxt, $msgid
		);
	}
}


if ( ! function_exists( 'dnpgettext' ) )
{
	/**
	 * Plural version of pgettext.
	 *
	 * @param string $domain      Domain to use
	 * @param string $msgctxt     Context
	 * @param string $msgid       Single form
	 * @param string $msgidPlural Plural form
	 * @param int    $number      Number of objects
	 *
	 * @return string translated plural form
	 */
	function dnpgettext($domain, $msgctxt, $msgid, $msgidPlural, $number)
	{
		return Loader::getInstance()->getTranslator($domain)->npgettext(
			$msgctxt, $msgid, $msgidPlural, $number
		);
	}
}