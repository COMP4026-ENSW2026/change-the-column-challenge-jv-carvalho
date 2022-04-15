Adicionar novo pet:

<form action="/pets" method="post">
    @csrf

    <label for="name">Nome</label>
    <input id="name" name="name" type="text" /> <br/>

    <label for="color">Cor</label>
    <input id="color" name="color" type="text" /> <br/>

    <label for="especie">Especie</label>
    <select name="especie" id="especie">
        <option value="Coelho">Coelho</option>
        <option value="Dragao de Komodo">Dragao de Komodo</option>
        <option value="Mamba">Mamba</option>
        <option value="Cachorro">Cachorro</option>
        <option value="Gato">Gato</option>
        <option value="Passaro">Passaro</option>
        <option value="Peixe">Peixe</option>
        <option value="Tartaruga">Tartaruga</option>
    </select>

    <br/>
    <label for="tamanho">Tamanho</label>
    <select name="tamanho" id="tamanho">
        <option value="Extra pequeno">Extra pequeno</option>
        <option value="Pequeno">Pequeno</option>
        <option value="Medio">Medio</option>
        <option value="Grande">Grande</option>
        <option value="Extra grande">Extra grande</option>
    </select>

    <br/>
    <button type="submit">
        Cadastrar
    </button>
</form>

<a href="/pets">Voltar</a>
