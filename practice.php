<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="app-form-group">
                <label for="birthday" style="font-family:'Verdana'; color:grey; font-size:12px;">BIRTHDAY</label>
                <input class="app-form-control" type="date" id="birthday" name="birthday">
              </div>
              <script>
                  birthday.max = new Date().toLocaleDateString('en-ca')
              </script>

              <?php
                function unique_username($connection, $username, $user_role){
                    $temp = $username;

                    $query = "select user_name from HHF_USER where user_name='$temp'";
                    $stid = oci_parse($connection, $query);
                    oci_execute($stid);

                    $total_result=0;
                    while(($row = oci_fetch_array($stid)) != false){
                        $total_result++;
                    }

                    oci_free_statement($stid);
                    oci_close($connection);

                    if($total_result== 0){
                        return $username;                   
                    }
                    else{
                        $_SESSION["username_error_message"] = "This email address is already used.";

                        if ($user_role == 'C') {
                            header("location: newregister.php");
                        }
                        if ($user_role == 'T') {
                            header("location: traderregister.php");
                        }
                    }

        
                }
              ?>
</body>
</html>