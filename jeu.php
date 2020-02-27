<?php
 $numberToGuess = 150;
 $error = null;
 $success = null;
 $value = null;

/* a list of super variable */
/*
$_GET
$_POST
$_SESSION
$_ENV
$_REQUEST
$_SERVER
$_COOKIE
*/

 /* if a number has already been entered */
 /* first solution with the request get
  if (isset($_GET['number'])) {
 
  if ($_GET['number']> $numberToGuess) { 
     $error = 'Enter a smaller number';
  } 
    else { 
         if ($_GET['number']< $numberToGuess) {
             $error = 'Enter a bigger number';
        } else {
                $success = 'Well done, you won';
        }
    }
    $value= (int) $_GET['number']; 
 }
*/

/* second solution with the request post */
  if (isset($_POST['number'])) {
    $value= (int) $_POST['number']; 
  if ($value> $numberToGuess) { 
     $error = 'Enter a smaller number';
  } 
    else { 
         if ($value< $numberToGuess) {
             $error = 'Enter a bigger number';
        } else {
                $success = 'Well done, you won';
        }
    }
   
 }


?>

<!--
<pre>
  <?php /* print_r($_GET); */?>
</pre>
-->

<?php if ($error) { ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php } elseif ($success) { ?>
    <div class="alert alert-success">
        <?= $success ?>
    </div>

<?php } ?>


<form action="/index.php" method="POST">
    <!-- never trust an user => use htmlentities -->
    <div class="form-group">
        <input type="number" class="form-control" name="number" value="<?php echo $value; ?>">
    </div>
    <button type="submit" class="btn btn-primary"> Go </button>
</form>




