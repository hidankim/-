let link = document.location.href.split("?")[1];

(function()
{
  var subForm = document.getElementById('container');
  var input  = document.createElement('input');
  input.type  = 'hidden';
  input.id = "classname";
  input.name = "classname";
  input.value = link;
  subForm.appendChild(input);   
})();
function startLoading()
{
  let load = document.createElement("style");
  load.setAttribute("type", "text/css");
  load.innerHTML = ".loader{ border: 16px solid #f3f3f3; border-top: 16px solid #3498db; border-radius: 50%; width: 120px; height: 120px; animation: spin 1.5s linear infinite; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); } @keyframes spin{0% {transform: translate(-50%, -50%) rotate(0deg);} 100% {transform: translate(-50%, -50%) rotate(360deg);}}";
  document.getElementById("loader").appendChild(load);
}

function stopLoading()
{
  var cell = document.getElementById("loader");

  while ( cell.hasChildNodes() )
  {
        cell.removeChild( cell.firstChild );       
  }
}

async function fetchPage(){
  document.getElementById("submitBtn").setAttribute("disabled", "disabled");
  startLoading();
  var today = new Date();
  var sub = today.getFullYear()+"-"+(today.getMonth()+1)+"-"+today.getDate();
  var submitValue = ["> \""+sub+"\"", link, "./json"];

  await fetch("./mysql_output.php", {
    method:"post",
    headers:{"Content-Type":"application/json; charset=UTF-8"},
    body:JSON.stringify(submitValue)
  });

  var text = await fetch("./json").then(res => res.text().then(res => {
    res = JSON.parse(res);

    for(var i = 0 ; i < res.length ; i++)
    {
      res[i] = JSON.parse(res[i]);
    }

    return res;
  }));

  let value = "<table border=\"1\"><th>제목</th><th>내용</th><th>과목</th><th>날짜</th><th>교시</th><th>삭제</th>";
  for(var i = 0 ; i < text.length ; i++)
  {
    value += "<tr>";
    for(var j in text[i])
    {
      if(j !== "id"){
        value += "<td>"+text[i][j]+"</td>";
      }
    }
    value += "<td><button class=\"deleteBtn\" id=\""+text[i]["id"]+"\" onclick=\"deleteInfo(this.id)\"> X </button></td></tr>";
  }
  value += "</table>";

  document.getElementById("content").innerHTML = value;
  stopLoading();
  document.getElementById("submitBtn").removeAttribute("disabled");
}
fetchPage();

document.addEventListener('submit', async (e) => {
  e.preventDefault();
  startLoading();
  document.getElementById("submitBtn").setAttribute("disabled", "disabled");

  const form = e.target;
      
  await fetch(form.action, {
    method: form.method,
    body: new FormData(form)
  });

  await fetchPage();
  stopLoading();
  document.getElementById("submitBtn").removeAttribute("disabled");
});

async function deleteInfo(id)
{
  startLoading();
  document.getElementById("submitBtn").setAttribute("disabled", "disabled");
  document.getElementById(id).setAttribute("disabled", "disabled");

  await fetch("./mysql_delete.php", {
    method:'post',
    headers:{"Content-Type":"application/json; charset=UTF-8"},
    body:JSON.stringify([id])
  });

  await fetchPage();
  stopLoading();
  document.getElementById("submitBtn").removeAttribute("disabled");
}