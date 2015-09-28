	<div class="row-fluid">
		<?php //echo $this->load->view('templates/breadcrumb.php');?>
          			<fieldset>
                  		<?php $this->load->view('shared/display_errors');?>
                  		<legend><?php echo $page_title;?></legend>
                  		<?php echo form_open('Team/addrecord', 'method="post" class="form-horizontal"'); ?>
                  		
                  			              
		                 <div class="control-group">
			                <label class="control-label" for="selLeague">Select League</label>
			                <div class="controls">
			                  <?php echo form_dropdown('selLeague', $league->name,'','id="selLeague"'); ?>
			                </div>
			              </div>
			               <div class="control-group">
			                <label class="control-label" for="selZone">Select Zone/Group</label>
			                <div class="controls">
			                 <select name="selZone" id="selZone">
			                 	<option value="">Select</option>
			                 </select>
			                </div>
			              </div>
					
						<div class="control-group">
							<label class="control-label" for="selGradeLevel">Team Name</label>
		                	<div class="controls">
		                      	<?php echo form_input('name',set_value('name')); ?>
		                      	<p class="help-block">Enter the full name of the Team</p>
		                	</div>
		                </div>
              
		                 <div class="form-actions">
		                 	<a href="/Team/" class="btn"> <i class="icon-chevron-left icon-black"></i>Cancel</a>
		                 	<?php echo form_submit('submit','submit','class="btn btn-primary"'); ?>
							<?php echo form_close(); ?>
		                 </div>
                  		
                  	</fieldset>

 <script type="text/javascript">  
                  $(document).ready(function() {  
                     $("#selLeague").change(function(){  
                     /*dropdown post *///  
                     $.ajax({  
                        url:"<?php echo  
                        base_url();?>ajaxcallbacks/getZonesByLeague",  
                        data: {id:  ""<?php echo $selLeague ?>",
                        type: "POST",  
                        success:function(data){  
                        $("#selZone").html(data);  
                     }  
                  });  
               });  
            });  
         </script>  
<!--<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable').dataTable( {
			"processing": true,
        	"serverSide": true,
        	"ajax": {"url":"<?php echo base_url(); ?>ajaxcallbacks/getPersonsBySchool","type":"POST", "data":{"school_id":"<?php echo $school_id?>", "role_id":"<?php echo $filter?>"}},
        	"columns":[
        				{"data":"first_name"},
        				{"data":"middle_name"},
        				{"data":"surname"},
        				{"data":"common_name"},
        				{"data":"username"},
        				{"data":"roles", "sortable":false, "searchable":false},
        				{"data":"edit","sortable":false, "searchable":false}
        				<?php if($filter && ($filter=="3" || $filter=="2"))
        				{
							echo ',{"data":"assign", "sortable":false, "searchable":false}';
						}
						if($filter && $filter=="3"){
							echo ',{"data":"reports", "sortable":false, "searchable":false}';
						}
				?>
        	]
		} );
	} );
</script>-->


  
  