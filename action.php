<?php

include("include/connection.php");


if(isset($_POST['action'])) {

    if($_POST['action']== "show"){

        $pdo = $connect->prepare("SELECT * FROM crud_items");

        $pdo->execute();

        $rows = $pdo->fetchAll();

        $output = "";

        $output .="
            <table class= 'table table-bordered'>
                <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Surname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>

        ";

        if(count($rows) < 1){
            $output .="
                <tr>
                    <td class='text-center' colspan='6'> No Data Yet </td>
                </tr>
            ";
            
        }else{
            foreach ($rows as $row){
                $output .="
            
                    <td>".$row['id']."</td>
                    <td>".$row['firstname']."</td>
                    <td>".$row['surname']."</td>
                    <td>".$row['username']."</td>
                    <td>".$row['email']."</td>
                    <td>
                        <div class='col-md-12'>
                            <div class='row'>
                                <div class='col'>
                                <button class='btn btn-info update' id= '".$row['id']."'>Update</button>
                                </div>

                                <div class='col'>
                                <button class='btn btn-danger delete' id= '".$row['id']."'>Delete</button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                
                ";
            }   
        }

            $output .="</tr></table>";

            echo $output;
            
        
    }else if ($_POST['action'] == "delete"){
        $id = $_POST['id'];
        $query = "DELETE FROM crud_items WHERE id=?";
        $pdo = $connect->prepare($query);
        $pdo->execute(array($id));
    }
}


?>