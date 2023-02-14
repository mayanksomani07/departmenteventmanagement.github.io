<?php
include_once 'classes/db1.php';?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>cems</title>
        <title></title>
        <style>
            span.error{
                color: red;
            }            
        </style>  
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        <script>(function(w, d) { w.CollectId = "63e0fdafdbdefebfff0f4f9d"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>
            </head>
    <body>
        <?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->
        <div class = "content"><!--body content holder-->
            <div class = "container">
                <div class ="col-md-6 col-md-offset-3">
                  
                    <form method="POST"><!--form-->
                      
                            <!--username field-->
                            <label>UserName:</label><br>
        <input type="text" name="name" class="form-control" required><br>
                            
                   
        <label>Password</label><br>
        <input type="password" name="password" class="form-control" required><br>
                        <button type = "submit" name="update" class = "btn btn-default">Login</button>
                    </form>
                </div><!--col md 6 div-->
            </div><!--container div-->
        </div><!--content div-->
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>
<?php
if (isset($_POST["update"]))
{
$myusername=$_POST['name'];
$mypassword=$_POST['password'];

if($mypassword=='faculty' && $myusername=='faculty')
{
    echo "<script>
    alert('Login Successfull');
    window.location.href='register(1).php';
    </script>";
}
else
{
    echo "<script>
    alert('Invalid credentials');
    window.location.href='login_form(1).php';
    </script>";
}
}
?>
