


@extends('admin.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-xs-flex align-items-center mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Active Users</li>
                    </ol>
                </nav>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 text-uppercase">Users</h6>
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
                                <a type="button" class="btn btn-primary px-3 radius-30 btn-flex" href="{{ route('users.create') }}"><i class="bx bx-plus"></i>New User</a>
                                <button type="button" class="btn btn-danger px-3 radius-30 btn-flex" id="delete-selected-btn" data-bs-toggle="modal" data-bs-target="#delete-selected-user-modal"><i class="bx bx-trash"></i>Delete Selected</button>
                            </div>
                        </div>
                        <table id="user-list-table" class="display nowrap style-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="select-all"></th>
                                    <th>S.N</th>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td><input type="checkbox" class="user-checkbox" value="{{ $user->id }}"></td>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->id }}</td>
                                        <td><a href="javascript:void(0);">{{ $user->name }}</a></td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
                                        <td>
                                            <span class="badge bg-{{ $user->is_active ? 'success' : 'danger' }}">
                                                {{ $user->is_active ? 'Active' : 'Disabled' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-button-list">
                                                <button type="button" class="btn btn-primary px-3 radius-30 btn-flex view-user" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#view-user-modal"><i class="bx bx-show"></i>View</button>
                                                <button type="button" class="btn btn-dark px-3 radius-30 btn-flex edit-user" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#edit-user-modal"><i class="bx bx-edit-alt"></i>Edit</button>
                                                <button type="button" class="btn btn-danger px-3 radius-30 btn-flex delete-user" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#delete-user-modal"><i class="bx bx-trash-alt"></i>Delete</button>
                                                <button type="button" class="btn btn-warning px-3 radius-30 btn-flex toggle-status" data-id="{{ $user->id }}"><i class="bx bx-block"></i>{{ $user->is_active ? 'Disable' : 'Enable' }}</button>
                                            </div>
                                        </td>
                                        <td class="date-time">{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>S.N</th>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                    <th>Created At</th>
                                </tr>
                            </tfoot>
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <!-- View User Modal -->
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
                            <input type="text" class="form-control" id="view-user-id" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Username</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" id="view-user-name" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" id="view-user-email" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Roles</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" id="view-user-roles" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Status</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" id="view-user-status" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Created At</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" id="view-user-created_at" readonly />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="edit-user-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-user-form" class="row g-3">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit-user-id">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Username</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" id="edit-user-name" name="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" id="edit-user-email" name="email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="password" class="form-control" id="edit-user-password" name="password" placeholder="Leave blank to keep unchanged">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Confirm Password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="password" class="form-control" id="edit-user-password_confirmation" name="password_confirmation" placeholder="Confirm new password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Roles</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div class="multi-select-container">
                                    <div class="selected-tags"></div>
                                    <input type="text" class="tag-input form-control" placeholder="Select roles...">
                                    <div class="options-container">
                                        @foreach ($roles as $role)
                                            <div class="option" data-value="{{ $role->name }}">{{ $role->name }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="save-edit-user">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete User Modal -->
    <div class="modal fade" id="delete-user-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Are you sure you want to delete this user?</div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary px-5 py-2" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger px-5 py-2" id="confirm-delete-user">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Selected Users Modal -->
    <div class="modal fade" id="delete-selected-user-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Selected?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Are you sure you want to delete these selected users?</div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary px-5 py-2" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger px-5 py-2" id="confirm-bulk-delete">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Disable/Enable User Modal -->
    <div class="modal fade" id="toggle-status-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="toggle-status-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="toggle-status-message"></div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary px-5 py-2" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-warning px-5 py-2" id="confirm-toggle-status">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            // Initialize DataTable
            const table = $('#user-list-table').DataTable({
                scrollX: true,
                paging: true,
                fixedColumns: {
                    leftColumns: 1
                }
            });

            // Select all checkboxes
            $('#select-all').on('click', function () {
                $('.user-checkbox').prop('checked', this.checked);
            });

            // Multi-select functionality for edit modal
            function initializeMultiSelect($container) {
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
            }

            // Initialize multi-select for edit modal
            initializeMultiSelect($('#edit-user-modal .multi-select-container'));

            // View user
            $('.view-user').on('click', function () {
                const userId = $(this).data('id');
                $.ajax({
                    url: '{{ route("users.show", ":id") }}'.replace(':id', userId),
                    method: 'GET',
                    success: function (response) {
                        $('#view-user-id').val(response.id);
                        $('#view-user-name').val(response.name);
                        $('#view-user-email').val(response.email);
                        $('#view-user-roles').val(response.roles.map(r => r.name).join(', '));
                        $('#view-user-status').val(response.is_active ? 'Active' : 'Disabled');
                        $('#view-user-created_at').val(new Date(response.created_at).toLocaleString());
                    },
                    error: function (xhr) {
                        alert(xhr.responseJSON.error || 'An error occurred');
                    }
                });
            });

            // Edit user (load data into modal)
            $('.edit-user').on('click', function () {
                const userId = $(this).data('id');
                $.ajax({
                    url: '{{ route("users.show", ":id") }}'.replace(':id', userId),
                    method: 'GET',
                    success: function (response) {
                        $('#edit-user-id').val(response.id);
                        $('#edit-user-name').val(response.name);
                        $('#edit-user-email').val(response.email);
                        $('#edit-user-password').val('');
                        $('#edit-user-password_confirmation').val('');
                        const $selectedTags = $('#edit-user-modal .selected-tags');
                        $selectedTags.empty();
                        response.roles.forEach(function (role) {
                            $selectedTags.append(
                                `<div class="tag" data-value="${role.name}">${role.name}<span class="remove-tag">×</span></div>`
                            );
                            $(`#edit-user-modal .option[data-value="${role.name}"]`).addClass('selected');
                        });
                    },
                    error: function (xhr) {
                        alert(xhr.responseJSON.error || 'An error occurred');
                    }
                });
            });

            // Update user
            $('#save-edit-user').on('click', function () {
                const form = $('#edit-user-form');
                const userId = form.find('#edit-user-id').val();
                const name = form.find('#edit-user-name').val();
                const email = form.find('#edit-user-email').val();
                const password = form.find('#edit-user-password').val();
                const password_confirmation = form.find('#edit-user-password_confirmation').val();
                const roles = form.find('.selected-tags .tag').map(function () {
                    return $(this).data('value');
                }).get();

                $.ajax({
                    url: '{{ route("users.update", ":id") }}'.replace(':id', userId),
                    method: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: name,
                        email: email,
                        password: password,
                        password_confirmation: password_confirmation,
                        roles: roles
                    },
                    success: function (response) {
                        $('#edit-user-modal').modal('hide');
                        alert(response.success);
                        location.reload();
                    },
                    error: function (xhr) {
                        alert(xhr.responseJSON.error || 'An error occurred');
                    }
                });
            });

            // Delete user
            let deleteUserId;
            $('.delete-user').on('click', function () {
                deleteUserId = $(this).data('id');
            });

            $('#confirm-delete-user').on('click', function () {
                $.ajax({
                    url: '{{ route("users.destroy", ":id") }}'.replace(':id', deleteUserId),
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        $('#delete-user-modal').modal('hide');
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
                const userIds = $('.user-checkbox:checked').map(function () {
                    return $(this).val();
                }).get();

                if (userIds.length === 0) {
                    alert('Please select at least one user to delete');
                    return;
                }

                $.ajax({
                    url: '{{ route("users.bulk-destroy") }}',
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        user_ids: userIds
                    },
                    success: function (response) {
                        $('#delete-selected-user-modal').modal('hide');
                        alert(response.success);
                        location.reload();
                    },
                    error: function (xhr) {
                        alert(xhr.responseJSON.error || 'An error occurred');
                    }
                });
            });

            // Toggle status
            let toggleUserId;
            $('.toggle-status').on('click', function () {
                toggleUserId = $(this).data('id');
                const isActive = $(this).text().includes('Disable');
                $('#toggle-status-title').text(isActive ? 'Disable User?' : 'Enable User?');
                $('#toggle-status-message').text(`Are you sure you want to ${isActive ? 'disable' : 'enable'} this user?`);
            });

            $('#confirm-toggle-status').on('click', function () {
                $.ajax({
                    url: '{{ route("users.toggle-status", ":id") }}'.replace(':id', toggleUserId),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        $('#toggle-status-modal').modal('hide');
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
