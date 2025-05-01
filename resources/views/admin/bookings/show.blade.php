@extends('admin.layouts.app')

@section('title', 'Chi tiết đặt phòng')

@section('page-title', 'Chi tiết đặt phòng #' . $booking->id)

@section('actions')
<div class="btn-group" role="group">
    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Quay lại
    </a>
    <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-primary">
        <i class="fas fa-edit"></i> Chỉnh sửa
    </a>
    <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đặt phòng này?')">
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
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thông tin đặt phòng</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th style="width: 40%">ID đặt phòng:</th>
                            <td>{{ $booking->id }}</td>
                        </tr>
                        <tr>
                            <th>Trạng thái:</th>
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
                        </tr>
                        <tr>
                            <th>Ngày nhận phòng:</th>
                            <td>{{ $booking->check_in_date->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th>Ngày trả phòng:</th>
                            <td>{{ $booking->check_out_date->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th>Số đêm:</th>
                            <td>{{ $booking->check_in_date->diffInDays($booking->check_out_date) }}</td>
                        </tr>
                        <tr>
                            <th>Số lượng khách:</th>
                            <td>{{ $booking->guests_count }} người</td>
                        </tr>
                        <tr>
                            <th>Tổng tiền:</th>
                            <td>{{ number_format($booking->total_price, 0, ',', '.') }} VNĐ</td>
                        </tr>
                        <tr>
                            <th>Ngày đặt phòng:</th>
                            <td>{{ $booking->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Cập nhật lần cuối:</th>
                            <td>{{ $booking->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        @if($booking->special_requests)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Yêu cầu đặc biệt</h6>
            </div>
            <div class="card-body">
                <p>{{ $booking->special_requests }}</p>
            </div>
        </div>
        @endif
    </div>
    
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thông tin khách hàng</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th style="width: 40%">ID khách hàng:</th>
                            <td>{{ $booking->user->id }}</td>
                        </tr>
                        <tr>
                            <th>Tên khách hàng:</th>
                            <td>{{ $booking->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $booking->user->email }}</td>
                        </tr>
                        <tr>
                            <th>Ngày đăng ký:</th>
                            <td>{{ $booking->user->created_at->format('d/m/Y') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thông tin phòng</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th style="width: 40%">ID phòng:</th>
                            <td>{{ $booking->room->id }}</td>
                        </tr>
                        <tr>
                            <th>Số phòng:</th>
                            <td>{{ $booking->room->room_number }}</td>
                        </tr>
                        <tr>
                            <th>Loại phòng:</th>
                            <td>{{ $booking->room->roomType->name }}</td>
                        </tr>
                        <tr>
                            <th>Giá phòng/đêm:</th>
                            <td>{{ number_format($booking->room->price_per_night, 0, ',', '.') }} VNĐ</td>
                        </tr>
                        <tr>
                            <th>Sức chứa:</th>
                            <td>{{ $booking->room->capacity }} người</td>
                        </tr>
                        <tr>
                            <th>Trạng thái hiện tại:</th>
                            <td>
                                @if($booking->room->is_available)
                                    <span class="badge bg-success">Còn trống</span>
                                @else
                                    <span class="badge bg-danger">Đã đặt</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <a href="{{ route('admin.rooms.show', $booking->room) }}" class="btn btn-outline-primary btn-sm mt-3">
                    <i class="fas fa-eye"></i> Xem chi tiết phòng
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 