@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa đặt phòng')

@section('page-title', 'Chỉnh sửa đặt phòng #' . $booking->id)

@section('actions')
<a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
    <i class="fas fa-arrow-left"></i> Quay lại
</a>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin.bookings.update', $booking) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="room_id" class="form-label">Phòng <span class="text-danger">*</span></label>
                        <select class="form-select @error('room_id') is-invalid @enderror" id="room_id" name="room_id" required>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}" {{ old('room_id', $booking->room_id) == $room->id ? 'selected' : '' }}>
                                    {{ $room->room_number }} - {{ $room->roomType->name }} ({{ number_format($room->price_per_night, 0, ',', '.') }} VNĐ/đêm)
                                </option>
                            @endforeach
                        </select>
                        @error('room_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="check_in_date" class="form-label">Ngày nhận phòng <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('check_in_date') is-invalid @enderror" id="check_in_date" name="check_in_date" value="{{ old('check_in_date', $booking->check_in_date->format('Y-m-d')) }}" required>
                        @error('check_in_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="check_out_date" class="form-label">Ngày trả phòng <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('check_out_date') is-invalid @enderror" id="check_out_date" name="check_out_date" value="{{ old('check_out_date', $booking->check_out_date->format('Y-m-d')) }}" required>
                        @error('check_out_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="guests_count" class="form-label">Số lượng khách <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('guests_count') is-invalid @enderror" id="guests_count" name="guests_count" value="{{ old('guests_count', $booking->guests_count) }}" required min="1">
                        @error('guests_count')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="total_price" class="form-label">Tổng tiền (VNĐ) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('total_price') is-invalid @enderror" id="total_price" name="total_price" value="{{ old('total_price', $booking->total_price) }}" required min="0">
                        @error('total_price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            @foreach($statuses as $status)
                                <option value="{{ $status }}" {{ old('status', $booking->status) == $status ? 'selected' : '' }}>
                                    @if($status == 'pending')
                                        Chờ xác nhận
                                    @elseif($status == 'confirmed')
                                        Đã xác nhận
                                    @elseif($status == 'cancelled')
                                        Đã hủy
                                    @elseif($status == 'completed')
                                        Đã hoàn thành
                                    @endif
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="special_requests" class="form-label">Yêu cầu đặc biệt</label>
                        <textarea class="form-control @error('special_requests') is-invalid @enderror" id="special_requests" name="special_requests" rows="5">{{ old('special_requests', $booking->special_requests) }}</textarea>
                        @error('special_requests')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                <strong>Lưu ý:</strong> Khi thay đổi trạng thái hoặc phòng, trạng thái phòng sẽ được cập nhật tự động.
            </div>
            
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Cập nhật đặt phòng
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 