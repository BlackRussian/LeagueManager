<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');

class Team_model extends CI_Model
{
	function GetTeam($team_id){

		$this->db->select('id, name')->from('team')->where('id', $team_id);

   		// run the query and return the result
   		$query = $this->db->get();
		
		// proceed if records are found
   		if($query->num_rows()>0)
   		{
			// return the data (to the calling controller)
			return $query->row();
   		}
		else
		{
			// there are no records
			return FALSE;
		}
	}

	function GetTeamNextMatch($team_id){
		
		// select all the information from the table we want to use with a 10 row limit (for display)
		$query = $this->db->query('select `group`.name,`group`.id from `group` inner join season on
							`group`.season_id = `season`.id where league_id = '.$league_id.' order by `group`.name asc');
		
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

	function GetTeamMatches($team_id){
		
		// select all the information from the table we want to use with a 10 row limit (for display)
		$query = $this->db->query('select `group`.name,`group`.id from `group` inner join season on
							`group`.season_id = `season`.id where league_id = '.$league_id.' order by `group`.name asc');
		
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