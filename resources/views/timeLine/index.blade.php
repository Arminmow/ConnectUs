@extends('templates.default')

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <form role="form" action="#" method="post">
                <div class="form-group">
                    <textarea placeholder="What's up Armin?" name="status" cols="form-control" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update status</button>
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
