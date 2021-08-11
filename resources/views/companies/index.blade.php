@extends('layout')

@section('cabecalho')
    Companies
@endsection

@section('conteudo')

    @if(!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif

    <a href="{{route('create_company')}}" class="btn btn-dark mb-2">Add</a>

    <ul class="list-group">
        @foreach($companies as $company)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span id="company-name-{{ $company->id }}">{{ $company->name }}</span>

                <div class="input-group w-50" hidden id="input-company-name-{{ $company->id }}">
                    Name<input type="text" class="form-control" value="{{ $company->name }}">
                    Email<input type="text" class="form-control" value="{{ $company->email }}">
                    Website<input type="text" class="form-control" value="{{ $company->website }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editCompany({{ $company->id }})">
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>

                <span class="d-flex">
                    <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $company->id }})">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="/companies/{{ $company->id }}"
                          onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>

    <script>
        function toggleInput(compId) {
            const compNameEl = document.getElementById(`company-name-${compId}`);
            const inputCompanyEl = document.getElementById(`input-company-name-${compId}`);
            if (compNameEl.hasAttribute('hidden')) {
                compNameEl.removeAttribute('hidden');
                inputCompanyEl.hidden = true;
            } else {
                inputCompanyEl.removeAttribute('hidden');
                compNameEl.hidden = true;
            }
        }

        function editCompany(compId) {
            let formData = new FormData();
            const nome = document
                .querySelector(`#input-company-name-${compId} > input`)
                .value;
            const token = document
                .querySelector(`input[name="_token"]`)
                .value;
            formData.append('nome', nome);
            formData.append('_token', token);
            const url = `/companies/${compId}/editCompany`;
            fetch(url, {
                method: 'POST',
                body: formData
            }).then(() => {
                toggleInput(compId);
                document.getElementById(`company-name-${compId}`).textContent = nome;
            });
        }
    </script>
@endsection
