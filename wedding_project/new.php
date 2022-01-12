<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <title>Convert Excel to HTML Table using JavaScript</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>



    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>

<body>
    <form action="new.php" method="POST">
        <button type="submit" name="submit">ok</button>
    </form>

    <?php

    if (isset($_POST['submit'])) { ?>
        <script>
            swal({
                text: "yeah",
                icon: "success",
                button: false
            });
        </script>
        <meta http-equiv="refresh" content="2; url=new.php">
    <?php }

    ?>


    <div class="container">
        <div class="container">
            <div class="row row-cols-3">
                <div class="col border">Column</div>
                <div class="col border">Column</div>
                <div class="col border">Column</div>
                <div class="col border">Column</div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="text-center mt-4 mb-4">Convert Excel to HTML Table using JavaScript</h2>
        <div class="card">
            <div class="card-header"><b>Select Excel File</b></div>
            <div class="card-body">

                <input type="file" id="excel_file" />

            </div>
        </div>
        <div id="excel_data" class="mt-5"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script>
        const excel_file = document.getElementById('excel_file');

        excel_file.addEventListener('change', (event) => {

            if (!['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'].includes(event.target.files[0].type)) {
                document.getElementById('excel_data').innerHTML = '<div class="alert alert-danger">Only .xlsx or .xls file format are allowed</div>';

                excel_file.value = '';

                return false;
            }

            var reader = new FileReader();

            reader.readAsArrayBuffer(event.target.files[0]);

            reader.onload = function(event) {

                var data = new Uint8Array(reader.result);

                var work_book = XLSX.read(data, {
                    type: 'array'
                });

                var sheet_name = work_book.SheetNames;

                var sheet_data = XLSX.utils.sheet_to_json(work_book.Sheets[sheet_name[0]], {
                    header: 1
                });

                if (sheet_data.length > 0) {
                    var table_output = '<table class="table table-striped table-bordered">';

                    for (var row = 0; row < sheet_data.length; row++) {

                        table_output += '<tr class="yeah">';

                        for (var cell = 0; cell < sheet_data[row].length; cell++) {

                            if (row == 0) {

                                table_output += '<th>' + sheet_data[row][cell] + '</th>';

                            } else {

                                table_output += '<td>' + sheet_data[row][cell] + '</td>';

                            }

                        }

                        table_output += '</tr>';

                    }

                    table_output += '</table>';

                    document.getElementById('excel_data').innerHTML = table_output;
                }

                excel_file.value = '';

            }

        });
    </script>

</body>

</html>

