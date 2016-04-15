<?php
if (!defined("CMS_VERSION")) { header("HTTP/1.0 404 Not Found"); die(""); }

if (!class_exists("commandIncDragDropMod")) {
    class commandIncDragDropMod extends driverCommand {

        public static function runMe(&$params, $debug = true) {
            $path = driverCommand::run('modGetPath', array('name' => 'pharinix_mod_drag_drop'));
            
            echo '<script src="'.CMS_DEFAULT_URL_BASE.$path['path'].'js/jquery.nestable.js"></script>';
            echo '<script src="'.CMS_DEFAULT_URL_BASE.$path['path'].'js/jquery-ui.js"></script>';
            //echo '<script src="'.CMS_DEFAULT_URL_BASE.$path['path'].'js/nestedSorteable.js"></script>';
            echo '<script src="'.CMS_DEFAULT_URL_BASE.$path['path'].'js/jquery.mjs.nestedSortable.js"></script>';
            
            //echo '<link href="'.CMS_DEFAULT_URL_BASE.$path['path'].'css/jquery-ui.min.css" rel="stylesheet">';
            echo '<link href="'.CMS_DEFAULT_URL_BASE.$path['path'].'css/dragdrop.css" rel="stylesheet">';
        }

        public static function getHelp() {
            return array(
                "package" => "pharinix_mod_drag_drop",
                "description" => __("Print dragdrop mod HTML includes "), 
                "parameters" => array(), 
                "response" => array(),
                "type" => array(
                    "parameters" => array(), 
                    "response" => array(),
                ),
                "echo" => true
            );
        }
        
        public static function getAccess($ignore = "") {
            $me = __FILE__;
            return parent::getAccess($me);
        }
        
        public static function getAccessFlags() {
            return driverUser::PERMISSION_FILE_ALL_EXECUTE;
        }
    }
}
return new commandIncDragDropMod();