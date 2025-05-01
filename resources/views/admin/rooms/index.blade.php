@extends('admin.layouts.app')

@section('title', 'Quản lý phòng')

@section('page-title', 'Quản lý phòng')

@section('actions')
<a href="{{ route('admin.rooms.create') }}" class="btn btn-primary">
    <i class="fas fa-plus"></i> Thêm phòng mới
</a>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="roomsTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Số phòng</th>
                        <th>Loại phòng</th>
                        <th>Hình ảnh</th>
                        <th>Giá/đêm</th>
                        <th>Sức chứa</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->room_number }}</td>
                        <td>{{ $room->roomType->name }}</td>
                        <td>
                            @if($room->image)
                                <img src="{{ $room->image }}" alt="{{ $room->room_number }}" class="img-thumbnail" width="100">
                            @else
                                <span class="text-muted">Không có hình ảnh</span>
                            @endif
                        </td>
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
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.rooms.show', $room) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.rooms.edit', $room) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa phòng này?')">
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
        $('#roomsTable').DataTable();
    });
</script>
@endsection 