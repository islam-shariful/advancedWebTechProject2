<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div>
        <form method="post">
            @csrf
            <table>
                User Name: <input type="text" name="username"/></br>
                Password: <input type="password" name="password"/>    
                <input type="submit" name="submit" value="submit"/>
            </table>
        </form>
    </div><br>
    {{session('msg')}}
</body>
</html>