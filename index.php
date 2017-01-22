<!DOCTYPE HTML>

     <?php include_once("header.php");?>
<form id="loginform" class="form">
    
  <fieldset>
    <legend>Login</legend>
    <div class="form-group">
      <label for="userName" class="col-lg-2 control-label">Email</label>
      
        <input class="form-control" name="u_name" id="userName" placeholder="User Name" type="text"/>
      
    </div>
    <div class="form-group">
      <label for="Password" class="col-lg-2 control-label">Password</label>
      
        <input class="form-control" name="u_pass" id="Password" placeholder="Password" type="password"/>
     
    </div>
      <i id="loginMsg"></i>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">   
        <a class="btn btn-primary" onclick="login()">Submit</a>
      </div>
    </div>
  </fieldset>

</form>
    <a href="Default.aspx" style="margin-left:50%;">Click Here for scheduler</a>
    <script>
        function login() {
            var Name = $("#userName").val();
            var password = $("#Password").val();
            var response = $("#loginMsg");

            if (Name == "" || password == "") {
                var eMsg = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><i style="margin-left:5px" class="glyphicon glyphicon-alert"></i>Please fill all fields.</div>';
                response.html(eMsg);
                return false;
            }

var data = $("#loginform").serialize();

//-----------------------------------------------------------------------

$.ajax({
method : "POST",
url : "loginProcess.php",
dataType : "json",
data : data,
}).done(function(data) {


var status = data["status"];
var msg = data["msg"];
if (status == true) {
response.html(msg);
//$(location).attr("href", msg);
//grecaptcha.reset();

} else {
var Error_message = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>  <strong> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></strong>  ' + msg + '</div>';
response.html(Error_message);
//grecaptcha.reset();
}

}).fail(function(x, y, z) {

//grecaptcha.reset();
response.html(x + y + z);
});

        }
    </script>
     <?php include_once ("footer.php");?>



