<?php
/*
 * Plugin Name: Board Connector
 * Plugin URI: https://tarosky.co.jp
 * Description: The Board intergration
 * Version: nightly
 * Author: Tarosky INC. <info@tarosky.co.jp>
 * Author URI: https://tarosky.co.jp/
 * License: GPL3 or later
 */


require_once __DIR__ . '/src/Tarosky/BoardConnector/Commands/TestApi.php';
require_once __DIR__ . '/src/Tarosky/BoardConnector/Service/Request.php';

// Authorization: Bearer API-TOKEN
// x-api-key: API-KEY

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	WP_CLI::add_command( 'board', \Tarosky\BoardConnector\Commands\TestApi::class );
}
