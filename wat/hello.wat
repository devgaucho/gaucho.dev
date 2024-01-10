(module
    ;; imports do namespace javascript 
    (import  "console"  "log" (func  $log (param  i32  i32))) ;; função log
    (import  "js"  "mem" (memory  1)) ;; importa 1 pagina de memória (54kb)
    
    ;; dados
    (data (i32.const 0) "olá mundo em webassembly puro")
    
    ;; declaração da função "helloWorld" sem argumentos
    (func (export  "helloWorld")
        i32.const 0  ;; offset 0 da função "log"
        i32.const 30  ;; tamanho da string
        call  $log
        )
)
