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

(async function fetchPage(){
	startLoading();

	var text = await fetch("../inputpage/json?ver=2").then(res => res.text().then(res => {
        res = JSON.parse(res);

        for(var i = 0 ; i < res.length ; i++)
        {
            res[i] = JSON.parse(res[i]);
        }

        return res;
    }));

    let value = "<table><tr id=\"firstTr\"><th class=\"mleft\">#</th><th>과목</th><th>날짜</th><th>시간</th><th>제목</th><th class=\"mright\">내용</th></tr>";
    for(var i = 0 ; i < text.length ; i++)
    {
        value += "<tr><td class=\"table_index\">"+(i+1)+"</td>";
        var count = 0;
        for(var j in text[i])
        {
            if(j !== "id"){
                value += "<td class=\"td"+count+"\">"+text[i][j]+"</td>";
                count++;
            }
        }
        value += "</tr>";
    }
    value += "</table>";

    document.getElementById("todo-list").innerHTML = value;

    stopLoading();
})();