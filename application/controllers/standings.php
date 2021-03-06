<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');


class Standings extends CI_Controller
{
	var $viewdata = null;


	function _remap($method, $params = array()){
    	if (method_exists($this, $method))
    	{
        	return call_user_func_array(array($this, $method), $params);
    	}else{
        	$this->index($method);
        }
	}

	function __construct()
	{
		parent::__construct();
	}

	function index($league_id){
			$this->load->model('standings_model');
			$this->load->model('league_model');
			$this->load->model('match_model');
			
			$league = $this->league_model->GetLeague($league_id);

			$groups = $this->league_model->GetLeagueGroups($league_id);
			
			$todays_matches = $this->match_model->GetTodaysMatches($league_id);
 			
 			$this->load->view('header');
			
			$this->viewdata['groups'] = $groups;

			$this->viewdata['matches'] = $todays_matches;
 			$this->viewdata['league_name'] = $league->name;
 			$this->load->view('standings_view', $this->viewdata);

			$this->load->view('footer');
	}
}
?>