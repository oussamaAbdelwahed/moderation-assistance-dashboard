<?php
return [
	'GET_LAST2DAYS_COUNTS_QUERY' => "
	     select 
		 
			(select count(ps.post_id) from post_signals as ps JOIN posts as p 
			ON ps.post_id = p.id WHERE DATE(ps.created_at) BETWEEN 
			':start_date' AND ':end_date') as NBR_SIGNALED_POSTS, 
		 
			(select count(us.user_id) from user_signals as us JOIN blog_users as bu 
			ON us.user_id = bu.id WHERE DATE(us.created_at) BETWEEN 
			':start_date' AND ':end_date') as NBR_SIGNALED_PROFILES,
			
			(select count(*) from topics as t where DATE(t.created_at) 
			BETWEEN ':start_date' AND ':end_date') as NBR_CREATED_TOPICS,
			
			(select count(*) from sessions as s where DATE(s.opened_on) 
			BETWEEN ':start_date' AND ':end_date') as NBR_OPENED_SESSIONS
	"
];
?>
