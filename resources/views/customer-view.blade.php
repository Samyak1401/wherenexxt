<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <table class="table table-dark table-bordered table-responsive table-striped table-hover">
        <thead>
            <tr>
                <th scope="col" >ID</th>
                <th scope="col" >First Name</th>
                <th scope="col" >Last Name</th>
                <th scope="col" >Email</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td scope="row">{{ $customer->Customer_id }}</td>
                    <td scope="row">{{ $customer->Customer_Fname }}</td>
                    <td scope="row">{{ $customer->Customer_Lname }}</td>
                    <td scope="row">{{ $customer->Customer_Email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>