@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa loại phòng')

@section('page-title', 'Chỉnh sửa loại phòng: ' . $roomType->name)

@section('actions')
<a href="{{ route('admin.room_types.index') }}" class="btn btn-secondary">
    <i class="fas fa-arrow-left"></i> Quay lại
</a>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin.room_types.update', $roomType) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên loại phòng <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $roomType->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="base_price" class="form-label">Giá cơ bản (VNĐ) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('base_price') is-invalid @enderror" id="base_price" name="base_price" value="{{ old('base_price', $roomType->base_price) }}" required min="0">
                        @error('base_price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="image" class="form-label">URL Hình ảnh</label>
                        <input type="url" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $roomType->image) }}">
                        <small class="form-text text-muted">Nhập URL hình ảnh đại diện cho loại phòng</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        @if($roomType->image)
                            <div class="mt-2">
                                <img src="{{ $roomType->image }}" alt="{{ $roomType->name }}" class="img-thumbnail" width="200">
                            </div>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5">{{ old('description', $roomType->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Cập nhật loại phòng
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 