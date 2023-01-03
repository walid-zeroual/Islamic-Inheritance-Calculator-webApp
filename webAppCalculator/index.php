<link rel="icon" type="image/png/x-icon" href="inheritance.png">
<link rel="stylesheet" href="stylesheet.css">
<script>
    function goBack() {
        location.replace("http://127.0.0.1/Inheritance/index.html")
    }
</script>
<?php

if (empty($_GET['amount']) || !isset($_GET['amount']) || $_GET['amount'] < 0) {
    $_GET['amount'] = 0;
}
if (empty($_GET['sons']) || !isset($_GET['sons']) || $_GET['sons'] < 0) {
    $_GET['sons'] = 0;
}
if (empty($_GET['wife']) || !isset($_GET['wife']) || $_GET['wife'] < 0) {
    $_GET['wife'] = 0;
}
if (empty($_GET['daughters']) || !isset($_GET['daughters']) || $_GET['daughters'] < 0) {
    $_GET['daughters'] = 0;
}

$inheritance = $_GET['amount'];
$nbSons = $_GET['sons'];
$nbWives = $_GET['wife'];
$nbDaughters = $_GET['daughters'];

$wifeShare = $nbWives == 0 ? 0 : round($inheritance / 8, 2 );
$wifeShare = ($nbSons == 0 && $nbDaughters == 0) ? round($inheritance, 2) : $wifeShare;

$inheritance -= $wifeShare;

$sonShare = $nbSons == 0 ? 0 : (($nbSons * 2) / (($nbSons * 2) + $nbDaughters));
$sonsShare = round($inheritance * $sonShare , 2);

$inheritance -= $inheritance * $sonShare;

$daughterShare = round($inheritance, 2);

$eachWife = $nbWives == 0 ? 0 : round($wifeShare / $nbWives, 2);
$eachSon = $nbSons == 0 ? 0 : round($sonsShare / $nbSons, 2);
$eachDaughter = $nbDaughters == 0 ? 0 : round($daughterShare / $nbDaughters, 2);



echo '<body>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Inheritance Calculator</h3>
                        <p>Result.</p>
                        <form class="requires-validation" novalidate>

                            <div class="col-md-12">
                               <input disabled class="form-control" type="text" name="amountOfWives" placeholder= "all wives take '.$wifeShare.' each wife takes '.$eachWife.'" required>
                               
                            </div>

                            <div class="col-md-12">
                                <input disabled class="form-control" type="text" name="amountOfSons" placeholder="all sons take '.$sonsShare.' each son takes '.$eachSon.'" required>
                            
                             </div>
                           
                           <div class="col-md-12">
                              <input disabled class="form-control" type="text" name="amountOfDaughters" placeholder="all daughters take '.$daughterShare.' each daughter takes '.$eachDaughter.'" required>    
                           </div>
                        
                            <div class="goBack">
                            <a href = "http://127.0.0.1/Inheritance/index.html"> GO BACK</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>';
?>

