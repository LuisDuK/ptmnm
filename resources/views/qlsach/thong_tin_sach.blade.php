<html>

<head>
</head>

<body>
    @foreach($sach as $row)
    Tiêu đề: {{$row->tieu_de}}, Tác giả: {{$row->tac_gia}}<br>
    @endforeach
</body>

</html>