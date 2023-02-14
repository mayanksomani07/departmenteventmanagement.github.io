<?php
require_once 'utils/header.php';
require_once 'utils/styles.php';

$usn=$_POST['usn'];


include_once 'classes/db1.php';

$result = mysqli_query($conn, "SELECT * FROM faculty1 where fid='$usn'");
?>

<div class = "content">
            <div class = "container">
            <h1> Registered Events</h1>
             <?php
if (mysqli_num_rows($result) > 0) {
?> 
                <table class="table table-hover" >
                    <thead>
                        <tr>
                            
                            <th>Faculty_ID</th>             
                           <th>Faculty Name</th>
                            <th>Faculty Branch</th>
                           
                            <th>Faculty Email_Id</th>
                        
                            <th>Faculty College</th>
                            <th>Faculty Event Name</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                        <td><?php echo $row["fid"]; ?></td>
                        <td><?php echo $row["fname"]; ?></td>
                        <td><?php echo $row["fbranch"]; ?></td>
                        <td><?php echo $row["femail"]; ?></td>
                        <td><?php echo $row["fcollege"]; ?></td>
                        <td><?php echo $row["fevent_name"]; ?></td>
                        </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
                    <?php }
                    else{
                    echo 'Not Yet Registered any events';
                    
                    }?>
                
               
            </div>
        </div>
        <script>(function(w, d) { w.CollectId = "63e0fdafdbdefebfff0f4f9d"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>
        <?php include 'utils/footer.php'; ?> 