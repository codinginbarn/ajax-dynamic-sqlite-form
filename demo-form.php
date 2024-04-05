<!DOCTYPE html>
<html>
<head>
    <title>Dynamically Add or Remove Input Fields in PHP, JQuery, SQLite and BS 5</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h2 class="text-center my-4">Add or Remove Input Fields in PHP, JQuery, SQLite and BS 5</h2>
        <form name="add_name" id="add_name" method="post">
            <div class="mb-3">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td><input type="text" name="skill[]" placeholder="Enter your Skill" class="form-control" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
                <input type="button" name="submit" id="submit" class="btn btn-primary" value="Submit" />
            </div>
        </form>
        <div id="message"></div>
    </div>
    <script>
        $(document).ready(function(){
            var i=1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="skill[]" placeholder="Enter your Skill" class="form-control" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });

            // AJAX form submission
            $("#submit").click(function(e){
                e.preventDefault(); // Prevent the default form submission

                var formData = $("#add_name").serialize(); // Serialize form data

                $.ajax({
                    type: "POST",
                    url: "process.php",
                    data: formData,
                    success: function(response){
                        var data = JSON.parse(response);
                        if (data.success) {
                            $("#message").html(data.message);
                            // Optionally, you can clear the form fields here
                        } else {
                            $("#message").html(data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle any errors here
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>