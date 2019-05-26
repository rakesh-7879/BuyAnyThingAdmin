loadDoc("../phpfiles/get_category.php", getTodaysOrder);
loadDoc("../phpfiles/get_product.php", getPlacedOrder);



function loadDoc(url, cFunction) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            cFunction(this.response);
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}
function getTodaysOrder(xhttp) {
    var data = JSON.parse(xhttp);
    var column1 = "category_name";
    var temp = "";
    getOrderedProduct(data[0].category_id);
    for (var i = 0; i < data.length; i++) {
        temp += "<tr>";
        temp += "<td><img style='width:100px;height:100px;' src='../images/product/" + data[i].category_image + "'/></td>";
        temp += "<td oninput ='updateData(1,2," + data[i].category_id + ",this);' ondblclick='makeMeContenteditable(this)'>" + data[i].category_name + "</td>";
        temp += '<td><button onclick="getOrderedProduct(this.value)" value=' + data[i].category_id + ' class="btn btn-success mr-2">View</button></td></td>';
        temp += "</tr>";
    }
    document.getElementById("getTodaysOrder").innerHTML = temp;
}
function getOrderedProduct(aa) {
    loadDoc("../phpfiles/get_subcategory.php?category_id=" + aa, getOrderedProducts);
}
function getOrderedProducts(xhttp) {
    var data = JSON.parse(xhttp);
    var temp = "";
    document.getElementById("getOrderId").innerHTML = data[0].category_name;
    for (var i = 0; i < data.length; i++) {
        temp += "<tr>";
        temp += "<td><img style='width:100px;height:100px;' src='../images/product/" + data[i].subcategory_image + "'/></td>";
        temp += '<td oninput ="updateData(2,2,' + data[i].subcategory_id + ',this);" ondblclick="makeMeContenteditable(this)">' + data[i].subcategory_name + '</td>';
        temp += '<td>' + data[i].count + '</td>';
        temp += "</tr>";
    }
    document.getElementById("getOrderedProducts").innerHTML = temp;
}
function getPlacedOrder(xhttp) {
    var data = JSON.parse(xhttp);
    var temp = "";
    document.getElementById("getPlacedOrdercount").innerHTML = data.length;
    for (var i = 0; i < data.length; i++) {
        temp += '<tr class="table-success">';
        temp += '<td class="font-weight-medium">' + data[i].product_id + '</td>';
        temp += '<td oninput ="updateData(3,2,' + data[i].product_id + ',this);" ondblclick="makeMeContenteditable(this)">' + data[i].product_name + '</td>';//set image
        temp += '<td oninput ="updateData(3,3,' + data[i].product_id + ',this);" ondblclick="makeMeContenteditable(this)" >' + data[i].product_tag + '</td>';
        temp += '<td oninput ="updateData(3,4,' + data[i].product_id + ',this);" ondblclick="makeMeContenteditable(this)" >' + data[i].ragular_price + '</td>';//set user name
        temp += '<td oninput ="updateData(3,5,' + data[i].product_id + ',this);" ondblclick="makeMeContenteditable(this)">' + data[i].selling_price + '</td>';//set user name
        temp += '<td><img style="width:100px;height:100px;" src="../images/product/' + data[i].image1 + '"/></td>';//set user name
        temp += '<td oninput ="updateData(3,6,' + data[i].product_id + ',this);" ondblclick="makeMeContenteditable(this)">' + data[i].description + '</td>'; //set feedback id   
        temp += '</tr>';
    }
    document.getElementById("getPlacedOrder").innerHTML = temp;
}
function makeMeContenteditable(contex) {
    contex.contentEditable = "true";
}
function updateData(a, b, c, d) {
        loadDoc("../phpfiles/update_single_cell.php?table=" + a + "&column=" + b + "&row=" + c + "&value=" + d.innerHTML, getUpdateNotification);
}
function getUpdateNotification(xhttp) {
    alert(xhttp);
}