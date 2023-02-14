<?php
include_once 'classes/db1.php';
$sub_sql="";
$toDate=$fromDate="";
if(isset($_POST['submit'])){
	$from=$_POST['from'];
	$fromDate=$from;
	$fromArr=explode("/",$from);
	$from=$fromArr['2'].'-'.$fromArr['1'].'-'.$fromArr['0'];
	$from=$from." 00:00:00";
	
	$to=$_POST['to'];
	$toDate=$to;
	$toArr=explode("/",$to);
	$to=$toArr['2'].'-'.$toArr['1'].'-'.$toArr['0'];
	$to=$to." 23:59:59";
  $res=mysqli_query($conn,"SELECT * FROM staff_coordinator s ,event_info ef ,student_coordinator st,events e where e.event_id= ef.event_id and e.event_id= s.event_id and e.event_id= st.event_id and ef.Date >= '$from' && ef.Date <= '$to' order by ef.event_id desc");
}
else
{
  $res = mysqli_query($conn,"SELECT * FROM staff_coordinator s ,event_info ef ,student_coordinator st,events e where e.event_id= ef.event_id and e.event_id= s.event_id and e.event_id= st.event_id");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact Us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>(function(w, d) { w.CollectId = "63e0fdafdbdefebfff0f4f9d"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>
</head>
<body>
<?php include 'utils/adminHeader.php'?>
<div class="container">
  <br/><h1>Event_Details</h1><br/>
  
  <div>
	<form method="post">
		<label for="from">From</label>
		<input type="text" id="from" name="from" required value="<?php echo $fromDate?>">
		<label for="to">to</label>
		<input type="text" id="to" name="to" required value="<?php echo $toDate?>">
		<input type="submit" name="submit" value="Filter">
	</form>
  </div>
  <br/><br/>
  <?php if(mysqli_num_rows($res)>0){?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Event_Name</th>
        <th>No. of Participants</th>
        <th>Student Coordinator</th>
		<th>Staff Coordinator</th>
    <th>Date</th>
    <th>Time</th>
    <th>Location</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row=mysqli_fetch_assoc($res)){?>
      <tr>
        <td><?php echo $row['event_title']?></td>
        <td><?php echo $row['participents']?></td>
        <td><?php echo $row['st_name']?></td>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['Date']?></td>
		<td><?php echo $row['time']?></td>
		<td><?php echo $row['location']?></td>
        <td>          
        <a class="delete" href="deleteEvent.php?id='.$row['event_id'].'">Delete</a>
        </td>
      </tr>
	  <?php } ?>
    </tbody>
  </table>
  <?php } else {
	echo "No data found";  
  }
  ?>
   <a class="btn btn-default" href = "createEventForm.php">Create Event</a>
   <a class="btn btn-default" href = "https://form.jotform.com/223483161101443">Create Event Report</a>
</div>
<script>
  $( function() {
    var dateFormat = "dd/mm/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
		  dateFormat:"dd/mm/yy",
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
		dateFormat:"dd/mm/yy",
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>
  
  <?php require 'utils/footer.php'; ?>
</body>
</html>