<?php
include_once 'classes/db1.php';
$result = mysqli_query($conn,"SELECT * FROM staff_coordinator s ,event_info ef ,student_coordinator st,events e where e.event_id= ef.event_id and e.event_id= s.event_id and e.event_id= st.event_id");
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
  </head>
  <body>
    <div id="calendar_basic" style="width: 1000px; height: 350px;"></div>
  </body>
</html>