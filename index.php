<html>
    <head>
        
        
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script src="../../ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <script src="//code.jquery.com/jquery-1.9.1.js"></script>
      <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
       <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
       <!--css for this file-->
       <link rel="stylesheet" type="text/css" href="ka_style.css">
       <script language = "javascript" >
        
        $(document).ready(function(){
            get_data();
            //window.setInterval(get_data, 1000);
          });
         $(function() 
          { 
            $("#date").datepicker
            ({
            changeMonth:true,
            changeYear:true,
            dateFormat:"dd/mm/yy"
            });
         });

        function get_data() 
			   {
    			$.getJSON("ka_fetch.php",function(data)
    			{  
            $("#result_table").each(function(index){ 
             if(index==0){
            $("body > #result_table > tbody >tr").remove();
          }
          });   
					
					$.each(data,function(k,v)
			    {
						row =$("<tr/>");
    				$.each(v,function(key,value)
						  {
						   if(k==0)
						  {
							  row.append($("<td/>").text(value));
						  }
						   else
						   {
							  row.append($("<td/>").text(value));  
						   }
					   });
					   
             $("body > #result_table > tbody").append(row);
					   });
					   
             tablerow += "</tbody>";

	           })  
  
			       }
            
            $(document).ready(function () 
			       {
               $("#submit").click(function () 
				    {
               if ($("#name").val() == "") 
					   {
						    alert("Name IS MUST!!!!!");
                document.form.name.focus();
                return false;
                event.preventDefault();
              } 
					else if ($("#email").val() == "") 
					 {
              alert("Email Id is not entered");
              document.form.email.focus();
              return false;
              event.preventDefault();
                    }
					else if (!validemail($("#email").val())) 
					{
              alert("Please Enter a Valid Email Id");
              document.form.email.focus();
              return false;
              event.preventDefault();
          }
					else if ($("#message").val() == "") 
					{
              alert("Message Box is empty");
              document.form.message.focus();
              return false;
              event.preventDefault();
          } 
          else if ($("#date").val() == "") 
					{
              alert("Please Select the Date");
              document.form.date.focus();
              return false;
              event.preventDefault();
          }
					else 
					{                

                    }
                      var email = $("#email").val();
                      var name = $("#name").val();
                      var date = $("#date").val();
                      var message = $("#message").val();
                         
                         $.ajax({
                          url:"ka_insert.php",
                          context: document.body,
                          type: 'POST',
                          data: {
                                  "name" : name,
                                  "email" : email,
                                  "date" : date,
                                  "message" : message,
                                },
                         success : function(data){
                            
                             alert("Record Successfully Inserted");
                            
                            $("#email").val("");
                            $("#name").val("");
                            $("#date").val("");
                            $("#message").val("");

                          }

                    });
                     
                    
                    
                });
       

               });


            
			function getdetails()
			 {
           get_data();
          if( $("body > #result_table > tbody ").length == 1)
				  {
					 $("#result_table").each(function(index)
					 { 
						 if(index==0)
						 {
              $("body > #result_table > tbody >tr").remove();
							  flag=1;
						 }
    					 });
             }
            }
    
            function validemail(emailAddress) 
		  	{
            var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/ ;
            return pattern.test(emailAddress);
        }

        </script>
    </head>
    <body>
          
		<form method="post" id="myform" name="form" action="">
    <fieldset>
    <legend style="color: red;"><h1>Register here</h1></legend>
			
			  <div class="label">Name :</div><input type="text" id="name" name="name" placeholder="Enter Your Name" /><br /><br />       
			  <div class="label">Email :</div><input type="text" id="email" name="email" placeholder="Enter Your Email Id" /><br /><br /> 
			  <div class="label">Message :</div><textarea id="message" name="message" placeholder="Enter Your Message" ></textarea><br /><br /> 
			  <div class="label">Date :</div><input type="text" id="date" name="date" placeholder="dd/mm/yyyy" /><br /><br/> 
			  <div><input type="button" id="submit" name="button" value="Submit" class="btn btn-success" /></div><br>
			<!--	<div class="label"> Search :</div><input type="text" name="search" id="search" placeholder="Search Here" /></div>-->
        </fieldset>
        </form>
       
        <table id="result_table" border="1">
            <thead>
            <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Date</th>
                  <th>Message</th>
                  </tr>
                  </thead>
                  <tbody id="table_new_data"></tbody>
             
        </table><br>
        <script>
          $(document).ready(function() {

               $(".pagination a").click(function() {
                $("#result_table").load($(this).attr("href"));
                
                return false;
                
             }); 


             $("#submit").click(function (){
              $.ajax ({
                url : "ka_pagin.php?page=1",
                success : function(data){
                  $("#result_table").html(data);

                }

              });
              
            });

          });

          function show(){
            $.getJSON("ka_pagin.php",function(data){
                    $("#result_table > tbody").empty();
                    $.each(data,function(key,value){
                    var row=$("<tr>");
                         $.each(value, function(key1,da){
                     row.append($("<td />").text(da));
                });
                         $("#result_table > tbody").append(row);
                    });
            });
            };
             show();
             
          var intr=window.setInterval(show,1000);

        </script>

       <div class="center">
          <ul class="pagination" style="padding:13px;text-align: center;">
            
            <?php
                include('ka_connect.php'); 
                $sql = "SELECT * FROM students"; 
                $rs_result = mysqli_query($conn, $sql); //run the query
                $total_records = mysqli_num_rows($rs_result);  //count number of records
                $total_pages = ceil($total_records / 5);
             
                    echo "<a href='ka_pagin.php?page=1'>".'<< '."</a> "; // Goto 1st page  

                    for ($i=1; $i<=$total_pages; $i++) { 
                                echo "<a href='ka_pagin.php?page=".$i."'>".$i."</a> "; 

                    }; 
                    echo "<a href='ka_pagin.php?page=$total_pages'>" .' >>'. "</a> "; // Goto last page
             ?>            
            
            
      </ul>
          
</div>

    </body>
</html>




