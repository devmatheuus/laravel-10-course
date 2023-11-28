<h1>Nova dúvida</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('supports.store') }}" method="POST">

    @csrf()
    <input type="text" placeholder="Assunto" name="subject" value="{{ old('subject') }}"/>
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ old('body') }}</textarea>
    <button type="submit">Enviar</button>
</form>