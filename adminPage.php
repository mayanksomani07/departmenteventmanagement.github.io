<?php
include_once 'classes/db1.php';
$result = mysqli_query($conn,"SELECT * FROM staff_coordinator s ,event_info ef ,student_coordinator st,events e where e.event_id= ef.event_id and e.event_id= s.event_id and e.event_id= st.event_id");
?>


<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>cems</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Event_id', 'Participant'],
          <?php
          $query = "SELECT * FROM events";
          $res = mysqli_query($conn,$query);
          while($row=mysqli_fetch_array($res))
          {
            $event_id=$row['event_id'];
            $participents=$row['participents'];
            ?>
            ['<?php echo $event_id;?>',<?php echo $participents?>],
            <?php
          }
          ?>
        ]);

      var options = {
        legend: 'none',
        pieSliceText: 'label',
        title: 'No. of Participants in Events',
        pieStartAngle: 100,
      };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
     <script type="text/javascript">
      google.charts.load("current", {packages:["calendar"]});
      google.charts.setOnLoadCallback(drawChart);

   function drawChart() {
       var dataTable = new google.visualization.DataTable();
       dataTable.addColumn({ type: 'date', id: 'Date' });
       dataTable.addColumn({ type: 'number', id: 'Event_id' });
       dataTable.addRows([
        <?php
        $query = "SELECT * FROM event_info";
        $res = mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($res))
        {
            $event_id=$row['event_id'];
            $Date=$row['Date'];
            $Date=explode('-',$Date);
            $day=$Date[2];
            $month=$Date[1];
            $year=$Date[0];
        ?>
          [ new Date(<?php echo $year?>, <?php echo $month?>, <?php echo $day?>), <?php echo $event_id?> ],
        <?php
        }
        ?>
        ]);

       var chart = new google.visualization.Calendar(document.getElementById('calendar_basic'));

       var options = {
         title: "Event Details",
         height: 350,
       };

       chart.draw(dataTable, options);
   }
    </script>
    <script>(function(w, d) { w.CollectId = "63e0fdafdbdefebfff0f4f9d"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>
</head>
    
    <body>
<?php include 'utils/adminHeader.php'?>
 
    
        <div class = "content">
            <div class = "container">
            <h1>Event details</h1>
            <?php
if (mysqli_num_rows($result) > 0) {
?>
                <table class="table table-hover" >
                    <thead>
                        <tr>
                            
                            <th>Event_name</th>
                            <th>No. of Participents</th>
                            <th>Student Co-ordinator</th>
                            <th>Staff Co-ordinator</th>
   
                            <th>Date</th>
                        
                            <th>Time</th>
                            <th>location </th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                     $i=0;
                     while($row = mysqli_fetch_array($result)){
                            echo '<tr>';
                
                   
                             echo '<td>' . $row['event_title'] . '</td>';                    
                            echo '<td>' . $row['participents'] . '</td>';
                            echo '<td>' . $row['st_name'] . '</td>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>'.$row['Date'].'</td>';
                            echo '<td>'.$row['time'].'</td>';
                            echo '<td>'.$row['location'].'</td>';
                            
                            echo '<td>'
                        
                            .'<a class="delete" href="deleteEvent.php?id='.$row['event_id'].'">Delete</a> '
                            .'</td>';
                            echo '</tr>';  

                            
                $i++;
                        }
                      
                        ?>
                    </tbody>
                </table>
<?php
}

?>             
                <a class="btn btn-default" href = "createEventForm.php">Create Event</a><!--register button-->
                <a class="btn btn-default" href = "https://form.jotform.com/223483161101443">Create Event Report</a>
            </div>
        </div>
        <div id="piechart" style="width: 900px; height: 500px;"></div>
        <div id="calendar_basic" style="width: 1000px; height: 350px;"></div>
        <?php require 'utils/footer.php'; ?>
    </body>
</html>
