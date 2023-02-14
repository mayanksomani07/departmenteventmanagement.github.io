<?php
include_once 'classes/db1.php';
$result = mysqli_query($conn,"SELECT * FROM staff_coordinator s ,event_info ef ,student_coordinator st,events e where e.event_id= ef.event_id and e.event_id= s.event_id and e.event_id= st.event_id");
?>


<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>cems</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
    
    <body>
<?php include 'utils/adminHeader.php'?>
 <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                <h1>Event details</h1>
                </div>
                <div class="card-body">
                    <form method="POST">
                    <select name="standards" placeholder="location">
                    <option>Location</option>
                    <?php
                        $query1 = "SELECT distinct location FROM event_info";
                        $result1 = mysqli_query($conn,$query1);
                        while($rows1 = mysqli_fetch_array($result1))
                        {
                        ?>
                            <option name="location"><?php echo $rows1['location'] ; ?></option>
                            <?php
                        }
                    ?>   
                    </select>
                    <select name="standards" placeholder="FromDate">
                    <option>From Date</option>
                    <?php
                        $query2 = "SELECT * FROM event_info";
                        $result2 = mysqli_query($conn,$query2);
                        while($rows2 = mysqli_fetch_array($result2))
                        {
                        ?>
                            <option value="<?php echo $rows2['event_id'] ; ?>" name="FromDate"><?php echo $rows2['Date'] ; ?></option>
                            <?php
                        }
                    ?>   
                    </select>
                    <select name="standards" placeholder="ToDate">
                    <option>To Date</option>
                    <?php
                        $query3 = "SELECT * FROM event_info";
                        $result3 = mysqli_query($conn,$query3);
                        while($rows3 = mysqli_fetch_array($result3))
                        {
                        ?>
                            <option value="<?php echo $rows3['event_id'] ; ?>" name="ToDate"><?php echo $rows3['Date'] ; ?></option>
                            <?php
                        }
                    ?>   
                    </select>
                    <button type="search" >Search</button>
                    </form>
                </div>
            </div>
        </div>
                    <div class="col-md-12">
                        <div class="card mt-4">
                            <div class="card-body">
                            <table class="table table-hover" >
                    <thead>
                        <tr>
                            
                            <th>Event_id</th>
   
                            <th>Date</th>
                        
                            <th>Time</th>
                            <th>location </th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($_POST['search']))
                        {
                            $FromDate = $_POST['FromDate'];
                            $ToDate = $_POST['ToDate'];
                            $location = $_POST['location'];
                            $query4 = "SELECT event_id,Date,time,location FROM `event_info` where location='$location';";
                            $result4 = mysqli_query($conn,$query4);
                            if(mysqli_num_rows($result4)>0)
                            {
                                while($rows4 = mysqli_fetch_array($result4))
                                {
                                ?>
                                <tr>
                                <td><?php echo $rows4['event_id']; ?></td>
                                <td><?php echo $rows4['Date']; ?></td>
                                <td><?php echo $rows4['time']; ?></td>
                                <td><?php echo $rows4['location']; ?></td>
                                </tr> 
                                <?php
                                }
                            }
                            else
                            {
                                ?>
                                <tr>
                                    <td colspan="4">No Record Found</td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                    </table>
                            </div>
                        </div>
                    </div>
    </div>
</div>
    
<?php require 'utils/footer.php'; ?>
    </body>
</html>