<?php
/*
	Plugin Name: Update Option Error
	Description: TEST PLUGIN
	Version: 1.0.0
	Author: <a href="https://github.com/lkarinja">Leejae Karinja</a>
	License: GPL3
	License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

/*
	Update Option Error
	Copyright (C) 2017 Leejae Karinja

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// Prevents execution outside of core WordPress
if(!defined('ABSPATH')){
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit;
}

if(!class_exists('Update_Option_Error')){
	class Update_Option_Error
	{
		public function __construct()
		{
			//ob_start();
			// This should trigger on page load
			add_action('init', array($this, 'init'));
		}

		public function init()
		{
			// Try to get the option 'test_option'
			$test_option = get_option('test_option');

			echo "<script>alert('Option is set to: $test_option');</script>"; //DEBUG

			// If 'get_option' returned false (Meaning the option was not created yet)
			if($test_option === false){
				echo "<script>alert('Option was not set');</script>"; //DEBUG

				// Create the option 'test_option' and set it to 'Foo'
				update_option('test_option', 'Foo');
				// Now try to get the option again (It should be 'Foo')
				$test_option = get_option('test_option');

				echo "<script>alert('Option is now set to: $test_option');</script>"; //DEBUG
			// If 'get_option' returned something other than false (Meaning the option was set to something)
			}else{
				// If 'test_option' is set to 'Foo'
				if($test_option === 'Foo'){
					echo "<script>alert('Option is Foo');</script>"; //DEBUG

					// Update the option's value to 'Bar'
					update_option('test_option', 'Bar');
					// Now try to get the option again (It should be 'Bar')
					$test_option = get_option('test_option');

					echo "<script>alert('Option is now set to: $test_option');</script>"; //DEBUG
				// If 'test_option' is set to 'Bar'
				}elseif($test_option === 'Bar'){
					echo "<script>alert('Option is Bar');</script>"; //DEBUG

					// Update the option's value to 'Foo'
					update_option('test_option', 'Foo');
					// Now try to get the option again (It should be 'Foo')
					$test_option = get_option('test_option');

					echo "<script>alert('Option is now set to: $test_option');</script>"; //DEBUG
				}
			}
		}
	}
	$update_option_error = new Update_Option_Error();
}

