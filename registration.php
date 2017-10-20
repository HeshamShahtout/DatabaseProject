<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel ="stylesheet" href="style.css">
        <title>Student Registeration</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function ()
            {
                $('div.right > div.signup').hide();
                $('div.right > div.login').hide();
                $('div.center > #back ').hide();
                $('div.center > #signup ').click(function ()
                {
                    $('div.center > #signup ').hide();
                    $('div.center > #login ').hide();
                    $('div.center > #back ').show();
                    $('div.right > div.login').hide();
                    $('div.right > div.signup').show();
                });
                $('div.center >#login').click(function ()
                {
                    $('div.center > #signup ').hide();
                    $('div.center > #login ').hide();
                    $('div.center > #back ').show();
                    $('div.right > div.signup').hide();
                    $('div.right > div.login').show();
                });
                $('div.center > #back ').click(function ()
                {
                    $('div.center > #signup ').show();
                    $('div.center > #login ').show();
                    $('div.center    > #back ').hide();
                    $('div.right > div.login').hide();
                    $('div.right > div.signup').hide();
                });
            });
        </script>
    <body>
        <div class="title"><h1>Sign In Form</h1>
        </div>
        <div class ="center">
            <button id="login" class="log">Login</button>
            <button id="signup" class="sign">Signup</button>
            <button id="back" class="bk">Back</button>
        </div>   
        <div class ="container">
            <div class ="left"></div>
            <div class="right">

<!--             <input type="radio" name="option" id="login" checked="checked" /> <span class="option">Login</span><input type="radio" name="option" id="signup" /><span class="option">Sign up</span>-->

                <div class ="signup">
                    <form name="signup" method="post" action="dbconnection.php" onsubmit="return validateForm()">

                        <p>Username:</p>
                        <input type="text" name="username" placeholder="Username">
                        <p>Email:</p>
                        <input type="text" name="email" placeholder="Email">    
                        <p>Password:<p>
                            <input type="password" name="password" placeholder="******" minlength="6"> 
                        <p>Confirm Password:<p> 
                            <input type="password" name="confirmPassword" placeholder="******" minlength="6">  
                            <input type="submit" name="submit" value="Submit">     
                    </form>
                </div>
                <div class ="login">
                    <form name ="login" method="post" action="login.php">
                        <p>Username</p>
                        <input type="text" name="username" class="input" id="username" placeholder="Username"/><br/>
                        <p>Password<p>
                            <input type="password" name="password" class="input" id="password" placeholder="******"/><br/>
                            <input type="submit" value="Login" class="button" /> 
                    </form>
                </div>
            </div>
        </div>
        <script>
            function validateForm() {
                var nameErr = document.forms["signup"]["username"].value;
                if (nameErr == "") {
                    alert("Please Enter Your UserName");
                    return false;
                }
                var emailErr = document.forms["signup"]["email"].value;
                if (emailErr == "") {
                    alert("Please Enter Your E-mail");
                    return false;
                } else if (!/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()\.,;\s@\"]+\.{0,1})+[^<>()\.,;:\s@\"]{2,})$/.test(emailErr)) {
                    alert("Please Enter A Valid Email");
                    return false;
                }

                var passErr = document.forms["signup"]["password"].value;
                if (passErr == "") {
                    alert("Please Enter Your Password");
                    return false;
                }
                var pass1 = document.forms["signup"]["password"].value;
                var pass2 = document.forms["signup"]["confirmPassword"].value;
                if (pass1 != pass2) {
                    alert("Passwords Do not match");
                    document.forms["signup"]["password"].style.borderColor = "#E34234";
                    document.forms["signup"]["confirmPassword"].style.borderColor = "#E34234";
                    return false;
                }
            }
        </script>


    </body>
</html>

