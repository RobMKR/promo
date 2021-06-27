<div class="counts">
    <div class="total">Total customers: {{ $data['counts']['total'] }}</div>
    <div class="total">Unique customers: {{ $data['counts']['unique'] }}</div>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Passport</th>
            <th scope="col">Name</th>
            <th scope="col">Created</th>
            <th scope="col">Phone</th>
            <th scope="col">Creator</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['rows'] as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->passport }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->created_at->setTimezone('Asia/Yerevan')->format('d.m.Y H:i') }}</td>
                <td>{{ $row->phone_number }}</td>
                <td>{{ $row->creator->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>