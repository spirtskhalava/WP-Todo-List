<?php
/**
 * @package Akismet
 */
/*
Plugin Name: Todo list
Description: My version of Todo list plugin
Version: 1.0
Author: Sandro Pirtskhalava
License: GPLv2 or later
Text Domain: todo
*/
define( 'DIR', plugin_dir_path( __FILE__ ) );
require_once( DIR . 'class.todo.php' );

global $db_version;
$db_version = "1.0";

register_activation_hook(__FILE__, array('Todo_List', 'plugin_activation'));


add_action( 'admin_menu', 'todo_admin_menu', 9 );

function todo_admin_menu() {
	add_menu_page( 'Todo List',
		'Todo List',
		'manage_options', 'todo/view/homepage.php',
		'', 'dashicons-format-aside');
        add_submenu_page('todo/view/homepage.php', 'All Tasks', 'All Tasks', 'manage_options', 'todo/view/list.php', '');
        add_submenu_page('todo/view/homepage.php', 'Add', 'Add', 'manage_options', 'todo/view/new.php', '');
}

