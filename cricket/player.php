<?php ob_start(); ?>


<?php
//authentication check
require_once('auth.php');
//set the page title
$page_title = null;
$page_title = 'Cricket Form';
//embed the header
require_once('header.php');
// access the current session

?>

<?php
// validating cricket_id
    if (empty($_GET['cricket_id']) == false) {
        $cricket_id = $_GET['cricket_id'];
        // connect
        require_once('db.php');

        // write the sql query
        $sql = "SELECT * FROM cricketS WHERE cricket_id = :cricket_id";
       
        // execute the query and store the results
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':cricket_id', $cricket_id, PDO::PARAM_INT);
        $cmd->execute();
        $player = $cmd->fetch();
       
        // populate the fields for the selected player from the query result
            $firstname = $player['firstname'];
            $lastname = $player['lastname'];
            $numbers = $player['numbers'];
            $position = $player['position'];
            $photo = $player['photo'];
       
        // disconnect
        $conn = null;
                }

                ?>
<form method ="post" action ="save-cricket.php" enctype="multipart/form-data">
    <fieldset>
    <div>
    <label for="firstname">First Name:</label>
    <input type="text" name="firstname" id ="firstname" required value="<?php echo $firstname ?? ''; ?>" />
    </div>
    </fieldset>

    <fieldset>
    <div>
    <label for="lastname">Last Name:</label>
    <input type="text" name="lastname" id ="lastname" required value="<?php echo $lastname ?? ''; ?>"  />
    </div>
    </fieldset>

    <fieldset>
    <div>
    <label for="numbers">Number:</label>
    <input type="number" name="numbers" id ="numbers" required value="<?php echo $numbers ?? ''; ?>" />
    </div>
    </fieldset>

    <fieldset class="form-group">
    <label for="photo" >Player Picture:</label>
    <input name="photo" id="photo" type="file" />
    </fieldset>
    <?php if (!empty($photo)) {?>
    <div class="col-sm-offset-2">
        </div>
    <?php } ?>

    <fieldset> 
    <div>
    <label for ="position"> Position:</label>
    <select name="position" id="position" required>


    <?php
    //get the cricket position and fill the dropdown list with
    require('db.php');
    $sql = "SELECT position FROM cricketPosition ORDER BY position";
    $cmd = $conn->prepare($sql);
    $cmd->execute();
    $cricketPosition = $cmd->fetchAll();

    //add each movie title to the dropdown, wrapped in <option> tags
    foreach ($cricketPosition as $player) {
        ?>
        <option <?php echo $player['position'] == $position ? 'selected' : ''; ?>>
            <?php echo $player['position']; ?>
    </option>]
        <?php
    }


    //disconnect
    $cmd = null;
    ?>

    </select>
    </div>
    <input name="cricket_id" type="hidden" value="<?php echo $cricket_id ?? ''; ?>" />
    </fieldset>


<button class="btn btn-primary">Save</button>

</form>
<?php
//embed footer code
require_once('footer.php');
?>

<?php ob_flush(); ?>