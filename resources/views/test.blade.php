<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test page</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- bootstrap cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


    <div class="container">
        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display error message -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form class="row g-3" action="{{ route('sms_send') }}" method="POST">
            @csrf
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Phone number</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    placeholder="Enter phone number">
            </div>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Message</label>
                <input type="text" class="form-control" id="mssg" name="mssg" placeholder="Enter message">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Send</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
