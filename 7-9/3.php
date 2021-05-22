<?php 
	// Adapter pattern
	
	class MysqlApi
	{
		public function insertData(array $data) {}
		public function selectData(array $data) {}
		
	}
	
	class OutApi
	{	
		public function putData(string $param1, string $param2) {}
		public function getData(string $param1) {}
		
	}
	
	
	interface Store
	{
		public function saveKey(string $key, string $userName);
		public function getKey(string $userName);
	}
	
	
	class MysqStore implements Store {
		
		private $My;
		
		public function __construct(MysqlApi $My)
		{
			$this->mysql = $My;
		}
		
		public function saveKey(string $key, string $userName)
		{
			$data = [$key, $userName];
			$this->My->insertData($data);
		}
		
		public function getKey(string $userName)
		{
			$data = [$userName];
			$this->My->selectData($data);
		}
		
	}
	
	
	class OutStore implements Store {
		
		private $Out;
		
		public function __construct(OutApi $Out)
		{
			$this->mysql = $Out;
		}
		
		public function saveKey(string $key, string $userName)
		{
			$this->Out->putData($key, $userName);
		}
		
		public function getKey(string $userName)
		{
			$this->Out->getData($userName);
		}
		
	}
	
	
	
	class Concept  {
		
		private $client;
		public  $Store; // mb array
		
		public function __construct(Store $Store, $client) {
			$this->client = $client;
			$this->Store = $Store;
		}
		
		public function getUserData($userName, $password) {
			$params = [
				'auth' => [$userName, $password],
				'token' => $this->getSecretKey($userName)
			];
			
			// someting work
		}
		
		public function getSecretKey($userName){
			$this->Store->getKey($userName);
		}
		
	}
	
	