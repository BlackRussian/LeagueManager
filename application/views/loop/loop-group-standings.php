<div class="row">
    <div class="col-md-12 no-gutter">
    <div class="table-responsive stats-table">
        <h3 style="padding-left:15px">Group <?php echo $group->name;?></h3>
        <table class="table table-condensed stats-table">
            <thead>
                <tr>
                    <th style="text-align:left;width:25px;text-align:center">#</th>
                    <th style="width:140px;">Team</th>
                    <th style="width:25px;">GP</th>
                    <th style="width:25px">W</th>
                    <th style="width:25px">D</th>
                    <th style="width:25px">L</th>
                    <th style="width:25px">GF</th>
                    <th style="width:25px">GA</th>
                    <th style="width:25px">GD</th>
                    <th style="width:25px">PTS</th>
                </tr>
            </thead>
            <tbody>
                <?php if($results) { foreach($results as $row) { ?>
                    <tr>
                        <td style="text-align:center"></td>
                        <td><a href="/team/<?php echo $row->id;?>"><?php echo $row->name;?></a></td>
                        <td><?php echo $row->games_played;?></td>
                        <td><?php echo $row->win;?></td>
                        <td><?php echo $row->draw;?></td>
                        <td><?php echo $row->lose;?></td>
                        <td><?php echo $row->goals_for;?></td>
                        <td><?php echo $row->goals_against;?></td>
                        <td><?php echo $row->goal_dif;?></td>
                        <td><?php echo $row->points;?></td>
                    </tr>
                <?php } } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>