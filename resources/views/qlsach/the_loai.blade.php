<html>

<head>
</head>

<body>
    @foreach($the_loai_sach as $row)
    Mã thể loại: {{$row->id}}, Tên thể loại: {{$row->ten_the_loai}}<br>
    @endforeach
</body>

</html>