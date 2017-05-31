@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create Petition</h1>
            <br>
            <div class="box box-success">
                <div class="box-body">
                    <form role="form" method="post" action="{{url('petitions')}}">
                        {{csrf_field()}}
                        <!-- Title -->
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Enter title" name="title">
                        </div>

                        <!-- Body -->
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="4" placeholder="Enter description" name="body"></textarea>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-success btn-block" type="submit" value="Submit Petition">
                        </div>

                    </form>
                </div>
            </div>

            <a href="{{url('petitions')}}" class="btn btn-default">Back</a>

        </div>
    </div>
@endsection