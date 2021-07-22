<?php
return [
	"GET_LAST2DAYS_COUNTS_QUERY" => "
	     SELECT 
		 
			(SELECT COUNT(DISTINCT ps.post_id) FROM post_signals as ps JOIN posts as p 
			ON ps.post_id = p.id WHERE DATE(ps.created_at) BETWEEN 
			':start_date' AND ':end_date') as NBR_SIGNALED_POSTS, 
		 
			(SELECT COUNT(DISTINCT us.signaled_id) FROM user_signals as us JOIN blog_users as bu 
			ON us.signaled_id = bu.id WHERE DATE(us.created_at) BETWEEN 
			':start_date' AND ':end_date') as NBR_SIGNALED_PROFILES,
			
			(SELECT COUNT(*) FROM topics as t where DATE(t.created_at) 
			BETWEEN ':start_date' AND ':end_date') as NBR_CREATED_TOPICS,
			
			(SELECT COUNT(*) FROM sessions as s where DATE(s.opened_on) 
			BETWEEN ':start_date' AND ':end_date') as NBR_OPENED_SESSIONS
	",


	"GET_LAST7DAYS_COUNTS_QUERY" => "
         SELECT DATE(created_at) AS DAY,COUNT(*) as NBR_IN_THE_DAY, 1 SET_ORDER FROM post_signals 
		 WHERE DATE(created_at) BETWEEN ':start_date' AND ':end_date' GROUP BY DATE(created_at) 

         UNION ALL 

         SELECT DATE(created_at) AS DAY,COUNT(*) as NBR_IN_THE_DAY,2 SET_ORDER FROM user_signals 
		 WHERE DATE(created_at) BETWEEN ':start_date' AND ':end_date' GROUP BY DATE(created_at) 

		 UNION ALL

		 SELECT DATE(voted_on) as DAY,SUM(weight) as NBR_IN_THE_DAY,3 SET_ORDER FROM weight_votes as wv 
		 INNER JOIN posts as p ON wv.post_id = p.id WHERE DATE(voted_on) 
		 BETWEEN ':start_date' AND ':end_date'
		 GROUP BY wv.post_id,DATE(voted_on) 
		 HAVING NBR_IN_THE_DAY > 100 

         ORDER BY SET_ORDER,DAY
	"
];
//SELECT post_id,sum(weight) as total_votes from weight_votes as wv INNER JOIN posts as p ON wv.post_id = p.id GROUP BY wv.post_id HAVING total_votes > 100 ORDER BY post_id
?>
