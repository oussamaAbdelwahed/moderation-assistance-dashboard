<?php
return [
	'GET_COUNTS_QUERY' => "SELECT (SELECT COUNT(*) FROM users) as USERS_COUNT,(SELECT COUNT(*) FROM posts) as POSTS_COUNT"
];
?>
