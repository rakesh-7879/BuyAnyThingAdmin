loadDoc("../phpfiles/get_category.php", getCateogry);
loadDoc("../phpfiles/get_subcategory.php?category_id=" + document.getElementById("getcategory").value, getSubcategory);

function loadDoc(url, cFunction) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            cFunction(this.response);
        }
        if (this.status == 404) {
            alert("page not found");
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}
function getCateogry(xhttp) {
    var data = JSON.parse(xhttp);
    var temp = '<option value="0">Select a Category</option>';
    for (var i = 0; i < data.length; i++) {
        temp += '<option value="' + data[i].category_id + '">' + data[i].category_name + '</option>'
    }
    document.getElementById("getcategory").innerHTML = temp;
    document.getElementById("getcategory1").innerHTML = temp;
}
function getSubcategory(xhttp) {
    var data = JSON.parse(xhttp);
    var temp = '<option value="0">Select a Sub-category</option>';
    for (var i = 0; i < data.length; i++) {
        temp += '<option value="' + data[i].subcategory_id + '">' + data[i].subcategory_name + '</option>'
    }
    document.getElementById("getsubcategory").innerHTML = temp;
}
function gotChangesOnCategory(category_id) {
    loadDoc("../phpfiles/get_subcategory.php?category_id=" + category_id, getSubcategory);
}
function submitcategory() {
    var category_name = document.getElementById("category_name").value;
    var category_image = document.getElementById("category_image").files[0].name;
    if (category_name == "") {
        alert("Please Enter the category name");
    } else {
        alert("aa")
        //loadDoc("../phpfiles/submit_category.php?category_name=" + category_name + "&category_image=" + category_image, updatePage);
        //document.getElementById("category_name").value = "";
        //document.getElementById("category_image").value = "";
    }
}
function submitsubcategory() {
    var category_id = document.getElementById("getcategory1").value;
    var subcategory_name = document.getElementById("subcategory_name").value;
    var subcategory_image = document.getElementById("subcategory_image").files[0].name;
    if (category_id == 0) {
        alert("Please select a category name");
    } else if (subcategory_name == "") {
        alert("Please Enter the subcategory name");
    } else if (subcategory_image == "") {
        alert("Please select a image for category");
    } else {
        loadDoc("../phpfiles/submit_subcategory.php?subcategory_name=" + subcategory_name + "&subcategory_image=" + subcategory_image + "&category_id=" + category_id, updatePage);
        document.getElementById("getcategory1").selectedIndex = 0;
        document.getElementById("subcategory_name").value = "";
        document.getElementById("subcategory_image").value = "";
    }
}
function submitproduct() {
    var name = document.getElementById("product_name").value;
    var tag = document.getElementById("product_tag").value;
    var category_id = document.getElementById("getcategory").value;
    var subcategory = document.getElementById("getsubcategory").value;
    var regular_price = document.getElementById("regular_price").value;
    var selling_price = document.getElementById("selling_price").value;
    var description = document.getElementById("description").value;
    var image1 = document.getElementById("image1").files[0].name;
    var image2 = document.getElementById("image2").files[0].name;
    var image3 = document.getElementById("image3").files[0].name;
    if (name == "") {
        alert("Please product name");
    } else if (tag == "") {
        alert("Please enter product tag");
    } else if (category_id == 0) {
        alert("Please select a category name");
    } else if (subcategory == 0) {
        alert("Please select a subcategory name");
    } else if (regular_price == "") {
        alert("Please select a category name");
    } else {
        loadDoc("../phpfiles/submit_product.php?name=" + name + "&tag=" + tag + "&category_id=" + category_id + "&subcategory=" + subcategory + "&r_price=" + regular_price + "&s_price=" + selling_price + "&description=" + description + "&i1=" + image1 + "&i2=" + image2 + "&i3=" + image3, updatePage);
    }
}
function cleanCategory() {
    document.getElementById("category_name").value = "";
    document.getElementById("category_image").value = "";
}
function cleanSubcategory() {
    document.getElementById("getcategory1").selectedIndex = 0;
    document.getElementById("subcategory_name").value = "";
    document.getElementById("subcategory_image").value = "";
}
function cleanProduct() {
    document.getElementById("product_name").value = "";
    document.getElementById("product_tag").value = "";
    document.getElementById("getcategory").selectedIndex = 0;
    document.getElementById("getsubcategory").selectedIndex = 0;
    document.getElementById("regular_price").value = "";
    document.getElementById("selling_price").value = "";
    document.getElementById("description").value = "";
    document.getElementById("image1").value = "";
    document.getElementById("image2").value = "";
    document.getElementById("image3").value = "";
}
function updatePage(xhttp) {
    if (isNaN(xhttp)) {
        alert("some thing is worng please contact with 8989812574 without refering the page" + xhttp);
        console.log(xhttp);
    } else {
        console.log(xhttp);
        loadDoc("../phpfiles/get_category.php", getCateogry);
        loadDoc("../phpfiles/get_subcategory.php?category_id=" + document.getElementById("getcategory").value, getSubcategory);
    }

}
function uploadimage(a, dir) {
    if (a.value) {
        var file = a.files[0];
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tempbutton").innerHTML = this.responseText;
            }
            if (this.status == 404) {
                alert("page not found");
            }
        };
        var formData = new FormData();
        formData.append('fileToUpload', file);
        formData.append('dir', dir);

        xmlhttp.open("POST", "../phpfiles/uploadimage.php", true);
        xmlhttp.send(formData);
    }
}
function fillCategoryDate(xhttp){
    var data=JSON.parse(xhttp);
    document.getElementById("category_name").value = data[0].category_name;
    document.getElementById("category_image").value = data[0].category_image;
}