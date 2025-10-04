<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pet Lovers</title>

    <link rel="icon" type="image/png" href="images/green-paw-img.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/login-custom-style.css">

</head>

<body>
    <div class="form">
        <div class="inside-form">
            <h1> Admin Login </h1>
            <form action="adminlogin_process.php" method="POST">
                <label for="first"> Username </label>
                <input type="text" id="first" name="username" placeholder="Enter Username" required>

                <label for="password"> Password</label>
                <input type="password" id="password" name="password"
                               placeholder="Enter Password" required>

                <div class="login">
                    <button type="submit" name="submit"> submit </button>
                    <button type="reset" name="reset" style="background-color:orange;"> Reset </button>

                </div>
            </form>
            <!-- <p> not registered? </p> -->


        </div>


    </div>

</body>

</html>