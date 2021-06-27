<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Passport</th>
            <th scope="col">Name</th>
            <th scope="col">Created</th>
            <th scope="col">Phone</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->passport }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->created_at->setTimezone('Asia/Yerevan')->format('d.m.Y H:i') }}</td>
                <td>{{ $row->phone_number }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>