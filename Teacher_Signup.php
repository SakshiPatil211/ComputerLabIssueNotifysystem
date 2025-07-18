<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript">
// Insert Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$("#submit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();

$.ajax({
type: "POST",
url: "Teachervalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Teacheraction.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
}  
});
}
else
	{
	alert(html);
	}
}  
});

return false;
});
});
</script>

    <div class="container">
    <div class="row">
        <div class="col-md-12">

 <form class="box" id="form" role="form">
                     <h1>Teacher Sign Up</h1>
                    <p class="text-muted"> Please Sign Up Info.!</p>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="text-muted">Teacher Name</label>
                    <input type="text" name="content" class="form-control" id="firstName" Placeholder="Name">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="text-muted">Teacher Email</label>
                    <input type="text" name="content1"  class="form-control" id="lastName" Placeholder="Email">        
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="text-muted">Teacher Password</label>
                    <input type="Password" name="content2" class="form-control" id="firstName" Placeholder="Password">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="text-muted">Teacher Mobile No</label>
                    <input type="text" name="content3"  class="form-control" id="lastName" Placeholder="Mobile No">  
                  </div>
                </div>



        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-2 col-sm-12">
              <input type="submit" value="Sign Up" name="signin" class="btn btn-default" id="submit_button">
            </div>
          </div>
        </div>

<div class="text-muted" id="show"></div>

                </form>
      
 

        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


  <style>
    /*---------------------------------------
   Social section
-----------------------------------------*/
    footer {
      padding: 0px 0px 0px 0px;
      background-color: #212529;
      margin: 0px;
    }

    .fa {
      padding: 20px;
      font-size: 23px;
      width: 60px;
      text-align: center;
      text-decoration: none;
      margin: 5px 2px;
      border-radius: 50%;
    }

    .fa:hover {
      opacity: 0.5;
      text-decoration: none;
    }



    p {
      text-align: center;

    }
  </style>