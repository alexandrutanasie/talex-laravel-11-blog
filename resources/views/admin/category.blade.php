@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Url</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->url}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm btn-icon-split" href="">
                                <span class="icon text-white-50">
                                    <i class="fas fa-pen"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>
                            <a class="btn btn-danger btn-sm btn-icon-split" href="">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Delete</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection