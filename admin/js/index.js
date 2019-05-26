loadDoc("../phpfiles/get_order.php", getOrder);
loadDoc("../phpfiles/get_feedback.php", getFeedback);

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
function getOrder(xhttp) {
    var data = JSON.parse(xhttp);
    var temp = "";
    for (var i = 0; i < data.length; i++) {
        temp += '<tr>';
        temp += '<td class="font-weight-medium">' + data[i].order_id + '</td>';
        temp += '<td>' + data[i].user_name + '</td>';//set image
        var progress=0;
        if (data[i].d_status == 0)
            progress = 'bg-warning progress-bar-striped" role="progressbar" style="width: '+0;
        else if (data[i].d_status == 1)
            progress = 'bg-danger progress-bar-striped" role="progressbar" style="width: '+25;
        else if (data[i].d_status == 2)
            progress = 'bg-primary progress-bar-striped" role="progressbar" style="width: '+50;
        else if (data[i].d_status == 3)
            progress = 'bg-primary progress-bar-striped" role="progressbar" style="width: '+75;
        else if (data[i].d_status == 4)
            progress = 'bg-success progress-bar-striped" role="progressbar" style="width: '+100;
        temp += '<td><div class="progress"><div class="progress-bar ' + progress + '%" aria-valuenow="' + progress + '" aria-valuemin="0" aria-valuemax="4"></div></div></td>';

        temp += '<td>' + data[i].user_mobile + '</td>';
        temp += '<td>'+data[i].total+'</td>';//set user name
        temp += '<td>'+data[i].order_date+'</td>'; //set feedback id
        temp += '</tr>';
    }
    document.getElementById("ordertable").innerHTML = temp;
}
function getFeedback(xhttp) {
    var data = JSON.parse(xhttp);
    var temp = "";
    for (var i = 0; i < data.length; i++) {
        temp += '<div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3"><div class="col-md-1">';
        temp += '<img class="img-sm rounded-circle mb-4 mb-md-0" src="../images/users/' + data[i].user_image + '" alt="profile image">';//set image
        temp += '</div><div class="ticket-details col-md-9"><div class="d-flex">';
        temp += '<p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">' + data[i].user_name + ' :</p>';//set user name
        temp += '<p class="text-primary mr-1 mb-0">[#' + data[i].feedback_id + ']</p>'; //set feedback id
        temp += '<p class="mb-0 ellipsis">' + data[i].user_mobile + '</p></div>';//set contact number
        temp += '<p class="text-gray ellipsis mb-2">' + data[i].feedback + '</p>';//set feedback
        temp += '<div class="row text-gray d-md-flex d-none"><div class="col-8 d-flex"><small class="mb-0 mr-2 text-muted text-muted">Date Of Feedback :</small>';
        temp += "<small class='Last-responded mr-2 mb-0 text-muted text-muted'>" + data[i].date + "</small>";//set date
        temp += '</div></div></div></div>';
    }
    document.getElementById("bottomfeedbackinindex").innerHTML = temp;
}