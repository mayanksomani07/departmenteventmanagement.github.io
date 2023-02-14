
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
    
    <form method="POST" name="myForm" onsubmit="return validateForm()">
    <div class ="w3-container">
    <div class ="content"><!--body content holder-->
            <div class = "container">
                <div class ="col-md-6 col-md-offset-3">
   
        <label>Student USN:</label><br>
        <input type="text" name="usn" pattern="1RV\d\d[A-Za-z]+\d\d\d" class="form-control" required><b><span class="formError"> </span></b><br><br>

        <label>Student Name:</label><br>
        <input type="text" name="name" pattern = "[A-Za-z\s]+" class="form-control" required><br><br>

        <label>Branch:</label><br>
        <input type="text" name="branch" class="form-control" pattern="[A-Za-z\s]+" required><br><br>

        <label>Semester(Enter number only,Eg-5):</label><br>
        <input type="number" name="sem" pattern="\d" class="form-control" required><br><br>

        <label>Email(RVCE mail-id):</label><br>
        <input type="email" name="email" pattern="[A-Za-z]+\.[A-Za-z]+[0-9]+@rvce\.edu\.in" class="form-control" required ><br><br>

        <label>Phone:</label><br>
        <input type="text" name="phone"  pattern="[0-9]+" minlength="10" maxlength="10" class="form-control" required><br><br>

        <label>College:</label><br>
        <input type="text" name="college"  class="form-control" pattern="[A-Za-z\s]+" required><br><br>

        <label>Event_Id:(Enter number only,Eg-1)</label><br>
        <input type="number" name="event_id"  pattern = "\d" class="form-control" required><br><br>

        <button type="submit" name="update1" required>Submit</button><br><br>
        <a href="usn.php" ><u>Already registered ?</u></a>

    </div>
    </div>
    </div>
    </form>
    

    <?php require 'utils/footer.php'; ?>
    </body>
    <script>
        function setError(id, error)
        {
            element = document.getElementById(id);
            element.getElementsByClassName('formError')[0].innerHTML = error;
        }
        function validateForm()
        {
            var returnVal = true;
            var name = document.forms['myForm']["name"].value;
            if (name.length == 0){
            seterror("name", "*Length of name cannot be zero!");
            returnval = false;
            }
            
    var email = document.forms['myForm']["email"].value;
    if (email.length>30){
        seterror("email", "*Email length is too long");
        returnval = false;
    }
            var phone = document.forms['myForm']["phone"].value;
            if (phone.length != 10){
            seterror("phone", "*Phone number should be of 10 digits!");
            returnval = false;
    }
            return returnVal;
        }
    </script>
</html>

<?php

    if (isset($_POST["update1"]))
    {
        $usn=$_POST["usn"];
        $name=$_POST["name"];
        $branch=$_POST["branch"];
        $sem=$_POST["sem"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        $college=$_POST["college"];
        $event_id=$_POST["event_id"];

        if( !empty($usn) || !empty($name) || !empty($branch) || !empty($sem) || !empty($email) || !empty($phone) || !empty($college) )
        {
        
                include 'classes/db1.php';     
                $INSERT="INSERT INTO participent (usn,name,branch,sem,email,phone,college) VALUES('$usn','$name','$branch',$sem,'$email','$phone','$college');";
                $INSERT="INSERT INTO registered (usn,event_id) VALUES('$usn',$event_id);";
          
                if($conn->query($INSERT)===True){
                    echo "<script>
                    alert('Registered Successfully!');
                    window.location.href='usn.php';
                    </script>";
                }
                else
                {
                    echo"<script>
                    alert(' Already registered this usn');
                    window.location.href='usn.php';
                    </script>";
                }
               
                $conn->close();
            
        }
        else
        {
            echo"<script>
            alert('All fields are required');
            window.location.href='register.php';
                    </script>";
        }
    }
    
?>