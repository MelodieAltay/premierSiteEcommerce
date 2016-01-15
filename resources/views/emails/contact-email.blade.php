<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact email</title>
</head>
<body>
    <h1>Email de contact [site ecommerce]</h1>
    <p>DE : <cite>{{$data['userName']}}</cite> ({{$data['userEmail']}})</p>
    <p>Téléphone : {{$data['userPhone']}}</p>
    <blockquote>{{$data["userMsg"]}}</blockquote>
</body>
</html>