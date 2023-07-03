function appendToResult(value) {
    document.getElementById('result').value += value;
}

function clearResult() {
    document.getElementById('result').value = '';
}

function deleteLastCharacter() {
    var currentResult = document.getElementById('result').value;
    document.getElementById('result').value = currentResult.slice(0, -1);
}

function calculateResult() {
    var currentResult = document.getElementById('result').value;
    var result = eval(currentResult);
    document.getElementById('result').value = result;
}