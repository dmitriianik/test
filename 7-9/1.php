<?php
	
	class SomeObject {
		
		protected $name, $myHandle;
		static $handleId = 0;
	
		public function __construct(string $name) {
			$this->name = $name;
		}
		
		public static function getHandleId() {
			
			self::$handleId = self::$handleId + 1;
			return self::$handleId;
		}
		
		public function getObjectName() { 
			return $this->name;
		}
		
		public function getObjectHandle() {
			
			if (empty($this->myHandle))
				$this->myHandle = "handle_object_". self::getHandleId();
			
			return $this->myHandle;
		}
	}
	
	
	class SomeObjectsHandler {
		public function __construct() { }
	
		public function handleObjects(array $objects): array {
			$handlers = [];
			
			foreach ($objects as $object)
				$handlers[] = $object->getObjectHandle();
			
			return $handlers;
		}
	}
	
	$objects = [
		new SomeObject('object_1'),
		new SomeObject('object_2'),
		new SomeObject('object_a'),
		new SomeObject('object_b'),
	];
	
	$soh = new SomeObjectsHandler();
	print_r($soh->handleObjects($objects));
	
	