function getUrlParameter(name) {
  name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
  var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
  var results = regex.exec(location.search);
  return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
};
function getTrash(){
  var foo = getUrlParameter('type');
  console.log(foo);
  $.getJSON("data/services.json" ,function(data){
    console.log(data.title);
    $('#Trashes_Json').html(data.title);
    $('#Json_name').html(data.Trashes[foo-1].name);
    $('#imgJson').attr({"src":data.Trashes[foo-1].Picture});
    $('#Address_Json').html(data.Trashes[foo-1].Address);
    $('#Capacity_Json').html(data.Trashes[foo-1].Capacity);

  });
}
function callAjax(data_meeting) { 
  console.log('call')    // 
  $.ajax({
      type: "POST",
      url: "delete.php",
      data: data_meeting,
      cache: true
  });
}
// function Ajaxx(){

// $("#loader").show();
// $("#loader").fadeIn(133333331112121212121).html(' <span class="loading">loading...</span>');
// $.ajax({
//    type : "POST",
//    url : "TrashJson.php",
//    data : dataString,
//    cache : true,
//    success:function(html){
//     $("#loader").after(html);
//     $("#loader").hide();
//    }
// });
// }




function getPageName(url) {
    var index = url.lastIndexOf("/") + 1;
    var filenameWithExtension = url.substr(index);
    var filename = filenameWithExtension.split(".")[0]; 
    return filename;                                    
}

// window.onload = function Create() {

  $(document).ready(function () {
    var page = getPageName(window.location.pathname);
    console.log(page);
    if (page.toUpperCase() == "MyLogin".toUpperCase())
    {
      console.log(page);
        var loginText = document.querySelector(".title-text .login");
    var loginForm = document.querySelector("form.login");
     var loginBtn = document.querySelector("label.login");
     var signupBtn = document.querySelector("label.signup");
     var signupLink = document.querySelector("form .signup-link a");
    signupBtn.onclick = function(){
      loginForm.style.marginLeft = "-50%";
      loginText.style.marginLeft = "-50%";
    };
    loginBtn.onclick = function(){
      loginForm.style.marginLeft = "0%";
      loginText.style.marginLeft = "0%";
    };
    signupLink.onclick = function(){
      signupBtn.click();
      return false;
    };
    }
    if (page == "get_form")
    {
        var iMage1 = document.getElementById("goto");
        iMage1.onmouseover = function(){
         location.href = "index.php";
        }
    }
    if (page == "Trash_page")
    {
     

        var sort_table = document.getElementById("sortTable_");
        sort_table.onclick = function(){
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  while (switching) {
    switching = false;
    rows = document.getElementById("myTable").rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("td")[1];
      y = rows[i + 1].getElementsByTagName("td")[1];
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
        };
        var iMage1 = document.getElementById("goto");
        iMage1.onmouseover = function(){
         location.href = "index.php";
        };
    }
    if (page == "TrashJson"){
      getTrash();
    }
    if (page == "list"){
      console.log('hellodelete');
      $('.delete_').click(function () {   
        console.log('hello1');                          //delete meeting using ajax
        var data_meeting = "ReportID=" + this.value + "&status=delete";
        $(this).parent().parent().hide();
        console.log(data_meeting);
        callAjax(data_meeting);
    });
    }
    
});