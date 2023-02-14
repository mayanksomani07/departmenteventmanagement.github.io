<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>cems</title>
        <title></title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        <script>(function(w, d) { w.CollectId = "63e0fdafdbdefebfff0f4f9d"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>
    </head>
    <body>
    <?php require 'utils/adminHeader.php'; ?>
  <form method="POST">
  
  <div class="w3-container"> 
  
  <div class ="content"><!--body content holder-->
            <div class = "container">
                <div class ="col-md-6 col-md-offset-3">
                <label>Event ID:</label><br>
    <input type="number" name="event_id" pattern = "\d" required class="form-control"><br><br>
    
    <label>Event Name:</label><br>
    <input type="text" name="event_title" pattern="[A-Za-z\s\-\_\/\\]+" required class="form-control"><br><br>

    <label>Event Date</label><br>
    <input type="date" name="Date" required class="form-control"><br><br>

     <label>Event Time</label><br>
    <input type="text" name="time" pattern="[A-Za-z0-9\s\.\-\:]+" required class="form-control"><br><br>

    <label>Event Location</label><br>
    <input type="text" name="location" pattern="[A-Za-z\s\.\-\_\:]+" required class="form-control"><br><br>
    <label>Staff co-ordinator name</label><br>
    <input type="text" name="sname" pattern="[A-Za-z\s\.]+" required class="form-control"><br><br>
    <label>Student co-ordinator name</label><br>
    <input type="text" name="st_name" pattern="[A-Za-z\s]+" required class="form-control"><br><br>

    <button type="submit" name="update" class = "btn btn-default pull-right">Create Event <span class="glyphicon glyphicon-send"></span></button>

    <a class="btn btn-default navbar-btn" href = "search(2).php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>

  
  </div></div></div>
  </form>
    

    
    </body>
  
  <?php require 'utils/footer.php'; ?>
</html>

<?php

  if (isset($_POST["update"]))
  {
  $event_id=$_POST["event_id"];
    $event_title=$_POST["event_title"];
    $name=$_POST["sname"];
    $st_name=$_POST["st_name"];
    $Date=$_POST["Date"];
    $time=$_POST["time"];
    $location=$_POST["location"];
    if(!empty($event_id) || !empty($event_title) || !empty($participents))

    {
      include 'classes/db1.php';
        
        
   
        $INSERT="INSERT INTO events(event_id,event_title) VALUES($event_id,'$event_title');";

            $INSERT.= "INSERT INTO event_info (event_id,Date,time,location) Values ($event_id,'$Date','$time','$location');";
            $INSERT.="INSERT into student_coordinator(sid,st_name,phone,event_id)  values($event_id,'$st_name',NULL,$event_id);";
            $INSERT.="INSERT into staff_coordinator(stid,name,phone,event_id)  values($event_id,'$name',NULL,$event_id);";

        if($conn->multi_query($INSERT)===True){
          echo "<script>
          alert('Event Inserted Successfully!');
          window.location.href='adminPage.php';
          </script>";
        }
        else
        {
          echo"<script>
          alert('Event already exsists!');
          window.location.href='createEventForm.php';
          </script>";
        }
     
        $conn->close();
      
    }
    else
    {
      echo"<script>
      alert('All fields are required');
      window.location.href='createEventForm1.php';
      </script>";
    }
  }
?>