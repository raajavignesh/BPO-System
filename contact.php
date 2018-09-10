<?php
    include_once 'header.php';
?>

<div class="container" style="margin-top:100px">
    <h3 class="text-center text-primary">Contact Us</h3>
    <hr>
    <div class="row ">
    <div class="col-4 shadow pb-5 pt-3">
            <div class="row justify-content-center">
                <i class="fa fa-envelope text-primary text-center m-2" style="font-size:100px"></i>        
            </div> 
            <div class="row justify-content-center mt-2 ">
                <button onclick="myFunction()" class="btn p-0" style=""><input type="text" class="bg-primary p-2" value="rajavignesh36@gmail.com" id="myInput"></button>
            </div>            
        </div>
        <div class="col-4 offset-2 shadow pb-5 pt-3">
            <div class="row justify-content-center">
                <i class="fa fa-phone text-primary text-center m-2" style="font-size:100px"></i>        
            </div> 
            <div class="row justify-content-center mt-2 ">
                
                <button onclick="myFunction()" class="btn p-0" style=""><input type="text" class="bg-primary p-2" value="+919876543210" id="myInput"></button>
            </div>            
        </div>

        <!-- <div class="col shadow">
            <i class="fa fa-facebook text-primary text-center m-2">&nbsp;Facebook</i>
        </div>
        <div class="col shadow">
            <i class="fa fa-instagram text-primary text-center m-2">&nbsp;Instagram</i>
        </div> -->
    </div>
</div>

<script>
    function myFunction() {
    var copyText = document.getElementById("myInput");
    copyText.select();
    document.execCommand("copy");
    alert("Copied the text: " + copyText.value);
    }
</script>

<?php
    include_once 'footer.php';
?>
