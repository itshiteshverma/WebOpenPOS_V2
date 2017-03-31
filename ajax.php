
<html>

<head>
    <title>HitReminder</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="logo.PNG" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>

<html>
  <head>
<!--    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
    <script>
      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'post.php',
            data: $('form').serialize(),
            success: function () {
              alert('form was submitted');
            }
          });

        });

      });
    </script>
  </head>
  <body>
    <form>
      <input name="time" value="00:00:00.00"><br>
      <input name="date" value="0000-00-00"><br>
      <input name="submit" type="submit" value="Submit">
    </form>
  </body>
</html>

</html>