<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Assuming 'myInputs' is the name attribute of your input fields array
        if (isset($_POST['myInputs']) && !empty($_POST['myInputs'])) {
            // Sanitize and prepare the input data
            $myInputs = $_POST['myInputs'];
            
            // Remove empty values
            $myInputs = array_filter($myInputs);
    
            // Combine inputs into comma-separated string if there are multiple inputs
            $quiz_links = implode(',', $myInputs);
            echo $quiz_links;
        }
    }
?>


<script>
    var counter = 1;
    var dynamicInput = []; // Initialize dynamicInput array

    function addInput(){
        var newdiv = document.createElement('div');
        dynamicInput[counter] = counter; // Assign counter value to dynamicInput array
        newdiv.id = 'dynamicInput[' + counter + ']';
        newdiv.innerHTML = "Set " + (counter + 1) + " <br><input type='text' name='myInputs[]'> <input type='button' value='-' onClick='removeInput(" + dynamicInput[counter] + ");'>";
        document.getElementById('formulario').appendChild(newdiv);
        counter++;
    }

    function removeInput(id){
        var elem = document.getElementById('dynamicInput[' + id + ']');
        elem.parentNode.removeChild(elem);
    }
</script>

<form method="POST" id="formulario" action="sample.php">
    <div id="dynamicInput[0]">
        Set 1<br><input type="text" name="myInputs[]">
        <input type="button" value="+" onClick="addInput();">

    </div>
    <input type="submit">
</form>
