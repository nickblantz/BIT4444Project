<?php
require_once("api_config.php");

class YelpConnector {
	private $curl;
	
	/**
	 * Constructor
	 */
	function __construct(){
		try {
			$this->curl = curl_init();
			curl_setopt_array($this->curl, array(
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'GET',
				CURLOPT_HTTPHEADER => array(
					'authorization: Bearer ' . API_KEY,
					'cache-control: no-cache',
				)
			));
			
			if ($this->curl === false) throw new Exception(curl_error($this->curl), curl_errno($this->curl));
		} catch(Exception $e) {
			trigger_error(sprintf(
				'Curl failed with error #%d: %s',
				$e->getCode(),
				$e->getMessage()),
				E_USER_ERROR
			);
		}
	}
	
	/**
	 * Destructor
	 */
	function __destruct() {
		curl_close($this->curl);
		unset($this->curl);
	}
	
	/** 
	 * Makes a request to the Yelp API and returns the response
	 * 
	 * @param	$endpoint	The path of the API after the domain.
	 * @param	$params		Array of query-string parameters.
	 * @return				The JSON response from the request
	 */
	private function request($endpoint, $params = array()) {
		try {
			curl_setopt($this->curl, CURLOPT_URL, API_BASE . $endpoint . http_build_query($params));
			$result = curl_exec($this->curl);
			
			if ($result === false) throw new Exception(curl_error($this->curl), curl_errno($this->curl));
			if (curl_getinfo($this->curl, CURLINFO_HTTP_CODE) != 200) throw new Exception($result, $http_status);
		} catch(Exception $e) {
			trigger_error(sprintf(
				'Curl failed with error #%d: %s',
				$e->getCode(),
				$e->getMessage()),
				E_USER_ERROR
			);
		}
		return json_decode($result, true);
	}
	
	/** 
	 * Searches for restaurants
	 * 
	 * @param	$params		Array of query-string parameters.
	 * @return				The JSON response from the request
	 */
	public function restaurant_search($params = array()) {
		$params['term'] = 'restaurants';
		$params['limit'] = SEARCH_LIMIT;
		return $this->request(SEARCH_ENDPOINT, $params);
	}
	
	/** 
	 * Gets the details about a specified restaurant
	 * 
	 * @param	$params		Array of query-string parameters.
	 * @return				The JSON response from the request
	 */
	public function restaurant_details($id) {
		return $this->request(INFO_ENDPOINT . urlencode($id));
	}
}
?>