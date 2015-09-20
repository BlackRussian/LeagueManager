<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');

class Match_model extends CI_Model
{
	function GetTodaysMatches($league_id){
		//
		// select all the information from the table we want to use with a 10 row limit (for display)
		$query = $this->db->query("select away_standings.rank as away_rank, away_standings.rank as home_rank, home_group.name home_group_name, away_group.name away_group_name, hometeam.name as hometeam_name,awayteam.name as awayteam_name from `match` inner join team as hometeam on 
									`match`.home_team  = hometeam.id inner join team as awayteam on `match`.away_team  = awayteam.id
									inner join `group` as home_group on hometeam.group_id = home_group.id 
									inner join `group` as away_group on awayteam.group_id = away_group.id
									inner join `standings` as away_standings on awayteam.id = away_standings.team_id
									inner join `standings` as home_standings on hometeam.id = home_standings.team_id
										where date = '".date('Y-m-d')."' and hometeam.league_id = ".$league_id);
		
		// proceed if records are found
   		if($query->num_rows()>0)
   		{
			// return the data (to the calling controller)
			return $query->result();
   		}
		else
		{
			// there are no records
			return FALSE;
		}
	}
}

?>