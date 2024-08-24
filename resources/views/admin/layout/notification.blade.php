@if(session()->has('success'))
    <div class="alert alert-primary" role="alert">
        <p>{{session()->get('success')}}</p>
    </div>
@endif