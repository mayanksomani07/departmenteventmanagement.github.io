
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>cems</title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        <script>(function(w, d) { w.CollectId = "63e0fdafdbdefebfff0f4f9d"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>
    </head>
    <body>
    <?php require 'utils/header.php'; ?>
    
    <form method="POST">
    <div class ="w3-container">
    <div class ="content"><!--body content holder-->
            <div class = "container">
                <div class ="col-md-6 col-md-offset-3">
   
        <label>Faculty Id(Enter number only,Eg-1):</label><br>
        <input type="number" name="fid" pattern="\d" class="form-control" required><br><br>

        <label>Faculty Name:</label><br>
        <input type="text" name="fname" pattern = "[A-Za-z\s\.]+" class="form-control" required><br><br>

        <label>Branch:</label><br>
        <input type="text" name="fbranch" class="form-control" pattern="[A-Za-z\s]+" required><br><br>

        <label>Email(RVCE mail-id):</label><br>
        <input type="text" name="femail"  class="form-control" pattern="[A-Za-z0-9]+@rvce\.edu\.in" required ><br><br>

        <label>College:</label><br>
        <input type="text" name="fcollege"  class="form-control" pattern="[A-Za-z\s]+" required><br><br>

        <label>Event_Name:</label><br>
        <input type="text" name="fevent_name" pattern="[A-Za-z\s\-\_\/\\]+" class="form-control" required><br><br>

        <button type="submit" name="update2" required>Submit</button><br><br>
        <a href="usn(1).php" ><u>Already registered ?</u></a>

    </div>
    </div>
    </div>
    </form>
    

    <?php require 'utils/footer.php'; ?>
    </body>
</html>

<?php

    if (isset($_POST["update2"]))
    {
        $fid=$_POST["fid"];
        $fname=$_POST["fname"];
        $fbranch=$_POST["fbranch"];
        $femail=$_POST["femail"];
        $fcollege=$_POST["fcollege"];
        $fevent_name=$_POST["fevent_name"];

        if( !empty($fid) || !empty($fname) || !empty($fbranch) || !empty($femail) || !empty($fcollege) || !empty($fevent_name) )
        {
        
            include 'classes/db1.php';     
                $INSERT="INSERT INTO faculty1 (fid,fname,fbranch,femail,fcollege,fevent_name) VALUES ('$fid','$fname','$fbranch','$femail','$fcollege','$fevent_name');";
          
                if($conn->query($INSERT)===True){
                    echo "<script>
                    alert('Registered Successfully!');
                    window.location.href='usn(1).php';
                    </script>";
                }
                else
                {
                    echo"<script>
                    alert(' Already registered this usn');
                    window.location.href='usn(1).php';
                    </script>";
                }
               
                $conn->close();
            
        }
        else
        {
            echo"<script>
            alert('All fields are required');
            window.location.href='register(1).php';
                    </script>";
        }
    }
    
?>