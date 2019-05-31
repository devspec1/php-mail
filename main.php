<?php
session_start();
if(!isset($_SESSION['user'])){
    session_unset();
    session_destroy();
    header("Location: http://localhost/phpmail");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SEND EMAIL</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <div class="row pt-2">
        <div class="col-lg-6">
            <div class="container">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>EMAIL</th>
                            <th>PDF</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody id="success_table">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="container">
                    <table id="example2" class="table table-dark table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>EMAIL</th>
                                <th>PDF</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody id="fail_table">
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">
                                    <form action="resend.php" method="post" id="fail_email">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Resend Email</button>
                                    </form>                 
                                </th>
                            </tr>
                    
                    </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
        $(document).ready(function() {
            $('#example2').DataTable();
        });
        var data = JSON.parse(localStorage.getItem('data'));
        $.each(data, function(key, value){
            if(value[2] !== "OK!"){
                $('#success_table').append(`<tr>
                <td>${key}</td>
                <td>${value[0]}</td>
                <td>${value[1]}</td>
                <td><button class="btn btn-outline-success">${value[2]}</button></td>
                </tr>`);
            }else {
                $('#fail_table').append(`<tr>
                <td>${key}</td>
                <td>${value[0]}</td>
                <td>${value[1]}</td>
                <td><button class="btn btn-outline-danger">${value[2]}</button></td>
                </tr>`);
                $('#fail_email').append(`
                    <input type="hidden" value="${value[1]}" name="${value[0]}">
                `);
            }
        });
        
    </script>
</body>
</html>