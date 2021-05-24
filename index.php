<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>JSON and AJAX</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>View Data</h4>
                    </div>
                    <di class="card-body">
                        <table id="dTable" class="table table-hover table-striped table-responsive">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Country</th>
                                <th>House</th>
                                <th>Reign</th>
                            </tr>
                        </table>
                    </di>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <script>
    $(function() {

        opt1();

        function opt1() {
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
        }

        function opt2() {
            $.get('http://mysafeinfo.com/api/data?list=englishmonarchs&format=json', function(data) {
                var userData = '';
                var users = $.parseJSON(data);
                $.each(users, function(key, value) {
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
        }

        function opt3() {
            $.ajax({
                url: 'http://mysafeinfo.com/api/data?list=englishmonarchs&format=json',
                method: 'GET',
                dataType: 'JSON',
                success: function(data) {
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
                }
            });
        }
    });
    </script>
</body>

</html>