<?php 
    require_once('connection.php');
    //fetch data from database
    $sql = "select doc_city from doctor_details group by doc_city";
    $result = mysqli_query($con, $sql) or die("Error " . mysqli_error($con));

    $sql1 = "select doc_specialization from doctor_qualification group by doc_specialization";
    $result1 = mysqli_query($con, $sql1) or die("Error " . mysqli_error($con));
?>
        <link rel="stylesheet" href="css/search.css">
        <h2 class="m-2">Search Specialization</h2>
        <hr>
<!-- **************************************Search*********************************** -->
        <div class="container border-bottom pb-4" id="search">
            <form class="form-inline">
                <div class="input-group m-2 py-2 justify-content-center">
                    <div class="input-group-prepend">
                        <div class="input-group-text my-1 "><i class="fas fa-map-marker-alt"></i></div>
                    </div>
                    <input type="text" id="sel_loc" list="loc_list" placeholder="Location" class="my-1 form-control round-0 border-info" name="loca">
                    <datalist id="loc_list">
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                        <option value="<?php echo $row['doc_city']; ?>"><?php echo $row['doc_city']; ?></option>
                    <?php } ?>
                    </datalist>
                </div>
                <div class="input-group my-1 mx-lg-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text "><i class="fas fa-search"></i></div>
                    </div>
                    <input type="text" id="doc_spe" list="doc_list" placeholder="Specialization" class="form-control round-0 border-info" name="speci" required="">
                    <datalist id="doc_list">
                    <?php while($row = mysqli_fetch_array($result1)) { ?>
                        <option value="<?php echo $row['doc_specialization']; ?>"><?php echo $row['doc_specialization']; ?></option>
                    <?php } ?>
                    </datalist>
                </div>
            </form>
        </div>
<!-- **********************************End Search*********************************** -->
<!-- ************************************List*************************************** -->

        <div class="show-list mt-3" id="fetch_data">
        </div>

<!-- **********************************End List************************************* -->

<script>
    $(document).ready(function(){
        $('#doc_spe').on("keyup",function(){
            var search_term=$(this).val();
            var search_term2=$('#sel_loc').val();
            $.ajax({
                url:"patient/live-search.php",
                type: "POST",
                data: {search:search_term,
                    search2:search_term2},
                success: function(data){
                    $("#fetch_data").html(data);
                }
            });
        });
        $('#sel_loc').on("keyup",function(){
            var search_term=$('#doc_spe').val();
            var search_term2=$(this).val();
            $.ajax({
                url:"patient/live-search.php",
                type: "POST",
                data: {search:search_term,
                    search2:search_term2},
                success: function(data){
                    $("#fetch_data").html(data);
                }
            });
        });
    });
    
</script>