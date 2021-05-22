<?php 
	
	interface xmlHttpServiceInterface
	{
		public function request($url, $type, array $options = []);
	}
	
	
	class XMLHTTPRequestService { }
	
	
	class XMLHttpService extends XMLHTTPRequestService implements xmlHttpServiceInterface { 
		
		public function request($url, $type, array $options = []) { }
	}
	
	
	class HttpRequest {
		private $service;
		
		public function __construct(xmlHttpServiceInterface $xmlHttpService) {
			
			$this->service = $xmlHttpService;
		}
		
		public function get(string $url, array $options) {
			$this->service->request($url, 'GET', $options);
		}
		
		public function post(string $url) {
			$this->service->request($url, 'GET');
		}
	}
	
	