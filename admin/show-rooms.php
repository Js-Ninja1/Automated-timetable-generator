<?php
// Include config file
                    require_once "../db_config/connect.php";
                    
                    // Attempt select query execution
                    //$sql = "SELECT * FROM rooms";

                    if($records = mysqli_query($link, "SELECT * FROM rooms")){

                    if(mysqli_num_rows($records) > 0){
                        echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Room name</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($records)){
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['room'] . "</td>";
                                    echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                    echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                    echo "</td>";
                                    echo "</tr>";

                                }
                                echo "</tbody>";
                                echo "</table>";

                                mysqli_free_result($records);
                    }else{
                        echo "No records available";
                    }
                }else{
                    echo "Query failed";
                }
                    mysqli_close($link);
                    ?>