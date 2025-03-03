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
                <td><input type="number" size="5" name="id[]"> </td>
                <td><input type="text"  name="the_loai[]"></td>
            </tr>
            <tr>
                <td><input type="number"  size="5" name="id[]"> </td>
                <td><input type="text" name="the_loai[]"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"> <input type='submit' value='Thêm thể loại'> </td>
</tr>
        </table>
        
        {{ csrf_field() }}
    </form>
</body>

</html>