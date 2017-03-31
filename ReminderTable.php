<h1>Reminders</h1>
<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    include("connection.php");

                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $result = mysqli_query($db,"SELECT * FROM `ViewReminder` WHERE u_id=".$_SESSION['id']." ORDER BY status DESC , end_date,time; ");
          
            
            if(mysqli_fetch_array($result)){
                echo "

                <div class='table-responsive'>
                <table class = 'table table-striped table-bordered table-hover'>
                <caption>
                    
                    
                    
                    <div class='row' style='margin-left:2px;'>
                    <div class='col-md-5ths col-xs-6'>
                    <span style='background-color: #DFF0D8; padding:10px; border: 1px dashed #9d9090; border-radius: 5px;'>Active Reminders </span>
                    </div>
                    <div class='col-md-5ths col-xs-6'>
                    <span style='background-color: #F2DEDE;  padding:10px; border: 1px dashed #9d9090; border-radius: 5px;'>Canceled Reminders</span>
                    </div>
                    <div class='col-md-5ths col-xs-6'>
                    <span style='background-color: #D9EDF7;  padding:10px; border: 1px dashed #9d9090; border-radius: 5px;'><button class='btn btn-xs btn-success glyphicon glyphicon-ok'></button>  Send Reminders</span>
                    </div>
                    <div class='col-md-5ths col-xs-6'>
                    <span style='background-color: #FCF8E3;  padding:10px; border: 1px dashed #9d9090; border-radius: 5px; margin-top:3px;'> <button class='btn btn-xs btn-warning   glyphicon glyphicon-calendar'></button> Yearly/Monthly Reminders</span>
                    </div>
                    
                    </div>
                    
                    </div>

                </caption>
                <thead>
                <tr>
                    <th class='col-xs-1'>Sr.no</th>
                    <th class='col-xs-1'>Type</th>        
                    <th class='col-xs-1 text-center'>Remind After</th>
                    <th class='col-xs-1 text-center'>Event Date</th>   
                    <th class='col-xs-5'>Message</th>
                    <th class='col-xs-1 text-center'>Action</th>
                    
                    </tr>
                    </thead>
                        
                        <tbody>";
                    
                    $count=1;           
            $stmt = $connection->query("SELECT * FROM `ViewReminder` WHERE u_id=".$_SESSION['id']." ORDER BY status DESC , end_date,time;");

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                   
               
                        switch($row['status']){
                            case "NOT SEND":
                                 echo "<tr class = 'success'>";
                                break;
                                
                            case "CANCLED":
                                 echo "<tr class = 'danger'>";
                                break;
                                
                            case "GONE":
                                 echo "<tr class = 'info'>";
                                break;
                                
                            case "AYEAR":
                                echo "<tr class = 'warning' >";
                                break;
                                
                            case "BMONTH":
                                echo "<tr class = 'warning' >";
                                break;
                                
                        }
                  
                        echo "<td>" . $count . "</td>";
  
                   
                        $icon = "glyphicon-ice-lolly-tasted";
                        switch($row['type']){
                            case "BirthDay":
                                $icon = "glyphicon-gift";
                                break;
                             case "Anniversary":
                                $icon = "glyphicon-heart";
                                break;
                             case "Party":
                                $icon = "glyphicon-flash";
                                break;
                             case "Event":
                                $icon = "glyphicon-bullhorn";
                                break;
                             case "Special Day":
                                $icon = "glyphicon-record";
                                break;
                             case "Exam":
                                $icon = "glyphicon-education";
                                break;
                             case "Appointment":
                                $icon = "glyphicon-ok";
                                break;
                             case "Vaccations":
                                $icon = "glyphicon-flag";
                                break;
                             case "DeadLine":
                                $icon = "glyphicon-screenshot";
                                break;
                            case "Work":
                                $icon = "glyphicon-cog";
                                break;
                            case "Travelling Date":
                                $icon = "glyphicon-plane";
                                break;
                            case "Other":
                                $icon = "glyphicon-asterisk";
                                break;
 
                                
                        }
                        echo "<td> <span class='glyphicon ".$icon."'></span>".
                                                    "    ".$row['type'] . "</td>";
                        
                        
                        $start_date=date_create($row['start_date']);
                        $end_date=date_create($row['end_date']);
                        
                        if($start_date == $end_date){
                               
                             echo "<td class='text-center'>" ."<button class='btn btn-xs btn-primary glyphicon glyphicon-minus'></button>". "</td>";
                             echo "<td class='text-center' >" .date_format($end_date,"d F"). "</td>";
                        }else{
                        echo "<td class='text-center'>" . date_format($start_date,"d F"). "</td>";
                        echo "<td class='text-center'>" .date_format($end_date,"d F"). "</td>";
                        }
                        echo "<td >" . $row['message'] . "</td>";
                        
                         echo "<td class='text-center'>";
                        
                        if($row['status'] == "NOT SEND"){
                             
                        echo '<button type="button" value="'.$row['r_id'].'" class="btn btn-xs btn-danger glyphicon glyphicon-remove cancelReminder"></button>';
                        } 
                        else if($row['status'] == "GONE"){
                             echo '<button class="btn btn-xs btn-success glyphicon glyphicon-ok"></button>';
                        }
                        else if($row['status'] == "AYEAR"){
                             echo '<button type="button" value="'.$row['r_id'].'" class="btn btn-xs btn-danger glyphicon glyphicon-remove cancelReminder"></button> <button class="btn btn-xs btn-warning glyphicon glyphicon-calendar"></button> 
                             <button class="btn btn-xs btn-primary"> Yearly </button>';
                        }
                        else if($row['status'] == "BMONTH"){
                             echo '<button type="button" value="'.$row['r_id'].'" class="btn btn-xs btn-danger glyphicon glyphicon-remove cancelReminder"></button> <button class="btn btn-xs btn-warning glyphicon glyphicon-calendar"></button> 
                             <button class="btn btn-xs btn-primary">Monthly</button>';
                        }
                            
                        echo "</td>"; 
                        
                        echo "</tr>"; $count++; 
                    } 
                echo "</tbody>
                    </table>
                    </div>";

                
            }else{
                echo "<div class='row'>
            <div class='col-md-5 col-md-offset-4'>
            <h1 class='jumbotron center-block' style='width:100%; height:100%;'><span class='glyphicon glyphicon-time'></span>  No reminder Set</h1>
            </div>
                </div>
                ";
            }
            
            
                
                ?>

    <script>
        $('button.cancelReminder').click(function (e) {
            var rID = $(this).val();

            swal({
                    title: "Are you sure?",
                    text: "Your Reminder will be cancled",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Cancel it!",
                    closeOnConfirm: false
                },
                function () {

                    $.post('tableDelReminder.php', {
                        postrID: rID
                    }, function (data) {
                        if (data == 'Success') {
                            swal({
                                title: 'Reminder Cancled',
                                text: 'Please Refresh',
                                type: 'success',
                                showConfirmButton: true,
                                
                            });
                        }
                    });

                });



        });
    </script>