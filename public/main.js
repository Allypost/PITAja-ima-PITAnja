(function() {
    var baseUrl = baseUrl || '';
    var answers = {};
    var answerCounter = 0;

    function debounce(fn, waitMs, immediate) {
        var timeout;
        return function() {
            var context = this, args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) fn.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, waitMs);
            if (callNow) fn.apply(context, args);
        };
    }

    function processResult(result) {
        var answerNumber = answerCounter++;
        answers[ answerNumber ] = result.answer;

        var $question = document.createElement('div');
        $question.className = 'col-md-10';
        $question.innerText = result.question;

        var $answerButton = document.createElement('button');
        $answerButton.innerText = 'Answer';
        $answerButton.onclick = function(event) {
            showAnswer(event, answerNumber);
        };

        var $container = document.createElement('div');
        $container.className = 'row top-buffer';

        $container.appendChild($question);
        $container.appendChild($answerButton);

        return $container;
    }

    function showAnswer(event, answer) {
        setAnswerHtml(answers[ answer ]);
        event.preventDefault();
    }

    function processResults(results) {
        answers = {};
        answerCounter = 0;

        try {
            results = JSON.parse(results);
        } catch (e) {
            return setQuestionsHtml('');
        }

        if (!results.success) {
            return setQuestionsHtml('Something went wrong. Please try again later.');
        }

        if (!results.data || !results.data.length) {
            return setQuestionsHtml('No results...');
        }

        setQuestionsHtml('');

        var $questionList = document.querySelector('.question-list');
        for (var result of results.data) {
            $questionList.appendChild(processResult(result));
        }
    }

    function showResult(query) {
        setLoading();

        if (query.length === 0) {
            return setQuestionsHtml('');
        }

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {  // code for IE6, IE5
            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                processResults(xmlhttp.responseText);
            }
        };

        xmlhttp.open('GET', baseUrl + '/livesearch.php?q=' + encodeURIComponent(query), true);
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

    function openTriviaImage(imageName) {
        if (imageName.trim().length === 0) {
            return;
        }

        var $nav = document.getElementById('myNav');
        $nav.style.width = '100%';

        var $img = document.getElementById('nav-img');
        $img.src = baseUrl + '/' + imageName + '.png';
    }

    function closeNav() {
        var $nav = document.getElementById('myNav');
        $nav.style.width = '0%';
    }

    function setQuestionsHtml(html) {
        var $questions = document.querySelector('.question-list');

        $questions.innerHTML = html;
    }

    function setAnswerHtml(html) {
        var $answer = document.querySelector('.answer-box');

        $answer.innerHTML = html;
    }

    function setLoading() {
        setQuestionsHtml('Loading...');
        setAnswerHtml('');
    }

    window.showResult = debounce(showResult, 250);
    window.showAnswer = showAnswer;
    window.openTriviaImage = openTriviaImage;
    window.poruka1 = poruka1;
    window.poruka2 = poruka2;
    window.poruka3 = poruka3;
    window.closeNav = closeNav;
})();
