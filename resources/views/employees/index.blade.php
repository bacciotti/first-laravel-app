@extends('layout')

@section('cabecalho')
    Employees
@endsection

@section('conteudo')

    @if(!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif

    <a href="{{route('create_employee')}}" class="btn btn-dark mb-2">Add</a>
    <ul class="list-group">
        @foreach($employees as $employee)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span id="employee-firstName-{{ $employee->id }}">{{ $employee->firstName }}</span>

                <div class="input-group " hidden id="input-employee-firstName-{{ $employee->id }}">
                    First Name<input type="text" class="form-control d-inline" value="{{ $employee->firstName }}">
                    Last Name<input type="text" class="form-control" value="{{ $employee->lastName }}">
                    Company ID<input type="text" class="form-control" value="{{ $employee->company_id }}">
                    Email<input type="text" class="form-control" value="{{ $employee->email }}">
                    Phone<input type="text" class="form-control" value="{{ $employee->phone }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editEmployee({{ $employee->id }})">
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>

                <span class="d-flex">
                    <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $employee->id }})">
                        <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="/employees/{{ $employee->id }}"
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
        function toggleInput(employeeId) {
            const empfirstNameEl = document.getElementById(`employee-firstName-${employeeId}`);
            const inputEmployeeEl = document.getElementById(`input-employee-firstName-${employeeId}`);
            if (empfirstNameEl.hasAttribute('hidden')) {
                empfirstNameEl.removeAttribute('hidden');
                inputEmployeeEl.hidden = true;
            } else {
                inputEmployeeEl.removeAttribute('hidden');
                empfirstNameEl.hidden = true;
            }
        }

        function editEmployee(employeeId) {
            let formData = new FormData();
            const nome = document
                .querySelector(`#input-employee-firstName-${employeeId} > input`)
                .value;
            // const token = document
            //     .querySelector(`input[firstName="_token"]`)
            //     .value;
            formData.append('nome', nome);
            // formData.append('_token', token);
            const url = `/employees/${employeeId}/editEmployee`;
            fetch(url, {
                method: 'POST',
                body: formData
            }).then(() => {
                toggleInput(employeeId);
                document.getElementById(`employee-firstName-${employeeId}`).textContent = nome;
            });
        }
    </script>
@endsection
