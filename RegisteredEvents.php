<?php
require_once 'utils/header.php';
require_once 'utils/styles.php';

$usn=$_POST['usn'];


include_once 'classes/db1.php';

$result = mysqli_query($conn, "SELECT * FROM registered r,staff_coordinator s ,event_info ef ,student_coordinator st,events e where e.event_id= ef.event_id and e.event_id= s.event_id and e.event_id= st.event_id and r.usn= '$usn' and r.event_id=e.event_id");
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
                            
                            <th>Event_name</th>             
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
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                        <td><?php echo $row["event_title"]; ?></td>
                        <td><?php echo $row["st_name"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["Date"]; ?></td>
                        <td><?php echo $row["time"]; ?></td>
                        <td><?php echo $row["location"]; ?></td>
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