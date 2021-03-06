@extends('layouts.user')

@section('title')
    Measurements
@endsection

@section('content')
    <div class="page-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">My Measurement</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Measurement</li>
                        </ol>
                        <button data-toggle="modal" data-target="#add-measurement-modal" type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div id="add-measurement-modal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <form method="post" action="{{route('user.measurements.save')}}">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Neck</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="shoulder_width" class="control-label">Shoulder Width</label>
                                            <input type="text" class="form-control" id="shoulder_width" name="shoulder_width" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="arm_hole" class="control-label">Arm Hole</label>
                                            <input type="number" class="form-control" id="arm_hole" name="arm_hole" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="arm_length" class="control-label">Arm Length</label>
                                            <input type="text" class="form-control" id="" name="arm_or_sleeve_length" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pant_length" class="control-label">Pant Length</label>
                                            <input class="form-control" id="pant_or_skirt_length" name="pant_or_skirt_length" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="inseam" class="control-label">Inseam:</label>
                                            <input class="form-control" id="inseam" name="inseam" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="wrist" class="control-label">Wrist:</label>
                                            <input class="form-control" id="wrist" name="wrist" required />
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="neck" class="control-label">Neck </label>
                                            <input type="text" class="form-control" id="neck" name="neck" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="chest_bust" class="control-label">Chest Bust</label>
                                            <input type="number" class="form-control" id="chest_bust" name="chest_bust" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="high_bust" class="control-label">Pant/High Burst</label>
                                            <input type="text" class="form-control" id="high_bust" name="high_bust" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="under_bust" class="control-label">Under Wrist</label>
                                            <input class="form-control" id="under_bust" name="under_bust" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="waist" class="control-label">Waist</label>
                                            <input class="form-control" id="waist" name="waist" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="hips" class="control-label">Hips</label>
                                            <input class="form-control" id="hips" name="hips" required />
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger waves-effect waves-light">Save Measurement</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="m-b-0 text-white">Please Update With Most Recent Body Measurement</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <h3 class="box-title">Person Info</h3>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">First Name:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$user->firstname}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Last Name:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$user->lastname}}  </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Gender:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$user->gender}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Date of Birth:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> 11/06/1987 </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>

                                    <h3 class="box-title">Physique</h3>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Neck:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$user->measurement->neck ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Chest/Bust:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$user->measurement->chest_bust ?? 'Not Provided'}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">High Bust:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$user->measurement->high_bust ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Under Bust:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$user->measurement->under_bust ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Waist:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$user->measurement->waist ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Hips:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$user->measurement->hips ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Shoulder Width:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{$user->measurement->shoulder_width ?? 'Not Provided'}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Arm Hole:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">{{$user->measurement->arm_hole ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Arm/Sleeve Length:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$user->measurement->arm_or_sleeve_length ?? 'Not Provided'}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Skirt/Pants Length:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$user->measurement->pant_or_skirt_length ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Inseam:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$user->measurement->inseam ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Wrist:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> {{$user->measurement->wrist ?? 'Not Provided'}} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn btn-danger"> <i class="fa fa-pencil"></i> Edit</button>
                                                    <button type="button" class="btn btn-inverse">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"> </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
@endsection




