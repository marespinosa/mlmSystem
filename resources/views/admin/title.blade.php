<div class="align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 {{$alignment}}">{{ $WelcomeNote}}</h1>


    @if(Request::is('dashboard'))
        <a href="earnings-total.html" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> All Reports</a>
    @endif





</div>