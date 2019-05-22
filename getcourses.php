<?php
    include_once "connection.php";

    if(!empty($_POST['subject'])){
      $subject = $_POST["subject"];
      $query = "SELECT * FROM coursetable WHERE subject = '$subject'";
      $results = mysqli_query($con, $query);

      foreach($results as $coursetable){
      ?>
      <option value="<?php echo $coursetable['course']; ?>"><?php echo $coursetable['course']; ?></option>
      <?php
      }
    }
?>
