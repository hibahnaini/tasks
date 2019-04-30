<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tasks</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>

    <body style="background-color:#f7f4f4"  >
        <div class="container" >
            <nav class="navbar navbar-default text-center">
                <H1>Tasks Dashboard</H1>
            </nav>
        </div>

        @yield('content')
    <script type="text/javascript">
        function done(id) {
          $.ajax({
             url: 'done',
             type: "post",
             data: {_token: "{{ csrf_token() }}",
               id:id},
               success: function() {
                  console.log($('#'+id).parent());
                  el = $('#'+id).parent();
                  $('#undoneList').find(el).remove();
                  el.find("button").removeClass('btn-default');
                  el.find("button").addClass('btn-danger');
                  el.find('button').attr("onclick","undone("+id+")");
                  el.find('span').removeClass('glyphicon-ok');
                  el.find('span').addClass('glyphicon-arrow-left');
                  $('#doneList').append(el);
              }
           });

        }
        function undone(id) {
          console.log("The id is: "+ id);
          $.ajax({
             url: 'undone',
             type: "post",
             data: {_token: "{{ csrf_token() }}",
               id:id},
               success: function() {
                 console.log($('#'+id).parent());
                 el = $('#'+id).parent();
                 $('#doneList').find(el).remove();
                 el.find("button").removeClass('btn-danger');
                 el.find("button").addClass('btn-default');
                 el.find('button').attr("onclick","done("+id+")");
                 el.find('button').find('span').removeClass('glyphicon-arrow-left');
                 el.find('button').find('span').addClass('glyphicon-ok');
                 $('#undoneList').append(el);
              }
           });
        }
    </script>
    </body>
</html>
