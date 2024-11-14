import llama3Tokenizer from 'llama3-tokenizer-js';
var input = '';
process.stdin.on('data',function(chunk){
    input += chunk.toString();
});
process.stdin.on('end',function(){
	var tokens=JSON.parse(input);
	console.log(llama3Tokenizer.decode(tokens))
});
