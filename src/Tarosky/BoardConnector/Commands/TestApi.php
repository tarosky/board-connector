<?php

namespace Tarosky\BoardConnector\Commands;


use Tarosky\BoardConnector\Service\Request;

/**
 * Test API Connection
 */
class TestApi extends \WP_CLI_Command {

	/**
	 * Test credentials.
	 *
	 * @return void
	 */
	public function credential() {
		$service = new Request();
		$result = $service->get( '/v1/projects', [
			'order_status_in' => '4',
			'created_at_gteq' => '2022-08-01 00:00:00',
		] );
		if ( is_wp_error( $result ) ) {
			\WP_CLI::error( $result->get_error_message() );
		}
		print_r( $result );
	}
}
