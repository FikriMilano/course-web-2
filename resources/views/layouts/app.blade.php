<html>
<head>
    @vite(['resources/js/app.js'])
    {{--    <title>{{config('app.name')}}</title>--}}
    @yield('title')
</head>
<body>

{{-- Sample Modal not showing --}}
<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Portfolio</span>
        <ul class="nav nav-pills">
            @yield('nav-items')
        </ul>
    </nav>

    @if(session()->get('alertType') != null and session()->get('alertMsg'))
        <div class="alert alert-{{session()->get('alertType')}} alert-dismissible fade show" role="alert">
            {{session()->get('alertMsg')}}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="jumbotron jumbotron-fluid pt-2">
        @yield('content')
    </div>
</div>
</body>
</html>
