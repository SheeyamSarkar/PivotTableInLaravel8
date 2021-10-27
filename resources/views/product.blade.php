@extends('/partial/master')

@section('title','Products')

@section('container')

<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <h1 class="dashboard-title">Products</h1>
        </div>
        <div class="col-6 dashboard-title text-end">
            <button data-bs-toggle="modal" data-bs-target="#addInfo" class="btn-outline">+ Add Product</button>
        </div>
    </div>
</div>
<div class="container-fluid section-padding">
    <div class="row mb-5 g-4">
        <div class="col-12">
            <div class="card summary-card" style="width: 100%">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="productTable"
                                    class="table table-borderless align-middle text-center dashboardTable customTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Brand</th>
                                            <th scope="col">Product Slug</th>
                                            <th scope="col">Product Tag</th>
                                            <th scope="col" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($product))
                                        @foreach($product as $p)
                                        @foreach($p->slugs as $s)
                                        @foreach($p->tags as $t)
                                        <tr id="item{{ $p->id }}">
                                            <td>{{$p->product_name}}</td>
                                            <td>{{$p->product_brand}}</td>
                                            <td>{{$s->slug}}</td>
                                            <td>{{$t->tag}}</td>
                                            
                                            <td class="actionBtn text-center">
                                                
                                                <button onclick='viewproduct({{$p->id}})'><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path fill="#BDBDBD"
                                                            d="M21.92 11.6C19.9 6.91 16.1 4 12 4s-7.9 2.91-9.92 7.6a1 1 0 000 .8C4.1 17.09 7.9 20 12 20s7.9-2.91 9.92-7.6a1 1 0 000-.8zM12 18c-3.17 0-6.17-2.29-7.9-6C5.83 8.29 8.83 6 12 6s6.17 2.29 7.9 6c-1.73 3.71-4.73 6-7.9 6zm0-10a4 4 0 100 8 4 4 0 000-8zm0 6a2 2 0 110-4 2 2 0 010 4z" />
                                                    </svg>
                                                </button>
                                                <button onclick='editproduct({{$p->id}})'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path fill="#BDBDBD"
                                                            d="M5 18h4.24a1 1 0 00.71-.29l6.92-6.93L19.71 8a1 1 0 000-1.42l-4.24-4.29a1 1 0 00-1.42 0l-2.82 2.83-6.94 6.93a.999.999 0 00-.29.71V17a1 1 0 001 1zm9.76-13.59l2.83 2.83-1.42 1.42-2.83-2.83 1.42-1.42zM6 13.17l5.93-5.93 2.83 2.83L8.83 16H6v-2.83zM21 20H3a1 1 0 100 2h18a1 1 0 000-2z" />
                                                    </svg>

                                                </button>
                                                <button onclick='deleteproduct({{$p->id}})'><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path fill="#EB5757"
                                                            d="M10 16.8a1 1 0 001-1v-6a1 1 0 00-2 0v6a1 1 0 001 1zm10-12h-4v-1a3 3 0 00-3-3h-2a3 3 0 00-3 3v1H4a1 1 0 000 2h1v11a3 3 0 003 3h8a3 3 0 003-3v-11h1a1 1 0 100-2zm-10-1a1 1 0 011-1h2a1 1 0 011 1v1h-4v-1zm7 14a1 1 0 01-1 1H8a1 1 0 01-1-1v-11h10v11zm-3-1a1 1 0 001-1v-6a1 1 0 00-2 0v6a1 1 0 001 1z" />
                                                    </svg>

                                                </button> 
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Add Product -->
<div class="modal custom-modal add-modal fade" id="addInfo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="#BDBDBD"
                            d="M13.41 12l6.3-6.29a1.004 1.004 0 10-1.42-1.42L12 10.59l-6.29-6.3a1.004 1.004 0 00-1.42 1.42l6.3 6.29-6.3 6.29a1 1 0 000 1.42.998.998 0 001.42 0l6.29-6.3 6.29 6.3a.999.999 0 001.42 0 1 1 0 000-1.42L13.41 12z" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form id='profrm'>
                    @csrf
                    <div class="row">
                        <div class="col-12 form-input">
                            <label for="name">Product Name</label>
                            <input class="form-control" type="text" placeholder="Product Name" id="product_name" name="product_name">
                        </div>
                        <div class="col-12 form-input">
                            <label for="name">Product Brand</label>
                            <input class="form-control" type="text" placeholder="Product Name" id="product_brand" name="product_brand">
                        </div>
                        
                        <div class="col-12 form-input">
                            <label for="select" class=" form-control-label">Product Slug</label>
                            <select name="slug_id" id="slug_id" class="form-control">
                                <option value="0">Please select</option>
                                @foreach($slug as $s)
                                <option value="{{$s->id}}">{{$s->slug}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 form-input">
                            <label for="select" class=" form-control-label">Product Tag</label>
                            <select name="tag_id" id="tag_id" class="form-control">
                                <option value="0">Please select</option>
                                @foreach($tag as $t)
                                <option value="{{$t->id}}">{{$t->tag}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit">Add Product</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<!-- End Product -->
<!-- View Product -->
<div class="modal custom-modal view-modal fade" id="productview" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="#BDBDBD" d="M13.41 12l6.3-6.29a1.004 1.004 0 10-1.42-1.42L12 10.59l-6.29-6.3a1.004 1.004 0 00-1.42 1.42l6.3 6.29-6.3 6.29a1 1 0 000 1.42.998.998 0 001.42 0l6.29-6.3 6.29 6.3a.999.999 0 001.42 0 1 1 0 000-1.42L13.41 12z" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="row ">
                    <div class="col-12">
                        <h6>product_name</h6>
                        <h5 id="view_name"></h5>
                    </div>

                </div>

                <div class="col-lg-12">
                    <h6>product_brand</h6>
                    <h5 id="view_brand"></h5>
                </div>

                <div class="col-lg-12">
                    <h6>Slug</h6>
                    <h5 id="slug"></h5>
                </div>

                <div class="col-lg-12">
                    <h6 >Tag : </h6> 
                    <h5 id="tag"></h5>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- End View Product -->
<!-- Edit Product -->
<div class="modal custom-modal add-modal fade" id="editInfo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="#BDBDBD"
                            d="M13.41 12l6.3-6.29a1.004 1.004 0 10-1.42-1.42L12 10.59l-6.29-6.3a1.004 1.004 0 00-1.42 1.42l6.3 6.29-6.3 6.29a1 1 0 000 1.42.998.998 0 001.42 0l6.29-6.3 6.29 6.3a.999.999 0 001.42 0 1 1 0 000-1.42L13.41 12z" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form id='producteditfrm'>
                    @csrf
                    <input type="hidden" id="id" name="id" />
                    <div class="row">
                        <div class="col-12 form-input">
                            <label for="name">Product Name</label>
                            <input class="form-control" type="text" placeholder="Product Name" id="product_name2" name="product_name2">
                        </div>
                        <div class="col-12 form-input">
                            <label for="name">Product Brand</label>
                            <input class="form-control" type="text" placeholder="Product Name" id="product_brand2" name="product_brand2">
                        </div>
                        
                        <div class="col-12 form-input">
                            <label for="select" class=" form-control-label">Product Slug</label>
                            <select name="slug_id2" id="slug_id2" class="form-control">
                                <option value="">Please select</option>
                                @foreach($slug as $s)
                                <option value="{{$s->id}}">{{$s->slug}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 form-input">
                            <label for="select" class=" form-control-label">Product Tag</label>
                            <select name="tag_id2" id="tag_id2" class="form-control">
                                <option value="">Please select</option>
                                @foreach($tag as $t)
                                <option value="{{$t->id}}">{{$t->tag}}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit">Update Product</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<!-- End Edit Product -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Add -->
<script >
    /*var toastMixin = Swal.mixin({
            toast: true,
            title: 'General Title',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });*/
// add form validation
        $(document).ready(function() {
            $("#profrm").validate({
                rules: {
                    product_name: {
                        required: true,
                        maxlength: 15,
                    },
                    product_brand: {
                        required: true,
                        maxlength: 15,
                    },

                    slug_id: {
                    required: true,
                    },

                    tag_id: {
                    required: true,
                    },
                },
                messages: {
                    product_name: {
                        required: 'Please insert  name',
                    },
                    product_brand: {
                        required: 'Please insert brand',
                    },

                    slug_id: {
                    required: 'Please Select Slug',
                    },

                    tag_id: {
                    required: 'Please Select Tag',
                    },
                    
                },
                errorPlacement: function(label, element) {
                    label.addClass('mt-2 text-danger');
                    label.insertAfter(element);
                },
            });

            $("#producteditfrm").validate({
                rules: {
                    product_name: {
                        required: true,
                        maxlength: 15,
                    },
                    product_brand: {
                        required: true,
                        maxlength: 15,
                    },

                    slug_id: {
                    required: true,
                    },

                    tag_id: {
                    required: true,
                    },
                },
                messages: {
                    product_name: {
                        required: 'Please insert  name',
                    },
                    product_brand: {
                        required: 'Please insert brand',
                    },
                    slug_id: {
                    required: 'Please Select Slug',
                    },
                    tag_id: {
                    required: 'Please Select Tag',
                    },
                },
                errorPlacement: function(label, element) {
                    label.addClass('mt-2 text-danger');
                    label.insertAfter(element);
                },
            });
        });

jQuery('#profrm').submit(function(e){
        e.preventDefault();

        let product_name=$('#product_name').val();
        let product_brand=$('#product_brand').val();
        let slug_id=$('#slug_id').val();
        let tag_id=$('#tag_id').val();
        let _token=$('input[name=_token]').val();

        $.ajax({
            url:"{{url('/addproduct')}}",
            type:'POST',
            data:{
                product_name:product_name,
                product_brand:product_brand,
                slug_id:slug_id,
                tag_id:tag_id,
                _token:_token
            },
            success:function(response){
                console.log(response);
                if(response){
                    //alert(response.data.id);
                    $('#productTable tbody').prepend('<tr><td>'+ response.data.product_name +'</td><td>'+ response.data.product_brand +'</td><td>'+ response.data.slug +'</td><td>'+ response.data.tag +'</td><td class="actionBtn text-center"><button onclick="viewproduct('+ response.data.id +')"><svg xmlns="http://www.w3.org/2000/svg" width="24"  height="24" fill="none" viewBox="0 0 24 24"><path fill="#BDBDBD"  d="M21.92 11.6C19.9 6.91 16.1 4 12 4s-7.9 2.91-9.92 7.6a1 1 0 000 .8C4.1 17.09 7.9 20 12 20s7.9-2.91 9.92-7.6a1 1 0 000-.8zM12 18c-3.17 0-6.17-2.29-7.9-6C5.83 8.29 8.83 6 12 6s6.17 2.29 7.9 6c-1.73 3.71-4.73 6-7.9 6zm0-10a4 4 0 100 8 4 4 0 000-8zm0 6a2 2 0 110-4 2 2 0 010 4z" /> </svg> </button><button onclick="editproduct('+ response.data.id +')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"> <path fill="#BDBDBD" d="M5 18h4.24a1 1 0 00.71-.29l6.92-6.93L19.71 8a1 1 0 000-1.42l-4.24-4.29a1 1 0 00-1.42 0l-2.82 2.83-6.94 6.93a.999.999 0 00-.29.71V17a1 1 0 001 1zm9.76-13.59l2.83 2.83-1.42 1.42-2.83-2.83 1.42-1.42zM6 13.17l5.93-5.93 2.83 2.83L8.83 16H6v-2.83zM21 20H3a1 1 0 100 2h18a1 1 0 000-2z" /> </svg> </button><button onclick="deleteproduct('+ response.data.id +')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"> <path fill="#EB5757" d="M10 16.8a1 1 0 001-1v-6a1 1 0 00-2 0v6a1 1 0 001 1zm10-12h-4v-1a3 3 0 00-3-3h-2a3 3 0 00-3 3v1H4a1 1 0 000 2h1v11a3 3 0 003 3h8a3 3 0 003-3v-11h1a1 1 0 100-2zm-10-1a1 1 0 011-1h2a1 1 0 011 1v1h-4v-1zm7 14a1 1 0 01-1 1H8a1 1 0 01-1-1v-11h10v11zm-3-1a1 1 0 001-1v-6a1 1 0 00-2 0v6a1 1 0 001 1z" /> </svg></button></td></tr>');
                    $('#profrm')[0].reset();
                    $('#addInfo').modal('hide');
                }
            }
        })
    });
</script>

<!-- view Start-->

<script>
    function viewproduct(id) {
        $.ajax({
            url: "{{url('/viewproduct')}}",
            method: "POST",
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function(response) {
                if (response.success == true) {
                    $('#view_name').html(response.data.product_name);
                    $('#view_brand').html(response.data.product_brand);
                    $('#slug').html(response.data.slug);
                    $('#tag').html(response.data.tag);
                    $('#productview').modal('show');

                } //success end

            }
        }); //ajax end
    } 
</script>
<!-- view end -->

<!-- Edit Start-->
<script>
    //-----------------------------Edit Methods----------------------//
    function editproduct(id) {
        $.ajax({
            url: "{{url('/editproduct')}}",
            method: "POST",
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function(response) {
                if (response.success == true) {
                    $('#product_name2').val(response.data.product_name);
                    $('#product_brand2').val(response.data.product_brand);
                    //$('#slug_id2').val(response.data.slug)
                    //$('#tag_id2').val(response.data.tag)
                    //$('#hidden_id').val(response.data.id);
                    $.each(response.data.slugs, function(index, value) {
                        $('#slug_id2').val(value.id);
                    });

                    $.each(response.data.tags, function(index, value) {
                        $('#tag_id2').val(value.id);
                    });

                    $('#id').val(response.data.id);
                    $('#editInfo').modal('show');

                }

            }
        }); //ajax end
        //-----------------------------Update----------------------//
        $(document).off('submit', '#producteditfrm');
        $(document).on('submit', '#producteditfrm', function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{url('/updateproduct')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    if (response.success == true) {
                        $('.item' + response.data.id).replaceWith(`<tr class='item${response.data.id}'><td>${response.data.product_name}</td><td>${response.data.product_brand}</td><td>${response.data.slug}</td><td>${response.data.tag}</td><td class="actionBtn text-center"> <button  onclick='viewproduct(${response.data.id})'><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                                    <path fill="#BDBDBD"
                                                                        d="M21.92 11.6C19.9 6.91 16.1 4 12 4s-7.9 2.91-9.92 7.6a1 1 0 000 .8C4.1 17.09 7.9 20 12 20s7.9-2.91 9.92-7.6a1 1 0 000-.8zM12 18c-3.17 0-6.17-2.29-7.9-6C5.83 8.29 8.83 6 12 6s6.17 2.29 7.9 6c-1.73 3.71-4.73 6-7.9 6zm0-10a4 4 0 100 8 4 4 0 000-8zm0 6a2 2 0 110-4 2 2 0 010 4z" />
                                                                </svg>
                                                            </button>
                                                            <button  onclick='editproduct(${response.data.id})'><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                                    <path fill="#BDBDBD"
                                                                        d="M5 18h4.24a1 1 0 00.71-.29l6.92-6.93L19.71 8a1 1 0 000-1.42l-4.24-4.29a1 1 0 00-1.42 0l-2.82 2.83-6.94 6.93a.999.999 0 00-.29.71V17a1 1 0 001 1zm9.76-13.59l2.83 2.83-1.42 1.42-2.83-2.83 1.42-1.42zM6 13.17l5.93-5.93 2.83 2.83L8.83 16H6v-2.83zM21 20H3a1 1 0 100 2h18a1 1 0 000-2z" />
                                                                </svg>

                                                            </button>
                                                            <button onclick='deleteproduct(${response.data.id})'><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                                    <path fill="#EB5757"
                                                                        d="M10 16.8a1 1 0 001-1v-6a1 1 0 00-2 0v6a1 1 0 001 1zm10-12h-4v-1a3 3 0 00-3-3h-2a3 3 0 00-3 3v1H4a1 1 0 000 2h1v11a3 3 0 003 3h8a3 3 0 003-3v-11h1a1 1 0 100-2zm-10-1a1 1 0 011-1h2a1 1 0 011 1v1h-4v-1zm7 14a1 1 0 01-1 1H8a1 1 0 01-1-1v-11h10v11zm-3-1a1 1 0 001-1v-6a1 1 0 00-2 0v6a1 1 0 001 1z" />
                                                                </svg>

                                                            </button></td></tr>`)
                        if (response.data.message) {
                            $('#editInfo').modal('hide');
                            toastMixin.fire({
                                icon: 'success',
                                animation: true,
                                title: response.data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#producteditfrm').trigger('reset');

                        }

                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'warning',
                            title: response.data.error,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                },
            });
        });
    } //end update

</script>
<!-- Edit end -->

<script>
    // delete
    function deleteproduct(id) {
        // alert(id)
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{url('/deleteproduct')}}",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: 'JSON',
                    success: function(response) {

                        if (response.success === true) {
                            toastMixin.fire({
                                icon: 'success',
                                animation: true,
                                title: "" + response.data.message + ""
                            });
                            $('#productTable').DataTable().row('.item' + response.data.id)
                                .remove()
                                .draw();
                        } else {
                            Swal.fire("Error!", "Can't delete item", "error");
                        }
                    }
                });

            }
        })


    }
</script>

@endsection