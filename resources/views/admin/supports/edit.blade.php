<h1>Dúvida {{$supportEditted->id}}</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('supports.update', $supportEditted->id ) }}" method="POST">

    @csrf()
    @method('PUT')
    <input type="text" placeholder="Assunto" name="subject" value="{{ $supportEditted->subject }}"/>
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ $supportEditted->body }}</textarea>
    <button type="submit">Enviar</button>
</form>