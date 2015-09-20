<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');


class Team extends CI_Controller
{

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

	function index($team_id){
			$this->load->model('standings_model');
			$this->load->model('league_model');
			$this->load->model('match_model');
			$this->load->model('team_model');

			$team = $this->team_model->GetTeam($team_id);

 			$this->viewdata['team'] = $team;

 			$this->load->view('header');

			$this->viewdata['matches'] = null;

 			$this->load->view('team_view', $this->viewdata);

			$this->load->view('footer');
	}
}
?>