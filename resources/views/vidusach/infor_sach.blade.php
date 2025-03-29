<x-book-layout>
    <x-slot name="title">
        {{ $data->tieu_de }}
    </x-slot>
    <div class='book-infor'>
        <b style="font-size: 30px;">{{ $data->tieu_de }}</b><br />
        <div class="infor" style="display: flex;">
            <img src="{{ asset('book_image/' . $data->file_anh_bia) }}" width='200px' height='200px'><br>
            <div class="infor_origin" style="margin-left:10px;">
                Nhà cung cấp: <b>{{ $data->nha_cung_cap }}</b><br>
                Nhà xuất bản: <b>{{ $data->nha_xuat_ban }}</b><br>
                Tác giả: <b>{{ $data->tac_gia }}</b><br>
                Hình thức bìa: <b>{{ $data->hinh_thuc_bia }}</b><br>
                <div class='mt-1'>
                    Số lượng mua:
                    <input type='number' id='product-number' size='5' min="1" value="1">
                    <button class='btn btn-success btn-sm mb-1' id='add-to-cart'>Thêm vào giỏ hàng</button>
                </div>
            </div>
        </div>
        <b>Mô tả:</b><br>
        {{ $data->mo_ta }}<br>
    </div>
    <script>
    $(document).ready(function() {
        $("#add-to-cart").click(function() {
            id = "{{$data->id}}";
            num = $("#product-number").val();
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{route('cartadd')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                    "num": num
                },
                beforeSend: function() {},
                success: function(data) {
                    $("#cart-number-product").html(data);
                },
                error: function(xhr, status, error) {},
                complete: function(xhr, status) {}
            });
        });
    });
    </script>
</x-book-layout>