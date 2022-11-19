<?php
$fullurl="https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        .bg{
            position: absolute;height: 100%;width: 100%;background-image: linear-gradient(to right, #ffafbd  ,  #ffc3a0) ;background-size: cover;background-position: center;left: 0;top: 0;display: flex;justify-content: center;align-items: center;
            
        }
        .form{
            height: 450px;width: 400px;background-color: rgb(255, 255, 255);position: relative;border-radius: 10px;overflow: hidden;
            
        }
        .switch{
            overflow: hidden; display: flex;width: 80%;margin: 25px auto 0% auto;border-radius: 10px;box-shadow: 0 0 2px 2px  #83ba5c;position: relative;

        }
        .btn{
            width: 50%;background: transparent;outline: none;border: none;height: 45px;position: relative;cursor: pointer;
            color:#2f3c6e;
            font-size:16px;
            font-weight:bold;
        }
        .col{
            position: absolute;
            background:#83ba5c;
            left: <?php  if (strpos($fullurl,"sign")==true){
                echo "140px;";
        }
        else{
            echo "0;";
        }
        ?>
            height: 45px;
            width: 50%;
            border-radius: 8px;
            transition: 0.5s;
        }
        .main{
            width: 200%;
            left:  <?php  if (strpos($fullurl,"sign")==true){
                echo "-350px;";
        }
        else{
            echo "0;";
        }
        ?>
            height: 80%;
            position: relative;
            transition: 0.5s;

        }
        .form1{
           
            width: 50%;
            height: 100%;
            position: absolute;
            
           
           
        }
        #tab1{
            left: 0;

        }
        #tab2{
           
            left: 350px;
        }
        .info{
            width: 80%;
            height: 100%;
            margin: 5% auto;
            padding-bottom:auto;
            border-radius: 30px;
            position: relative;
            text-align: center;
           
           
        }
        .in1{
         position: relative;
         margin-top: 50px;
         height: 25px;
         width: 250px;
         outline: none;border: 0;background-color: transparent;
         border-bottom: 2px solid black;
         font-size:16px;
        }
        .in1:focus{
            border-bottom:  solid 3px #83ba5c;
            width: 250px;
            height: 40px;font-size: 16px;
            
        }
        .in1.in1:focus+.error{
            left: 12px;
            font-size: 15px;
        }
        .btns{
            width: 300px;
            height: 40px;
            background-color: #83ba5c;
            border-radius: 8px;
            border: 0;
            color:#fff;
            font-size:16px;
            font-weight:bold;
        }
        .error{
            position: absolute;
            font-size: 12px;
            left: 40px;
            color: red;
            
        }
       
    </style>
</head>
<body>
    <div class="bg">
        <div class="form">
            <div class="switch">
                <div class="col" id="col1"></div>
                <button class="btn" onclick="change1()">Login</button>
                <button class="btn" onclick="change2()">Signup</button>
            </div>
            <div class="main" id="ma">
                <div class="form1" id="tab1">
                    <div class="info">
                        <form  method="POST" action="http://127.0.0.1:5000/login">
                            <input  class="in1" type="email" placeholder="E-mail ID" name="email" required>
                            <div class="error"><?php
                            if (strpos($fullurl,"id=not")==true){
                                echo "Invalid E-mail";
                            }else{
                                echo "";
                            }
                            
                            ?></div>
                            <input  class="in1" type="password" placeholder="Password" name="password" required>
                            <div class="error"><?php
                            if (strpos($fullurl,"pass=not")==true){
                                echo "Incorrect Password";
                            }else{
                                echo "";
                            }
                            
                            ?></div>
                            <br>
                            <br>
                            <br>
                            <a style="font-size: 12px;" >Forgot password?</a>
                            <br>
                            <button style="margin-top: 30px;" class="btns">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="form1" id="tab2">
                    <div class="info">
                        <form  method="POST" action="http://127.0.0.1:5000/">
                            <input  class="in1" type="email" placeholder="E-mail ID" name="emails"
                            required>
                            <div class="error"><?php
                            if (strpos($fullurl,"signid=alr")==true){
                                echo"<script>change2();</script>";
                                echo "E-Mail Already Exist";
                            }else{
                                echo "";
                            }
                            
                            ?></div>
                            <input  class="in1" type="password" placeholder="Password" name="passwords" required>
                            <div class="error" style="left:12px; margin: left 0%;">
                            <?php
                            if (strpos($fullurl,"signpass=len")==true){
                               
                                echo "Password must be greater than 6 characters";
                            }else{
                                echo "";
                            }?>
                            </div>
                            
                            
                            <button style="margin-top: 50px;" class="btns">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function change1(){
            document.getElementById("col1").style.left="0px";
            document.getElementById("ma").style.left="0px";
            
        }function change2(){
            document.getElementById("col1").style.left="160px";
            document.getElementById("ma").style.left="-350px";
            
        }

    </script>
    
</body>
</html>
