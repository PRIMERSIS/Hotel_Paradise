@extends('admin.layouts.app')

@section('title', 'Quản lý loại phòng')

@section('page-title', 'Quản lý loại phòng')

@section('actions')
<a href="{{ route('admin.room_types.create') }}" class="btn btn-primary">
    <i class="fas fa-plus"></i> Thêm loại phòng mới
</a>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="roomTypesTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Hình ảnh</th>
                        <th>Giá cơ bản</th>
                        <th>Số phòng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roomTypes as $roomType)
                    <tr>
                        <td>{{ $roomType->id }}</td>
                        <td>{{ $roomType->name }}</td>
                        <td>
                            @if($roomType->image)
                                <img src="{{ $roomType->image }}" alt="{{ $roomType->name }}" class="img-thumbnail" width="100">
                            @else
                                <span class="text-muted">Không có hình ảnh</span>
                            @endif
                        </td>
                        <td>{{ number_format($roomType->base_price, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $roomType->rooms->count() }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.room_types.show', $roomType) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.room_types.edit', $roomType) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.room_types.destroy', $roomType) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa loại phòng này?')">
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
        $('#roomTypesTable').DataTable();
    });
</script>
@endsection 