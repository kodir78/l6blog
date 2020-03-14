@extends('layouts.global')
@section("title") All Category @endsection
@section("sub_title")Category @endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                {{-- <div class="card-header">
                </div> --}}
                <div class="card-body">
                    <div class="float-left">
                        <a href="{{route('categories.create')}}" class="btn btn-primary">Add New</a>
                    </div>
                <div class="float-right">
                    <form>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">                                            
                          <button class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="clearfix mb-3"></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>#</th>
                                <th><b>Title</b></th>
                                <th><b>Action</b></th>
                            </tr>
                            <tbody>
                                @foreach($categories as $user => $hasil)
                                <tr>
                                    <td>{{$user + $categories->firstitem()}}</td>
                                    <td>{{$hasil->title}}</td>
                                    <td> 
                                        <a class="btn btn-info text-white btn-sm" href="{{route('categories.edit', [$hasil->id])}}">Edit</a>
                                        <a href="{{route('categories.show', [$hasil->id])}}" class="btn btn-primary btn-sm">Detail</a>
                                        <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline" action="{{route('categories.destroy', [$hasil->id])}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan=10>{{$categories->appends(Request::all())->links()}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
