<form id="form" method="POST" action="/form">
    {{ csrf_field() }}

    <div class="row" style="margin-top: 15px;">
        <div class="col-md-12">
            @if(Session::has('error'))
                <div class="alert alert-danger">{!! Session::get('error')  !!}</div>
            @endif
            @if(Session::has('success'))
                <p class="alert alert-info">{{ Session::get('success') }}</p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Name Surname</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Name, Surname" value="{{ old('name') }}">
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group {{ $errors->has('passport') ? 'has-error' : '' }}">
                <label for="passport">Passport</label>
                <input type="text" id="passport" name="passport" class="form-control" placeholder="Enter Passport" value="{{ old('passport') }}">
                <span class="text-danger">{{ $errors->first('passport') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" class="form-control" placeholder="099707808" value="{{ old('phone') }}">
                <span class="text-danger">{{ $errors->first('phone') }}</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Send</button>
    </div>
</form>
<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script>
    $(function () {
        $('#form').on('submit', function (e) {
            $(this).find('button[type="submit"]').attr('disabled', 'disabled');
        });
    });
</script>