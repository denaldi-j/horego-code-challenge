<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col" style="width: 50px">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Organization</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($persons as $index => $person)
        <tr>
            <th scope="row">{{ $index+1 }}</th>
            <td>
                <div class="d-flex flex-row">
                    <img src="{{ asset('avatar/'.$person->avatar) }}" class="img-fluid" style="height: 50px" alt="avatar">
                    <span class="ms-2">{{ $person->name }}</span>
                </div>
            </td>
            <td>{{ $person->email }}</td>
            <td>{{ $person->phone }}</td>
            <td>{{ $person->organization?->name }}</td>
            <td>
                <a href="{{ route('person.create', ['id' => $person->id]) }}" class="text-warning me-2">edit</a>
                <a href="{{ route('person.destroy', ['id' => $person->id]) }}" class="text-danger">delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
