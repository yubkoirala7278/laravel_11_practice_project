<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="user-id" content="{{ auth()->id() }}">

    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


    @vite(['resources/js/app.js'])

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .notification-icon {
            position: relative;
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: 0;
            font-size: 0.75rem;
            background: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
        }

        .dropdown-menu {
            width: 300px;
        }

        .notification-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .notification-item:last-child {
            border-bottom: none;
        }
    </style>

</head>

<body>


    {{-- logout --}}
    <div class="mt-4 container">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>


        {{-- bell icon notification --}}
        <div class="dropdown">
            <div class="notification-icon" data-bs-toggle="dropdown" aria-expanded="false" id="notification-bell">
                <i class="bi bi-bell-fill fs-3"></i>
                <span class="notification-badge" id="notification-count">{!! auth()->user()->notifications()->where('read', false)->count() !!}</span>
            </div>

            <ul class="dropdown-menu mt-2" id="notification-list">
                @foreach (auth()->user()->notifications()->latest()->get() as $notification)
                    <li class="notification-item">{!! $notification->message !!}</li>
                @endforeach
            </ul>
        </div>





        @yield('content')
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>


    <script>
        // Listen for UserCreated event
        document.addEventListener('DOMContentLoaded', () => {
            Echo.private('admin-notifications').listen('UserCreated', (e) => {
                // Append new notification to the list
                const notificationList = document.getElementById('notification-list');
                const newNotification = document.createElement('li');
                newNotification.className = 'notification-item';
                newNotification.innerHTML = e.message;
                notificationList.prepend(newNotification);

                // Update notification count
                const notificationCount = document.getElementById('notification-count');
                let currentCount = parseInt(notificationCount.textContent) || 0;
                notificationCount.textContent = currentCount + 1;
            });

            // Reset notification count on bell click
            document.getElementById('notification-bell').addEventListener('click', () => {
                // Send AJAX request to mark notifications as read
                fetch('/notifications/mark-as-read', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                }).then(response => {
                    if (response.ok) {
                        // Reset notification count
                        document.getElementById('notification-count').textContent = '0';
                    }
                });
            });
        });
    </script>

</body>

</html>
