<html>
<head>
</head>
<body>

<form method="POST" action="{{route('profileImage')}}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <button type="submit">Ekle resim</button>
</form>
</body>
</html>
