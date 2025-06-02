@extends('admin.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-xs-flex align-items-center mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                    </ol>
                </nav>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 text-uppercase">Edit User</h6>
                    <hr />
                    <form id="edit-user-form" class="row g-3">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit-user-id" value="{{ $user->id }}">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password (Leave blank to keep unchanged)</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Select Roles</label>
                            <div class="multi-select-container">
                                <div class="selected-tags">
                                    @foreach ($user->roles as $role)
                                        <div class="tag" data-value="{{ $role->name }}">{{ $role->name }}<span class="remove-tag">×</span></div>
                                    @endforeach
                                </div>
                                <input type="text" class="tag-input form-control" placeholder="Select roles...">
                                <div class="options-container">
                                    @foreach ($roles as $role)
                                        <div class="option {{ $user->hasRole($role->name) ? 'selected' : '' }}" data-value="{{ $role->name }}">{{ $role->name }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" id="save-edit-user">Update</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            // Multi-select functionality
            const $container = $('.multi-select-container');
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

            // Update user
            $('#save-edit-user').on('click', function () {
                const form = $('#edit-user-form');
                const userId = form.find('#edit-user-id').val();
                const name = form.find('#name').val();
                const email = form.find('#email').val();
                const password = form.find('#password').val();
                const password_confirmation = form.find('#password_confirmation').val();
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
                        alert(response.success);
                        window.location.href = '{{ route("users.index") }}';
                    },
                    error: function (xhr) {
                        alert(xhr.responseJSON.error || 'An error occurred');
                    }
                });
            });
        });
    </script>
@endpush