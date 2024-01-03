@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('products.store') }}" class="form-horizontal">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Products </h4>
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
                                    <select class="col-sm-12 pl-0 pr-0" id="category" name="cat_id" data-style="select-with-transition" title data-size="100">
                                        <option value="" disabled selected>Select Category.... </option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Sub Category</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <select class="col-sm-12 pl-0 pr-0" id="subcategory" name="subcat_id" data-style="select-with-transition" title data-size="100">
                                        <option value="" disabled selected> Select Sub Category.... </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Product Name</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="input-name" type="text" placeholder="Name" value required="true" aria-required="true" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Price </label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" name="price" id="input-name" type="text" placeholder="Price" value required="true" aria-required="true" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Qty </label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" name="qty" id="input-name" type="text" placeholder="qty" value required="true" aria-required="true" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn"> Add Products </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#category").on('change', function() {
            var categoryId = $(this).val();
            var SubCategorySelect = $("#subcategory");
            SubCategorySelect.prop("disable", false);

            $.ajax({
                type: "GET",
                data: {
                    'id': categoryId
                },
                url: "{{ route('products.getsubcategory') }}",
                success: function(data) {
                    SubCategorySelect.empty()
                    SubCategorySelect.append(' <option value="" disabled selected> Select Sub Category.... </option>')
                    $.each(data, function(subcategory) {
                        SubCategorySelect.append($('<option>', {
                            value: data[subcategory].id,
                            text: data[subcategory].name
                        }))
                    })
                },
                error: function(error) {
                    console.log(" There is Somethin Went Wrong! ", error);
                }
            })
        });
    });
</script>

@endsection