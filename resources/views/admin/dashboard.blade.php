@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng số phòng</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['rooms_count'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-bed fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Phòng còn trống</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['available_rooms_count'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Phòng đã đặt</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['booked_rooms_count'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thống kê người dùng & đặt phòng</h6>
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng số người dùng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['users_count'] }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng số đặt phòng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['bookings_count'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tỷ lệ đặt phòng</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <div class="d-flex justify-content-center">
                        <div class="progress" style="height: 30px; width: 100%;">
                            @php
                                $occupancyRate = $stats['rooms_count'] > 0 ? ($stats['booked_rooms_count'] / $stats['rooms_count']) * 100 : 0;
                            @endphp
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $occupancyRate }}%;" aria-valuenow="{{ $occupancyRate }}" aria-valuemin="0" aria-valuemax="100">{{ round($occupancyRate) }}%</div>
                        </div>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Đã đặt: {{ $stats['booked_rooms_count'] }} phòng
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Đặt phòng gần đây</h6>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-primary">Xem tất cả</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Người đặt</th>
                                <th>Phòng</th>
                                <th>Ngày nhận phòng</th>
                                <th>Ngày trả phòng</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestBookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->room->room_number }} - {{ $booking->room->roomType->name }}</td>
                                    <td>{{ $booking->check_in_date->format('d/m/Y') }}</td>
                                    <td>{{ $booking->check_out_date->format('d/m/Y') }}</td>
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
                                        <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Không có đặt phòng nào</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 