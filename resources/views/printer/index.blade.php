<?php $page = 'printer' ?>
@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Printing Information</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content for owner -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Printed Owners Card</h5>

                                <p class="card-text text-center">
                                    {{ $owners['totalPrintedOwnerCards'] != '' ? $owners['totalPrintedOwnerCards'] : 0  }}
                                </p>
                                <a href="{{route('owner.index')}}" class="card-link">View All</a>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    <div class="col-lg-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Owners</h5>
                                <p class="card-text text-center">
                                    {{$owners['totalOwner']}}

                                </p>
                                <a href="{{route('owner.index')}}" class="card-link">View All </a>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    <div class="col-lg-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body text-center">
                                <h5 class="card-title">New Printable Owners Card</h5>

                                <p class="card-text text-center">
                                    {{$owners['newPrintAble']}}
                                </p>
                                <a href="{{route('print.new.owner')}}" class="card-link">View All</a>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    <div class="col-lg-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Renewable Owners Card</h5>

                                <p class="card-text text-center">
                                    {{$owners['reNewAble']}}
                                </p>
                                <a href="{{route('print.renew.owner')}}" class="card-link">View All</a>
                            </div>
                        </div><!-- /.card -->
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->

        <!-- Main content for Driver -->
        <div style="margin-top: 50px" class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card card-info card-outline">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Printed Drivers Card</h5>

                                <p class="card-text text-center">
                                    {{ $owners['totalPrintedOwnerCards'] != '' ? $owners['totalPrintedOwnerCards'] : 0  }}
                                </p>
                                <a href="{{route('owner.index')}}" class="card-link">View Owners</a>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    <div class="col-lg-3">
                        <div class="card card-info card-outline">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Drivers</h5>
                                <p class="card-text text-center">
                                    {{$owners['totalOwner']}}

                                </p>
                                <a href="{{route('owner.index')}}" class="card-link">View All</a>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    <div class="col-lg-3">
                        <div class="card card-info card-outline">
                            <div class="card-body text-center">
                                <h5 class="card-title">New Printable Drivers Card</h5>

                                <p class="card-text text-center">
                                    {{$owners['newPrintAble']}}
                                </p>
                                <a href="{{route('print.new.owner')}}" class="card-link">View All</a>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    <div class="col-lg-3">
                        <div class="card card-info card-outline">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Renewable Drivers Cards</h5>

                                <p class="card-text text-center">
                                    {{$owners['reNewAble']}}
                                </p>
                                <a href="{{route('print.renew.owner')}}" class="card-link">View All</a>
                            </div>
                        </div><!-- /.card -->
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->



    </div>
    <!-- /.content-wrapper -->
@endsection
