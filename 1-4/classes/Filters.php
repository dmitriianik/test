<?php
	class Filters {
		
		public array $division = [];
		public array $different;
		private string $filterKey;
		private string $filterVar;
		
		
		function __construct() {
		
			// handy anyways
		}
		
		
		public function arrayFilter($dataArray, $key) {
			
			$this->different = [];
			$this->filterKey = $key;
			
			$returnArray = array_values(array_filter($dataArray, [$this, 'indentFilter']));
			$this->division = []; // for repeat
			
			return $returnArray;
		}
		
		
		public function arraySort($dataArray, $key) {
			
			$this->filterKey = $key;
			$keysArray = array_map([$this, 'getKeys'], $dataArray);
			$sortArray = array_combine($keysArray , $dataArray);
			ksort($sortArray, SORT_NATURAL);
			
			return array_values($sortArray);
		}
		
		
		public function arrayFromKey($dataArray, $key, $var) {
			
			$this->filterKey = $key;
			$this->filterVar = $var;
			
			$getArray = array_map([$this, 'getFromKey'], $dataArray);
			$getArray = array_filter($getArray, function($element) {
				return !empty($element);
			});
			
			return array_values($getArray);
		}
		
		
		public function arrayChange($dataArray, $key, $var) {
			
			$this->filterKey = $key;
			$this->filterVar = $var;
			
			return array_values(array_map([$this, 'getChange'], $dataArray));
		}
		
		
		private function indentFilter($var) {
			
			$returnVal = (in_array($var[$this->filterKey], $this->division)) ? false : true;
			
			if (!$returnVal) $this-> different[] = $var;
			$this->division[] = $var[$this->filterKey];
			
			return $returnVal;
		}
		
		
		private function getKeys($var) {
			
			return $var[$this->filterKey];
		}
		
		
		private function getFromKey($var) {
			
			if (isset($var[$this->filterKey]) and $var[$this->filterKey] == $this->filterVar)
				return $var;
			else 
				return null;
		}
		
		
		private function getChange($var) {
			
			return [$var[$this->filterKey] => $var[$this->filterVar]];
			
		}
	
	
	}
	
	