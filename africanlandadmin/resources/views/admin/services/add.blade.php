@extends('admin.layouts.app')

@php
    $page_name = $aRow ? "Edit Service" : "Add Service"
@endphp

@section('title') {{ $page_name }} @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $page_name }}</a></li>
@endsection

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Add services</h2>                        
                
            </div>
            <div class="body table-responsive">
                        <div class="row clearfix">
                            <div class="col-lg-6">
                                @if($aRow)
                            <form method="POST"  action="{{ route('services.update',$aRow->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @else
                            <form method="POST"  action="{{ route('services.store') }}" enctype="multipart/form-data">
                            @endif 

                                
                                @csrf
                                <label for="name">{{ __('Name') }}</label>
                                <div class="form-group">                               
                                   
                                    <input type="text" id="name" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $aRow ? $aRow->name : old('name') }}" required placeholder="Name">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <label for="name">{{ __('Price Type') }}</label>
                                <div class="form-group">
                                    <input type="radio" id="" @if($aRow && $aRow->type == "fixed") checked="checked" @endif name="type" class="" value="fixed" required> Fixed
                                    <input type="radio" id="" @if($aRow && $aRow->type == "calculable") checked="checked" @endif name="type" class="" value="calculable" required> Per/hour
                                </div>
                                <label for="name">{{ __('Price') }}</label>
                                <div class="form-group">                               
                                   
                                    <input type="price" id="price" name="price" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ $aRow ? $aRow->price : old('price') }}" required>  

                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif

                                </div>    

                                <label for="name">{{ __('Image') }}</label>
                                    <div class="form-group">                          
                                        <input type="file" id="image" name="image" class="form-control"  >
                                        @if ($errors->has('image'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    @if ($aRow && $aRow->image)
                                    <img src="{{  App\Helpers\CustomHelper::displayImage($aRow->image) }}" height="30px" width="30px" >   
                                     @endif
                               
                                     <br><br>

                                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Save</button>
                            </form>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>

@endsection
