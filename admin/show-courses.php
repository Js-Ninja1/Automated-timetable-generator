<?php


                /*Attempt mysql server connection*/
                $link = mysqli_connect("localhost", "root", "", "timetable_generator");

                //check connection
                if($link === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());

                }

                //Attempt select query execution
                $sql = "SELECT * FROM courses";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        echo "<div class = 'show-table'>";
                        echo "<a class = 'cancel'>Cancel</a>";
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>#</th>";
                        echo "<th>Course name</th>";
                        echo "<th>Semester stage</th>";
                        echo "<th>Unit name</th>";
                        echo "<th>Unit code</th>";
                        echo "<th>Action</th>";
                        
                        echo "</tr>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['courseName'] . "</td>";
                            echo "<td>" . $row['semStage'] . "</td>";
                            echo "<td>" . $row['unitName'] . "</td>";
                            echo "<td>" . $row['unitCode'] . "</td>";
                            echo "<td>";
                            echo "<a href='action/update-course.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class=''>Edit</span></a>";
                            echo "<a href='action/delete-course.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class=''>Delete</span></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "</div";

                        //free result set
                        mysqli_free_result($result);

                    }else{
                        echo "No records found.";
                    }
                }else{
                    echo "ERROR: could not be able to execute $sql " . mysqli_error($link);

                }
                //close connection
                mysqli_close($link);



                    ?>