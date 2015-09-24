<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');

class League_model extends CI_Model
{
	function GetLeague($league_id){

		$this->db->select('id, name')->from('league')->where('id', $league_id);

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
	//Get all leagues
	function GetAllLeague(){

		$this->db->select('id, name')->from('league');

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
	function GetLeagueGroups($league_id){
		
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