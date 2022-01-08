<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud operation</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form method ='post' id="insert_form"> 
        <label>FirstName</label>
        <input type="text" name="fname" id="fname" class="form-control">

        <label>SurName</label>
        <input type="text" name="sname" id="sname" class="form-control">

        <label>UserName</label>
        <input type="text" name="uname" id="uname" class="form-control">

        <label>Email</label>
        <input type="text" name="email" id="email" class="form-control">

        <input type="submit" name="insert" id="insert" class="btn btn-success" value ="Add New Data">

          
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

    <div class="xontainer">
        <div class="col-md-12">
            <div class="row d-flex justify-content-center">
                <div class="col-md-9">
                    <h2 class ="text-center">PDO CRUD OPERATION</h2>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Data</button>
                    <br>
                    
                    <div class="col-md-12 result"></div>
                
                </div>
            </div>
        </div>
    </div> 
    
    
    <script type="text/javascript">
        $(document).ready(function(){



                show();
            function show(){

                var action = "show";

                $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:{action:action},
                    success:function(data){
                        $(".result").html(data);
                        //alert ("hi");
                    }
                });
            }

            $("#insert").click(function(e){
              e.preventDefault();

              var action = "insert";

              $.ajax({
                url:"insert.php",
                method:"POST",
                data: $("#insert_form").serialize(),
                success: function(data){
                  show();
                }
              });
            });
            $(document).on("click",".delete",function(){
                var id =$(this).attr("id");
                var action = "delete";

                $.ajax({
                  url:"action.php",
                  method:"POST",
                  data:{id:id,action:action},
                  success:function(data){
                    show();
                  }
                })

            })
        });

    </script>
</body>
</html>