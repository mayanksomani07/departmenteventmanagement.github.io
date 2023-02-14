<?php
include_once 'classes/db1.php';
$result = mysqli_query($conn,"SELECT * FROM staff_coordinator s ,event_info ef ,student_coordinator st,events e where e.event_id= ef.event_id and e.event_id= s.event_id and e.event_id= st.event_id");
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Event_id', 'Location'],
          <?php
          $query = "SELECT * FROM event_info";
          $res = mysqli_query($conn,$query);
          while($row=mysqli_fetch_array($res))
          {
            $event_id=$row['event_id'];
            $Date=$row['Date'];
            ?>
            ['<?php echo $event_id;?>',<?php echo $Date?>],
            <?php
          }
          ?>
        ]);

        var options = {
          chart: {
            title: 'Location of Event',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>
