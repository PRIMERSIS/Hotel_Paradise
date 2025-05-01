@extends('admin.layouts.app')

@section('title', 'Chi tiết phòng')

@section('page-title', 'Chi tiết phòng #' . $room->room_number)

@section('actions')
<div class="btn-group" role="group">
    <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Quay lại
    </a>
    <a href="{{ route('admin.rooms.edit', $room) }}" class="btn btn-primary">
        <i class="fas fa-edit"></i> Chỉnh sửa
    </a>
    <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa phòng này?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
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
                <h6 class="m-0 font-weight-bold text-primary">Hình ảnh phòng</h6>
            </div>
            <div class="card-body text-center">
                @if($room->image)
                    <img src="{{ $room->image }}" alt="{{ $room->room_number }}" class="img-fluid rounded">
                @else
                    <div class="alert alert-secondary">
                        <i class="fas fa-image fa-3x mb-3"></i>
                        <p>Phòng không có hình ảnh</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thông tin phòng</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th style="width: 30%">ID:</th>
                            <td>{{ $room->id }}</td>
                        </tr>
                        <tr>
                            <th>Số phòng:</th>
                            <td>{{ $room->room_number }}</td>
                        </tr>
                        <tr>
                            <th>Loại phòng:</th>
                            <td>{{ $room->roomType->name }}</td>
                        </tr>
                        <tr>
                            <th>Giá/đêm:</th>
                            <td>{{ number_format($room->price_per_night, 0, ',', '.') }} VNĐ</td>
                        </tr>
                        <tr>
                            <th>Sức chứa:</th>
                            <td>{{ $room->capacity }} người</td>
                        </tr>
                        <tr>
                            <th>Trạng thái:</th>
                            <td>
                                @if($room->is_available)
                                    <span class="badge bg-success">Còn trống</span>
                                @else
                                    <span class="badge bg-danger">Đã đặt</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Ngày tạo:</th>
                            <td>{{ $room->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Cập nhật lần cuối:</th>
                            <td>{{ $room->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Mô tả phòng</h6>
            </div>
            <div class="card-body">
                @if($room->description)
                    <p>{{ $room->description }}</p>
                @else
                    <p class="text-muted">Không có mô tả</p>
                @endif
            </div>
        </div>
    </div>
</div>

@if($room->bookings->count() > 0)
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lịch sử đặt phòng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Người đặt</th>
                        <th>Ngày nhận phòng</th>
                        <th>Ngày trả phòng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($room->bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->check_in_date->format('d/m/Y') }}</td>
                        <td>{{ $booking->check_out_date->format('d/m/Y') }}</td>
                        <td>{{ number_format($booking->total_price, 0, ',', '.') }} VNĐ</td>
                        <td>
                            @if($booking->status == 'confirmed')
                                <span class="badge bg-success">Đã xác nhận</span>
                            @elseif($booking->status == 'pending')
                                <span class="badge bg-warning text-dark">Chờ xác nhận</span>
                            @elseif($booking->status == 'cancelled')
                                <span class="badge bg-danger">Đã hủy</span>
                            @elseif($booking->status == 'completed')
                                <span class="badge bg-info">Đã hoàn thành</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.bookings.show', $booking) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection 