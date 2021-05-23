<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>JSON</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-10">
                <table id="dTable" class="table table-hover table-striped table-responsive mt-5">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>House</th>
                        <th>Reign</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $.getJSON('http://mysafeinfo.com/api/data?list=englishmonarchs&format=json', function(data) {
                var userData = '';
                $.each(data, function(key, value) {
                    userData += '<tr>';
                    userData += '<td>' + value.ID + '</td>';
                    userData += '<td>' + value.Name + '</td>';
                    userData += '<td>' + value.Country + '</td>';
                    userData += '<td>' + value.House + '</td>';
                    userData += '<td>' + value.Reign + '</td>';
                    userData += '</tr>';
                });
                $("#dTable").append(userData);
            });
        });
    </script>
</body>

</html>