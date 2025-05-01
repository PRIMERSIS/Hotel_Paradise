@extends('admin.layouts.app')

@section('title', 'Quản lý đặt phòng')

@section('page-title', 'Quản lý đặt phòng')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="bookingsTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Người đặt</th>
                        <th>Phòng</th>
                        <th>Ngày nhận phòng</th>
                        <th>Ngày trả phòng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->room->room_number }} ({{ $booking->room->roomType->name }})</td>
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
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.bookings.show', $booking) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đặt phòng này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#bookingsTable').DataTable({
            order: [[0, 'desc']]
        });
    });
</script>
@endsection 