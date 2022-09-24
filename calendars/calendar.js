var currentTitle = document.getElementById('current-year-month');
var calendarBody = document.getElementById('calendar-body');
var today = new Date();
var first = new Date(today.getFullYear(), today.getMonth(),1);
var dayList = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
var monthList = ['January','February','March','April','May','June','July','August','September','October','November','December'];
var leapYear=[31,29,31,30,31,30,31,31,30,31,30,31];
var notLeapYear=[31,28,31,30,31,30,31,31,30,31,30,31];
var pageFirst = first;
var pageYear;
var mainTodayDay = document.getElementById('main-day');
var mainTodayDate = document.getElementById('main-date');
var mainNowweek = document.getElementById('main-week')
let link = document.location.href.split("?")[1];
link = link.substr(0, 2)+" "+link.substr(5);

(function()
{
    document.getElementById("class-number").innerHTML = link;
    switch(link)
    {
        case "MS 1-1": link="middle_1_1"; break;
        case "MS 1-2": link="middle_1_2"; break;
        case "MS 1-3": link="middle_1_3"; break;
        case "MS 1-4": link="middle_1_4"; break;
        case "MS 2-1": link="middle_2_1"; break;
        case "MS 2-2": link="middle_2_2"; break;
        case "MS 2-3": link="middle_2_3"; break;
        case "MS 2-4": link="middle_2_4"; break;
        case "MS 3-1": link="middle_3_1"; break;
        case "MS 3-2": link="middle_3_2"; break;
        case "MS 3-3": link="middle_3_3"; break;
        case "MS 3-4": link="middle_3_4"; break;
        case "HS 1-1": link="high_1_1"; break;
        case "HS 1-2": link="high_1_2"; break;
        case "HS 1-3": link="high_1_3"; break;
        case "HS 1-4": link="high_1_4"; break;
        case "HS 2-1": link="high_2_1"; break;
        case "HS 2-2": link="high_2_2"; break;
        case "HS 2-3": link="high_2_3"; break;
        case "HS 2-4": link="high_2_4"; break;
        case "HS 3-1": link="high_3_1"; break;
        case "HS 3-2": link="high_3_2"; break;
        case "HS 3-3": link="high_3_3"; break;
        case "HS 3-4": link="high_3_4"; break;
        default:link="Fail to Load"; break;
    }
})();

if(first.getFullYear() % 4 === 0){
    pageYear = leapYear;
}else{
    pageYear = notLeapYear;
}

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

async function applyInfo()
{
    startLoading();

    let todayDate = first.getFullYear()+"-"+(first.getMonth()+1);
    let range = "between \""+todayDate+"-"+"01\" and \""+todayDate+"-"+pageYear[first.getMonth()]+"\"";
    let info = await fetchDate([range, "high_2_1", "./json"]);
    let valCnt = 0;
    for(var i = 1 ; i <= pageYear[first.getMonth()] ; i++)
    {
        var $ol = document.createElement("ol");
        while(info[valCnt])
        {
            var inst = info[valCnt]["datetime"];
            var instInfo = inst.substring(inst.length-2);
            if(instInfo.substring(0,1) === "0")
            {
                instInfo = instInfo.substring(1);
            }
            if(instInfo == i){
                var $li = document.createElement("li");
                $li.textContent = info[valCnt]["subject"].substring(0, 3)+"...";
                $ol.appendChild($li);
                valCnt++;
            }
            else
            {
                break;
            }
        }
        document.getElementById(i).appendChild($ol);
    }

    stopLoading();
}

async function fetchDate(info)
{
    await fetch("../inputpage/mysql_output.php?ver=3", {
        method:"post",
        headers:{"Content-Type":"application/json; charset=UTF-8"},
        body:JSON.stringify(info)
    });

    var text = await fetch("../inputpage/json?ver=2").then(res => res.text().then(res => {
        res = JSON.parse(res);

        for(var i = 0 ; i < res.length ; i++)
        {
            res[i] = JSON.parse(res[i]);
        }

        return res;
    }));

    return text;
}

function showCalendar(){
    let monthCnt = 100;
    let cnt = 1;
    for(var i = 0; i < 6; i++){
        var $tr = document.createElement('tr');
        $tr.setAttribute('id', monthCnt);
        for(var j = 0; j < 7; j++){
            if((i === 0 && j < first.getDay()) || cnt > pageYear[first.getMonth()]){
                var $td = document.createElement('td');
                $tr.appendChild($td);
            }else{
                var $td = document.createElement('td');
                $td.textContent = cnt;
                $td.setAttribute('id', cnt);
                $tr.appendChild($td);
                cnt++;
            }
        }
        monthCnt++;
        calendarBody.appendChild($tr);
    }

    applyInfo();
}
showCalendar();

function removeCalendar(){
    let catchTr = 100;
    for(var i = 100; i< 106; i++){
        var $tr = document.getElementById(catchTr);
        $tr.remove();
        catchTr++;
    }
}

function prev(){
    const $divs = document.querySelectorAll('#input-list > div');
    $divs.forEach(function(e){
      e.remove();
    });
    console.log("prev");
    const $btns = document.querySelectorAll('#input-list > button');
    $btns.forEach(function(e1){
      e1.remove();
    });
    if(pageFirst.getMonth() === 1){
        pageFirst = new Date(first.getFullYear()-1, 12, 1);
        first = pageFirst;
        if(first.getFullYear() % 4 === 0){
            pageYear = leapYear;
        }else{
            pageYear = notLeapYear;
        }
    }else{
        pageFirst = new Date(first.getFullYear(), first.getMonth()-1, 1);
        first = pageFirst;
    }
    today = new Date(today.getFullYear(), today.getMonth()-1, today.getDate());
    currentTitle.innerHTML = monthList[first.getMonth()] + '&nbsp;&nbsp;&nbsp;&nbsp;'+ first.getFullYear();
    removeCalendar();
    showCalendar();

    showMain();
    clickedDate1 = document.getElementById(today.getDate());
    clickedDate1.classList.add('active');
    clickStart();
}

function next(){
    const $divs = document.querySelectorAll('#input-list > div');
    $divs.forEach(function(e){
      e.remove();
    });
    const $btns = document.querySelectorAll('#input-list > button');
    $btns.forEach(function(e1){
      e1.remove();
    });
    if(pageFirst.getMonth() === 12){
        pageFirst = new Date(first.getFullYear()+1, 1, 1);
        first = pageFirst;
        if(first.getFullYear() % 4 === 0){
            pageYear = leapYear;
        }else{
            pageYear = notLeapYear;
        }
    }else{
        pageFirst = new Date(first.getFullYear(), first.getMonth()+1, 1);
        first = pageFirst;
    }
    today = new Date(today.getFullYear(), today.getMonth() + 1, today.getDate());
    currentTitle.innerHTML = monthList[first.getMonth()] + '&nbsp;&nbsp;&nbsp;&nbsp;'+ first.getFullYear();
    removeCalendar();
    showCalendar();
    showMain();
    clickedDate1 = document.getElementById(today.getDate());
    clickedDate1.classList.add('active');
    clickStart();
}

currentTitle.innerHTML = monthList[first.getMonth()] + '&nbsp;&nbsp;&nbsp;&nbsp;' + first.getFullYear();
function showMain(){
    mainTodayDay.innerHTML = dayList[today.getDay()];
    mainTodayDate.innerHTML = today.getDate();
    mainTodayDate.value = today.getDate();
    mainNowweek.innerHTML = "Week " + (Math.floor(((today.getDate() - (7 - first.getDay()))/7) - 0.1) + 2);
}
showMain();

var clickedDate1 = document.getElementById(today.getDate());
clickedDate1.classList.add('active');
var prevBtn = document.getElementById('prev');
var nextBtn = document.getElementById('next');
prevBtn.addEventListener('click', prev);
nextBtn.addEventListener('click',next);
var tdGroup = [];
function clickStart(){
    for(let i = 1; i <= pageYear[first.getMonth()]; i++){
        tdGroup[i] = document.getElementById(i);
        tdGroup[i].addEventListener('click',changeToday);
    }
}
function changeToday(e){
    for(let i = 1; i <= pageYear[first.getMonth()]; i++){
        if(tdGroup[i].classList.contains('active')){
            tdGroup[i].classList.remove('active');
        }
    }
    clickedDate1 = e.currentTarget;
    clickedDate1.classList.add('active');
    today = new Date(today.getFullYear(), today.getMonth(), clickedDate1.id);
    showMain();
    keyValue = today.getFullYear() + '' + today.getMonth()+ '' + today.getDate();
}
clickStart();

async function fetchPage(){
    document.getElementById("submitBtn").setAttribute("disabled", "disabled");
    startLoading();

    let a = document.getElementById("current-year-month").innerHTML.replaceAll("&nbsp;", "");
    let year = a.slice(-4);
    let month = a.slice(0, -4);
    month = distinguishMonth(month);

    var submit = "= \""+year+"-"+month+"-"+document.getElementById("main-date").value+"\"";
    var submitValue = [submit, link, "./json"];

    await fetch("../inputpage/mysql_output.php?ver=2", {
    method:"post",
    headers:{"Content-Type":"application/json; charset=UTF-8"},
    body:JSON.stringify(submitValue)
    });

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
    document.getElementById("submitBtn").removeAttribute("disabled");
}

function distinguishMonth(cse)
{
    switch(cse)
    {
    case "January":return 1;
    case "February":return 2;
    case "March":return 3;
    case "April":return 4;
    case "May":return 5;
    case "June":return 6;
    case "July":return 7;
    case "August":return 8;
    case "September":return 9;
    case "October":return 10;
    case "November":return 11;
    case "December":return 12;
    default:return 0;
    }
}

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