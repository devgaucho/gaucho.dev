import llama3Tokenizer from 'llama3-tokenizer-js';
var show_tokens=process.argv[2];
var input = '';
process.stdin.on('data',function(chunk){
    input += chunk.toString();
});
process.stdin.on('end',function(){
	var opts={ bos: false, eos: false };
	var tokens=llama3Tokenizer.encode(input,opts);
	var tokens_str=JSON.stringify(tokens, null, 2);
	var tamanho=tokens.length;
	if(show_tokens==1){
		//console.log(llama3Tokenizer.decode(tokens))
		console.log(tokens_str);
	}else{
		console.log(tamanho);
	}
});
