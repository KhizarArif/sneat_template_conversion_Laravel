@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('subcategories.store') }}" class="form-horizontal">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Sub Category </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="https://black-dashboard-pro-laravel.creative-tim.com/item" class="btn btn-sm btn-primary">Back to list</a>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <select class="selectpicker col-sm-12 pl-0 pr-0" name="cat_id" data-style="select-with-transition" title data-size="100">
                                        <option value>-</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Sub Category Name</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="input-name" type="text" placeholder="Name" value required="true" aria-required="true" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn">Add Sub Category </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

@endsection