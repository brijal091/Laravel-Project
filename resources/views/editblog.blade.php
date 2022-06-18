@extends('admindesign')

@section('content')



<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Blog</h4>
                  <p class="card-description">
                     Blog Form
                  </p>
                  <form class="forms-sample" method="post" action="/updateblog" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value='{{$b->blogid}}' name="id">
                    <div class="form-group">
                      <label for="exampleInputName1">Blog Title</label>
                      <textarea class="form-control" name="t1" placeholder="Blog Title">{{$b->title}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Blog Description</label>
                      <textarea class="form-control" name="t2" placeholder="Blog Description">{{$b->description}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="t3" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info"  disabled placeholder="Blog Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                      <img src='{!! asset($b->image) !!}' width="50" height="50">
                 
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>



                    
                <div class="card-body">
                  <h4 class="card-title">Blog</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>Blog Title</th>
                          <th>Description</th>
                          <th>Blog Image</th>
                          
                          <th>
                            
                          </th>
                          <th>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($blist as $b)
                        <tr>
                          <td>
                            {{$b->blogid}}
                          </td>
                          <td>
                            {{$b->title}}
                          </td>
                          <td>
                            {{$b->description}}
                          </td>
                          
                          <td>
                           <img src='{!! asset($b->image) !!}' width="100" height="100">
                          </td>
                          
                          <td>
                             <a href='/editblog/{{$b->blogid}}'>Edit</a>
                          </td>
                          <td>
                            <a href='/deleteblog/{{$b->blogid}}'>Delete</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>





              </div>


@endsection