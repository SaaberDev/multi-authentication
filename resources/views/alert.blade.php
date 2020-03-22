@section('success_alert_registration')
    @if (session('status'))
        <div class="alert alert-danger text-center" role="alert">
            {{ session('status') }} <br>
            {{ session('greet') }}
        </div>
    @elseif (session('registered'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('registered') }} <br>
        </div>
        <div class="alert alert-warning text-center" role="alert">
            {{ session('login_again') }} <br>
            {{ session('approval_duration') }}
        </div>
    @endif
@endsection
