<html>

<head>
</head>

<body>
    <form action="{{url('qlsach/themtheloai_2') }}" method="post">
        <table>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Thể loại
                </th>
            </tr>
            <tr>
                <td><input type="number" name="id_1"> </td>
                <td><input type="text" name="the_loai_1"></td>
            </tr>
            <tr>
                <td><input type="number" name="id_2"> </td>
                <td><input type="text" name="the_loai_2"></td>
            </tr>
        </table>
        <input type='submit' value='Thêm thể loại'>
        {{ csrf_field() }}
    </form>
</body>

</html>