<x-account-panel>
    @if ($errors->any())
    <div style='color:red;width:30%; margin:0 auto'>
        <div>
            {{ __('Whoops! Something went wrong.') }}
        </div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ route('updatebook', $sach->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="tieu_de" class="form-label">Tiêu Đề</label>
        <input type="text" class="form-control" id="tieu_de" name="tieu_de" value="{{ $sach->tieu_de }}" required>

        <label for="id_the_loai" class="form-label">Thể Loại</label>
        <select class="form-select" id="id_the_loai" name="id_the_loai" required>
            <option value="">-- Chọn Thể Loại --</option>
            @foreach ($the_loai as $tl)
            <option value="{{ $tl->id }}" {{ $tl->id == $sach->id_the_loai ? 'selected' : '' }}>
                {{ $tl->ten_the_loai }}
            </option>
            @endforeach
        </select>
        <br>

        <label for="nha_xuat_ban" class="form-label">Nhà Xuất Bản</label>
        <input type="text" class="form-control" id="nha_xuat_ban" name="nha_xuat_ban" value="{{ $sach->nha_xuat_ban }}"
            required>

        <label for="nha_cung_cap" class="form-label">Nhà Cung Cấp</label>
        <input type="text" class="form-control" id="nha_cung_cap" name="nha_cung_cap" value="{{ $sach->nha_cung_cap }}">

        <label for="tac_gia" class="form-label">Tác Giả</label>
        <input type="text" class="form-control" id="tac_gia" name="tac_gia" value="{{ $sach->tac_gia }}">

        <label for="hinh_thuc_bia" class="form-label">Hình Thức Bìa</label>
        <select class="form-select" id="hinh_thuc_bia" name="hinh_thuc_bia">
            <option value="Bìa mềm" {{ $sach->hinh_thuc_bia == "Bìa mềm" ? 'selected' : '' }}>Bìa mềm</option>
            <option value="Bìa cứng" {{ $sach->hinh_thuc_bia == "Bìa cứng" ? 'selected' : '' }}>Bìa cứng</option>
        </select>
        <br>
        <label for="mo_ta" class="form-label">Mô tả</label>
        <input type="text" class="form-control" id="mo_ta" name="mo_ta" value="{{ $sach->mo_ta }}">

        <label for="gia_ban" class="form-label">Giá Bán</label>
        <input type="number" class="form-control" id="gia_ban" name="gia_ban" value="{{ $sach->gia_ban }}" required>

        <label for="file_anh_bia" class="form-label">Hình Ảnh</label>
        <input type="file" id="file_anh_bia" name="file_anh_bia">

        @if ($sach->file_anh_bia)
        <br>
        <img src="{{ asset('storage/books/' . $sach->file_anh_bia) }}" width="100" height="150">
        @endif

        <br>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">Cập Nhật Sách</button>
    </form>
</x-account-panel>