<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="https://api.digikey.com/v1/oauth2/authorize?response_type=code&client_id=3bL3kGpYQBZMr5QBauPphMyEdbWUCN4X&redirect_uri=http://localhost/globalelectronics/callback.php"/>
        <input type="hidden" name="client_id" value="3bL3kGpYQBZMr5QBauPphMyEdbWUCN4X"/>
        <input type="hidden"  name="response_type" value="code"/>
        <input type="hidden"  name="redirect_uri" value="http://localhost/globalelectronics/callback.php"/>
        <input type="submit"  name="" value="submit"/>
</form>
</body>
</html>