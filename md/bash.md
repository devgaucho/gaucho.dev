## parallel

### rodando dois comandos em paralelo

```
parallel --gnu << 'EOF'
date >> out1 && sleep 5
date >> out2 && sleep 5
EOF
```

Fonte: [StackOverwlow](https://stackoverflow.com/a/33765906)

### rodando comandos em paralelo com argumentos

```
date && parallel sleep ::: 5 5 5 5 5 5 5 5 && date
```

Tempo para rodar:

- 1 core = 40s
- 2 core = 20s
- 4 core = 10s
- 8 core = 5s
