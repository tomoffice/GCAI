<?php
function level_process($member_id)
{
	$xp = query_state_xp($member_id);
	$p_level = $xp/60;
	$p_level = floor($p_level);
	update_state_p_level($p_level,$member_id);
}

?>