<!-- @extends("layouts.sach_layout")
@section("title", $data->tieu_de)
@section("content") -->
<x-book-layout>
    <x-slot name="title">
        {{ $data->tieu_de }}
    </x-slot>
    <div class='book-infor'>
        <b style="font-size: 30px;">{{ $data->tieu_de }}</b><br />
        <div class="infor">
            <img src="{{ asset('book_image/' . $data->file_anh_bia) }}" width='200px' height='200px'><br>
            <div class="infor_origin">
                Nhà cung cấp: <b>{{ $data->nha_cung_cap }}</b><br>
                Nhà xuất bản: <b>{{ $data->nha_xuat_ban }}</b><br>
                Tác giả: <b>{{ $data->tac_gia }}</b><br>
                Hình thức bìa: <b>{{ $data->hinh_thuc_bia }}</b><br>
            </div>
        </div>
        <b>Mô tả:</b><br>
        {{ $data->mo_ta }}<br>
    </div>
    <!-- @endsection-->
</x-book-layout>