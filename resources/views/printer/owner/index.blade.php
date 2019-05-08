<?php $page = 'printer' ?>
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
                                    <span class="table-data-info-header "><strong>Total Owners:</strong><span
                                                class="total_info"> {{$owners->total()}}</span></span>
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

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Sl No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th>Validity Date</th>
                                        <th>Registration No</th>
                                        <th>Preview</th>
                                        <th>Print</th>
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
                                                <td>
                                                    <button data-previewLink="{{route('owner.print',$owner->id)}}"
                                                            class="btn btn-flat btn-primary" id="previewOwnerCardBtn">
                                                        Preview Card
                                                    </button>
                                                </td>
                                                <td><a target="_blank" href="{{route('owner.print',$owner->id)}}"
                                                       class="btn btn-flat btn-primary">Print Card</a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                {{--end of owner table--}}
                                <br>

                                <!-- pagination -->
                            <?php
                            if (isset($_GET['search']))
                            {
                                $value = $_GET['search'];
                            } else
                            {
                                $value = '';
                            };
                            //setting pagination depend on search result
                            if (isset($_GET['search']))
                            {
                                echo $owners->appends(['search' => $value])->render();
                            } else
                            {
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

    <!-- Modal -->
    <div id="previewOwnerCardMoal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <iframe id="previewIframeUrl" width="100%" height="500px" frameborder="0"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>



@endsection
@section('footer-scripts')
<script>
    $(document).ready(function () {
        $(document).on('click', '#previewOwnerCardBtn', function (event) {
            event.preventDefault();
            let url = $(this).data('previewlink');
            $("#previewIframeUrl").attr('src',url);
            /* Act on the event */
            $("#previewOwnerCardMoal").modal('show');
        });
    });

</script>
@endsection