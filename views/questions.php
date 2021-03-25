<div class="container mt-sm-5 my-1">
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
    <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5"><b><?php echo $current_question->get_question();   ?> ?</b></div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
            <?php foreach($current_question->get_options() as $option) {?>
            <label class="options"> <?php echo $option;   ?> <input type="radio" name="radio" value="<?php echo $option;   ?>"> <span class="checkmark"></span> </label>
            <?php } ?>
        </div>
    </div>
    <div>
  
        <input class="btn btn-primary id="prev" name="prev" type="submit" value="Prev" />
        <input class="btn btn-primary id="next" name="next" type="submit" value="Next" />
    </div>
</form>
</div>
<script>


</script>






