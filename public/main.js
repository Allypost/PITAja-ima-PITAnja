var baseUrl = baseUrl || '';

function showResult(str) {
    if (str.length === 0) {
        document.getElementById('livesearch').innerHTML = '';
        document.getElementById('livesearch').style.border = '0px';
        return;
    }

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById('livesearch').innerHTML = xmlhttp.responseText;
            document.getElementById('livesearch').style.border = '1px solid #A5ACB2';
        }
    };

    xmlhttp.open('GET', 'livesearch.php?q=' + str, true);
    xmlhttp.send();
}

function poruka1() {
    alert(
        'If you found a question that is not showing an answer or showing a wrong answer or the question itself is wrong by any cause (written wrong or showing double of same kind), please alert it with a screenshot proof to this email: williamthehouseowner@yahoo.com with a detailed description of the problem so it can be fixed as soon as possible! Thank you for your contribution and help in forward! :D');
}

function poruka2() {
    alert(
        'You have a question/answer that is not in this database and you want to share it with others? Please send it to: williamthehouseowner@yahoo.com with a screenshot picture of proof that the question is from the official KingsIsle trivia and that the answer is correct of course! Thank you for your contribution and help in forward! :D');
}

function poruka3() {
    alert('There are currently 431 questions in total inside this search!');
}

function changeFunc(imageName) {
    var $nav = document.getElementById('myNav');
    $nav.style.width = '100%';

    var $img = document.getElementById('nav-img');
    $img.src = baseUrl + '/' + imageName + '.png';
}

function insertText(elemID, text) {
    var elem = document.getElementById(elemID);
    elem.innerHTML = text;
}

function closeNav() {
    var $nav = document.getElementById('myNav');
    $nav.style.width = '0%';
}
