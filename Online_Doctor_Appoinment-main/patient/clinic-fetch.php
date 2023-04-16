<?php 
require_once('connection.php');
$sql="SELECT * FROM doctor_clinic WHERE regis_id='".$_POST["doctor_id"]."'";
$result=mysqli_query($con,$sql);


$output="";
if(mysqli_num_rows($result)>0){
    
        $output.="<div class='table-responsive'>
                    <table class='table table-hover table-center mb-2'>
                        <thead>
                            <tr>
                                <th>Clinic Name</th>
                                <th>Opening Time</th>
                                <th>Closing Time</th>
                                <th>Fees</th>
                            </tr>
                        </thead>";
                        while($row=mysqli_fetch_assoc($result)){
                $output.="<tbody>
                            <tr>
                                <td>{$row["clinic_name"]}<br><p style='color: #757575;'>{$row["clinic_address"]}</p></td>
                                <td>{$row["clinic_opening_time"]}</td>
                                <td>{$row["clinic_closing_time"]}</td>
                                <td>{$row["clinic_fee"]}</td>
                            </tr>
                        </tbody>";
                        }
        $output.="  </table>
                </div>";
    echo $output;
}

?>
