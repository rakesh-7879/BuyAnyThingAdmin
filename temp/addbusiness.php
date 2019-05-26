<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="stylefor900.css"/>
        <link rel="stylesheet" href="stylefor600.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--google api key :-  AIzaSyDj_KdRcdNGzUHt4h4bi7GPl9zkb_r4hoc    -->

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body onresize="scrolnew(0);">

        <?php include './Header.php'; ?>
        <?php include './leftbar.php'; ?>
        <div class="mainforadmin">
            <div class="pagetitle">Business</div>
            <!-- <bform> -->
            <div class="businessboxfrom" >
                <div class="businessboxrow">
                    <label>BUSINESS NAME:</label>
                    <input type="text" name="bname" id="businessname" placeholder="enter business name">
                </div>
                <div class="businessboxrow">
                    <label>BUSINESS OWNER:</label>
                    <input type="text" name="bowner" id="businessowner" placeholder="enter business owner">
                </div>
                <div class="businessboxrow">
                    <label>MOBILE NUMBER:</label>
                    <input type="text" name="mnum" id="businesscontact" value="+91" placeholder="enter number">
                </div>
                <div class="businessboxrow">
                    <label>EMAIL:</label>
                    <input type="text" name="email" id="businessemail" placeholder="enter email">
                </div>
                <div class="businessboxrow">
                    <label>ADDRESS:</label>
                    <input type="text" name="address" id="bussinessadress" placeholder="enter address">
                </div>
                <div class="businessboxrow">
                    <label>BUSINESS SERVICE:</label>
                    <textarea rows="2" name="bservice" id="businessservices" placeholder="enter business service"></textarea>
                </div>
            </div>
<!-- <blink> -->
    <div class="businessboxfrom" >
                <div class="businessboxrow">
                    <label>WEBSITE LINK:</label>
                    <input type="text" name="bname" id="web" placeholder="Enter website name">
                </div>
                <div class="businessboxrow">
                    <label>FACEBOOK LINK:</label>
                    <input type="text" name="bowner" id="face" placeholder="Enter facebook link">
                </div>
                <div class="businessboxrow">
                    <label>TWITTER LINK:</label>
                    <input type="text" name="mnum" id="twit" placeholder="Enter twitter link">
                </div>
                <div class="businessboxrow">
                    <label>INSTAGRAM LINK:</label>
                    <input type="text" name="email" id="insta" placeholder="Enter instagram link">
                </div>
                <div class="businessboxrow">
                    <label>LATITUDE & LONGITUDE:</label>
                    <input type="text" name="address" id="landl" placeholder="Latitude,Longitude">
                </div>
                <div class="businessboxrow">
                    <label>BUSINESS IMAGE:</label>
                    <button style="width: 50%; height: 35px; color: #2F3B59; margin-top:0px; margin-right:89px;   background-color: white; border-radius: 20px;">upload a file</button>
                    <input type="file" name="bservice" onchange="uploadimage(this)" id="image">
                </div>
                <div class="businessboxrow">
                    <button id="sub" onclick="submit(this.value)" value="profile">Submit</button>
                </div>                
            </div>
            <fieldset>
                <legend>Category</legend>
                <table>
                    <tr>
                        <th>Category name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>badai</td>
                        <td><img src="../images/index1.jpg"></td>
                        <td>edit/delete</td>
                    </tr>
                    <tr>
                        <td>badai</td>
                        <td><img src="../images/index1.jpg"></td>
                        <td>edit/delete</td>
                    </tr>
                </table>
            </fieldset>
        </div>


        <script>
            var number = NaN;
            function uploadimage(a) {
                if (a.value) {
                    var file = a.files[0];
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            alert(a.value);
                            document.getElementById("tempbutton").innerHTML = this.responseText;
                        }
                        if (this.status == 404) {
                            alert("page not found");
                        }
                    };
                    var formData = new FormData();
                    formData.append('fileToUpload', file);
                    xmlhttp.open("POST", "uploadimage.php", false);
                    xmlhttp.send(formData);
                }
            }
            function submit(buttonname) {
                if (buttonname == "profile") {
                    var name = document.getElementById("businessname").value;
                    var owner = document.getElementById("businessowner").value;
                    var contact = document.getElementById("businesscontact").value;
                    var email = document.getElementById("businessemail").value;
                    var address = document.getElementById("businessaddress").value;
                    var services = document.getElementById("businessservices").value;
                    var category = document.getElementById("category").value;
                    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                    if (name == "") {
                        alert("Enter the business name first");
                    } else if (owner == "") {
                        alert("Enter owner first");
                    } else if (contact == "") {
                        alert("Enter contact first");
                    } else if (email == "") {
                        alert("Enter email first");
                    } else if (reg.test(email) == false) {
                        alert('Invalid Email Address');
                    } else if (address == "") {
                        alert("Enter address first");
                    } else if (services == "") {
                        alert("Enter services first");
                    } else if (category == "") {
                        alert("Select any category");
                    } else {
                        request("admin/phpfiles/submitbusiness.php?name=" + name + "&owner=" + owner + "&contact=" + contact + "&email=" + email + "&address=" + address + "&services=" + services + "&category=" + category, getNext);
                    }
                } else if (buttonname == "link") {
                    var web = document.getElementById("web").value;
                    var face = document.getElementById("face").value;
                    var twit = document.getElementById("twit").value;
                    var insta = document.getElementById("insta").value;
                    var landl = document.getElementById("landl").value;
                    var image = document.getElementById("image").value;
                    if (web == "") {
                        alert("Enter website link first");
                    } else if (face == "") {
                        alert("Enter faceboox link first");
                    } else if (twit == "") {
                        alert("Enter twiter link first");
                    } else if (insta == "") {
                        alert("Enter instagram link first");
                    } else if (landl == "") {
                        alert("Enter latitude and longitute first");
                    } else if (image == "") {
                        alert("select one image");
                    } else {
                        request("admin/phpfiles/submitbusiness_link.php?id=" + number + "&web=" + web + "&face=" + face + "&twit=" + twit + "&insta=" + insta + "&landl=" + landl + "&img=" + image, getNext1);
                    }
                }
            }
            function getNext(data) {
                if (isNaN(data)) {
                    alert(data);
                } else {
                    number = data;
                    submit("loan")
                }
            }
            function getNext1(data) {
                if (isNaN(data)) {
                    alert(data);
                } else {
                    
                }
            }
            
            
            
//businessname,businessowner,businesscontact,businessemail,bussinessadress,businessservices,weblink,facelink,twitlink,instalink,landl,bimage
        </script>
    </body>

</html>