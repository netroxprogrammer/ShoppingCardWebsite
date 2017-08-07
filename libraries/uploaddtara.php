

 
  
    <?php  include_once"up.php"?>
    <?php
    
    $upload = new Upload();
  
       if (isset($_POST['submit'])) {

           $file = $upload->uploadImage();
         
   }
    ?>
    <div class="col-lg-12">

        <section class="panel">

            <header class="panel-heading">
                Add New Logo
            </header>
            <div class="panel-body">
                <div class="form">
                    <form class="form-validate form-horizontal "  method="post" action="" enctype="multipart/form-data">




                        <div class="form-group ">
                            <label for="username" class="control-label col-lg-2">Select Logo Image<span class="required"></span></label>
                            <div class="col-lg-10">
                                <input type="file" name="file" id="file" >
                            </div>
                        </div>

                        <div col-xs-5 col-xs-offset-3>
                            <input type="submit" name="submit" value="submit" class="btn  btn-danger"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    
