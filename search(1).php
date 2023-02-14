<?php
include_once 'classes/db1.php';
//$result = mysqli_query($conn,"SELECT * FROM staff_coordinator s ,event_info ef ,student_coordinator st,events e where e.event_id= ef.event_id and e.event_id= s.event_id and e.event_id= st.event_id");
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Funda Of Web IT</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h1>Event details </h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <select name="standards" placeholder="location">
                                        <option>location</option>
                    <?php
                        $query1 = "SELECT distinct location FROM event_info";
                        $result1 = mysqli_query($conn,$query1);
                        while($rows1 = mysqli_fetch_array($result1))
                        {
                        ?>
                            <option name="location" value="<?php if(isset($_GET['location'])){echo $_GET['location']; } ?>"><?php echo $rows1['location'] ; ?></option>
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
                            <option name="FromDate" value="<?php if(isset($_GET['FromDate'])){echo $_GET['FromDate']; } ?>"><?php echo $rows2['Date'] ; ?></option>
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
                            <option name="ToDate" value="<?php if(isset($_GET['ToDate'])){echo $_GET['ToDate']; } ?>"><?php echo $rows3['Date'] ; ?></option>
                            <?php
                        }
                    ?>   
                    </select>
                    <button type="search">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
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
                                   $con = mysqli_connect("localhost","root","","cems");

                                    if(isset($_GET['location']))
                                    {
                                        $location = $_GET['location'];
                                        $query4 = "SELECT * FROM `event_info` where `location` = '$location' ";
                                        $result4 = mysqli_query($con,$query4);

                                        if(mysqli_num_rows($result4) > 0)
                                        {
                                            foreach($result4 as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['event_id']; ?></td>
                                                    <td><?= $items['Date']; ?></td>
                                                    <td><?= $items['time']; ?></td>
                                                    <td><?= $items['location']; ?></td>
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
