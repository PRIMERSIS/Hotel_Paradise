@extends('admin.layouts.app')

@section('title', 'Chi tiết loại phòng')

@section('page-title', 'Chi tiết loại phòng: ' . $roomType->name)

@section('actions')
<div class="btn-group" role="group">
    <a href="{{ route('admin.room_types.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Quay lại
    </a>
    <a href="{{ route('admin.room_types.edit', $roomType) }}" class="btn btn-primary">
        <i class="fas fa-edit"></i> Chỉnh sửa
    </a>
    <form action="{{ route('admin.room_types.destroy', $roomType) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa loại phòng này?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" {{ $roomType->rooms->count() > 0 ? 'disabled' : '' }}>
            <i class="fas fa-trash"></i> Xóa
        </button>
    </form>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hình ảnh loại phòng</h6>
            </div>
            <div class="card-body text-center">
                @if($roomType->image)
                    <img src="{{ $roomType->image }}" alt="{{ $roomType->name }}" class="img-fluid rounded">
                @else
                    <div class="alert alert-secondary">
                        <i class="fas fa-image fa-3x mb-3"></i>
                        <p>Loại phòng không có hình ảnh</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thông tin loại phòng</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th style="width: 30%">ID:</th>
                            <td>{{ $roomType->id }}</td>
                        </tr>
                        <tr>
                            <th>Tên loại phòng:</th>
                            <td>{{ $roomType->name }}</td>
                        </tr>
                        <tr>
                            <th>Giá cơ bản:</th>
                            <td>{{ number_format($roomType->base_price, 0, ',', '.') }} VNĐ</td>
                        </tr>
                        <tr>
                            <th>Số lượng phòng:</th>
                            <td>{{ $roomType->rooms->count() }}</td>
                        </tr>
                        <tr>
                            <th>Ngày tạo:</th>
                            <td>{{ $roomType->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Cập nhật lần cuối:</th>
                            <td>{{ $roomType->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Mô tả loại phòng</h6>
            </div>
            <div class="card-body">
                @if($roomType->description)
                    <p>{{ $roomType->description }}</p>
                @else
                    <p class="text-muted">Không có mô tả</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách phòng thuộc loại này</h6>
        <a href="{{ route('admin.rooms.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Thêm phòng mới
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Số phòng</th>
                        <th>Giá/đêm</th>
                        <th>Sức chứa</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roomType->rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->room_number }}</td>
                        <td>{{ number_format($room->price_per_night, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $room->capacity }} người</td>
                        <td>
                            @if($room->is_available)
                                <span class="badge bg-success">Còn trống</span>
                            @else
                                <span class="badge bg-danger">Đã đặt</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.rooms.show', $room) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.rooms.edit', $room) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Không có phòng nào thuộc loại này</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 