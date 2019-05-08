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
                            <li class="breadcrumb-item active">New Owner</li>
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


                                <div class="row">
                                    <div class="col-12">
                                        <p class="owner-img text-center ">
                                            <img class="modal-image img-circle"
                                                 src="{{$owner->image}}"
                                                 height="150" width="150" alt="Image">
                                        <form enctype="multipart/form-data" class="form-vertical" role="form" method="post"
                                              action="{{ route('owner.image', $owner->id) }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-3 m-auto">
                                                    <div class="input-group mb-3">
                                                        <input type="file" name="file" class="form-control">
                                                        <div class="input-group-append">
                                                            <input type="submit" class="input-group-text"
                                                                   id="upload_image_button" value="Upload">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        </p>
                                    </div>
                                </div>


                                {!! Form::model($owner ,['action' => ['OwnerController@update', $owner->id], 'method'=>'PUT','id'=>'update_owner_form']) !!}
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('name', 'Name:', ['class' => 'form-label'] )}}
                                            {{ Form::text('name', null, ['class' => 'form-control'])}}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('father_name', 'Father / Husband Name:', ['class' => 'form-label'] )}}
                                            {{ Form::text('father_name', null, ['class' => 'form-control'])}}
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('present_address', 'Present Address:', ['class' => ''] )}}
                                            {{ Form::textarea('present_address', null, ['class' => 'form-control present_address','rows'=>'5'])}}
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('permanent_address', 'Permanent Address:', ['class' => ''] )}}
                                            {{ Form::checkbox('address', '1',null,['class'=>'checkbox'])}} (Same As
                                            Present Address)
                                            {{ Form::textarea('permanent_address', null, ['class' => 'form-control permanent_address','rows'=>'5'])}}
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('birth_registration_id', 'Birth Registration Number:', ['class' => ''] )}}
                                            {{ Form::text('birth_registration_id', null, ['class' => 'form-control'])}}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('birth_date', 'Birth Date (DD/MM/YYYY):', ['class' => ''] )}}
                                            {{ Form::text('birth_date', null, ['class' => 'form-control'])}}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('national_id', 'National ID Number:', ['class' => ''] )}}
                                            {{ Form::text('national_id', null, ['class' => 'form-control'])}}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('nationality', 'Nationality:', ['class' => ''] )}}
                                            {{  Form::select('nationality', [''=>'Select','বাংলাদেশি' => 'বাংলাদেশি','অন্যান্য'=>'অন্যান্য'], 'বাংলাদেশি' , ['class'=>'form-control'])}}
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('religion', 'Religion:', ['class' => ''] )}}
                                            {{  Form::select('religion', [''=>'Select','ইসলাম' => 'ইসলাম', 'হিন্দু' => 'হিন্দু','বৌদ্ধ'=>'বৌদ্ধ','খ্রিস্টান'=>'খ্রিস্টান','অন্যান্য'=>'অন্যান্য'], $owner->religion , ['class'=>'form-control'])}}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('education', 'Education:', ['class' => ''] )}}
                                            {{ Form::text('education', null, ['class' => 'form-control'])}}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('phone_number', 'Phone Number:', ['class' => ''] )}}
                                            {{ Form::text('phone_number', null, ['class' => 'form-control'])}}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('blood_group', 'Blood Group:', ['class' => ''] )}}
                                            {{  Form::select('blood_group',
                                            [''=>'Select','A+' => 'A+', 'A-' => 'A-','B+'=>'B+','B-'=>'B-','O+'=>'O+','O-'=>'O-','AB+'=>'AB+','AB-'=>'AB-'],
                                            $owner->blood_group, ['class'=>'form-control'])}}

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('vehicle_no', 'Easy Bike Number:', ['class' => ''] )}}
                                            {{ Form::text('vehicle_no', null, ['class' => 'form-control','maxlength'=>'4'])}}
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            {{ Form::label('identifier_info', 'Identifier Name:', ['class' => ''] )}}
                                            {{ Form::text('identifier_info', null, ['class' => 'form-control'])}}
                                        </div>
                                    </div>

                                    <div class="col-12 text-right">
                                        {{ Form::submit('Submit',['class' => 'btn btn-primary btn-flat btn-lg custom-button'])}}
                                    </div>
                                </div>
                                {!! Form::close() !!}

                                {{--display all errors--}}
                                <div id="errors"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('footer-scripts')
    <script src="/js/owner.js"></script>
@endsection
