   <?php               
    if($_POST['submit'])
    {            
        $username = "root";
        $password = "08800";
        $hostname = "localhost";
        $dbname = "test";

        //connection to the database:
        $db = mysqli_connect($hostname, $username, $password, $dbname, '3306')
        or die("Unable to connect to MySQL");

        $id = !empty($_POST[id]) ? "'$_POST[id]'" : "NULL";
        $fname = !empty($_POST[fname]) ? "'$_POST[fname]'" : "NULL";
        $lname = !empty($_POST[lname]) ? "'$_POST[lname]'" : "NULL";    

        
        $sql = "INSERT INTO blah(id, name)
                    VALUES ($id, $fname)";

        $result = $db->query($sql) OR trigger_error($db->error);

        if ($result && $db->affected_rows > 0)
        {
            // store session data
            $_SESSION['fileid']=$id;
            echo 'Creating file '.$id.'<br/>
                <a href = "partTwo.php" class="button">Continue</a>';
        }
        else
            echo "No changes made.";
    }               
    else 
        echo '<form method="post" action="">
                <div><span class = "formlabel">File number:</span><input type="Text" name="id"></div>
                <div><span class = "formlabel">First name:</span><input type="Text" name="fname"></div>
                <div><span class = "formlabel">Last name:</span><input type="Text" name="lname"></div>
                <input class="submit" type="Submit" name="submit" value="Submit">
            </form>';
?>