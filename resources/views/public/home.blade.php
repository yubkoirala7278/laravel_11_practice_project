<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Esewa Integration</title>
</head>

<body>

    <form action="{{ route('esewa') }}" method="post">
        @csrf
        <input type="text" name="user_id" value="123" readonly>
        <input type="text" name="name" value="Yubraj Koirala" readonly>
        <input type="text" name="email" value="yubraj@gmail.com" readonly>
        <input type="text" name="product_id" value="11" readonly>
        <input type="text" name="amount" value="1000" readonly>
        <button type="submit">Esewa Pay</button>
    </form>
    
</body>

</html>
