<?php

 include('config.php')
 function Login()
{
    if(empty($_POST['username']))
    {
        $this->HandleError("UserName is empty!");
        return false;
    }
     
    if(empty($_POST['password']))
    {
        $this->HandleError("Password is empty!");
        return false;
    }
     
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
     
    if(!$this->CheckLoginInDB($username,$password))
    {
        return false;
    }
     
    session_start();
     
    $_SESSION[$this->GetLoginSessionVar()] = $username;
     
    return true;
}


function CheckLoginInDB($username,$password)
{
    if(!$this->DBLogin())
    {
        $this->HandleError("Database login failed!");
        return false;
    }          
    $username = $this->SanitizeForSQL($username);
    $pwdmd5 = md5($password);
    $qry = "Select name, email from $this->tablename ".
        " where username='$username' and password='$pwdmd5' ".
        " and confirmcode='y'";
     
    $result = mysql_query($qry,$this->connection);
     
    if(!$result || mysql_num_rows($result) <= 0)
    {
        $this->HandleError("Error logging in. ".
            "The username or password does not match");
        return false;
    }
    return true;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		 #body-color{ background-color:#6699CC; }

  #submit{ margin-top:150px; margin-bottom:150px; margin-right:150px; margin-left:450px; border:3px solid #a1a1a1; padding:9px 35px; background:#8000CC; width:400px; border-radius:20px; box-shadow: 7px 7px 6px; }
   #button{ border-radius:10px; width:100px; height:40px; background:#FF00FF; font-weight:bold; font-size:20px }
	</style>


</head>
<body>



<form id='login' action='login.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Login</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
 
<label for='username' >UserName*:</label>
<input type='text' name='username' id='username'  maxlength="50" />
 
<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="50" />
 
<input type='submit' name='Submit' value='Submit' />
 
</fieldset>
</form>

</body>
</html>