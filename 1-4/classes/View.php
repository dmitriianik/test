<?php
	class View{
		
		private $shab;
		private $replacer;
		private string $content = '';
		
		
		function __construct($shab, $replacer) {
			
			$this->shab = $shab;
			$this->replacer = $replacer;
		}
		
		
		public function showLine($vars, $line) {
			
			foreach ($vars as $var){
				
				$var = (is_string($var)) ? $var : json_encode($var);
				$pos = ($pos ?? 0) + 1;
				$line[0] = str_replace("{$line[1]}{$pos}", $var, $line[0]);
			}
			
			$this->content .= $line[0];
		}
		
		
		public function showAll($content) {
			
			if (is_array($content)){
				
				foreach ($content as $line)
					$this->showLine(...$line);
				
				$this->showEnd();
			}
			
			return false;
		}
		
		
		public function showEnd() {
			
			echo str_replace($this->replacer, $this->content, $this->shab);
		}
		
	}
	
	