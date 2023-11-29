<h1>Dúvida {{$supportEditted->id}}</h1>

<x-alert/>

<form action="{{ route('supports.update', $supportEditted->id ) }}" method="POST">
    @method('PUT')
    @include('admin.supports.partials.form', [
        'support' => $supportEditted
    ])
</form>