document.getElementById('stockCheckForm').addEventListener('submit', function (e) {
    checkStock(this.getAttribute('method'), this.getAttribute('action'), new FormData(this));
    debugger;
    e.preventDefault();
});

function payload(data) {
    var xml = '<?xml version="1.0" encoding="UTF-8"?>';
    xml += '<stockCheck>';

    for(var pair of data.entries()) {
        var key = pair[0];
        var value = pair[1];

        xml += '<' + key + '>' + value + '</' + key + '>';
    }

    xml += '</stockCheck>';
    return xml;
}

function checkStock(method, action, data) {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("stockCheckResult").innerHTML =
          this.responseText;
        }
      };
    xhr.open(method, action, true);
    xhr.setRequestHeader("Content-type", "text/xml");
    xhr.send(payload(data));
}