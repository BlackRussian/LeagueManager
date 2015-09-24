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
	
	// The add function adds a person
	function add()
	{
		$this->load->model('standings_model');
		$this->load->model('league_model');
		$this->load->model('match_model');
		$this->load->model('team_model');
		//if($this->session->userdata('logged_in')) // user is logged in
		//{
			// get session data
			//$session_data = $this->session->userdata('logged_in');
			
			// set the data associative array that is sent to the home view (and display/send)
			
			//$this->viewdata['username'] = $session_data['username'];
			$this->load->helper(array('form', 'url')); // load the html form helper
			//$this->lang->load('person'); // default language option taken from config.php file 
			//$this->viewdata['genders'] = $this->person_model->GetPersonGender(1);
			$this->viewdata['league'] = $this->league_model->GetAllLeague();
			$this->viewdata['page_title'] = "Add a Team";
			//$this->viewdata['zone'] = $this->league_model->GetLeagueGroups($leagueid);	
			$this->load->view('Team/add', $this->viewdata);
		//}
		//else // not logged in - redirect to login controller (login page)
		//{
		//	redirect('login','refresh');
		//}
	}
}
?>