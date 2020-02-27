<?php
$flavors = [
    "Strawberry" => 4,
    "Chocolate" => 5,
    "Vanilla" => 3
];

$cones = [
    "Jar" => 2,
    "Cone" => 3
];

$extras = [
    "Chocolate_Chips" => 1,
    "Chantilly"=> 0.5
];

$title = "Compose your ice-cream";

$ingredients = [];
$total = 0;

if (isset($_GET['flavor'])) {
    foreach($_GET['flavor'] as $flavor) {
        //dump($flavor); to dump the chosen flavors 
        //dump($flavors[$flavor]); to dump the price of the chosen flavors 
        if (isset($flavors[$flavor]))  {
            $ingredients[] = $flavor;
            $total= $total + $flavors[$flavor];
        }      
    }
}

if (isset($_GET['extra'])) {
    foreach($_GET['extra'] as $extra) {
        //dump($extra); to dump the chosen extras 
        //dump($extras[$extra]); to dump the price of the chosen extras 
        if (isset($extras[$extra]))  {
            $ingredients[] = $extra;
            $total= $total + $extras[$extra];
        }      
    }
}

if (isset($_GET['cone'])) {
        //dump($cone); to dump the chosen cones 
        //dump($cones[$cone]); to dump the price of the chosen cones 
        $cone= $_GET['cone'];
        if (isset($cones[$cone]))  {
            $ingredients[] = $cone;
            $total= $total + $cones[$cone];
        }      
}

function checkboxFlavorsAndExtras(string $name, string $value, array $data) : string 
{  

    $attributes = ' ';
    /*&& in_array($value, $data) */
    if (isset($data[$name]) && in_array($value, $data[$name])) {
        $attributes .= 'checked'; 
    }
  
    $str = "<input type='checkbox'  name=" . $name . "[]" . " value=" . $value . "  ". $attributes . ">";

return $str;
}


function radio(string $name, string $value, array $data) : string 
{  

    $attributes = ' ';
    /*&& in_array($value, $data) */
    if (isset($data[$name]) && $value=== $data[$name]) {
        $attributes .= 'checked'; 
    }
  
    $str = "<input type='radio'  name=" . $name . " value=" . $value . "  ". $attributes . ">";

return $str;
}



function dump($param) {
    echo '<pre>';
    var_dump($param);
    echo '</pre>';

};


?>


<div class="row">
    <div class="col-md-8">
            <form action="/index.php" method="GET">
            
            <!-- use parfume[] to have the possibility to get several values from your form -->
            <!-- first solution
            <div class="form-group">
                <input type="checkbox"  name="flavor[]" value="Strawberry"> Strawberry
                <input type="checkbox"  name="flavor[]" value="Vanilla"> Vanilla
                <input type="checkbox"  name="flavor[]" value="Chocolate"> Chocolate
            </div>
            <button type="submit" class="btn btn-primary"> Go </button>
            -->

            <!-- second solution
            <?php /* foreach($flavors as $flavor => $price) { ?>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"  name="flavor[]" value="<?php echo $flavor ?>"> 
                        <?php echo $flavor ?> - <?php echo $price ?> euros
                    </label>
                </div>
            <?php } */ ?>
            <button type="submit" class="btn btn-primary"> Compose your ice-cream </button>
            -->

            <!-- third solution -->
            <h2> Choose your flavors</h2>
            <?php foreach($flavors as $flavor => $price) { ?>
                <div class="checkbox">
                    <label>
                        <?php echo (checkboxFlavorsAndExtras('flavor', $flavor, $_GET)) ?>
                        <?php echo $flavor ?> - <?php echo $price ?> euros
                    </label>
                </div>
            <?php } ?>
            
            <h2> Choose your container</h2>
            <?php foreach($cones as $cone => $price) { ?>
                <div class="checkbox">
                    <label>
                        <?php echo (radio('cone', $cone, $_GET)) ?>
                        <?php echo $cone ?> - <?php echo $price ?> euros
                    </label>
                </div>
            <?php } ?>

            <h2> Choose your extras</h2>
            <?php foreach($extras as $extra => $price) { ?>
                <div class="checkbox">
                    <label>
                        <?php echo (checkboxFlavorsAndExtras('extra', $extra, $_GET)) ?>
                        <?php echo $extra ?> - <?php echo $price ?> euros
                    </label>
                </div>
            <?php } ?>


            <button type="submit" class="btn btn-primary"> My ice-cream is composed => prepare </button>

        </form>
    </div>
    <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            Your ice-cream
                        </div>
                        <ul>
                            <?php foreach ($ingredients as $ingredient) { ?>
                                <li> <?php echo $ingredient ?> </li>
                            <?php } ?>
                        </ul>
                        <ul>
                            <strong> Price : </strong> <?php echo $total ?> euros   
                        </ul>
                    </div>
                </div>
    </div>    
</div>