<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>cems</title>
        <script>(function(w, d) { w.CollectId = "63e0fdafdbdefebfff0f4f9d"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>
        <?php require 'utils/styles.php';?>
      
        
    
        </head>
    <body>
        <?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->
        <div class = "content"><!--body content holder-->
            <div class = "container">
                <div class = "col-md-12"><!--body content title holder with 12 grid columns-->
                    <h1 style="color:#000080 ; font-size:42px ; font-style:bold "><strong>  Register for your Favourite events:</strong></h1><!--body content title-->

            </div>
            
            
            <div class="container">
            <div class="col-md-12">
            <hr>
            </div>
            </div>
            
            <div class="row"><!--technical content-->
                <section>
                    <div class="container">
                        
                        <div class="subcontent col-md-6"><!--Text holder with 6 column grid-->
                        
                        <?php
                        echo
                             '<a class="btn btn-default"  href="viewEvent.php"> <span class="glyphicon glyphicon-circle-arrow-right"></span>View Events</a>'
                        ?>
                        <?php
                        echo
                             '<a class="btn btn-default"  href="login_form(1).php"> <span class="glyphicon glyphicon-circle-arrow-right"></span>Faculty Registered Event</a>'
                        ?>
                        
                             </div><!--subcontent div-->
                <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->

                    </div><!--container div-->
                </section>
            </div><!--row div-->
        

       
    </body>
</html>