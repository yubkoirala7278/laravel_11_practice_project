@extends('admin.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb  d-xs-flex align-items-center mb-3">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Active Customers</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 text-uppercase">Customers</h6>
                    <hr />
                    <div class="table-responsive">
                        <div class="tb-flex">
                            <div class="action-button-list top-list-action">
                                <strong>Export : </strong>
                                <button type="button" class="btn btn-secondary px-3 radius-30 btn-flex">CVS</button>
                                <button type="button" class="btn btn-secondary px-3 radius-30 btn-flex">Excel</button>
                                <button type="button" class="btn btn-secondary px-3 radius-30 btn-flex">PDF</button>
                                <span>&nbsp;|&nbsp;</span>
                                <a type="button" class="btn btn-primary px-3 radius-30 btn-flex"
                                    href="new-customer.html"><i class="bx bx-plus"></i>New User</a>
                                <button type="button" class="btn btn-danger px-3 radius-30 btn-flex" data-bs-toggle="modal"
                                    data-bs-target="#delete-selected-user-modal"><i class="bx bx-block"></i>Delete
                                    Selected</button>
                            </div>
                            <table border="0" cellspacing="5" cellpadding="5" class="mb-3 option-table">
                                <tbody>
                                    <tr>
                                        <td>Start date:</td>
                                        <td><input type="text" id="min" name="min"
                                                class="form-control form-control-sm"></td>
                                        <td>-</td>
                                        <td>End date:</td>
                                        <td><input type="text" id="max" name="max"
                                                class="form-control form-control-sm"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <table id="user-list-table" class="display nowrap style-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Actions</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="check-option form-check-success"><label for="checkbox1">1</label><input
                                            class="form-check-input" type="checkbox" id="checkbox1"></td>
                                    <td>101</td>
                                    <td><a href="javascript:void(0);">Oliver Stone</a></td>
                                    <td>5pCQm@example.com</td>
                                    <td>Manager</td>
                                    <td>
                                        <div class="action-button-list">
                                            <button type="button" class="btn btn-primary px-3 radius-30 btn-flex"
                                                data-bs-toggle="modal" data-bs-target="#view-user-modal"><i
                                                    class="bx bx-show"></i>View</button>
                                            <button type="button" class="btn btn-dark px-3 radius-30 btn-flex"
                                                data-bs-toggle="modal" data-bs-target="#edit-user-modal"><i
                                                    class="bx bx-edit-alt"></i>Edit</button>
                                            <button type="button" class="btn btn-danger px-3 radius-30 btn-flex"
                                                data-bs-toggle="modal" data-bs-target="#delete-user-modal"><i
                                                    class="bx bx-trash-alt"></i>Delete</button>
                                            <button type="button" class="btn btn-warning px-3 radius-30 btn-flex"
                                                data-bs-toggle="modal" data-bs-target="#disableModal"><i
                                                    class="bx bx-block"></i>Disable</button>
                                        </div>
                                    </td>
                                    <td class="date-time">2023-01-12 <span>15:24:57</span></td>
                                </tr>
                                <tr>
                                    <td class="check-option form-check-success"><label for="checkbox2">2</label><input
                                            class="form-check-input" type="checkbox" id="checkbox2"></td>
                                    <td>102</td>
                                    <td><a href="javascript:void(0);">james bond</a></td>
                                    <td>45T5Y@example.com</td>
                                    <td>Branch Manager</td>
                                    <td>
                                        <div class="action-button-list">
                                            <button type="button" class="btn btn-primary px-3 radius-30 btn-flex"
                                                data-bs-toggle="modal" data-bs-target="#view-user-modal"><i
                                                    class="bx bx-show"></i>View</button>
                                            <button type="button" class="btn btn-dark px-3 radius-30 btn-flex"
                                                data-bs-toggle="modal" data-bs-target="#edit-user-modal"><i
                                                    class="bx bx-edit-alt"></i>Edit</button>
                                            <button type="button" class="btn btn-danger px-3 radius-30 btn-flex"
                                                data-bs-toggle="modal" data-bs-target="#delete-user-modal"><i
                                                    class="bx bx-trash-alt"></i>Delete</button>
                                            <button type="button" class="btn btn-warning px-3 radius-30 btn-flex"
                                                data-bs-toggle="modal" data-bs-target="#disableModal"><i
                                                    class="bx bx-block"></i>Disable</button>
                                        </div>
                                    </td>
                                    <td class="date-time">2023-01-12 <span>15:24:57</span></td>
                                </tr>
                                <tr>
                                    <td class="check-option form-check-success"><label for="checkbox3">3</label><input
                                            class="form-check-input" type="checkbox" id="checkbox3"></td>
                                    <td>103</td>
                                    <td><a href="javascript:void(0);">James Wright</a></td>
                                    <td>qgZlZ@example.com</td>
                                    <td>Branch Manager</td>
                                    <td>
                                        <div class="action-button-list">
                                            <button type="button" class="btn btn-primary px-3 radius-30 btn-flex"
                                                data-bs-toggle="modal" data-bs-target="#view-user-modal"><i
                                                    class="bx bx-show"></i>View</button>
                                            <button type="button" class="btn btn-dark px-3 radius-30 btn-flex"
                                                data-bs-toggle="modal" data-bs-target="#edit-user-modal"><i
                                                    class="bx bx-edit-alt"></i>Edit</button>
                                            <button type="button" class="btn btn-danger px-3 radius-30 btn-flex"
                                                data-bs-toggle="modal" data-bs-target="#delete-user-modal"><i
                                                    class="bx bx-trash-alt"></i>Delete</button>
                                            <button type="button" class="btn btn-warning px-3 radius-30 btn-flex"
                                                data-bs-toggle="modal" data-bs-target="#disableModal"><i
                                                    class="bx bx-block"></i>Disable</button>
                                        </div>
                                    </td>
                                    <td class="date-time">2023-01-12 <span>15:24:57</span></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S.N</th>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Actions</th>
                                    <th>Created At</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('model')
    <!-- View user Modal -->
    <div class="modal fade" id="view-user-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">ID</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" value="101" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Username</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" value="Oliver Stone" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" value="5pCQm@example.com" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Role</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" value="Manager" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Created At</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" value="2023-01-12 15:24:57" readonly />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit-user-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">ID</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" value="101" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Username</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" value="Oliver Stone" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="email" class="form-control" value="5pCQm@example.com" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Role</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" value="Manager" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Created At</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" value="2023-01-12 15:24:57" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Confirm Delete user Modal  -->
    <div class="modal fade" id="delete-user-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Are you sure you want to delete this user?</div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary px-5 py-2" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger px-5 py-2">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Confirm Delete selected users Modal  -->
    <div class="modal fade" id="delete-selected-user-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Selected ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Are you sure you want to delete these selected users?</div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary px-5 py-2" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger px-5 py-2">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
