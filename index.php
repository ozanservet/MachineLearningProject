<?php
      include_once "connection.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Dropdown list will work with this scripts -->
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
      <link rel="stylesheet" type="text/css" href="main.css"/>
    <!--<script src="coursedropdown.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
      <div id="dom-target" style="display: none;">
        <?php
              include_once "connection.php";
              session_start();
              $username = $_SESSION[(trim('username', ' '))];//coming from previous page.
              echo htmlspecialchars($username);   //for sending variable from php to js.
          ?>
    </div>
    <div class="container">
        <nav>
        <ul class="nav nav-tabs ">
            <li class="nav-item"><a href="signup.html" class="nav-link">Sign up</a></li>
            <li class="nav-item"><a href="login.html" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
        </ul>
        </nav>

        <div class="col-lg-6">
            <h1>Grades</h1>
            <br />
            <div class="multi-field-wrapper">
                <div class="multi-fields">
                    <div class="multi-field">
                    <select id="selectedsubjectone" name="subjectone" onchange="getIdone(this.value);">
                        <option value="selectsubjectdefaultone">Select course</option>
                            <?php
                            $query = "SELECT DISTINCT(subject) FROM coursetable";
                            $results = mysqli_query($con, $query);

                            while($coursetable = mysqli_fetch_assoc($results)){
                            ?>
                            <option value="<?php echo $coursetable['subject'];?>"><?php echo $coursetable['subject']; ?></option>
                            <?php
                                }
                            ?>
                    </select>
                      <select name="course" id="courseListone">
                        <option value="courseoptionone">select course</option>
                      </select>
                    <script>
                      function getIdone(val){
                          $.ajax({
                            type: "POST",
                            url: "getcourses.php",
                            data: "subject="+val,
                            success: function(data){
                              $("#courseListone").html(data);
                            }
                          })
                      }
                    </script>
                    <select id="selectedGradeOne" class="gradeclass" name="gradesnamearray[]">
                        <option selected=selected value="gradesvalue">grade</option>
                        <option value="A">A</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B">B</option>
                        <option value="B-">B-</option>
                        <option value="C+">C+</option>
                        <option value="C">C</option>
                        <option value="C-">C-</option>
                        <option value="D+">D+</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                    </select>
                    </div>
                    <br />

                    <div class="multi-field">
                    <select id="selectedsubjecttwo" name="subject" onchange="getIdtwo(this.value);">
                        <option value="selectsubjectdefaulttwo">Select course</option>
                            <?php
                            $query = "SELECT DISTINCT(subject) FROM coursetable";
                            $results = mysqli_query($con, $query);

                            while($coursetable = mysqli_fetch_assoc($results)){
                            ?>
                            <option value="<?php echo $coursetable['subject'];?>"><?php echo $coursetable['subject']; ?></option>
                            <?php
                                }
                            ?>
                    </select>
                      <select name="course" id="courseListtwo">
                        <option value="courseoptiontwo">select course</option>
                      </select>
                    <script>
                      function getIdtwo(val){
                          $.ajax({
                            type: "POST",
                            url: "getcourses.php",
                            data: "subject="+val,
                            success: function(data){
                              $("#courseListtwo").html(data);
                            }
                          })
                      }
                    </script>
                    <select id="selectedGradeTwo" class="gradeclass" name="gradesnamearray[]">
                        <option selected=selected value="gradesvalue">grade</option>
                        <option value="A">A</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B">B</option>
                        <option value="B-">B-</option>
                        <option value="C+">C+</option>
                        <option value="C">C</option>
                        <option value="C-">C-</option>
                        <option value="D+">D+</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                    </select>
                    </div>
                    <br />

                    <div class="multi-field">
                    <select id="selectedsubjectthree" name="subject" onchange="getIdthree(this.value);">
                        <option value="selectsubjectdefaultthree">Select course</option>
                            <?php
                            $query = "SELECT DISTINCT(subject) FROM coursetable";
                            $results = mysqli_query($con, $query);

                            while($coursetable = mysqli_fetch_assoc($results)){
                            ?>
                            <option value="<?php echo $coursetable['subject'];?>"><?php echo $coursetable['subject']; ?></option>
                            <?php
                                }
                            ?>
                    </select>
                      <select name="course" id="courseListthree">
                        <option value="courseoptionthree">select course</option>
                      </select>
                    <script>
                      function getIdthree(val){
                          $.ajax({
                            type: "POST",
                            url: "getcourses.php",
                            data: "subject="+val,
                            success: function(data){
                              $("#courseListthree").html(data);
                            }
                          })
                      }
                    </script>
                    <select id="selectedGradeThree" class="gradeclass" name="gradesnamearray[]">
                        <option selected=selected value="gradesvalue">grade</option>
                        <option value="A">A</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B">B</option>
                        <option value="B-">B-</option>
                        <option value="C+">C+</option>
                        <option value="C">C</option>
                        <option value="C-">C-</option>
                        <option value="D+">D+</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                    </select>
                    </div>
                    <br />

                    <div class="multi-field">
                    <select id="selectedsubjectfour" name="subject" onchange="getIdfour(this.value);">
                        <option value="selectsubjectdefaultfour">Select course</option>
                            <?php
                            $query = "SELECT DISTINCT(subject) FROM coursetable";
                            $results = mysqli_query($con, $query);

                            while($coursetable = mysqli_fetch_assoc($results)){
                            ?>
                            <option value="<?php echo $coursetable['subject'];?>"><?php echo $coursetable['subject']; ?></option>
                            <?php
                                }
                            ?>
                    </select>
                      <select name="course" id="courseListfour">
                        <option value="courseoptionfour">select course</option>
                      </select>
                    <script>
                      function getIdfour(val){
                          $.ajax({
                            type: "POST",
                            url: "getcourses.php",
                            data: "subject="+val,
                            success: function(data){
                              $("#courseListfour").html(data);
                            }
                          })
                      }
                    </script>
                    <select id="selectedGradeFour" class="gradeclass" name="gradesnamearray[]">
                        <option selected=selected value="gradesvalue">grade</option>
                        <option value="A">A</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B">B</option>
                        <option value="B-">B-</option>
                        <option value="C+">C+</option>
                        <option value="C">C</option>
                        <option value="C-">C-</option>
                        <option value="D+">D+</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                    </select>
                    </div>
                    <br />

                    <div class="multi-field">
                    <select id="selectedsubjectfive" name="subject" onchange="getIdfive(this.value);">
                        <option value="selectsubjectdefaultfive">Select course</option>
                            <?php
                            $query = "SELECT DISTINCT(subject) FROM coursetable";
                            $results = mysqli_query($con, $query);

                            while($coursetable = mysqli_fetch_assoc($results)){
                            ?>
                            <option value="<?php echo $coursetable['subject'];?>"><?php echo $coursetable['subject']; ?></option>
                            <?php
                                }
                            ?>
                    </select>
                      <select name="course" id="courseListfive">
                        <option value="courseoptionfive">select course</option>
                      </select>
                    <script>
                      function getIdfive(val){
                          $.ajax({
                            type: "POST",
                            url: "getcourses.php",
                            data: "subject="+val,
                            success: function(data){
                              $("#courseListfive").html(data);
                            }
                          })
                      }
                    </script>
                    <select id="selectedGradeFive" class="gradeclass" name="gradesnamearray[]">
                        <option selected=selected value="gradesvalue">grade</option>
                        <option value="A">A</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B">B</option>
                        <option value="B-">B-</option>
                        <option value="C+">C+</option>
                        <option value="C">C</option>
                        <option value="C-">C-</option>
                        <option value="D+">D+</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                    </select>
                    </div>
                    <br />

                    <div class="multi-field">
                    <select id="selectedsubjectsix" name="subject" onchange="getIdsix(this.value);">
                        <option value="selectsubjectdefaultsix">Select course</option>
                            <?php
                            $query = "SELECT DISTINCT(subject) FROM coursetable";
                            $results = mysqli_query($con, $query);

                            while($coursetable = mysqli_fetch_assoc($results)){
                            ?>
                            <option value="<?php echo $coursetable['subject'];?>"><?php echo $coursetable['subject']; ?></option>
                            <?php
                                }
                            ?>
                    </select>
                      <select name="course" id="courseListsix">
                        <option value="courseoptionsix">select course</option>
                      </select>
                    <script>
                      function getIdsix(val){
                          $.ajax({
                            type: "POST",
                            url: "getcourses.php",
                            data: "subject="+val,
                            success: function(data){
                              $("#courseListsix").html(data);
                            }
                          })
                      }
                    </script>
                    <select id="selectedGradeSix" class="gradeclass" name="gradesnamearray[]">
                        <option selected=selected value="gradesvalue">grade</option>
                        <option value="A">A</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B">B</option>
                        <option value="B-">B-</option>
                        <option value="C+">C+</option>
                        <option value="C">C</option>
                        <option value="C-">C-</option>
                        <option value="D+">D+</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                    </select>
                    </div>
                    <br />

                    <div class="multi-field">
                    <select id="selectedsubjectseven" name="subject" onchange="getIdseven(this.value);">
                        <option value="selectsubjectdefaultseven">Select course</option>
                            <?php
                            $query = "SELECT DISTINCT(subject) FROM coursetable";
                            $results = mysqli_query($con, $query);

                            while($coursetable = mysqli_fetch_assoc($results)){
                            ?>
                            <option value="<?php echo $coursetable['subject'];?>"><?php echo $coursetable['subject']; ?></option>
                            <?php
                                }
                            ?>
                    </select>
                      <select name="course" id="courseListseven">
                        <option value="courseoptionseven">select course</option>
                      </select>
                    <script>
                      function getIdseven(val){
                          $.ajax({
                            type: "POST",
                            url: "getcourses.php",
                            data: "subject="+val,
                            success: function(data){
                              $("#courseListseven").html(data);
                            }
                          })
                      }
                    </script>
                    <select id="selectedGradeSeven" class="gradeclass" name="gradesnamearray[]">
                        <option selected=selected value="gradesvalue">grade</option>
                        <option value="A">A</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B">B</option>
                        <option value="B-">B-</option>
                        <option value="C+">C+</option>
                        <option value="C">C</option>
                        <option value="C-">C-</option>
                        <option value="D+">D+</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                    </select>
                    </div>
                </div>
            </div>
<br />
                <!--<input name ="addmore" id="addmore" type="addmore" class="btn btn-info" value="+Add more lecture">-->
                <input id="Add" type="Add" class="btn btn-info" value="Add" name="AddName">
                <input id="Delete" type="Delete" class="btn btn-info" value="Delete" name="DeleteName">
                <br><br>
                <p>For giving feedback, choose which occupation you are interested in</p>
                <select id="selectedProfesionid" class="professionclass" name="professionname">
                    <option selected=professionselected value="professionvalue">occupations</option>
                    <option value="IE">Industrial Engineering</option>
                    <option value="CS">Computer Science</option>
                    <option value="EE">ELECTRONICS ENGINEERING</option>
                    <option value="ME">MECHATRONICS ENGINEERING</option>
                    <option value="MAT">MATERIALS SCIENCE & NANO ENGINEERING</option>
                    <option value="BIO">MOLECULAR BIOLOGY, GENETICS and BIOENGINEERING</option>
                    <option value="ECON">Economics</option>
                    <option value="VA">VISUAL ARTS & VISUAL COMMUNICATION DESIGN</option>
                    <option value="CULT">Cultural Studies</option>
                    <option value="PSY">Psychology</option>
                    <option value="POLS">Political Science</option>
                    <option value="IR">International Studies</option>
                    <option value="MGMT">Management </option>
                </select>
                <input id="professionid" type="profession" class="btn btn-info" value="Give feedback" name="moreName">
                <br>
                <input id="PredicId" type="submit" class="btn btn-info" value="Predict my profession" />
                <h1><p id="PredictResultId" ><p/></h1>
                <script type = "text/javascript">

                $('#PredicId').click(function(){
                  var div = document.getElementById("dom-target");
                  var username = div.textContent;
                  username = username.trim().replace(/ /g, '%20');    //cut spaces

                    var predictsender ="username="+username;
                    $.ajax({
                      type: "POST",
                      url: "python.php",
                      data: predictsender,
                      success: function(data) {
                        $("#PredictResultId").text(data);
                      }
                    });
                });

                  $('#professionid').click(function(){

                      var div = document.getElementById("dom-target");
                      var username = div.textContent;
                      username = username.trim().replace(/ /g, '%20');    //cut spaces

                      var professionvar = $('#selectedProfesionid :selected').val(); // get the selected  option value

                      if(professionvar != 'occupations'){
                        var professionsender ="username="+username+"&feedback="+encodeURIComponent(professionvar);
                        $.ajax({
                          type: "POST",
                          url: "addprofession.php",
                          data: professionsender,
                          success: function(data) {}
                        });
                      }
                  });

                  $('#Add').click(function(){

                    var subjectone = $('#selectedsubjectone :selected').val(); // get the selected  option value
                    var subjecttwo = $('#selectedsubjecttwo :selected').val();
                    var subjectthree = $('#selectedsubjectthree :selected').val();
                    var subjectfour = $('#selectedsubjectfour :selected').val();
                    var subjectfive = $('#selectedsubjectfive :selected').val();
                    var subjectsix = $('#selectedsubjectsix :selected').val();
                    var subjectseven = $('#selectedsubjectseven :selected').val();
                    var courseone = $('#courseListone').val();
                    var coursetwo = $('#courseListtwo').val();
                    var coursethree = $('#courseListthree').val();
                    var coursefour = $('#courseListfour').val();
                    var coursefive = $('#courseListfive').val();
                    var coursesix = $('#courseListsix').val();
                    var courseseven = $('#courseListseven').val();
                    var gradeone = ($('#selectedGradeOne :selected').val());
                    var gradetwo = ($('#selectedGradeTwo :selected').val());
                    var gradethree = ($('#selectedGradeThree :selected').val());
                    var gradefour = ($('#selectedGradeFour :selected').val());
                    var gradefive = ($('#selectedGradeFive :selected').val());
                    var gradesix = ($('#selectedGradeSix :selected').val());
                    var gradeseven = ($('#selectedGradeSeven :selected').val());

                    function convertGradeNum(grade){
                      if(grade=='A')
                        return grade=4;
                      else if(grade=='A-')
                        return grade=3.7;
                      else if(grade=='B+')
                        return grade=3.3;
                      else if(grade=='B')
                        return grade=3;
                      else if(grade=='B-')
                        return grade=2.7;
                      else if(grade=='C+')
                        return grade=2.3;
                      else if(grade=='C')
                        return grade=2;
                      else if(grade=='C-')
                        return grade=1.7;
                      else if(grade=='D+')
                        return grade=1.3;
                      else if(grade=='D')
                        return grade=1;
                      else if(grade=='F')
                        return grade=0;
                    }

                    var gradeone = convertGradeNum(gradeone);
                    var gradetwo = convertGradeNum(gradetwo);
                    var gradethree = convertGradeNum(gradethree);
                    var gradefour = convertGradeNum(gradefour);
                    var gradefive = convertGradeNum(gradefive);
                    var gradesix = convertGradeNum(gradesix);
                    var gradeseven = convertGradeNum(gradeseven);


                    var div = document.getElementById("dom-target");
                    var username = div.textContent;
                    username = username.trim().replace(/ /g, '%20');    //cut spaces

                      if(gradeone != 'gradesvalue'){
                        var enrolledone ="username="+username+"&subject="+subjectone+"&course="+courseone+"&grade="+encodeURIComponent(gradeone);
                        $.ajax({
                          type: "POST",
                          url: "updatecourse.php",
                          data: enrolledone,
                          success: function(data) {}
                        });
                        $.ajax({
                          type: "POST",
                          url: "addenrolled.php",
                          data: enrolledone,
                          success: function(data) {}
                        });
                      }
                      if(gradetwo != 'gradesvalue'){
                        var enrolledtwo ="username="+username+"&subject="+subjecttwo+"&course="+coursetwo+"&grade="+encodeURIComponent(gradetwo);
                        $.ajax({
                          type: "POST",
                          url: "updatecourse.php",
                          data: enrolledtwo,
                          success: function(data) {}
                        });
                        $.ajax({
                          type: "POST",
                          url: "addenrolled.php",
                          data: enrolledtwo,
                          success: function(data) {}
                        });
                      }
                      if(gradethree != 'gradesvalue'){
                      var enrolledthree = "username="+username+"&subject="+subjectthree+"&course="+coursethree+"&grade="+encodeURIComponent(gradethree);
                      $.ajax({
                        type: "POST",
                        url: "updatecourse.php",
                        data: enrolledthree,
                        success: function(data) {}
                      });
                      $.ajax({
                        type: "POST",
                        url: "addenrolled.php",
                        data: enrolledthree,
                        success: function(data) {}
                      });
                      }
                      if(gradefour != 'gradesvalue'){
                      var enrolledfour =  "username="+username+"&subject="+subjectfour+"&course="+coursefour+"&grade="+encodeURIComponent(gradefour);
                      $.ajax({
                        type: "POST",
                        url: "updatecourse.php",
                        data: enrolledfour,
                        success: function(data) {}
                      });
                      $.ajax({
                        type: "POST",
                        url: "addenrolled.php",
                        data: enrolledfour,
                        success: function(data) {}
                      });
                      }
                      if(gradefive != 'gradesvalue'){
                      var enrolledfive =  "username="+username+"&subject="+subjectfive+"&course="+coursefive+"&grade="+encodeURIComponent(gradefive);
                      $.ajax({
                        type: "POST",
                        url: "updatecourse.php",
                        data: enrolledfive,
                        success: function(data) {}
                        });
                      $.ajax({
                        type: "POST",
                        url: "addenrolled.php",
                        data: enrolledfive,
                        success: function(data) {}
                        });
                      }
                      if(gradesix != 'gradesvalue'){
                      var enrolledsix =   "username="+username+"&subject="+subjectsix+"&course="+coursesix+"&grade="+encodeURIComponent(gradesix);
                      $.ajax({
                        type: "POST",
                        url: "updatecourse.php",
                        data: enrolledsix,
                        success: function(data) {}
                      });
                      $.ajax({
                        type: "POST",
                        url: "addenrolled.php",
                        data: enrolledsix,
                        success: function(data) {}
                      });
                      }
                      if(gradeseven != 'gradesvalue'){
                      var enrolledseven = "username="+username+"&subject="+subjectseven+"&course="+courseseven+"&grade="+encodeURIComponent(gradeseven);
                      $.ajax({
                       type: "POST",
                        url: "updatecourse.php",
                        data: enrolledseven,
                        success: function(data) {
                          document.getElementById("success").innerHTML = "Successfully Submitted";
                        }
                      });
                      $.ajax({
                       type: "POST",
                        url: "addenrolled.php",
                        data: enrolledseven,
                        success: function(data) {
                          document.getElementById("success").innerHTML = "Successfully Submitted";
                        }
                      });
                      }
                      //The operations below for refresh dropdowns after submitted.
                      $("#selectedsubjectone").val("selectsubjectdefaultone");
                      $("#selectedsubjecttwo").val("selectsubjectdefaulttwo");
                      $("#selectedsubjectthree").val("selectsubjectdefaultthree");
                      $("#selectedsubjectfour").val("selectsubjectdefaultfour");
                      $("#selectedsubjectfive").val("selectsubjectdefaultfive");
                      $("#selectedsubjectsix").val("selectsubjectdefaultsix");
                      $("#selectedsubjectseven").val("selectsubjectdefaultseven");

                      $("#courseListone").find('option').remove().end().append('<option value="courseoptionone">select course</option>').val('courseoptionone');
                      $("#courseListtwo").find('option').remove().end().append('<option value="courseoptiontwo">select course</option>').val('courseoptiontwo');
                      $("#courseListthree").find('option').remove().end().append('<option value="courseoptionthree">select course</option>').val('courseoptionthree');
                      $("#courseListfour").find('option').remove().end().append('<option value="courseoptionfour">select course</option>').val('courseoptionfour');
                      $("#courseListfive").find('option').remove().end().append('<option value="courseoptionfive">select course</option>').val('courseoptionfive');
                      $("#courseListsix").find('option').remove().end().append('<option value="courseoptionsix">select course</option>').val('courseoptionsix');
                      $("#courseListseven").find('option').remove().end().append('<option value="courseoptionseven">select course</option>').val('courseoptionseven');

                      $("#selectedGradeOne").val("gradesvalue");
                      $("#selectedGradeTwo").val("gradesvalue");
                      $("#selectedGradeThree").val("gradesvalue");
                      $("#selectedGradeFour").val("gradesvalue");
                      $("#selectedGradeFive").val("gradesvalue");
                      $("#selectedGradeSix").val("gradesvalue");
                      $("#selectedGradeSeven").val("gradesvalue");

                      $("#tabledata tr").remove();
                      tablecreator();
/*
                  $.post('addenrolled.php', {'username': username, 'subject': subjectone, 'course': courseone, 'grade': gradeone}, function(response){
                      console.log(response);
                  })
*/
      //$("#selectedsubjectone").val("selectsubjectdefaultone");
      });

      $('#Delete').click(function(){

        var subjectone = $('#selectedsubjectone :selected').val(); // get the selected  option value
        var subjecttwo = $('#selectedsubjecttwo :selected').val();
        var subjectthree = $('#selectedsubjectthree :selected').val();
        var subjectfour = $('#selectedsubjectfour :selected').val();
        var subjectfive = $('#selectedsubjectfive :selected').val();
        var subjectsix = $('#selectedsubjectsix :selected').val();
        var subjectseven = $('#selectedsubjectseven :selected').val();
        var courseone = $('#courseListone').val();
        var coursetwo = $('#courseListtwo').val();
        var coursethree = $('#courseListthree').val();
        var coursefour = $('#courseListfour').val();
        var coursefive = $('#courseListfive').val();
        var coursesix = $('#courseListsix').val();
        var courseseven = $('#courseListseven').val();

        var div = document.getElementById("dom-target");
        var username = div.textContent;
        username = username.trim().replace(/ /g, '%20');    //cut spaces

          var deleteone ="username="+username+"&subject="+subjectone+"&course="+courseone;
          var deletetwo ="username="+username+"&subject="+subjecttwo+"&course="+coursetwo;
          var deletethree ="username="+username+"&subject="+subjectthree+"&course="+coursethree;
          var deletefour ="username="+username+"&subject="+subjectfour+"&course="+coursefour;
          var deletefive ="username="+username+"&subject="+subjectfive+"&course="+coursefive;
          var deletesix ="username="+username+"&subject="+subjectsix+"&course="+coursesix;
          var deleteseven ="username="+username+"&subject="+subjectseven+"&course="+courseseven;

          $.ajax({
            type: "POST",
            url: "deletecourse.php",
            data: deleteone,
            success: function(data) {}
          });
          $.ajax({
            type: "POST",
            url: "deletecourse.php",
            data: deletetwo,
            success: function(data) {}
          });
          $.ajax({
            type: "POST",
            url: "deletecourse.php",
            data: deletethree,
            success: function(data) {}
          });
          $.ajax({
            type: "POST",
            url: "deletecourse.php",
            data: deletefour,
            success: function(data) {}
          });
          $.ajax({
            type: "POST",
            url: "deletecourse.php",
            data: deletefive,
            success: function(data) {}
          });
          $.ajax({
            type: "POST",
            url: "deletecourse.php",
            data: deletesix,
            success: function(data) {}
          });
          $.ajax({
            type: "POST",
            url: "deletecourse.php",
            data: deleteseven,
            success: function(data) {}
          });

          $("#tabledata tr").remove();
          tablecreator();
      });

                </script>
                <br/>
                <p id="success" style="color:green;" ></p>
        </div>
        <div class="col-lg-6">
          <p id="usr" style="font-size: 16px;"></p>
          <script type="text/javascript">

          function convertGradeLetter(grade){
            if(grade==4)
              return grade='A';
            else if(grade==3.7)
              return grade='A-';
            else if(grade==3.3)
              return grade='B+';
            else if(grade==3)
              return grade='B';
            else if(grade==2.7)
              return grade='B-';
            else if(grade==2.3)
              return grade='C+';
            else if(grade==2)
              return grade='C';
            else if(grade==1.7)
              return grade='C-';
            else if(grade==1.3)
              return grade='D+';
            else if(grade==1)
              return grade='D';
            else if(grade==0)
              return grade='F';
          }

            function tablecreator(){
              var usr = document.getElementById("dom-target");
              var username = usr.textContent;
              username = username.trim().replace(/ /g, '%20');
              document.getElementById("usr").innerHTML = username + " below all courses you have";
              var sendtophp = "username="+username;

              $.ajax({
                type: "POST",
                url: "getcoursetable.php",
                data: sendtophp,
                dataType:"json",
                success: function(response) {
                  var trhtml ='';
                  $.each(response, function (i, item) {
                    item[2]=convertGradeLetter(item[2]);
                      trhtml += '<tr><td>' + item[0] + '</td><td>' + item[1] + '</td><td>'+ item[2] + '</td></tr>';
                  });
                  $('.append').append(trhtml);
                }
              });
            }
          </script>
          <table id="results">

            <tr>
            <th>Subject</th>
            <th>Course</th>
            <th>Grade</th>
            </tr>
            <tbody id="tabledata" class="append">

            </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">tablecreator();</script>
</body>
</html>
