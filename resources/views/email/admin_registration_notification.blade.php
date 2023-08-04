<!DOCTYPE html>
<html>
<head>
    <title>New User Registration</title>
</head>
<body>
    <p>Hello Admin,</p>
    <p>A new user has registered on the website:</p>
    <ul>
        <li>Name: {{ $user->name }}</li>
        <li>Lastname: {{ $user->lastname }}</li>
        <li>Email: {{ $user->email }}</li>
    </ul>
</body>
</html>