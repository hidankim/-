<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div>
        <form action="mysql_input.php" method="post">
            <div class="container">
                <h1>Registration</h1>
                <p>Fill up the form with correct values.</p>
                <label for="firstname"><b>First Name</b></label>
                <input type="text" name="firstname" required>

                <label for="lastname"><b>Last Name</b></label>
                <input type="text" name="lastname" required>

                <label for="phonenumber"><b>Email Address</b></label>
                <input type="email" name="phonenumber" required>

                <label for="firstname"><b>Phone Number</b></label>
                <input type="text" name="firstname" required>

                <label for="password"><b>Password</b></label>
                <input type="password" name="password" required>
            </div>
        </form>
    </div>

</body>
</html>