@extends('admin.layouts.master')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-xs-flex align-items-center mb-3">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Role List</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 text-uppercase">Roles List</h6>
                    <hr />
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <div class="tb-flex">
                            <div class="action-button-list top-list-action">
                                <button type="button" class="btn btn-info px-3 radius-30 btn-flex" data-bs-toggle="modal"
                                    data-bs-target="#new-role-modal"><i class="bx bx-plus"></i>New Role</button>
                                <button type="button" class="btn btn-danger px-3 radius-30 btn-flex"
                                    id="delete-selected-btn" data-bs-toggle="modal"
                                    data-bs-target="#delete-selected-role-modal"><i class="bx bx-trash"></i>Delete
                                    Selected</button>
                            </div>
                        </div>
                        <table id="role-table" class="display nowrap style-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="select-all"></th>
                                    <th>S.N:</th>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Permissions</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $index => $role)
                                    <tr>
                                        <td><input type="checkbox" class="role-checkbox" value="{{ $role->id }}"></td>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach ($role->permissions as $permission)
                                                <span class="badge bg-dark">{{ $permission->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="action-button-list">
                                                <button type="button" class="btn btn-primary px-3 radius-30 btn-flex view-role"
                                                    data-id="{{ $role->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#view-role-modal"><i class="bx bx-show"></i>View</button>
                                                <button type="button" class="btn btn-dark px-3 radius-30 btn-flex edit-role"
                                                    data-id="{{ $role->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#edit-role-modal"><i class="bx bx-edit-alt"></i>Edit</button>
                                                <button type="button" class="btn btn-danger px-3 radius-30 btn-flex delete-role"
                                                    data-id="{{ $role->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#delete-role-modal"><i class="bx bx-trash"></i>Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>S.N:</th>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Permissions</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('model')
    <!-- New Role Modal -->
    <div class="modal fade" id="new-role-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="new-role-form" class="row g-3">
                        @csrf
                        <div class="col-md-12">
                            <label for="role-name" class="form-label">Role Title</label>
                            <div class="position-relative input-icon">
                                <input type="text" class="form-control" id="role-name" name="name"
                                    placeholder="Enter Role Title">
                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-news'></i></span>
                            </div>
                            <label class="form-label">Select Permissions</label>
                            <div class="multi-select-container">
                                <div class="selected-tags"></div>
                                <input type="text" class="tag-input form-control" placeholder="Select permissions...">
                                <div class="options-container">
                                    @foreach ($permissions as $permission)
                                        <div class="option" data-value="{{ $permission->name }}">{{ $permission->name }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="save-new-role">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Role Modal -->
    <div class="modal fade" id="view-role-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Role Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Permissions</th>
                        </tr>
                        <tr>
                            <td id="view-role-id"></td>
                            <td id="view-role-name"></td>
                            <td id="view-role-permissions"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Role Modal -->
    <div class="modal fade" id="edit-role-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-role-form" class="row g-3">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit-role-id" name="id">
                        <div class="col-md-12">
                            <label for="edit-role-name" class="form-label">Role Title</label>
                            <div class="position-relative input-icon">
                                <input type="text" class="form-control" id="edit-role-name" name="name">
                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-news'></i></span>
                            </div>
                            <label class="form-label">Select Permissions</label>
                            <div class="multi-select-container">
                                <div class="selected-tags"></div>
                                <input type="text" class="tag-input form-control" placeholder="Select permissions...">
                                <div class="options-container">
                                    @foreach ($permissions as $permission)
                                        <div class="option" data-value="{{ $permission->name }}">{{ $permission->name }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="save-edit-role">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Role Modal -->
    <div class="modal fade" id="delete-role-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Are you sure you want to delete this role?</div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary px-5 py-2" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger px-5 py-2" id="confirm-delete-role">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Selected Roles Modal -->
    <div class="modal fade" id="delete-selected-role-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Are you sure you want to delete the selected roles?</div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary px-5 py-2" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger px-5 py-2" id="confirm-bulk-delete">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            // Initialize DataTable
            const table = $('#role-table').DataTable({
                scrollX: true,
                paging: true,
                fixedColumns: {
                    leftColumns: 1
                }
            });

            // Select all checkboxes
            $('#select-all').on('click', function () {
                $('.role-checkbox').prop('checked', this.checked);
            });

            // Multi-select functionality
            $('.multi-select-container').each(function () {
                const $container = $(this);
                const $optionsContainer = $container.find('.options-container');
                const $selectedTags = $container.find('.selected-tags');
                const $tagInput = $container.find('.tag-input');

                $tagInput.on('focus', function () {
                    $optionsContainer.show();
                });

                $(document).on('click', function (event) {
                    if (!$(event.target).closest('.multi-select-container').length) {
                        $optionsContainer.hide();
                    }
                });

                $optionsContainer.on('click', '.option', function () {
                    const optionText = $(this).data('value');
                    if (!$selectedTags.find(`.tag[data-value="${optionText}"]`).length) {
                        $selectedTags.append(
                            `<div class="tag" data-value="${optionText}">${optionText}<span class="remove-tag">×</span></div>`
                        );
                        $tagInput.val('');
                        $(this).addClass('selected');
                    }
                });

                $selectedTags.on('click', '.remove-tag', function () {
                    const tagText = $(this).parent().data('value');
                    $optionsContainer.find(`.option[data-value="${tagText}"]`).removeClass('selected');
                    $(this).parent().remove();
                });

                $tagInput.on('input', function () {
                    const query = $(this).val().toLowerCase();
                    $optionsContainer.find('.option').each(function () {
                        const optionText = $(this).text().toLowerCase();
                        $(this).toggle(optionText.includes(query));
                    });
                });
            });

            // Create new role
            $('#save-new-role').on('click', function () {
                const form = $('#new-role-form');
                const name = form.find('#role-name').val();
                const permissions = form.find('.selected-tags .tag').map(function () {
                    return $(this).data('value');
                }).get();

                $.ajax({
                    url: '{{ route("admin.role.store") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: name,
                        permissions: permissions
                    },
                    success: function (response) {
                        $('#new-role-modal').modal('hide');
                        alert(response.success);
                        location.reload();
                    },
                    error: function (xhr) {
                        alert(xhr.responseJSON.error || 'An error occurred');
                    }
                });
            });

            // View role
            $('.view-role').on('click', function () {
                const roleId = $(this).data('id');
                $.ajax({
                    url: '{{ route("admin.role.show", ":id") }}'.replace(':id', roleId),
                    method: 'GET',
                    success: function (response) {
                        $('#view-role-id').text(response.id);
                        $('#view-role-name').text(response.name);
                        $('#view-role-permissions').html(
                            response.permissions.map(p => `<span class="badge bg-dark">${p.name}</span>`).join(' ')
                        );
                    },
                    error: function (xhr) {
                        alert(xhr.responseJSON.error || 'An error occurred');
                    }
                });
            });

            // Edit role
            $('.edit-role').on('click', function () {
                const roleId = $(this).data('id');
                $.ajax({
                    url: '{{ route("admin.role.show", ":id") }}'.replace(':id', roleId),
                    method: 'GET',
                    success: function (response) {
                        $('#edit-role-id').val(response.id);
                        $('#edit-role-name').val(response.name);
                        const $selectedTags = $('#edit-role-modal .selected-tags');
                        $selectedTags.empty();
                        response.permissions.forEach(function (perm) {
                            $selectedTags.append(
                                `<div class="tag" data-value="${perm.name}">${perm.name}<span class="remove-tag">×</span></div>`
                            );
                            $(`#edit-role-modal .option[data-value="${perm.name}"]`).addClass('selected');
                        });
                    },
                    error: function (xhr) {
                        alert(xhr.responseJSON.error || 'An error occurred');
                    }
                });
            });

            $('#save-edit-role').on('click', function () {
                const form = $('#edit-role-form');
                const roleId = form.find('#edit-role-id').val();
                const name = form.find('#edit-role-name').val();
                const permissions = form.find('.selected-tags .tag').map(function () {
                    return $(this).data('value');
                }).get();

                $.ajax({
                    url: '{{ route("admin.role.update", ":id") }}'.replace(':id', roleId),
                    method: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: name,
                        permissions: permissions
                    },
                    success: function (response) {
                        $('#edit-role-modal').modal('hide');
                        alert(response.success);
                        location.reload();
                    },
                    error: function (xhr) {
                        alert(xhr.responseJSON.error || 'An error occurred');
                    }
                });
            });

            // Delete role
            let deleteRoleId;
            $('.delete-role').on('click', function () {
                deleteRoleId = $(this).data('id');
            });

            $('#confirm-delete-role').on('click', function () {
                $.ajax({
                    url: '{{ route("admin.role.destroy", ":id") }}'.replace(':id', deleteRoleId),
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        $('#delete-role-modal').modal('hide');
                        alert(response.success);
                        location.reload();
                    },
                    error: function (xhr) {
                        alert(xhr.responseJSON.error || 'An error occurred');
                    }
                });
            });

            // Bulk delete
            $('#confirm-bulk-delete').on('click', function () {
                const roleIds = $('.role-checkbox:checked').map(function () {
                    return $(this).val();
                }).get();

                if (roleIds.length === 0) {
                    alert('Please select at least one role to delete');
                    return;
                }

                $.ajax({
                    url: '{{ route("admin.role.bulk-destroy") }}',
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        role_ids: roleIds
                    },
                    success: function (response) {
                        $('#delete-selected-role-modal').modal('hide');
                        alert(response.success);
                        location.reload();
                    },
                    error: function (xhr) {
                        alert(xhr.responseJSON.error || 'An error occurred');
                    }
                });
            });
        });
    </script>
@endpush
