<div class="row">
    <div class="col-md-6">
        <header class="stats-header">
            <h1><?php echo $league_name;?></h1>
            <h3>Group Standings</h3>
        </header>
        <?php 
            foreach ($groups as $group) {
                
                $this->viewdata['group'] = $group;
                
                $results = $this->standings_model->GetStandingsByGroup($group->id);
                
                $this->viewdata['results'] = $results;
                
                $this->load->view('loop/loop-group-standings', $this->viewdata);
            }
        ?>
	</div>
    <div class="col-md-6">
        <header class="stats-header">
            <h1>Todays Fixtures</h1>
            <h3>&nbsp;</h3>
        </header>
        <?php 
            if($matches){
                echo "<table class='table matches'>";
                foreach ($matches as $match) {
                    $this->load->view('loop/loop-matches.php', $match);
                }
                echo "</table>";
            }else{
                echo "<p>No Fixtures for Today</p>";
            }
        ?>
    </div>
</div>