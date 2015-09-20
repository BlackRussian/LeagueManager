<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');

class Standings_model extends CI_Model
{
	function GetStandingsByLeague($id){
		
		// select all the information from the table we want to use with a 10 row limit (for display)
		$query = $this->db->query('select * from `standings` inner join `team` on
							`standings`.team_id = `team`.id inner join `group` on
							`team`.group_id = `group`.id inner join season on
							`group`.season_id = `season`.id where league_id = '.$id.' order by `group`.name asc');
		

   		// run the query and return the result
   		//$query = $this->db->get();
		
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

	function GetStandingsByGroup($id){
		
		// select all the information from the table we want to use with a 10 row limit (for display)
		$query = $this->db->query('select team.name,team.id,games_played,win,lose,draw,goals_for,goals_against,points, (goals_for-goals_against) as goal_dif  from `standings` inner join `team` on
							`standings`.team_id = `team`.id inner join `group` on
							`team`.group_id = `group`.id inner join season on
							`group`.season_id = `season`.id where group_id = '.$id.' order by `group`.name asc');
		

   		// run the query and return the result
   		//$query = $this->db->get();
		
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