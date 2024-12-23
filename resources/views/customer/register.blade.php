<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
</head>
<body>
    <div class="container">
        <form action="{{ route('customer.cusRegister') }}" method="POST">
            @csrf

            <label for="name">Name</label>
            <input type="text" name="name" id="name">
            <br><br>
            
            <label for="name">Email</label>
            <input type="email" name="email" id="email">
            <br><br>
            
            <label for="name">Password</label>
            <input type="password" name="password" id="password">
            <br><br>
            
            <label for="name">Phone Number</label>
            <input type="phone" name="phone" id="phone">
            <br><br>
            
            <label for="name">Address</label>
            <textarea name="address" id="address"></textarea>
            <br><br>

            <button type="submit">Register</button>
        </form> 
    </div>
</body>
</html>