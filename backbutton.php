<?php
/**
 * @version             $Id: backbutton.php wojsmol 2011-06-20 13:31:00 wojsmol$
 * Based on http://tushev.org/articles/programming/18-how-to-create-an-editor-button-editors-xtd-plugin-for-joomla
 * @package             Joomla
 * @subpackage  System
 * @copyright   Copyright (C) Wojciech Smoliñski, 2011. All rights reserved.
 * @license     GNU GPL v2.0
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */
 
 // no direct access
defined( '_JEXEC' ) or die;
jimport( 'joomla.plugin.plugin' );
class plgButtonBackbutton extends JPlugin {
    /**
     * Constructor
     *
     *
     * @param     object $subject The object to observe
     * @param     array  $config  An array that holds the plugin configuration
     * @since 1.5
     */
    function __construct(& $subject, $config)
    {
        parent::__construct($subject, $config);
		$this->loadLanguage();
    }
    function onDisplay($name)
    {
        $js =  "                      
 function backbuttonXTDButtonClick(editor) {         
                              jInsertEditorText('{backbutton}', editor);
		}";
        $doc = JFactory::getDocument();
        $doc->addScriptDeclaration($js);
		
        $button = new JObject();
        $button->set('modal', false);
		$button->set('class', 'btn');
		$button->set('link', '#');
        $button->set('text', JText::_('EBBBNAME'));
		$button->set('name', 'backbuttonButton');
		$button->set('onclick', 'backbuttonXTDButtonClick(\''.$name.'\');return false;');
		
        return $button;
    }
}
?>
