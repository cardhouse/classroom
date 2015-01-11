@if($errors->any())
    <div class="alert alert-danger">
        <p>There were some errors with the form:</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif