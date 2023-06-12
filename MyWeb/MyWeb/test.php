<?php
$studying = "concatination";
$Title = "Testing PHP";
$Heading = "Header about " . $studying;
#This is unix comment syntax
$var1 = "PHP and HTML, specifically " . $studying;
//comments are written like this
$var2 = "TO concat";
/*
Multy
Line 
Comment
*/
// In phpMyAdmin, we use add index to the rows we will use to retrieve data faster (improve performance)

//Constanst, 2 ways to define them
#1: the more normal way:
define("const1", "Amir", true); //this boolian value is "case-Insestivity" when set to true you can write the constant name in any ways
                              //Its default value is false
#2: The less used way in PHP
const const2 = "Hany";

/**not equal can be writen in 2 ways:
 * [!=]
 * or [<>]
 */
// "&&" has higher precidence than "||"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Title ?></title>
</head>
<body>
    <h1><?php echo $Heading ?></h1>
    <?php echo "<p>Learning $var1 Practically</p>" ?>
    <?php echo "How to use the power operation: put ** between the 2 numbers like this: 2**3=" . 2**3 ?>

    <!-- This is a comment -->
    <p><?php echo "Learning " . $var2 //This is also a comment but in php ?></p>
<!--    <p><?php #echo phpinfo() ?></p> -->
    <?php echo "Using constants: " .const1 . " " . const2 ?>
</body>
</html>