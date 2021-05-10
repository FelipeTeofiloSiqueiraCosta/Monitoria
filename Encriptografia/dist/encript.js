var Script = /** @class */ (function () {
    function Script(k) {
        if (k === void 0) { k = 1; }
        this.random = ['@', '#', '!', '*', '&', '%', '$'];
        this.key = k;
    }
    Script.prototype.getRandomInt = function (min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min)) + min;
    };
    Script.prototype.chr = function (chr) {
        return String.fromCharCode(chr);
    };
    Script.prototype.ord = function (index) {
        return index.charCodeAt(0);
    };
    Script.prototype.convertStringInAsciiCode = function (data) {
        var v = this.getRandomInt(0, ((this.random).length) - 1);
        var value = '';
        for (var i = 0; i < (data).length; i++) {
            value += this.chr((this.ord(data.substring(i, i + 1))) - (this.key)) + '' + this.random[v];
            v = this.getRandomInt(0, ((this.random).length) - 1);
        }
        return value;
    };
    Script.prototype.translateStringInAsciiCode = function (data) {
        var value = '';
        for (var i = 0; i < data.length - 1; i++) {
            if (i == 0) {
                value += this.chr((this.ord(data.substring(0, 1))) + (this.key));
            }
            else {
                if (data.substring(i, i + 1) != '@' && data.substring(i, i + 1) != '#' &&
                    data.substring(i, i + 1) != '!' && data.substring(i, i + 1) != '*' &&
                    data.substring(i, i + 1) != '%' && data.substring(i, i + 1) != '&' &&
                    data.substring(i, i + 1) != '$') {
                    value += this.chr((this.ord(data.substring(i, i + 1))) + (this.key));
                }
            }
        }
        return value;
    };
    Script.prototype.Encript = function (data) {
        if (Array.isArray(data)) {
            var vars = void 0;
            // var_dump($vars);
            for (var i = 0; i < data.length; i++) {
                vars = Object.keys(data[i]);
                for (var x = 0; x < vars.length; x++) {
                    data[i][vars[x]] = this.convertStringInAsciiCode(data[i][vars[x]]);
                }
            }
            return data;
        }
        if (typeof data == 'string') {
            return this.convertStringInAsciiCode(data);
        }
    };
    Script.prototype.Decript = function (data) {
        if (Array.isArray(data)) {
            var vars = void 0;
            // var_dump($vars);
            for (var i = 0; i < data.length; i++) {
                vars = Object.keys(data[i]);
                for (var x = 0; x < vars.length; x++) {
                    data[i][vars[x]] = this.translateStringInAsciiCode(data[i][vars[x]]);
                }
            }
            return data;
        }
        return this.translateStringInAsciiCode(data);
    };
    return Script;
}());
// $es = new Script(62);
// $r = ($es->Encript('Olá mundo!'));
// echo 'Encript <br>'.$r."<br><br>";
// echo  '<br>Decript <br>'.($es->Decript($r));
//# sourceMappingURL=encript.js.map