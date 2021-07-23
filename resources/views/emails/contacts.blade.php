<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Email</title>
</head>
<body>
    <h1>Ciao hai ricevuto un nuovo messaggio da {{$data['full_name']}}</h1>
    <p>Messaggio da: {{ $data['email']}}</p>
    <p>Messaggio: {{ $data['message'] }}

    </p>

</body>
</html>
