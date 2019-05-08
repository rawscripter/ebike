<?php $page = 'owner' ?>
@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">All Owner List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h3>All Owner's List</h3>
                            <br>
                            <!-- {{--owner list table--}} -->
                            <p>
                                <span class="table-data-info-header "><strong>Total Owners:</strong><span class="total_info"> {{$owners->total()}}</span></span>
                                <span class="table-data-info-header"><strong> Current Page Number:</strong> {{$owners->currentPage()}}</span>
                                <span class="table-data-info-header"><strong> Total In This Page:</strong> {{$owners->count()}} </span>

                                {!! Form::open(['action' => 'OwnerController@search','method' => 'GET', 'id'=>"search_form"]) !!}
                                <span class="table-data-info-header">
                                    {{ Form::text('search', null, ['class' => 'search-box', 'placeholder'=>'Search individual info by ( Name / Phone / Registration Number)'])}}
                                </span>
                                {!! Form::close() !!}
                            </p>
                            <hr>
                            <div>


                            </div>

                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th scope="col">Sl No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th>Validity Date</th>
                                        <th>Registration No</th>
                                        <th>Create Date</th>
                                        <th>Last Update Date</th>
                                    </tr>
                                </thead>
                                <tbody id="output_owner_data">

                                    @if($owners)
                                    @foreach($owners as $owner)
                                    <tr class="info_row" data-info="{{$owner}}">
                                        <th scope="row">{{ $owner->id  }}</th>
                                        <td>{{$owner->name}}</td>
                                        <td>{{$owner->phone_number == '' ? 'N/A' : $owner->phone_number }}</td>
                                        <td>{{$owner->validity_date  }}</td>
                                        <td>{{$owner->vehicle_no}}</td>
                                        <td>{{$owner->created_at->diffForHumans()}}</td>
                                        <td>{{$owner->updated_at->diffForHumans()}}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {{--end of owner table--}}
                            <br>

                            <!-- pagination -->
                            <?php
                            if(isset($_GET['search'])){
                                $value = $_GET['search'] ;
                            }else{
                                $value = '';
                            };
                             //setting pagination depend on search result
                            if(isset($_GET['search'])){
                                echo $owners->appends(['search' => $value])->render();
                            }else{
                                echo $owners->render();
                            }
                            ?>
                            <!-- end pagination -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal start -->
<div class="modal fade" id="view_more_details_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Owner Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {{--all Content Goes Here--}}



            <!-- DELETE BUTTOn -->
            {{--<div class="text-left">--}}
                {{--<i class="fa fa-trash delete_btn btn "  data-toggle="tooltip" data-placement="top" title="Click To Delete Owner"></i>--}}
            {{--</div>--}}

            {{-- delete form --}}

            {{-- {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}
            {!! Form::submit('Delete',['class'=>'btn btn-danger pull-right btn-block']) !!}
            {!! Form::close() !!} --}}

            {{-- end delete form --}}

            <p class="owner-img text-center ">
                <img class="modal-image img-circle"  height="150" width="150" alt="Image">

            </p>


            <table class="table table-bordered table-striped modal_table">
                <tbody class="append_more_modal_data">
                    <tr>
                        {{-- for edit and delete the values --}}
                        <input type="hidden" class="deleteable_id">
                        <input type="hidden" class="updateable_id">
                        {{-- for edit and delete the values --}}
                        <td>Name:</td>
                        <td class="modal_name" ></td>
                    </tr>
                    <tr>
                        <td>Father Name:</td>
                        <td class="modal_father_name"></td>
                    </tr>
                    <tr>
                        <td>Registration No:</td>
                        <td class="modal_vehicle_no"></td>
                    </tr>
                    <tr>
                        <td>RF ID:</td>
                        <td class="modal_owner_rf_id"></td>
                    </tr>
                    <tr>
                        <td>Validity Date:</td>
                        <td class="modal_validity_date"></td>
                    </tr>
                    <tr class="display_hidden">
                        <td>Present Address:</td>
                        <td class="modal_present_address"></td>
                    </tr>
                    <tr class="display_hidden">
                        <td>Permanent Address:</td>
                        <td class="modal_permanent_address"></td>
                    </tr class="display_hidden">

                    <tr class="display_hidden">
                        <td>Birth Date:</td>
                        <td class="modal_birth_date"></td>
                    </tr>

                    <tr class="display_hidden">
                        <td>National ID:</td>
                        <td class="modal_national_id"></td>
                    </tr>
                    <tr class="display_hidden">
                        <td>Nationality:</td>
                        <td class="modal_nationality"></td>
                    </tr>
                    <tr class="display_hidden">
                        <td>Religion:</td>
                        <td class="modal_religion"></td>
                    </tr>
                    <tr class="display_hidden">
                        <td>Education:</td>
                        <td class="modal_education"></td>
                    </tr>
                    <tr class="display_hidden">
                        <td>Phone Number:</td>
                        <td class="modal_phone_number"></td>
                    </tr>
                    <tr class="display_hidden">
                        <td>Blood Group:</td>
                        <td class="modal_blood_group"></td>
                    </tr>
                    <tr class="display_hidden">
                        <td>Vehicle Type:</td>
                        <td class="modal_vehicle_type"></td>
                    </tr>
                    <tr class="display_hidden">
                        <td>Identifier Name:</td>
                        <td class="modal_identifier_info"></td>
                    </tr>
                </tbody>
            </table>
            <span class="text-left">
                <button class="btn custom-button-modal btn-flat btn-primary load_more_btn"  data-toggle="tooltip" data-placement="top" title="Click to view all information">Load More Information</button>

            </span>
                <span class="text-right" style="display: block;margin-top: -40px">
                <button class="btn custom-button-modal btn-flat btn-warning update_btn" data-toggle="tooltip" data-placement="top" title="Click to view update the owner">Update</button>
            </span>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>
<!-- end modal start -->




@endsection

@section('footer-scripts')

<!-- display ownerdata with modal script -->
<script src="/js/owner-modal.js"></script>


<script>
    $(document).ready(function() {
        $(document).on('click', '.upload_image', function(event) {
            event.preventDefault();
            /* Act on the event */
            $("#upload_image_modal").modal('show');
        });
    });
</script>

@endsection
