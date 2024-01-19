@extends('templates.default')

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <form role="form" action="{{ route('status.post') }}" method="post">
                <div class="form-group">
                    <textarea placeholder="What's up {{ Auth::user()->getNameOrUsername() }}?" name="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" rows="2"></textarea>
                    <span class="help-block invalid-feedback">{{ $errors->first('status') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">Update status</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            {{-- timeline shits --}}
        </div>
    </div>

@stop
