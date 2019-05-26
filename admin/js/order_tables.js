loadDoc("../phpfiles/get_order.php?todays=1", getTodaysOrder);
loadDoc("../phpfiles/get_order.php?d_status=1", getPlacedOrder);
loadDoc("../phpfiles/get_order.php?d_status=2", getPackedOrder);
loadDoc("../phpfiles/get_order.php?d_status=3", getProcessingOrder);
loadDoc("../phpfiles/get_order.php?d_status=4", getDeliveredOrder);
loadDoc("../phpfiles/get_order.php?d_status=0", getCanceledOrder);



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
    var temp = "";
    getOrderedProduct(data[0].order_id);
    for (var i = 0; i < data.length; i++) {
        temp += "<tr>";
        temp += "<td>" + data[i].order_id + ".&nbsp;&nbsp;" + data[i].user_name + " (" + data[i].user_mobile + ")</td>";
        temp += "<td>" + data[i].total + "/-</td>";
        temp += '<td><button onclick="getOrderedProduct(this.value)" value=' + data[i].order_id + ' class="btn btn-success mr-2">View</button></td></td>';
        temp += "</tr>";
    }
    document.getElementById("getTodaysOrder").innerHTML = temp;
}
function getOrderedProduct(aa) {
    loadDoc("../phpfiles/get_ordered_products.php?order_id=" + aa, getOrderedProducts);
}
function getOrderedProducts(xhttp) {
    var data = JSON.parse(xhttp);
    var temp = "";
    document.getElementById("getOrderId").innerHTML = data[0].order_id;
    for (var i = 0; i < data.length; i++) {
        temp += "<tr>";
        temp += "<td>" + data[i].product_name + "</td>";
        temp += '<td>' + data[i].quentity + '</td>';
        temp += '<td>' + data[i].total + '</td>';
        temp += "</tr>";
    }
    document.getElementById("getOrderedProducts").innerHTML = temp;
}
function getPlacedOrder(xhttp) {
    var data = JSON.parse(xhttp);
    var temp = "";
    var odate = "asdf";
    var count = 0;
    var classname = "table-info";
    document.getElementById("getPlacedOrdercount").innerHTML = data.length;
    for (var i = 0; i < data.length; i++) {
        var tempdate = data[i].order_date.split(" ");
        var cdate = tempdate[0];

        if (cdate == odate) {
            temp += '<tr class="' + classname + '">';
        } else {

            if (count == 0) {
                classname = "table-info";
                count++;
            } else if (count == 1) {
                classname = "table-warning";
                count++;
            } else if (count == 2) {
                classname = "table-danger";
                count++;
            } else if (count == 3) {
                classname = "table-success";
                count++;
            } else if (count == 4) {
                classname = "table-primary";
                count++;
            }
            temp += '<tr class="' + classname + '">';
        }

        temp += '<td class="font-weight-medium">' + data[i].order_id + '</td>';
        temp += '<td>' + data[i].user_name + '</td>';//set image
        temp += '<td>' + data[i].user_mobile + '</td>';
        temp += '<td>' + data[i].total + '</td>';//set user name
        temp += '<td>' + data[i].order_date + '</td>'; //set feedback id   
        temp += '<td><button onclick="getUpdateDeliveryStatus(' + data[i].order_id + ',2)" class="btn btn-success mr-2">Packed</button><br><button onclick="getUpdateDeliveryStatus(' + data[i].order_id + ',0)" class="btn btn-danger mr-2">Cancel</button></td>';
        temp += '</tr>';
        odate = cdate;
    }
    document.getElementById("getPlacedOrder").innerHTML = temp;
}
function getPackedOrder(xhttp) {
    var data = JSON.parse(xhttp);
    var temp = "";
    var odate = "asdf";
    var count = 0;
    var classname = "table-info";
    document.getElementById("getPackedOrdercount").innerHTML = data.length;
    for (var i = 0; i < data.length; i++) {
        var tempdate = data[i].order_date.split(" ");
        var cdate = tempdate[0];

        if (cdate == odate) {
            temp += '<tr class="' + classname + '">';
        } else {

            if (count == 0) {
                classname = "table-info";
                count++;
            } else if (count == 1) {
                classname = "table-warning";
                count++;
            } else if (count == 2) {
                classname = "table-danger";
                count++;
            } else if (count == 3) {
                classname = "table-success";
                count++;
            } else if (count == 4) {
                classname = "table-primary";
                count++;
            }
            temp += '<tr class="' + classname + '">';
        }

        temp += '<td class="font-weight-medium">' + data[i].order_id + '</td>';
        temp += '<td>' + data[i].user_name + '</td>';//set image
        temp += '<td>' + data[i].user_mobile + '</td>';
        temp += '<td>' + data[i].total + '</td>';//set user name
        temp += '<td>' + data[i].order_date + '</td>'; //set feedback id
        temp += '<td><button onclick="getUpdateDeliveryStatus(' + data[i].order_id + ',3)" class="btn btn-success mr-2">Processing</button><br><button onclick="getUpdateDeliveryStatus(' + data[i].order_id + ',0)" class="btn btn-danger mr-2">Cancel</button></td>';
        odate = cdate;
    }
    document.getElementById("getPackedOrder").innerHTML = temp;
}
function getProcessingOrder(xhttp) {
    var data = JSON.parse(xhttp);
    var temp = "";
    var odate = "asdf";
    var count = 0;
    var classname = "table-info";
    document.getElementById("getProcessingOrdercount").innerHTML = data.length;
    for (var i = 0; i < data.length; i++) {
        var tempdate = data[i].order_date.split(" ");
        var cdate = tempdate[0];

        if (cdate == odate) {
            temp += '<tr class="' + classname + '">';
        } else {

            if (count == 0) {
                classname = "table-info";
                count++;
            } else if (count == 1) {
                classname = "table-warning";
                count++;
            } else if (count == 2) {
                classname = "table-danger";
                count++;
            } else if (count == 3) {
                classname = "table-success";
                count++;
            } else if (count == 4) {
                classname = "table-primary";
                count++;
            }
            temp += '<tr class="' + classname + '">';
        }

        temp += '<td class="font-weight-medium">' + data[i].order_id + '</td>';
        temp += '<td>' + data[i].user_name + '</td>';//set image
        temp += '<td>' + data[i].user_mobile + '</td>';
        temp += '<td>' + data[i].total + '</td>';//set user name
        temp += '<td>' + data[i].order_date + '</td>'; //set feedback id
        temp += '<td><button onclick="getUpdateDeliveryStatus(' + data[i].order_id + ',4)" class="btn btn-success mr-2">Delivered</button><br><button onclick="getUpdateDeliveryStatus(' + data[i].order_id + ',0)" class="btn btn-danger mr-2">Cancel</button></td>';
        odate = cdate;
    }
    document.getElementById("getProcessingOrder").innerHTML = temp;
}
function getDeliveredOrder(xhttp) {
    var data = JSON.parse(xhttp);
    var temp = "";
    var odate = "asdf";
    var count = 0;
    var classname = "table-info";
    document.getElementById("getDeliveredOrdercount").innerHTML = data.length;
    for (var i = 0; i < data.length; i++) {
        var tempdate = data[i].order_date.split(" ");
        var cdate = tempdate[0];

        if (cdate == odate) {
            temp += '<tr class="' + classname + '">';
        } else {

            if (count == 0) {
                classname = "table-info";
                count++;
            } else if (count == 1) {
                classname = "table-warning";
                count++;
            } else if (count == 2) {
                classname = "table-danger";
                count++;
            } else if (count == 3) {
                classname = "table-success";
                count++;
            } else if (count == 4) {
                classname = "table-primary";
                count++;
            }
            temp += '<tr class="' + classname + '">';
        }

        temp += '<td class="font-weight-medium">' + data[i].order_id + '</td>';
        temp += '<td>' + data[i].user_name + '</td>';//set image
        temp += '<td>' + data[i].user_mobile + '</td>';
        temp += '<td>' + data[i].total + '</td>';//set user name
        temp += '<td>' + data[i].order_date + '</td>'; //set feedback id   
        odate = cdate;
    }
    document.getElementById("getDeliveredOrder").innerHTML = temp;
}
function getCanceledOrder(xhttp) {
    var data = JSON.parse(xhttp);
    var temp = "";
    var odate = "asdf";
    var count = 0;
    var classname = "table-info";
    document.getElementById("getCanceledOrdercount").innerHTML = data.length;
    for (var i = 0; i < data.length; i++) {
        var tempdate = data[i].order_date.split(" ");
        var cdate = tempdate[0];

        if (cdate == odate) {
            temp += '<tr class="' + classname + '">';
        } else {

            if (count == 0) {
                classname = "table-info";
                count++;
            } else if (count == 1) {
                classname = "table-warning";
                count++;
            } else if (count == 2) {
                classname = "table-danger";
                count++;
            } else if (count == 3) {
                classname = "table-success";
                count++;
            } else if (count == 4) {
                classname = "table-primary";
                count++;
            }
            temp += '<tr class="' + classname + '">';
        }

        temp += '<td class="font-weight-medium">' + data[i].order_id + '</td>';
        temp += '<td>' + data[i].user_name + '</td>';//set image
        temp += '<td>' + data[i].user_mobile + '</td>';
        temp += '<td>' + data[i].total + '</td>';//set user name
        temp += '<td>' + data[i].order_date + '</td>'; //set feedback id   
        odate = cdate;
    }
    document.getElementById("getCanceledOrder").innerHTML = temp;
}
function getUpdateDeliveryStatus(order_id, status) {
    loadDoc("../phpfiles/update_order_delivery_status.php?order_id=" + order_id + "&status=" + status, updatePage);
}
function updatePage(xhttp) {
    if (isNaN(xhttp)) {
        alert("Some thing is worng please context with Rakesh kushwaha");
        console.log(xhttp);
    } else {
        loadDoc("../phpfiles/get_order.php?todays=1", getTodaysOrder);
        loadDoc("../phpfiles/get_order.php?d_status=1", getPlacedOrder);
        loadDoc("../phpfiles/get_order.php?d_status=2", getPackedOrder);
        loadDoc("../phpfiles/get_order.php?d_status=3", getProcessingOrder);
        loadDoc("../phpfiles/get_order.php?d_status=4", getDeliveredOrder);
        loadDoc("../phpfiles/get_order.php?d_status=0", getCanceledOrder);
    }
}