<?php
                       include 'Connection.php';
                     $id = null;
                      if ( !empty($_GET['id'])) {
                          $id = $_REQUEST['id'];
                      }
                       $sql = "SELECT INFO.TRACKING_NUM,APPT.APP_TYPE_DESC,INFO.ORG_NAME,INFO.CONN_NAME,INFO.NAME,INFO.APP_STATUS,INFO.NAME_BANGLA,INFO.DESIGNATION,INFO.NID,INFO.PASSPORT,INFO.APP_MOBILE_NO,INFO.SEX,INFO.DOF,INFO.APP_DATE
                       FROM NC_APPLICATION_INFO INFO,NC_APP_TYPE APPT
                      WHERE INFO.APPLICANT_TYPE=APPT.APP_TYPE_CODE
                       AND CONN_LOCATION_CODE='".$_SESSION['LOCATION_CODE']."' AND APP_STATUS='".$id."'";
                                   $parseresults = ociparse($conn, $sql);
                                  ociexecute($parseresults);

                      while($row=oci_fetch_assoc($parseresults))
                       {
                                          echo '<tr>';
                                          echo '<td>'. $row['APP_DATE'] .'</td>';
                                          echo '<td>'. $row['TRACKING_NUM'] .'</td>';
                                          echo '<td>'. $row['APP_TYPE_DESC'] .'</td>';
                                          echo '<td>'. $row['ORG_NAME'] .'</td>';
                                          echo '<td>'. $row['CONN_NAME'] .'</td>';
                                          echo '<td>'. $row['NAME'] .'</td>';
                                          echo '<td>'. $row['NAME_BANGLA'] .'</td>';
                                          echo '<td>'. $row['DESIGNATION'] .'</td>';
                                          echo '<td>'. $row['APP_MOBILE_NO'] .'</td>';
                                          if($row['APP_STATUS']=="08"){
                                            echo '<td><a class="btn btn-success" href="SASReportTwo.php?TRACKING_NUM='.$row['TRACKING_NUM'].'">Details</a></td>';
                                          }else{
                                            echo '<td><a class="btn btn-success" href="documentVerifyXen.php?TRACKING_NUM='.$row['TRACKING_NUM'].'">Details</a></td>';
                                          }
                                          
                                          
                                          echo '</tr>';
                                 }
                                 oci_free_statement($parseresults);
                      oci_close($conn);
                                ?>