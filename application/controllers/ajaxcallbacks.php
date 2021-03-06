<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');

/* nextSIS person controller
 *
 * PURPOSE 
 * This is the controller which handles the functionality related to people stored by the system.
 * 
 * LICENCE 
 * This file is part of nextSIS.
 * 
 * nextSIS is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * 
 * nextSIS is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License along with nextSIS. If not, see
 * <http://www.gnu.org/licenses/>.
 * 
 * Copyright 2012 http://nextsis.org
 */

session_start();

class ajaxcallbacks extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('standings_model');
		$this->load->model('league_model');
		$this->load->model('match_model');
		$this->load->model('team_model');
	}
    
	//fill class dropdown depending on the selected grade level
    public function getClassByGradeLevel()
    {

    	$gradelevel_id = $this->input->post('id');

        $query = $this->schoolclass_model->GetClassByGradeLevel($gradelevel_id);
        
        $classes["-1"]="Select Class";
         
        $options = '<option value="All" selected>All Classes/Groups</option>';

        if($query){
			foreach($query as $row){
            	$options .= '<option value="' . $row->id . '">'.$row->title.'</option>';
        	}

        	echo $options;
        }
        else{
        	echo $options;
    	}
    }

    //fill student dropdown depending on the selected class
    public function getStudentByClass()
    {
        $class_id = $this->input->post('id');

        $query = $this->student_model->GetStudentByClass($class_id);
        
        $students["-1"]="Select Student";
        
        $options = '<option value="All" selected>All Classes/Groups</option>';

        if($query){
			foreach($query as $row){
            	$options .= '<option value="' . $row->id . '">'. $row->first_name . " " . $row->surname .'</option>';
        	}

        	echo $options;
        }
        else{
        	echo $options;
    	}
    }

    public function getSubjectCourses(){
        $subject_id = $this->input->post('subject_id');
        $school_id = $this->input->post('school_id');

        echo $this->subjects_model->GetSubjectCourses($subject_id, $school_id, TRUE);
    }

    public function getZonesByLeague(){
        $league_id = $this->input->post('selLeague');
       	$zones = null;
		$query = $this->league_model->GetLeagueGroups($league_id);
		if($query){
			foreach($query as $row)
			{
				$zones .= '<option value="' . $row->id . '">'. $row->name  .'</option>';
			
			}
			echo $zones;
		}else{
			
			echo $zones;
		}
        
    }    
}