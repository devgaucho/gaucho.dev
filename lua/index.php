<!DOCTYPE html>
    <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />	
	<title>Lua v5.3.4</title>
       <script type='text/javascript'>
        var Module = {
            postRun: [
                text_changed
            ],
            print: (function() {
                return function(text) {
                    if (arguments.length > 1) text = Array.prototype.slice.call(arguments).join(' ');
                    console.log(text);

                    if(text != "emsc")
                        document.getElementById("result").innerHTML += "<br>\n" + text;
                };
                })(),
                printErr: function(text) {
                if (arguments.length > 1) text = Array.prototype.slice.call(arguments).join(' ');
                    if (0) { // XXX disabled for safety typeof dump == 'function') {
                        dump(text + '\n'); // fast, straight to the real console
                    } else {
                        console.error(text);
                    }
                }
            };

            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'main.wasm', true);
            xhr.responseType = 'arraybuffer';
            xhr.overrideMimeType("application/javascript");
            xhr.onload = function() {
                Module.wasmBinary = xhr.response;

                var script = document.createElement('script');
                script.src = "main.js";
                document.body.appendChild(script);
            };
            xhr.send(null);

            var timer;
            function text_changed() {
                clearTimeout(timer);
                input = document.getElementById("edit").value;
                timer = setTimeout(function() {
                        document.getElementById("result").innerHTML = "";
                        Module.ccall("run_lua", 'number', ['string'], [input]);
                    },
                    750);
            }
       </script>
    </head>
    <body>
        <div style="text-align:center;">
	<h1>Lua v5.3.4</h1>
	<p>
	<a href="https://github.com/vvanders/wasm_lua/" target="_blank">
	Github
	</a></p>
        <textarea id="edit" style="width: 480px; height: 360px;" onkeyup="text_changed();max-width:100%;">
function hello_lua()
    print "Hello Lua!"
end

hello_lua()</textarea>
        <div id="result" style="display:block;margin:0 auto;width: 200px;"></div>
        </div>
    </body>
</html>
