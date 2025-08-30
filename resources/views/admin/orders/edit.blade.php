@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.orders.update", [$order->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : '' }}">
                <label for="customer_name">{{ trans('cruds.order.fields.customer_name') }}</label>
                <input type="text" id="customer_name" name="customer_name" class="form-control" value="{{ old('customer_name', isset($order) ? $order->customer_name : '') }}">
                @if($errors->has('customer_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('customer_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.order.fields.customer_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('customer_email') ? 'has-error' : '' }}">
                <label for="customer_email">{{ trans('cruds.order.fields.customer_email') }}</label>
                <input type="email" id="customer_email" name="customer_email" class="form-control" value="{{ old('customer_email', isset($order) ? $order->customer_email : '') }}">
                @if($errors->has('customer_email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('customer_email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.order.fields.customer_email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('total_price') ? 'has-error' : '' }}">
                <label for="total_price">{{ trans('cruds.order.fields.total_price') }}</label>
                <input type="number" id="total_price" name="total_price" class="form-control" value="{{ old('total_price', isset($order) ? $order->total_price : '') }}">
                @if($errors->has('total_price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('total_price') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.order.fields.total_price_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection