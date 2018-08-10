<?php 

/**
 * PHP Views
 *
 * A simple view controller for PHP
 *
 * @copyright  2018 M. Pedroni
 * @license    http://www.zend.com/license/3_0.txt   PHP License 3.0
 * @version    Release: 1.0.0
 * @link       https://github.com/pedr0ni/views
 * @author M. Pedroni <pedr0ni@icloud.com>
 */ 

namespace ViewManager;

class View {

	/**
	 * Get the view as String
	 *
	 * @param String $Name Filename
	 * @param Array $Params = [] List of params to replace in View
	 * 
	 * @return String The view
	 */ 
    public static function getView($Name, $Params = []) {
        $Lines = file(self::getPath($Name)); // @returns 
        return self::renderView($Lines, $Params);
    }

	/**
	 * Render the view
	 *
	 * @param String $Lines The line array of file
	 * @param Array $Params = [] The params to replace in View
	 * 
	 * @return String Pre-rendered view
	 */ 
    public static function renderView($Lines, $Params) {
        $Find = array_keys($Params);
        $Key = array();
        
        foreach ($Find as $Keys) array_push($Key, '{{'.$Keys.'}}');

        $Value = array_values($Params);
        $Root = '';
        foreach ($Lines as $Line) {
            if (strpos($Line, '{{include:')) {
                $result = explode('{{include:', $Line);
                $result = end($result);
                $result = substr($result, 0, strpos($result, '}}'));
                $LinesRender = file(self::getPath($result));
                $Root .= self::renderView($LinesRender, $Params);
            } else {
                $Root .= $Line;
            }
        }

        $View = str_replace($Key, $Value, $Root);
        return $View;
    }

	/**
	 * Get the view path - Change if necessary
	 *
	 * @param String $File Filename
	 * 
	 * @return String View path
	 */ 
    private static function getPath($File) {
        return 'Views/' . $File . '.html';
    }

}