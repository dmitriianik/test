	
	Задание 5. Решение:
	
	SELECT DISTINCT goods.id, goods.name FROM goods_tags
	join goods On goods.id = goods_id
	ORDER BY goods.id ASC
	
	Задание 6. Решение:
	
	SELECT `department_id` FROM `evaluations`
	WHERE `gender`> 0
	group by `department_id`
	HAVING min(`value`)> 5
	
	