<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../../style/register.css">

</head>

<body>
<div class="container">
    <h2>Register</h2>
    <form action="/register" method="post">
        <label for="username">Username</label>
        <input type="email" id="username" name="email" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <button type="submit"> Submit  </button>
    </form>
    <a href="/login" class="register-button"> Login </a>
</div>
</body>

</html>
