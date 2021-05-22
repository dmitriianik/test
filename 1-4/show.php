<?php 
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
	spl_autoload_register(function ($class_name) {require "classes/{$class_name}.php";});
	
	$View   = New View(file_get_contents('data/shab.html'), '%content');
	$Filter = New Filters();
	
	$startArray = [
	['id'=> 1, 'date' => "12.01.2020", 'name' => "test1", 'age' => 21],
	['id'=> 2, 'date' => "02.05.2020", 'name' => "test2", 'age' => 31],
	['id'=> 2, 'date' => "08.03.2020", 'name' => "test4", 'age' => 33],
	['id'=> 1, 'date' => "22.01.2020", 'name' => "test1", 'age' => 24],
	['id'=> 7, 'date' => "06.06.2020", 'name' => "test3", 'age' => 25],
	['id'=> 6, 'date' => "11.11.2020", 'name' => "test4", 'age' => 21],
	['id'=> 9, 'date' => "06.07.2021", 'name' => "test3", 'age' => 49],
	];
	
	$line = ['<p><b>%var2</b> <br/>%var1</p>', '%var'];
	$line2 = ['<p>%var1</p>', '%var'];
	$content = [];
	
	// Задание 1 (массив без дубликатов по определённому ключу, дубликаты отдельно):
	
	$content[] = [[$Filter-> arrayFilter($startArray, 'id'), 'Задание 1:'], $line];
	$content[] = [[$Filter-> different], $line2]; 
	
	// Задание 2 (сортировка по ключу 'age'):
	
	$content[] = [[$Filter-> arraySort($startArray, 'age'), 'Задание 2:'], $line];
	
	// Задание 3 (выборка по ключу 'age' = '21'):
	
	$content[] = [[$Filter-> arrayFromKey($startArray, 'age', '21'), 'Задание 3:'], $line];
	
	// Задание 4 (Изменение массива 'name' => 'id'):
	
	$content[] = [[$Filter-> arrayChange($startArray, 'name', 'id'), 'Задание 4:'], $line];
	
	$View->showAll($content);
	
	