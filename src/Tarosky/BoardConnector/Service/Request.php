<?php

namespace Tarosky\BoardConnector\Service;


class Request {

	protected $api_key = 'VRQrBZa7BDuBEv09zorE2juuCV9rxm1azXSMXCah';
	protected $api_token = '993fda19aae815a1064ab5a28ec2cd88e5f32c69';
	protected $end_point = 'https://api.the-board.jp';

	/**
	 * Add header to wp_remote_xx
	 *
	 * @param array $headers Header array.
	 * @return array
	 */
	protected function get_header( $headers = [] ) {
		return array_merge( $headers, [
			sprintf( 'Authorization: Bearer %s', $this->api_token ),
			sprintf( 'x-api-key: %s', $this->api_key ),
		] );
	}

	protected function request_arguments( $args ) {
		$headers = $args['headers'] ?? [];
		$args['headers'] = $this->get_header( $headers );
		return array_merge( $args, [
			'user-agent' => sprintf( 'WordPress/BoardConnector/1.0, %s', home_url() ),
		] );
	}

	protected function build_url( $endpoint, $query_params = [] ) {
		return $this->end_point . '/' . ltrim( $endpoint . '/' );
	}

	/**
	 * @param $endpoint
	 * @param $query_params
	 *
	 * @return array|\WP_Error
	 */
	public function get( $endpoint, $query_params = [] ) {
		$args = $this->request_arguments( [] );
		$response = wp_remote_get( $this->build_url( $endpoint, $query_params ), $this->request_arguments( [] ) );
		if ( is_wp_error( $response ) ) {
			return $response;
		}
		return json_decode( $response['body'], true );
	}
}
