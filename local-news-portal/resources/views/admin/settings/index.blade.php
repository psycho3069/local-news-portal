@extends('admin.layout')

@section('title', 'Settings - Admin Panel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Site Settings</h1>
</div>

<form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf
    
    @foreach($settings as $group => $groupSettings)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">{{ ucfirst($group) }} Settings</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($groupSettings as $setting)
                        <div class="col-md-6 mb-3">
                            <label for="{{ $setting->key }}" class="form-label">
                                {{ ucwords(str_replace('_', ' ', $setting->key)) }}
                            </label>
                            
                            @if($setting->type === 'textarea')
                                <textarea class="form-control" id="{{ $setting->key }}" name="{{ $setting->key }}" rows="3">{{ $setting->value }}</textarea>
                            @elseif($setting->type === 'boolean')
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="{{ $setting->key }}" name="{{ $setting->key }}" 
                                           value="1" {{ $setting->value ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ $setting->key }}">
                                        Enable
                                    </label>
                                </div>
                            @else
                                <input type="text" class="form-control" id="{{ $setting->key }}" name="{{ $setting->key }}" 
                                       value="{{ $setting->value }}">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
    
    <div class="card">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Update Settings
            </button>
        </div>
    </div>
</form>
@endsection