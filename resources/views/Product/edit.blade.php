@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('products.update', $product->id) }}" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Products </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="https://black-dashboard-pro-laravel.creative-tim.com/item" class="btn btn-sm btn-primary">Back to list</a>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Product Name</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="input-name" type="text" placeholder="Name" value="{{$product->name}}" required="true" aria-required="true" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Price </label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" name="price" id="input-name" type="text" placeholder="Price" value="{{$product->price}}" required="true" aria-required="true" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Qty </label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input class="form-control" name="qty" id="input-name" type="text" placeholder="qty" value="{{$product->qty}}" required="true" aria-required="true" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn"> Edit Products </button>
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