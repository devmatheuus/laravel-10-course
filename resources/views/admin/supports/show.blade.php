<h1>Detalhes da dúvida {{ $supportFinded->id }}</h1>

<ul>
    <li>Assunto: {{$supportFinded->subject}}</li>
    <li>Status: {{$supportFinded->status}}</li>
    <li>Descrição: {{$supportFinded->body}}</li>
</ul>

<form action="{{ route('supports.destroy', $supportFinded->id) }}" method="POST">
    @csrf()
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>